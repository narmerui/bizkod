<?php
include_once "header.php"
?>

<section>
    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name...">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="uid" placeholder="Username...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="password" name="pwdrepeat" placeholder="Repeat password...">
        <button type="submit" name="submit">Sign Up</button>
    </form>
</section>
<?php
    if(isset($_GET["error"])){

        switch ($_GET["error"]) {
            case "emptyinput":
                echo "<p>Fill in all fields!</p>";
                break;
            case "invalidUid":
                echo "<p>Choose a proper username!</p>";
                break;
            case "invalidEmail":
                echo "<p>Choose a proper email!</p>";
                break;
            case "passwordsdontmatch":
                echo "<p>Passwords doesn't match!</p>";
                break;
            case "stmtfailed":
                echo "<p>Something went wrong, try again!</p>";
                break;
            case "usernametaken":
                echo "<p>Username already taken!</p>";
                break;
            case "none":
                echo "<p>You have signed up!</p>";
                break;
        }
    }
?>

<?php
include_once "footer.php"
?>