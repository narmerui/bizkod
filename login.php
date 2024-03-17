<?php
include_once "header.php"
?>
<div class="container">
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                                    <form class="mx-1 mx-md-4" id="loginForm" method="post">

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
                                                <input type="password" name="password" id="formPassword" class="form-control" />
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
                                            <div id="loader" class="loader" style="display: none;"></div>
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-5">Log In</button>
                                        </div>
                                        <div class="txt d-flex justify-content-center">
                                        <a href="choose_sign.php">Need to create an account?</a>
                                        </div>
                                        <div class="mb-4 d-flex justify-content-center px-5">
                                            <label class="form-label"></label>
                                            <div class="form-check p-5">
                                                <input class="form-check-input" type="radio" name="user_type" id="flatseeker" value="flatseekers" checked>
                                                <label class="form-check-label" for="flatseeker">
                                                    Flatseeker
                                                </label>
                                            </div>
                                            <div class="form-check p-5">
                                                <input class="form-check-input" type="radio" name="user_type" id="flatowner" value="flatowner">
                                                <label class="form-check-label" for="flatowner">
                                                    Flatowner
                                                </label>
                                            </div>
                                        </div>
                                        <div id="loginResponse"></div>

                                    </form>
                                    <script>
                                        document.getElementById('loginForm').addEventListener('submit', function(event) {
                                            event.preventDefault(); // Prevent the default form submission

                                            const formData = new FormData(this); // Create a FormData object from the form
                                            fetch('api/login_api.php', { // Adjust the URL path according to your project structure
                                                method: 'POST',
                                                body: formData
                                            })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if(data.success) {
                                                        // Handle successful login
                                                        document.getElementById('loginResponse').innerHTML = `<p>${data.message}</p>`;
                                                        // Check for redirect URL in the response and redirect if present
                                                        if(data.redirect) {
                                                            window.location.href = data.redirect; // Redirect to the specified URL
                                                        }
                                                    } else {
                                                        // Handle login failure
                                                        document.getElementById('loginResponse').innerHTML = `<p>${data.message}</p>`;
                                                    }
                                                })
                                                .catch((error) => {
                                                    console.error('Error:', error);
                                                    document.getElementById('loginResponse').innerHTML = `<p>An error occurred. Please try again.</p>`;
                                                });
                                        });
                                    </script>



                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="images/firstback.jpg" class="img-fluid rounded" alt="Sample image">

                                </div>
                            </div>
</div>
<?php
include_once "footer.php"
?>