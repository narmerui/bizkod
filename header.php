<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</head>
<body>
<nav>
    <div>
        <a href="index.php"><i class="bi bi-door-open"></i></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="discover.php">About Us</a></li>
            <li><a href="blog.php">Find Blogs</a></li>
            <?php
                if (isset($_SESSION["useruid"])){
                    echo "<li><a href=\"profile.php\">Profile page</a></li>";
                    echo "<li><a href=\"includes/logout.inc.php\">Log out</a></li>";
                }
                else{
                    echo "<li><a href=\"signup.php\">Sign Up</a></li>";
                    echo "<li><a href=\"login.php\">Log In</a></li>";
                }
            ?>
        </ul>
    </div>
</nav>