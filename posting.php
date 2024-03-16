<?php
include_once "header.php";
session_start();
?>

<section>
    <h2>Sign Up</h2>
    <form action="includes/postflat.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name...">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="price" placeholder="Price...">
        <input type="number" name="size" placeholder="Size...">
        <input type="text" name="city" placeholder="city...">
        <input type="text" name="address" placeholder="Address...">
        <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple/>
        <button type="submit" name="submit">Post</button>
    </form>
</section>
<?php

if(isset($_GET["error"])){

    switch ($_GET["error"]) {
        case "emptyinput":
            echo "<p>Fill in all fields!</p>";
            break;
        case "stmtfailed":
            echo "<p>Something went wrong, try again!</p>";
            break;
        case "none":
            header("Location: index.php");
            exit();
    }
}
?>
<?php
include_once "footer.php"
?>
