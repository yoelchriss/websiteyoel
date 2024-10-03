<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail</title>
    <link rel="stylesheet" href="userstyle.css">
    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    include 'config.php';
    include 'header.php';
    ?>
    <br>
    <?php  
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $news_sql = "SELECT * FROM news WHERE id=$id";
        $news_result = $conn->query($news_sql);

        if ($news_result->num_rows > 0) {
            $row = $news_result->fetch_assoc();
            echo "<div class='news-detail center-content'>";
            echo "<img src='uploads/" . $row['image'] . "' alt='" . $row['headline'] . "' style='width: 15%;'>";
            echo "<h2>" . $row['headline'] . "</h2>";
            echo "<p>" . $row['news_content'] . "</p>";
            echo "</div>";
        } else {
            echo "News not found.";
        }
    } else {
        echo "No news ID provided.";
    }
    $conn->close();
    ?>
    <br>
    <br>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
