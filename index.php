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
    <?php
    include_once "footer.php";
    ?>
