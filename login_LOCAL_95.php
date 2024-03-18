<?php
include_once "header.php"
?>
<div class="container">
<!--    <section>-->
<!--        <h2>Log In</h2>-->
<!--        <form action="includes/login.inc.php" method="post">-->
<!--            <input type="text" name="email" placeholder="Email...">-->
<!--            <input type="password" name="pwd" placeholder="Password...">-->
<!--            <button type="submit" name="submit">Log In</button>-->
<!--            <div>Dont have account? <a href="#">Signup</a></div>-->
<!--        </form>-->
<!--    </section>-->
    <section class="vh-100">
        <form action="includes/login.inc.php" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" name="email" class="form-control" />
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" name="pwd" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>
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
                    case "none":
                        echo "<p>Successful login.</p>";
                        break;
                }
            }
            ?>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </section>
</div>
<!--</div>-->
<?php
include_once "footer.php"
?>