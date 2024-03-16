<?php
header('Content-Type: application/json');
include_once '../includes/dbh.inc.php'; // Database connection

$response = ['success' => false, 'message' => 'An error occurred.'];

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Initialize variables to hold user information
    $userType = null;
    $userId = null;

    // Prepare SQL statement for the flatseekers table
    $sql = "SELECT *, 'id_seeker' AS id_column FROM flatseekers WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $response['message'] = "SQL error.";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $userType = 'flatseeker';
            $userId = $row['id_seeker'];
        } else {
            // Prepare SQL statement for the flatowners table
            $sql = "SELECT *, 'id_owner' AS id_column FROM flatowner WHERE email = ?;";
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
                    $userType = 'flatowner';
                    $userId = $row['id_owner'];
                }
            }
        }

        if ($userType && $userId) {
            // Verify password
            $pwdCheck = password_verify($password, $row['password']);
            if ($pwdCheck == false) {
                $response['message'] = "Incorrect login information.";
            } else if ($pwdCheck == true) {
                // Log in the user
                session_start();
                $_SESSION['user'] = $userType; // Specifies the user type
                $_SESSION['userId'] = $userId; // Stores the user ID based on user type
                $response['success'] = true;
                $response['message'] = "Successful login.";
                $response['redirect'] = ($userType == 'flatseeker') ? 'looking.php' : 'index.php'; // Redirect based on user type
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
