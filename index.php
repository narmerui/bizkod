
    <?php
    include_once "header.php";
    ?>

    <?php
    if (isset($_SESSION["useruid"])){
        echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
    }
    ?>
    <div class="container-back vh-100 d-flex">
        <h1 class="">
            Hi! We are Cimi 👋 <br />Looking for <span id="typewriter"></span
            ><span id="cursor">|</span>
        </h1>
        <script>
            function sleep(ms) {
                return new Promise((resolve) => setTimeout(resolve, ms));
            }

            const phrases = ["a room?", "a roommate?", "a place to stay?"];
            const el = document.getElementById("typewriter");

            let sleepTime = 100;

            let curPhraseIndex = 0;

            const writeLoop = async () => {
                while (true) {
                    let curWord = phrases[curPhraseIndex];

                    for (let i = 0; i < curWord.length; i++) {
                        el.innerText = curWord.substring(0, i + 1);
                        await sleep(sleepTime);
                    }

                    await sleep(sleepTime * 10);

                    for (let i = curWord.length; i > 0; i--) {
                        el.innerText = curWord.substring(0, i - 1);
                        await sleep(sleepTime);
                    }

                    await sleep(sleepTime * 5);

                    if (curPhraseIndex === phrases.length - 1) {
                        curPhraseIndex = 0;
                    } else {
                        curPhraseIndex++;
                    }
                }
            };

            writeLoop();
        </script>
    </div>
    <div class="container">
        <div class="row justify-content-center g-4 pt-5">
            <div class="col-auto my-2 px-5">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="images/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-auto my-2 px-5">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="images/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-auto my-2 px-5">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="images/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-auto my-2">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="images/1.jpg" alt="Card image cap">
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
