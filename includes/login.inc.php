<?php

$email = $_POST["email"];
$pass = $_POST["pwd"];

require_once "dbh.inc.php";
require_once "functions.inc.php";

if(emptyInputLogIn($email,$pass)){
    header("Location: ../login.php?error=emptyinput");
    exit();
}

if(invalidEmail($email)){
    header("Location: ../login.php?error=wronglogin");
    exit();
}

if(!emailExistLogin($conn, $email)){
    header("Location: ../login.php?error=mailnotfound");
    exit();
}