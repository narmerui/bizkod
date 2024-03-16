<?php
include_once "header.php"
?>

<section>
    <h2>Sign Up</h2>
    <form action="ncludes/postflat.inc.php" method="post">
        <input type="text" name="name" placeholder="Name..."><br>
        <textarea name="description" placeholder="Description"></textarea>

        <button type="submit" name="submit">Post</button>
    </form>
</section>
<?php
if(isset($_GET["error"])){

    switch ($_GET["error"]) {
        case "emptyinput":
            echo "<p>Fill in all fields!</p>";
            break;
//        case "invalidUid":
//            echo "<p>Choose a proper username!</p>";
//            break;
        case "invalidEmail":
            echo "<p>Choose a proper email!</p>";
            break;
        case "passwordsdontmatch":
            echo "<p>Passwords doesn't match!</p>";
            break;
        case "stmtfailed":
            echo "<p>Something went wrong, try again!</p>";
            break;
        case "emailtaken":
            echo "<p>User with this email already exists!</p>";
            break;
        case "none":
            header("Location: looking.php");
            exit();
    }
}
?>
<?php
include_once "footer.php"
?>
