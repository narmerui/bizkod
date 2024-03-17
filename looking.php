<?php
include 'header.php';
include_once "includes/dbh.inc.php"; // Adjust this path to your database connection file

$search = $_GET['search'] ?? '';
$column = $_GET['column'] ?? 'city'; // Default search column

// Sanitize and validate maxPrice input. Use default value if input is not set or empty.
$maxPrice = !empty($_GET['maxPrice']) && is_numeric($_GET['maxPrice']) ? $_GET['maxPrice'] : 999999999;

// Validate the selected column against a list of allowed columns to prevent SQL injection
$allowedColumns = ['name', 'city', 'description'];
if (!in_array($column, $allowedColumns)) {
    $column = 'city'; // Default to 'city' if an invalid column is provided
}

$query = "SELECT * FROM `flat` WHERE `$column` LIKE ? AND price <= ?";

// Prepare and execute the query
$stmt = $conn->prepare($query);
$searchTerm = '%' . $search . '%';
$stmt->bind_param('sd', $searchTerm, $maxPrice); // 's' for string, 'd' for double
$stmt->execute();
$result = $stmt->get_result();
?>

<main class="container mt-5" >
    <div class="row" style="margin-top:150px">
        <div class="col-12">
            <form action="looking.php" method="GET" class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="<?= htmlspecialchars($search); ?>">
                <select class="form-select" name="column">
                    <option value="name" <?= $column === 'name' ? 'selected' : ''; ?>>Name</option>
                    <option value="city" <?= $column === 'city' ? 'selected' : ''; ?>>City</option>
                    <option value="description" <?= $column === 'description' ? 'selected' : ''; ?>>Description</option>
                </select>
                <input type="number" class="form-control" placeholder="Max price" name="maxPrice" value="<?= htmlspecialchars($maxPrice); ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
                        <p class="card-text">City: <?= htmlspecialchars($row['city']); ?></p>
                        <p class="card-text">Price: €<?= htmlspecialchars($row['price']); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php include 'footer.php'; ?>
