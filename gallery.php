<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="userstyle.css">
    <style>
        .gallery-item {
            position: relative;
            display: inline-block;
        }

        .gallery-item img {
            width: 30%;
            height: auto;
            transition: transform 0.3s;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .gallery-item:hover img {
            transform: scale(1.2);
        }

        .gallery-item .title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-item:hover .title {
            opacity: 1;
        }
    </style>
</head>
<body>
    <?php
    include 'config.php';
    include 'header.php';

    // Fetch all gallery pictures
    $gallery_sql = "SELECT * FROM photos ORDER BY id DESC";
    $gallery_result = $conn->query($gallery_sql);
    ?>

    <div class="gallery-section">
        <h2>Gallery</h2>
        <div class="gallery-items">
            <?php
            if ($gallery_result->num_rows > 0) {
                while ($row = $gallery_result->fetch_assoc()) {
                    echo "<div class='gallery-item'>";
                    echo "<img src='uploads/" . $row['photo'] . "' alt='" . $row['title'] . "'>";
                    echo "<p class='title'><strong>" . $row['title'] . "</strong></p>";
                    echo "</div>";
                }
            } else {
                echo "No gallery items available.";
            }
            ?>
        </div>
    </div>
    <br><br><br><br>
    <?php include 'footer.php'; ?>
    <?php $conn->close(); ?>
</body>
</html>