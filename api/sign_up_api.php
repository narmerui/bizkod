<?php
header('Content-Type: application/json');
include_once '../includes/dbh.inc.php'; // Database connection

$response = ['success' => false, 'message' => 'An error occurred.'];

if (isset($_POST['firstName'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['repeatPassword'], $_POST['phoneNumber'], $_POST['gender'], $_POST['university'], $_POST['dateOfBirth'])) {
    $firstName = trim($_POST['firstName']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repeatPassword = trim($_POST['repeatPassword']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $gender = trim($_POST['gender']); // Validate gender format
    $university = trim($_POST['university']);
    $dateOfBirth = trim($_POST['dateOfBirth']); // Validate date format

    // Validate email format (basic check)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = "Invalid email format.";
        echo json_encode($response);
        exit();
    }

    // Validate password match
    if ($password !== $repeatPassword) {
        $response['message'] = "Passwords do not match.";
        echo json_encode($response);
        exit();
    }

    // Hash the password for secure storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement (modify table name and column names as needed)
    $sql = "INSERT INTO users (firstName, surname, email, password, phoneNumber, gender, university, dateOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $response['message'] = "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssss", $firstName, $surname, $email, $hashedPassword, $phoneNumber, $gender, $university, $dateOfBirth);
        mysqli_stmt_execute($stmt);

        $affectedRows = mysqli_stmt_affected_rows($stmt);

        if ($affectedRows == 1) {
            $response['success'] = true;
            $response['message'] = "Registration successful!";
            // Additional actions like sending confirmation email can be added here
        } else {
            $response['message'] = "Registration failed.";
        }
    }
} else {
    $response['message'] = "Fill in all fields!";
}

echo json_encode($response);
?>
