
    <?php
    include_once "header.php";
    ?>

    <?php
    if (isset($_SESSION["useruid"])){
        echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
    }
    ?>
    <div class="container-back">

    </div>
    <div class="container">
        <div class="row justify-content-center g-3 pt-5">
            <div class="col-auto my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-auto my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-auto my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-auto my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include_once "footer.php";
    ?>
