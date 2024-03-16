<?php

$email = $_POST["email"];
$pass = $_POST["pwd"];

require_once "dbh.inc.php";
require_once "functions.inc.php";

if(emptyInputLogIn($email,$pass)){
    header("Location: ../login.php?error=emptyinput");
    exit();
}