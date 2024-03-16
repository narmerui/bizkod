<?php

function send_response($response, $code = 200) {
    http_response_code($code);
    echo json_encode($response);
    exit;
}

function get_request_data() {
    return array_merge($_POST ? $_POST : [], (array) json_decode(file_get_contents('php://input'), true), $_GET);
}

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_phone($phone) {
    return preg_match('/^\d+$/', $phone);
}

function validate_date_of_birth($dob) {
    $date = DateTime::createFromFormat('Y-m-d', $dob);
    return $date && $date->format('Y-m-d') === $dob;
}

$data = get_request_data();

$requiredFields = ['email', 'password', 'phone', 'gender', 'date_of_birth', 'name', 'surname', 'university'];
foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        send_response(["message" => "Missing field: $field. All fields are required."], 400);
    }
}

foreach ($data as $key => $value) {
    switch ($key) {
        case 'email':
            if (!validate_email($value)) {
                send_response(["message" => "Invalid email format."], 400);
            }
            break;
        case 'phone':
            if (!validate_phone($value)) {
                send_response(["message" => "Invalid phone number. Only digits are allowed."], 400);
            }
            break;
        case 'gender':
            if (!in_array($value, ['male', 'female', 'other'])) {
                send_response(["message" => "Gender must be 'male', 'female', or 'other'."], 400);
            }
            break;
        case 'date_of_birth':
            if (!validate_date_of_birth($value)) {
                send_response(["message" => "Invalid date of birth format. Use YYYY-MM-DD."], 400);
            }
            break;
        case 'name':
        case 'surname':
            if (strlen($value) < 2) {
                send_response(["message" => ucfirst($key) . " must be at least 2 characters long."], 400);
            }
            break;
        case 'university':
            if (empty($value)) {
                send_response(["message" => "University field cannot be empty."], 400);
            }
            break;
    }
}

// Database connection and preparation
// Replace with your actual database connection details
$pdo = new PDO('mysql:host=localhost;dbname=apartments', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $data['email'];

$stmt = $pdo->prepare('SELECT 1 FROM `accounts` WHERE email = ?');
$stmt->execute([$email]);

if ($stmt->fetch()) {
    send_response(["message" => "An account with this email already exists."], 400);
}

$passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare('INSERT INTO `accounts` (email, password, phone, gender, date_of_birth, name, surname, university) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$result = $stmt->execute([$email, $passwordHash, $data['phone'], $data['gender'], $data['date_of_birth'], $data['name'], $data['surname'], $data['university']]);

if (!$result) {
    send_response(["message" => "Failed to create account."], 500);
}

send_response(["message" => "Account created successfully."]);
