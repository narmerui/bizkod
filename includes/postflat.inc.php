<?php
require_once "dbh.inc.php";
require_once "functions.inc.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();


if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $size = $_POST["size"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $totalFiles = count($_FILES['fileImg']['name']);
    $filesArray = array();

    for($i = 0;$i < $totalFiles; $i++){
        $imageName = $_FILES["fileImg"]["name"][$i];
        $tmpName = $_FILES["fileImg"]["tmp_name"][$i];

        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));

        $newImageName = uniqid() . '.' . $imageExtension;

        move_uploaded_file($tmpName, '../uploads/' . $newImageName);

        $filesArray[] = $newImageName;
    }

    $filesArray = json_encode($filesArray);
    $query = "INSERT INTO images VALUES('', '$name', '$filesArray')";
    mysqli_query($conn, $query);




    if(emptyInputFlat($name, $description, $price, $size, $city, $address) !== false){
        header("location: ../signupflatseek.php?error=emptyinput");
        exit();
    }
//    if(pwdMatch($pwd, $pwdRepeat) !== false){
//        header("location: ../signupflatseek.php?error=passwordsdontmatch");
//        exit();
//    }
//    if(emailExists($conn, $email) !== false){
//        header("location: ../signupflatseek.php?error=emailtaken");
//        exit();
//    }

//    createflat($conn, $name, $description, $price, $size, $city, $address);
    // Handle file uploads

    require_once '../PHPMailer-master/src/Exception.php';
    require_once '../PHPMailer-master/src/PHPMailer.php';
    require_once '../PHPMailer-master/src/SMTP.php';


    if(isset($_POST["submit"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'team0111bizkod@gmail.com';
        $mail->Password = 'oaiwjbfbvdmuvtxn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('team0111bizkod@gmail.com');

        $mail->addAddress($_SESSION["owneremail"]);

        $mail->isHTML(true);

        $mail->Body = "You added your apartment to CIMI!";

        $mail->send();
    }
}
else{
    header("location: ../posting.php");
    exit();
}
