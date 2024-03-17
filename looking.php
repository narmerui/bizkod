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
        <div class="games-container">
            <?php while ($game = $result->fetch_assoc()): ?>
                <div class='game-container'>
                    <div class='name-container'><strong>Name:</strong> <?= htmlspecialchars($game['name']); ?></div>
                    <div class='description-container'><strong>Description:</strong> <?= htmlspecialchars($game['description']); ?></div>
                    <div class='city-container'><strong>City:</strong> <?= htmlspecialchars($game['city']); ?></div>
                    <div class='price-container'><strong>Price:</strong> €<?= htmlspecialchars($game['price']); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>
