<?php
if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $size = $_POST["size"];
    $city = $_POST["city"];
    $address = $_POST["address"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyInputFlat($name, $description, $price, $size, $city, $address) !== false){
        header("location: ../signupflatseek.php?error=emptyinput");
        exit();
    }
//    if(invalidUid($username) !== false){
//        header("location: ../signupseek.php?error=invalidUid");
//        exit();
//    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signupflatseek.php?error=passwordsdontmatch");
        exit();
    }
    if(emailExists($conn, $email) !== false){
        header("location: ../signupflatseek.php?error=emailtaken");
        exit();
    }

    createflatseeker($conn, $name, $surname, $date, $gender, $email, $phone, $university, $pwd);
}
else{
    header("location: ../signupflatseek.php");
    exit();
}
