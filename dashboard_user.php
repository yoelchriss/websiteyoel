<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    // Fetch the latest 4 news items
    $news_sql = "SELECT * FROM news ORDER BY id DESC LIMIT 4";
    $news_result = $conn->query($news_sql);

    // Fetch the latest 2 gallery pictures
    $gallery_sql = "SELECT * FROM photos ORDER BY id DESC LIMIT 2";
    $gallery_result = $conn->query($gallery_sql);
    ?>

    <div class="hero-section">
        <h1>Fortius</h1>
        <p>Welcome to Fortius' Website!.</p>
    </div>

    <div class="news-section">
        <h2>Latest News</h2>
        <div class="news-items">
            <?php
            if ($news_result->num_rows > 0) {
                while ($row = $news_result->fetch_assoc()) {
                    echo "<div class='news-item'>";
                    echo "<a href='news.php?id=" . $row['id'] . "'>";
                    echo "<h3>" . $row['headline'] . "</h3>";
                    echo "<p>" . substr($row['news_content'], 0, 100) . "...</p>";
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

    <div class="gallery-section">
        <h2>Gallery</h2>
        <div class="gallery-items">
            <?php
            if ($gallery_result->num_rows > 0) {
                while ($row = $gallery_result->fetch_assoc()) {
                    echo "<div class='gallery-item'>";
                    echo "<a href='gallery.php?id=" . $row['id'] . "'>";
                    echo "<img src='uploads/" . $row['photo'] . "' alt='" . $row['title'] . "'>";
                    echo "<p>" . $row['title'] . "</p>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "No gallery items available.";
            }
            ?>
        </div>
    </div>

    <div class="donate-section">
        <a href="forum.php" class="donate-button">Donate Now</a>
    </div>
    <br><br><br><br>
    <?php include 'footer.php'; ?>

    <?php $conn->close(); ?>
</body>
</html>
