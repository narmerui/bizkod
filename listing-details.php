<?php
include 'header.php'; // Include your header file
require_once "includes/dbh.inc.php"; // Adjust this path to your database connection file

// Get the listing ID from the URL parameter and sanitize it
$listingId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($listingId > 0) {
    // Prepare the SQL statement to fetch the listing details using the id_flat column
    $stmt = mysqli_prepare($conn, "SELECT * FROM flat WHERE id_flat = ?");
    mysqli_stmt_bind_param($stmt, 'i', $listingId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Display the listing details
        echo "<div class='listing-details p-5'>";
        echo "<div class='img-fluid'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p>Description: " . htmlspecialchars($row['description']) . "</p>";
        echo "<p>City: " . htmlspecialchars($row['city']) . "</p>";
        echo "<p>Price: €" . htmlspecialchars($row['price']) . "</p>";
        // If you have an 'image' field in your 'listings' table
        if (!empty($row['image'])) {
            // Adjust the path according to where your images are stored
            echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Listing Image' style='max-width: 100%; height: auto;'>";
        }
        echo "</div>";
    } else {
        echo "<p>Listing not found.</p>";
    }
    mysqli_stmt_close($stmt); // Close the prepared statement
} else {
    echo "<p>Invalid listing ID.</p>";
}

include 'footer.php'; // Include your footer file
?>
