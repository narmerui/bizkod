<?php
include_once "header.php"
?>
<!-- <section>
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
</section> -->

<main class="container-fluid mt-5 pt-5">
  <div class="text-center mb-5">
    <h1>Find Your Match!</h1>
    <p>Discover your perfect match based on your preferences.</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="includes/postflat.inc.php" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
          <label for="homeNameInput" class="form-label">Name of Home</label>
          <input type="text" class="form-control" name="name" id="homeNameInput" placeholder="Enter the name of your home" required>
        </div>

        <div class="mb-3">
          <label for="descriptionInput" class="form-label">Description</label>
          <textarea class="form-control" id="descriptionInput" rows="3" name="description" placeholder="Describe your home and what you're looking for in a roommate" required></textarea>
        </div>

        <div class="mb-3">
          <label for="priceInput" class="form-label">Price</label>
          <div class="input-group">
            <span class="input-group-text">€</span>
            <input type="number" class="form-control" name="price" id="priceInput" placeholder="Enter Price" required>
          </div>
        </div>
        <div class="mb-3">
        <label for="sizeInput" class="form-label">Size</label>
        <div class="input-group">
          <span class="input-group-text">Sq Mt</span>
          <input type="number" class="form-control" name="size" id="sizeInput" placeholder="Enter Size (e.g., 500)" required>
        </div>
      </div>

        <div class="mb-3">
          <label for="cityInput" class="form-label">City</label>
          <input type="text" class="form-control" name="city" id="cityInput" placeholder="Enter City" required>
        </div>

        <div class="mb-3">
          <label for="addressInput" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="addressInput" placeholder="Enter Address" required>
        </div>

        <div class="mb-3">
          <label for="homeImages" class="form-label">Home Images</label>
          <input class="form-control" type="file" name="fileImg[]" id="homeImages" accept=".jpg, .jpeg, .png" required multiple>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  
    <?php
include_once "footer.php"
?>

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

