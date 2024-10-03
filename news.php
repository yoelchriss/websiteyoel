<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="userstyle.css">
    <style>
        .news-item img,
        .gallery-item img {
            width: 20%;
            height: auto;
        }
    </style>
</head>
<body>
    <?php
    include 'config.php';
    include 'header.php';

    // Fetch all news items
    $news_sql = "SELECT * FROM news ORDER BY id DESC";
    $news_result = $conn->query($news_sql);
    ?>

    <div class="news-section">
        <h2>News</h2>
        <div class="news-items">
            <?php
            if ($news_result->num_rows > 0) {
                while ($row = $news_result->fetch_assoc()) {
                    echo "<div class='news-item'>";
                    echo "<a href='news.detail.php?id=" . $row['id'] . "'>";
                    echo "<h3>" . $row['headline'] . "</h3>";
                    echo "<img src='uploads/" . $row['image'] . "' alt='" . $row['headline'] . "'>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "No news available.";
            }
            ?>
        </div>
    </div>
    <br><br><br><br>
    <?php include 'footer.php'; ?>

    <?php $conn->close(); ?>
</body>
</html>
