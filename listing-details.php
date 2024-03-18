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
        echo "<div class='container kartica text-center card mx-auto p-5' style='height: 105vh;z-index: -1'>";
        echo "<div class='listing-details' style=''>";
        echo "<div class='img-fluid'>";
        echo "<h2 class='fs-1'>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p class='fs-2'>Description: " . htmlspecialchars($row['description']) . "</p>";
        echo "<p class='fs-2'>City: " . htmlspecialchars($row['city']) . "</p>";
        echo "<p class='fs-2'>Price: €" . htmlspecialchars($row['price']) . "</p>";
        echo "<p class='fs-2'>Size: " . htmlspecialchars($row['size']) . "m<sup>2</sup>";
        echo "<p class='fs-2'>Address: " . htmlspecialchars($row['address']);
        $sql = $conn->prepare("SELECT image FROM images WHERE name = ?");
        $sql->bind_param("s", $row['name'] );
        $sql->execute();
        $rez = $sql->get_result();
        $imgs = $rez->fetch_assoc();
        $imagearray = json_decode($imgs["image"]);
        // If you have an 'image' field in your 'listings' table
        echo "</div>";
        echo '<img src="uploads/' . $imagearray[0] . '" alt="slika" style="max-height: 500px;">';

    } else {
        echo "<p>Listing not found.</p>";
    }
    echo "</div>";
    echo "</div>";
    mysqli_stmt_close($stmt); // Close the prepared statement
} else {
    echo "<p>Invalid listing ID.</p>";
}

include 'footer.php'; // Include your footer file
?>
