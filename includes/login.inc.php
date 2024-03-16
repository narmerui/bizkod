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
    }

    if (invalidEmail($email)) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    $sql = "SELECT password FROM flatseekers WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);

        if(password_verify($pass,$data["password"]))
            header("Location: ../login.php");
    }
    else{
        $sql = "SELECT password FROM flatowner WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
            if(password_verify($pass, $data["password"]))
                header("Location: ../login");
        }
    }



}