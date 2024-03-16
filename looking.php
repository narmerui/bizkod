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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  <link rel="stylesheet" type="type/css" href="looking.css">    
</head>
<body style="background-color:#d7dbe0">
<div class="container-fluid col-6 my-element">
  <div class="row">
    <div class="col-12">
      <h2> Find Your Match!</h2>  </div>
    <div class="col-12 mx-auto search-box">
      <form class="d-flex py-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Enter City or Zip Code" aria-label="Search" id="search" name="search">
        <button class="btn btn-outline-success" type="submit"> Search</button>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid col-6 my-element ">
  <div class="col-12">
    <h2> Looking For...?</h2>
  </div>
  <select class="form-select" aria-label="Gender selection">
    <option selected>Choose Your Preference</option>
    <option value="Male">Mr. Right</option>
    <option value="Female">Ms. Perfect</option>
    <option value="3">Both </option> </select>
</div>

<div class="container-fluid col-6 my-element ">
  <form class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      <label for="budget" class="sr-only"><h2>Budget</h2></label>
      <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="budget" name="budget" placeholder="Monthly Price"> </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2" style="margin-left: 30px;" id="budgetbtn">Let's Match!</button>
  </form>
</div>
</body>
</html>
