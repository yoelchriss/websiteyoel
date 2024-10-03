<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: dashboard_user.php");
    exit();
}

include 'database_connection.php'; // Include your database connection

// Fetch suggestions from the database
$query = "SELECT id, name, email, suggestion, created_at FROM suggestions ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dahsboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Suggestions</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <ul class="menu-items">
                <li><a href="dashboard_admin.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <h1 class="logo">KELOMPOK 1 & 5</h1>
        </div>
    </nav>
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        </div>
    </section>

    <section id="suggestions">
        <h2>User Suggestions</h2>
        <div class="suggestions-container">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Start of semantic HTML for suggestion
                    echo "<div class='suggestion'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>Email: " . htmlspecialchars($row['email']) . "</p>";
                    echo "<p>Suggestion: " . htmlspecialchars($row['suggestion']) . "</p>";
                    echo "</div>";
                    // End of semantic HTML for suggestion
                }
            } else {
                echo "<p>No suggestions found.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>

<?php
$conn->close();
?>
