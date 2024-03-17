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
<style>
    .card {
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex: 1; /* Flex-grow to take available space */
    }

</style>
<main class="container-fluid mt-5 p-5 vh-200" >
    <div class="card container col-12 p-3">
        <form action="looking.php" id="searchForm" method="GET" class="row g-3">
            <div class="col-12">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="<?= htmlspecialchars($search); ?>">
            </div>
            <div class="col-12 col-sm-6 col-md">
                <select class="form-select" name="column">
                    <option value="name" <?= $column === 'name' ? 'selected' : ''; ?>>Name</option>
                    <option value="city" <?= $column === 'city' ? 'selected' : ''; ?>>City</option>
                    <option value="description" <?= $column === 'description' ? 'selected' : ''; ?>>Description</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md">
                <input type="number" class="form-control" placeholder="Max price" name="maxPrice" value="<?= htmlspecialchars($maxPrice); ?>">
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Search</button>
            </div>
        </form>

    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col">
                <div class="card h-100"> <!-- Use h-100 to make cards of equal height -->
                    <div class="card-body d-flex flex-column"> <!-- Use flex-column for card body flex -->
                        <?php
                        $sql = $conn->prepare("SELECT image FROM images WHERE name = ?");
                        $sql->bind_param("s", $row['name'] );
                        $sql->execute();
                        $rez = $sql->get_result();
                        $imgs = $rez->fetch_assoc();
                        $imagearray = json_decode($imgs["image"]);
                        ?>
                        <img src="uploads/<?php echo $imagearray[0];?>" alt="slika" style="max-height: 500px">
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
