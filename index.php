
    <?php
    include_once "header.php";
    ?>

    <?php
    if (isset($_SESSION["useruid"])){
        echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
    }
    ?>
    <H1>Main page</H1>
    <?php
    include_once "footer.php";
    ?>
