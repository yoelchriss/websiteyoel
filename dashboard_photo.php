<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uas_pemweb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $photo = uniqid() . "_" . $_FILES["photo"]["name"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    if (!empty($photo) && !empty($title) && !empty($description)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO photos (photo, title, description) VALUES ('$photo', '$title', '$description')";
                if ($conn->query($sql) === TRUE) {
                    echo "";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Please fill in all fields.";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload Form</title>
    <link rel="stylesheet" href="dashboard_photo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <ul class="menu-items">
                <li><a href="dashboard_admin.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <h1 class="logo">KELOMPOK 1 & 5</h1>
        </div>
    </nav>
    <div class="form-container">
        <form action="dashboard_photo.php" method="post" enctype="multipart/form-data" id="uploadForm">

            <label for="photo" class="form-label">Choose Photo:</label>
            <input type="file" class="form-control" name="photo" id="photo" required>

            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" required>

            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4" required></textarea>

            <input type="submit" value="Submit"></input>
        </form>
    </div>

</body>

</html>