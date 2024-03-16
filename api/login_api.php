<?php
header('Content-Type: application/json');
//die("ok1");
// Assuming you have a database connection established in 'db.inc.php'
include_once '../includes/dbh.inc.php';
$response = ['success' => false, 'message' => 'An error occurred.'];

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM flatseekers WHERE email = ?; ";
    $stmt = mysqli_stmt_init($conn); // Assuming $conn is your database connection variable

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $response['message'] = "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password

            $pwdCheck = password_verify($password, $row['password']);
            if ($pwdCheck == false) {
                $response['message'] = "Incorrect login information.";
            } else if ($pwdCheck == true) {
                // Log in the user
                // For example, set session variables
                session_start();
                $_SESSION['user'] = "yes";
                $response['success'] = true;
                $response['message'] = "Successful login.";
                $response['redirect'] = 'looking.php';

            }
        } else {
            $response['message'] = "No user found with that email.";
        }
    }
} else {
    $response['message'] = "Fill in all fields!";
}

echo json_encode($response);
