<?php
header('Content-Type: application/json');
include_once '../includes/dbh.inc.php'; // Database connection

$response = ['success' => false, 'message' => 'An error occurred.'];

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_type'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $userType = trim($_POST['user_type']);

    // Determine the correct table and ID column based on user type
    if ($userType === 'flatseeker') {
        $sql = "SELECT *, 'id_seeker' AS id_column FROM flatseekers WHERE email = ?;";
    } else if ($userType === 'flatowner') {
        $sql = "SELECT *, 'id_owner' AS id_column FROM flatowner WHERE email = ?;";
    } else {
        $response['message'] = "No user found with that email.";
        echo json_encode($response);
        exit();
    }

    // Prepare and execute SQL statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $response['message'] = "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Log in the user
                session_start();
                $_SESSION['user'] = $userType; // Specifies the user type
                $_SESSION['userId'] = $row[$row['id_column']]; // Stores the user ID
                $response['success'] = true;
                $response['message'] = "Successful login.";
                $response['redirect'] = ($userType == 'flatseeker') ? 'looking.php' : 'index.php'; // Redirect based on user type
            } else {
                $response['message'] = "Incorrect login information.";
            }
        } else {
            $response['message'] = "No user found with that email.";
        }
    }
} else {
    $response['message'] = "Fill in all fields!";
}

echo json_encode($response);
?>