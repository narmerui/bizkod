<?php
if(isset($_POST["submit"])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }




    $email = validate($_POST["email"]);
    $pass = validate($_POST["pwd"]);

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
        if(password_verify($pass,$data["password"])){
            session_start();
            $_SESSION["user"] = "seek";
            header("Location: ../login.php?error=none");
        }
        else{
            header("Location: ../login.php?error=wronglogin");

        }
    }
    $sql = "SELECT password FROM flatowner WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if (password_verify($pass, $data["password"])) {
            session_start();
            $_SESSION["user"] = "own";
            header("Location: ../looking.php");
        }
        else{
            header("Location: ../login.php?error=wronglogin");
        }
    }
    else{
        header("Location: ../login.php?error=wronglogin");
    }





}