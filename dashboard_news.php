<?php
$host = 'localhost';
$dbname = 'uas_pemweb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $headline = $_POST['headline'] ?? '';
    $news = $_POST['news'] ?? '';
    $image_name = $_FILES['image']['name'] ?? '';
    $image_tmp_name = $_FILES['image']['tmp_name'] ?? '';

    // Handle file upload
    $target_dir = __DIR__ . "/uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); 
    }
    $target_file = $target_dir . basename($image_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    } else {
        if (move_uploaded_file($image_tmp_name, $target_file)) {
            // Prepare SQL statement
            $stmt = $pdo->prepare("INSERT INTO news (headline, news_content, image) VALUES (:headline, :news_content, :image)");

            // Bind parameters
            $stmt->bindParam(':headline', $headline);
            $stmt->bindParam(':news_content', $news);
            $stmt->bindParam(':image', $image_name); // Store just the file name

            // Execute SQL statement
            if ($stmt->execute()) {
                // Display the uploaded image
                echo "<h2>Uploaded Image:</h2>";
                echo "<img src='uploads/$image_name' alt='Uploaded Image'>";
                echo "<script>alert('Berita berhasil disimpan.'); window.location.href='dashboard_news.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan berita.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard_news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Formulir Berita</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <h1 class="logo">KELOMPOK 1 & 5</h1>
            <ul class="menu-items">
                <li><a href="dashboard_admin.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="form-container">
        <form action="dashboard_news.php" method="POST" enctype="multipart/form-data">
            <label for="headline">Tambah Judul Berita:</label>
            <input type="text" id="headline" name="headline" required>

            <label for="news">Tambah Berita:</label>
            <textarea id="news" name="news" rows="4" cols="50" required></textarea>

            <label for="image">Upload Gambar:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" value="Submit">
        </form>

        <!-- Display uploaded image here -->
        <?php if (isset($image_name)) : ?>
            <div class="uploaded-image">
                <h2>Uploaded Image:</h2>
                <img src="uploads/<?php echo htmlspecialchars($image_name); ?>" alt="Uploaded Image">
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
