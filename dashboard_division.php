<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root"; // Sesuaikan dengan username MySQL Anda
    $password = ""; // Sesuaikan dengan password MySQL Anda
    $dbname = "uas_pemweb"; // Sesuaikan dengan nama database yang Anda buat

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $photo = uniqid() . "_" . $_FILES["photo"]["name"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    if (!empty($photo) && !empty($name) && !empty($role)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO divisi (photo, name, role) VALUES ('$photo', '$name', '$role')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
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
    <title>Divisi Upload Form</title>
    <link rel="stylesheet" href="dashboard_division.css">
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
        <form action="dashboard_division.php" method="post" enctype="multipart/form-data" id="uploadForm">

            <label for="photo" class="form-label">Choose Photo:</label>
            <input type="file" class="form-control" name="photo" id="photo" required>

            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>

            <label for="role" class="form-label">Role:</label>
            <select class="form-control" name="role" id="role" required>
                <option value="humas">Humas</option>
                <option value="wakil ketua">Wakil Ketua</option>
                <option value="ketua">Ketua</option>
                <option value="bph">BPH</option>
            </select>

            <input type="submit" value="Submit" class="btn btn-primary mt-3">
        </form>
    </div>
</body>

</html>
