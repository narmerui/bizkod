<?php
include_once "header.php"
?>
<div class="container">
    <section>
        <h2>Log In</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="submit">Log In</button>
            <div>Dont have account? <a href="#">Signup</a></div>
        </form>
    </section>
<?php
if(isset($_GET["error"])){
    switch ($_GET["error"]){
        case "emptyinput":
            echo "<p>Fill in all fields!</p>";
            break;
        case "wronglogin":
            echo "<p>Incorrect login information!</p>";
            break;
        case "mailnotfound"    :
            echo "<p>Mail not found.</p>";
            break;
    }
}
?>
</div>
<?php
include_once "footer.php"
?>