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
    } else {
        header("location: ../login.php");
        exit();
    }

    if (invalidEmail($email)) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    if (!emailExistLogin($conn, $email)) {
        header("Location: ../login.php?error=mailnotfound");
        exit();
    }

    header("Location: ../login.php");
}