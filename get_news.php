<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM news WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
        echo "<h1>" . $news['headline'] . "</h1>";
        echo "<img src='images/" . $news['image'] . "' alt='" . $news['headline'] . "'>";
        echo "<p>" . $news['news_content'] . "</p>";
    } else {
        echo "News not found.";
    }
}
$conn->close();
?>
