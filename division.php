<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Division</title>
    <link rel="stylesheet" href="userstyle2.css">
    <style>
        .division-item {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
            width: 50%; /* Divide into 2 columns */
            float: left; /* Float the items to the left */
        }
        .division-item img {
            width: 200px; /* Set a fixed width */
            height: 200px; /* Set a fixed height */
            object-fit: cover; /* Maintain aspect ratio and fill the container */
        }
    </style>
</head>
<body>
    <?php
    include 'config.php';
    include 'header.php';

    // Fetch all division members
    $division_sql = "SELECT * FROM divisi ORDER BY id DESC";
    $division_result = $conn->query($division_sql);
    ?>

    <div class="content division-section">
        <h2>Division</h2>
        <div class="division-items">
            <?php
            if ($division_result->num_rows > 0) {
                while ($row = $division_result->fetch_assoc()) {
                    echo "<div class='division-item'>";
                    echo "<img src='uploads/" . $row['photo'] . "' alt='" . $row['Name'] . "' class='division-image'>";
                    echo "<p><strong>" . $row['Name'] . "</strong></p>";
                    echo "<p>" . $row['role'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No division members available.";
            }
            ?>
        </div>
    </div>
    <br><br><br><br>
    <?php include 'footer.php'; ?>

    <?php $conn->close(); ?>
</body>
</html>
