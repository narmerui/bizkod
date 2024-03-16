<?php
include_once "header.php"
?>
    <style>
        html, body {
            height: 100%; /* Ensure the full height of the page is used */
            margin: 0; /* Reset default margin */
            display: flex; /* Make the body a flex container */
            flex-direction: column; /* Arrange flex items vertically */
        }

        main.content {
            flex: 1; /* Allows content to expand and occupy available space */
            padding-bottom: 20em; /* Extra space at the bottom */
            padding-top: 1.5em;
        }
        @media screen and (max-width: 991px) {
            main.content {
                flex: 1; /* Allows content to expand and occupy available space */
                padding-bottom: 20em; /* Extra space at the bottom */
                padding-top: 1.5em;
            }
        }

        footer {
            flex-shrink: 0; /* Prevents the footer from shrinking */
            /* Additional footer styling here */
        }
    </style>
    <main class="content">
        <script src="js/script.js"></script>
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up as an Owner</p>

                                        <form class="mx-1 mx-md-4" action="includes/signupflatowner.inc.php" method="post">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="formFirstName" name="name" class="form-control" />
                                                    <label class="form-label" for="formFirstName">First Name</label>
                                                </div>
                                            </div>


                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" name="surname" id="formSurname" class="form-control" />
                                                    <label class="form-label" for="formSurname">Surname</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" name="email" id="formEmail" class="form-control" />
                                                    <label class="form-label" for="formEmail">Your Email</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" name="pwd" id="formPassword" class="form-control" />
                                                    <label class="form-label" for="formPassword">Password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" name="pwdrepeat" id="formRepeatPassword" class="form-control" />
                                                    <label class="form-label" for="formRepeatPassword">Repeat your password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="tel" name="phone" id="formPhone" class="form-control" />
                                                    <label class="form-label" for="formPhone">Phone Number</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-venus-mars fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select id="formGender" name="gender" class="form-select">
                                                        <option value="">Choose Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-university fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" name="university" id="formUniversity" class="form-control" />
                                                    <label class="form-label" for="formUniversity">University</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-birthday-cake fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="date" name="birth_date" id="formBirthdate" class="form-control" />
                                                    <label class="form-label" for="formBirthdate"></label>
                                                </div>
                                            </div>

                                            <div class="form-check d-flex justify-content-center mb-5">
                                                <input class="form-check-input me-2" type="checkbox" value="" id="formTerms" />
                                                <label class="form-check-label" for="formTerms">
                                                    I agree to all statements in <a href="#!">Terms of Service</a>
                                                </label>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="images/slide2.jpg" class="img-fluid rounded" alt="Sample image">

                                    </div>
                                </div>

                                <?php
                                if(isset($_GET["error"])){

                                    switch ($_GET["error"]) {
                                        case "emptyinput":
                                            echo "<p class='text-center fs-3'>Fill in all fields!</p>";
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
                                        case "emailtaken":
                                            echo "<p>User with this email already exists!</p>";
                                            break;
                                        default:
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
include_once "footer.php"
?>