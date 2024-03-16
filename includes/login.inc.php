<?php
if(isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pass = $_POST["pwd"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogIn($email, $pass)) {
        header("Location: ../login.php?error=emptyinput");
        if (emptyInputLogIn($email, $pass) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        if (invalidEmail($email)) {
            header("Location: ../login.php?error=wronglogin");
            exit();
        }
        loginUser($conn, $email, $pass);
    }

    if (invalidEmail($email)) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }


    header("Location: ../login.php");
}