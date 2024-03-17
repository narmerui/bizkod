<?php
include 'header.php';
include_once "includes/dbh.inc.php";

// Ensure $allowedColumns is defined before use
$allowedColumns = ['name', 'city', 'description'];

$search = $_GET['search'] ?? '';
$column = $_GET['column'] ?? 'city'; // Default search column

// Ensure the selected column is allowed to prevent SQL injection
if (!in_array($column, $allowedColumns)) {
    $column = 'city'; // Default to 'city' if invalid column provided
}

$query = "SELECT * FROM `flat`";
if ($search !== '') {
    $query .= " WHERE `$column` LIKE ?";
    $stmt = $conn->prepare($query);
    $term = '%' . $search . '%';
    $stmt->bind_param('s', $term);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($query);
}

?>  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .main-container {
        padding-top: 20px;
    }
    .catalog-wrapper {
        margin: auto;
        max-width: 800px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .search-form {
        margin-bottom: 20px;
    }
    .search-input, .search-select {
        margin-right: 5px;
    }
    .game-container {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .name-container, .description-container, .city-container, .price-container {
        margin-bottom: 10px;
    }
</style>
<main class="main-container container" style="margin-top:150px">
    <div class="catalog-wrapper">
        <form action="looking.php" method="GET" class="search-form d-flex justify-content-between">
            <input class="form-control search-input" placeholder="Search..." name="search" value="<?= htmlspecialchars($search); ?>"/>
            <select class="form-select search-select" name="column">
                <option value="name" <?= $column == 'name' ? 'selected' : ''; ?>>Name</option>
                <option value="city" <?= $column == 'city' ? 'selected' : ''; ?>>City</option>
                <option value="description" <?= $column == 'description' ? 'selected' : ''; ?>>Description</option>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class="container">
            <div class="row justify-content-center g-4 pt-5">
                <?php
                $sql = "SELECT * FROM flat";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){

                    $name_query = "SELECT image FROM images WHERE name = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $name_query)) {
                        header("location: ../posting.php?error=stmtfailed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "s", $row["name"]);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row2 = mysqli_fetch_assoc($result);
                    $imagearray = json_decode($row2["image"]);
                    ?>
                    <div class="col-auto my-2 px-5">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="uploads/<?php echo $imagearray[0]; ?>" alt="Card image cap">
                            <a class="card-body link-underline link-underline-opacity-0" href="#">
                                <h5 class="card-title"><?php echo $row["name"];?></h5>
                                <p class="card-text"><?php echo $row["description"];?></p>
                                <p class="card-text"><?php echo $row["price"];?>&euro;</p>
                                <p class="card-text"><?php echo $row["size"];?>m<sup>2</sup></p>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>
