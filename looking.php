<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Looking for room</title>
    <link rel="stylesheet" type="text/css" href="looking.css">
   
</head>
<body style=" background-color: #d7dbe0;">

<?php
    include_once "header.php";
    ?>

<div class="container-fluid col-6 my-element">
  <div class="row">
    <div class="col-12 ">
      <h2>Search location</h2>
    </div>
    <div class="col-12 mx-auto search-box "> <form class="d-flex py-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</div>



<div class="container-fluid col-6 my-element rounded-pill">

    <div class="col-12 ">
      <h2>Search gender</h2>
    </div>
    <select class="form-select" aria-label="Default select example">
    <option selected>Select...</option>
    <option value="1">Male</option>
    <option value="2">Female</option>
    </select>
</div>

<div class="container-fluid col-6 my-element rounded-pill">

<form class="form-inline">
  <div class="form-group mx-sm-3 mb-2">
    <label for="budget" class="sr-only"><h2>Budget</h2></label>
    <input type="number" class="form-control" id="budget" name="budget" placeholder="Budget per month">
  </div>
  <button type="submit" class="btn btn-primary mb-2 " style="margin-left: 20px;">Set Budget</button>
</form>
</div>





</body>
</html>