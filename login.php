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
<!--    <section class="vh-100">-->
<!--        <form action="includes/login.inc.php" method="post">-->
<!--            <!-- Email input -->
<!--            <div class="form-outline mb-4">-->
<!--                <input type="email" id="form2Example1" name="email" class="form-control" />-->
<!--                <label class="form-label" for="form2Example1">Email address</label>-->
<!--            </div>-->
<!---->
<!--            <!-- Password input -->
<!--            <div class="form-outline mb-4">-->
<!--                <input type="password" id="form2Example2" name="pwd" class="form-control" />-->
<!--                <label class="form-label" for="form2Example2">Password</label>-->
<!--            </div>-->
<!--            --><?php
//            if(isset($_GET["error"])){
//                switch ($_GET["error"]){
//                    case "emptyinput":
//                        echo "<p>Fill in all fields!</p>";
//                        break;
//                    case "wronglogin":
//                        echo "<p>Incorrect login information!</p>";
//                        break;
//                    case "mailnotfound"    :
//                        echo "<p>Mail not found.</p>";
//                        break;
//                    case "none":
//                        echo "<p>Successful login.</p>";
//                        break;
//                }
//            }
//            ?>
<!---->
<!--            <!-- 2 column grid layout for inline styling -->
<!--            <div class="row mb-4">-->
<!--                <div class="col d-flex justify-content-center">-->
<!--                    <!-- Checkbox -->
<!--                    <div class="form-check">-->
<!--                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />-->
<!--                        <label class="form-check-label" for="form2Example31"> Remember me </label>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="col">-->
<!--                    <!-- Simple link -->
<!--                    <a href="#!">Forgot password?</a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <!-- Submit button -->
<!--            <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>-->
<!---->
<!--            <!-- Register buttons -->
<!--            <div class="text-center">-->
<!--                <p>Not a member? <a href="signupflatseek.php">Register</a></p>-->
<!--                <p>or sign up with:</p>-->
<!--                <button type="button" class="btn btn-link btn-floating mx-1">-->
<!--                    <i class="fab fa-facebook-f"></i>-->
<!--                </button>-->
<!---->
<!--                <button type="button" class="btn btn-link btn-floating mx-1">-->
<!--                    <i class="fab fa-google"></i>-->
<!--                </button>-->
<!---->
<!--                <button type="button" class="btn btn-link btn-floating mx-1">-->
<!--                    <i class="fab fa-twitter"></i>-->
<!--                </button>-->
<!---->
<!--                <button type="button" class="btn btn-link btn-floating mx-1">-->
<!--                    <i class="fab fa-github"></i>-->
<!--                </button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </section>-->
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                                    <form class="mx-1 mx-md-4" action="includes/login.inc.php" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="formEmail" class="form-control" />
                                                <label class="form-label pb-4" for="formEmail">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="pwd" id="formPassword" class="form-control" />
                                                <label class="form-label pb-4" for="formPassword">Password</label>
                                            </div>
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
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-5">Log In</button>
                                        </div>
                                        <div class="txt d-flex justify-content-center">
                                        <a href="choose_sign.php">Need to create an account?</a>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="images/firstback.jpg" class="img-fluid rounded" alt="Sample image">

                                </div>
                            </div>
</div>
<?php
include_once "footer.php"
?>