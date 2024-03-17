<?php
if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $date = $_POST["birth_date"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $university = $_POST["university"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyInputSignup($name, $surname, $date, $gender, $email, $phone, $university, $pwd, $pwdRepeat) !== false){
        header("location: ../sign_up.php?error=emptyinput");
        exit();
    }
//    if(invalidUid($username) !== false){
//        header("location: ../signupseek.php?error=invalidUid");
//        exit();
//    }
    if(invalidEmail($email) !== false){
        header("location: ../sign_up.php?error=invalidEmail");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../sign_up.php?error=passwordsdontmatch");
        exit();
    }
    if(emailExists($conn, $email) !== false){
        header("location: ../sign_up.php?error=emailtaken");
        exit();
    }

    createflatseeker($conn, $name, $surname, $date, $gender, $email, $phone, $university, $pwd);
}
else{
    header("location: ../sign_up.php");
    exit();
}
