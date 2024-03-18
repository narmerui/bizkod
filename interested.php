<?php
include_once "header.php";
include_once "includes/dbh.inc.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';


$owner_id = $_POST['owId'];

$sql = $conn->prepare("SELECT email FROM flatowner WHERE id_owner = ?");
$sql->bind_param("i", $owner_id);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output. Set to 0 in production
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Corrected SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'team0111bizkod@gmail.com'; // Your SMTP username
    $mail->Password = 'oaiwjbfbvdmuvtxn'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
    $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('team0111bizkod@gmail.com', 'Your Site Name');
    $mail->addAddress($row["email"]); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $emailSeeker = isset($_SESSION['emailseeker']) ? $_SESSION['emailseeker'] : "A seeker"; // Fallback if session variable isn't set
    $mail->Subject = 'Interest in Your Apartment';
    $mail->Body    = "{$emailSeeker} is interested in your apartment.";

    $mail->send();
    echo 'Owner of the aparment got message that you are interested in their apartment. He will contact you.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
