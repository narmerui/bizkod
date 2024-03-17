<?php
header('Content-Type: application/json');
include_once '../includes/dbh.inc.php'; // Ensure this path is correct

$response = ['success' => false, 'message' => 'An error occurred.'];

// Decode JSON from the request body
$data = json_decode(file_get_contents('php://input'), true);

// Validate and sanitize input data
if (!empty($data['name']) && !empty($data['surname']) && !empty($data['email']) && !empty($data['password']) && !empty($data['phone']) && !empty($data['gender']) && !empty($data['university']) && !empty($data['birth_date']) && !empty($data['user_type'])) {
    $name = mysqli_real_escape_string($conn, trim($data['name']));
    $surname = mysqli_real_escape_string($conn, trim($data['surname']));
    $email = mysqli_real_escape_string($conn, trim($data['email']));
    $password = password_hash(trim($data['password']), PASSWORD_DEFAULT);
    $phone = mysqli_real_escape_string($conn, trim($data['phone']));
    $gender = mysqli_real_escape_string($conn, trim($data['gender']));
    $university = mysqli_real_escape_string($conn, trim($data['university']));
    $birthDate = mysqli_real_escape_string($conn, trim($data['birth_date']));
    $userType = $data['user_type']; // This should be either 'flatseeker' or 'flatowner'

    // Determine the table and extra validations or actions based on user type
    $table = ($userType === 'flatowner') ? "flatowner" : "flatseekers";

    // Check if email already exists in the chosen table
    $sql = "SELECT email FROM $table WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $response['message'] = "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $response['message'] = "Email is already registered.";
        } else {
            // Insert new user (either flatseeker or flatowner)
            $sql = "INSERT INTO $table (name, surname, email, password, phone, gender, university, birth_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssssss", $name, $surname, $email, $password, $phone, $gender, $university, $birthDate);
                if (mysqli_stmt_execute($stmt)) {
                    $response['success'] = true;
                    $response['message'] = "Registration successful.";
                } else {
                    $response['message'] = "Unable to register.";
                }
            }
        }
    }
} else {
    $response['message'] = "Please fill in all fields.";
}

echo json_encode($response);
?>
