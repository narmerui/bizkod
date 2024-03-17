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
        <script>
            document.getElementById('searchForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                const form = event.currentTarget;
                const url = form.action;
                const formData = new FormData(form);

                // Prepare the search parameters
                const searchParams = new URLSearchParams();
                for (const [key, value] of formData.entries()) {
                    searchParams.append(key, value);
                }

                // Fetch API call
                fetch(`api/search.php'?${searchParams}`, {
                    method: 'GET', // Although Fetch API typically uses 'POST' for sending data, your PHP is expecting 'GET'
                })
                    .then(response => response.json()) // Assuming your PHP script sends back JSON
                    .then(data => {
                        // Process the response here
                        // Assuming 'data' is the JSON response from your PHP script
                        // You might want to update the DOM to show the search results

                        console.log(data); // For debugging

                        // Example: Clear existing results
                        const resultsContainer = document.querySelector('.row.row-cols-1.row-cols-md-3.g-4.py-2');
                        resultsContainer.innerHTML = '';

                        // Example: Append new results
                        data.forEach(item => {
                            const colDiv = document.createElement('div');
                            colDiv.className = 'col';

                            const cardDiv = document.createElement('div');
                            cardDiv.className = 'card h-100';

                            // You'd add more details to your card here based on 'item' structure
                            const cardBody = document.createElement('div');
                            cardBody.className = 'card-body d-flex flex-column';
                            cardBody.innerHTML = `<h5 class="card-title">${item.name}</h5>
                                  <p class="card-text">${item.description}</p>
                                  <p class="card-text">City: ${item.city}</p>
                                  <p class="card-text">Price: €${item.price}</p>`;

                            cardDiv.appendChild(cardBody);
                            colDiv.appendChild(cardDiv);
                            resultsContainer.appendChild(colDiv);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        </script>

    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-2" style="margin-top:20px">
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
                        <img src="uploads/<?php echo $imagearray[0];?>" alt="slika">
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
