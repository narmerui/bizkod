<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Looking for room</title>
    <link rel="stylesheet" type="text/css" href="looking.css">
   
</head>
<body>

<?php
    include_once "header.php";
    ?>

<div class="search">
<h2 class="container-fluid col-3">
    Search location
</h2>
<div class="container-fluid col-3" >
        <form class="d-flex py-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search" name= "search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
</div>
</div>

</body>
</html>