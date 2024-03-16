
    <?php
    include_once "header.php";
    ?>

    <?php
    if (isset($_SESSION["useruid"])){
        echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
    }
    ?>
    <H1>Main page</H1>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 my-1 mx-2">
            <div class="card" style="width: 18rem;">
                <img src="1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <!-- Repeat for other cards, just change the content as needed -->
        <div class="col-md-4 my-1 mx-2">
            <div class="card" style="width: 18rem;">
                <img src="1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-1 mx-2">
            <div class="card" style="width: 18rem;">
                <img src="1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
    <?php
    include_once "footer.php";
    ?>
