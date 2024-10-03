<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM photos WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $photo = $result->fetch_assoc();
        echo "<h1>" . $photo['title'] . "</h1>";
        echo "<img src='images/" . $photo['photo'] . "' alt='" . $photo['title'] . "'>";
        echo "<p>" . $photo['description'] . "</p>";
    } else {
        echo "Photo not found.";
    }
}
$conn->close();
?>
