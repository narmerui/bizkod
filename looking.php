<?php
include 'header.php';
include_once "includes/dbh.inc.php"; // Adjust this path to your database connection file

if($_SESSION["user"] !== "flatseekers")
    header("Location: index.php");

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
            <div class="modal fade" id="listingDetailsModal" tabindex="-1" aria-labelledby="listingDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="listingDetailsModalLabel">Listing Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Dynamic content will be loaded here -->
                            <h4 id="listingTitle"></h4>
                            <p id="listingDescription"></p>
                            <p id="listingCity"></p>
                            <p id="listingPrice"></p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const moreInfoButton = `<button onclick="loadListingDetails(${item.id})" class="btn btn-primary">More Info</button>`;
                function loadListingDetails(listingId) {
                    // Replace `get-listing-details.php` with your actual PHP script that returns listing details as JSON
                    fetch(`api/get-listing-details.php?id=${listingId}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(data => {
                            // Assuming 'data' contains the listing details
                            document.getElementById('listingTitle').innerText = data.title || 'Title not available';
                            document.getElementById('listingDescription').innerText = data.description || 'Description not available';
                            document.getElementById('listingCity').innerText = 'City: ' + (data.city || 'N/A');
                            document.getElementById('listingPrice').innerText = 'Price: €' + (data.price || 'N/A');

                            // Show the modal
                            var modal = new bootstrap.Modal(document.getElementById('listingDetailsModal'));
                            modal.show();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to load listing details');
                        });
                }

            </script>

        </form>

    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-4 vh-50">
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
                        <h5 class="card-title pt-2"><?= htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
                        <p class="card-text">City: <?= htmlspecialchars($row['city']); ?></p>
                        <p class="card-text">Price: €<?= htmlspecialchars($row['price']); ?></p>
                        <a href="#" class="btn btn-primary">See more details</a>
                        <form action="interested.php" method="post">
                            <input type="hidden" name="owId" value="<?php echo $row['id_owner']?>">
                            <button type="submit" class="btn btn-primary w-100 mt-2">Interested in</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php include 'footer.php'; ?>
