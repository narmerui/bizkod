<?php
function emptyInputSignup($name, $surname, $date, $gender, $email, $phone, $university, $pwd, $pwdRepeat){
    $result = 1;
    if(empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat) || empty($surname) || empty($date) || empty($gender) || empty($phone) || empty($university)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function emptyInputFlat($name, $description, $price, $size, $city, $address){
    $result = 1;
    if(empty($name) || empty($description) || empty($price) || empty($size) || empty($city) || empty($address)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//    function invalidUid($username){
//        $result = 1;
//        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
//            $result = true;
//        }
//        else{
//            $result = false;
//        }
//        return $result;
//    }
function invalidEmail($email){
    $result = 1;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat){
    $result = 1;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function emailExists($conn, $email){
    $sql = "SELECT * FROM flatseekers WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupflatseek.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createflatseeker($conn, $name, $surname, $birth_date, $gender, $email, $phone, $university, $pwd){
    $sql = "INSERT INTO flatseekers (name, surname, birth_date, gender, email, phone, university, password) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupflatseek.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $surname, $birth_date, $gender, $email, $phone, $university, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signupflatseek.php?error=none");
    exit();
}
function createflatowner($conn, $name, $surname, $birth_date, $gender, $email, $phone, $university, $pwd){
    $sql = "INSERT INTO flatowner (name, surname, birth_date, gender, email, phone, university, password) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupflatowner.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $surname, $birth_date, $gender, $email, $phone, $university, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signupflatowner.php?error=none");
    exit();
}
function emptyInputLogIn($username, $pwd){
    $result = 1;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}