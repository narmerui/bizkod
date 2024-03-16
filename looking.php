<?php
    include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Your Match!</title>
  <link rel="stylesheet" href="looking.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:#d7dbe0;">



<main class="container vh-100 mt-5">
  <div class="text-center mb-5 pt-5">
    <h1>Find Your Match!</h1>
    <p>Discover your perfect match based on your preferences.</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="mb-4">
        <label for="search" class="form-label">Enter City </label>
        <div class="input-group">
          <input type="text" class="form-control" id="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="button" id="button-search">Search</button>
        </div>
      </div>

      <div class="mb-4">
        <label for="preferenceSelect" class="form-label">Looking For...?</label>
        <select class="form-select" id="preferenceSelect" aria-label="Preference selection">
          <option selected>Choose Your Preference</option>
          <option value="Male">Mr. Right</option>
          <option value="Female">Ms. Perfect</option>
          <option value="Both">Both</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="budget" class="form-label">Budget</label>
        <div class="input-group">
          <span class="input-group-text">€</span>
          <input type="number" class="form-control" id="budget" placeholder="Monthly Price">
        </div>
      </div>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#matchModal">
        Let's Match!
      </button>
      <br><br>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="matchModal" tabindex="-1" aria-labelledby="matchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="matchModalLabel">Match Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Your search has been submitted. We are finding your perfect match!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjyLdbkAv7l7PnF1LsehM9Vk3aqkZ0c4K5IBmgJdZL3NtZ2Jb3v7b1" crossorigin="anonymous"></script>
</body>
</html>

<?php
    include_once "footer.php";
?>
