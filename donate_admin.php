<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: dashboard_user.php");
    exit();
}

// Include database connection
include 'database_connection.php';

// Query to fetch donation data
$query = "SELECT name, email, amount FROM donations";
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
    <title>Admin Donations</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <ul class="menu-items">
                <li><a href="dashboard_admin.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <h1 class="logo">Admin Dashboard</h1>
        </div>
    </nav>
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        </div>
    </section>
    
    <section id="donation">
        <h2>Donations</h2>
        <div class="donation">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='donation'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
                    echo "<p><strong>Amount:</strong> RP. " . htmlspecialchars($row['amount']) . "</p>";
                    echo "</div>";
                    
                }
            } else {
                echo "No donations yet.";
            }
            ?>
        </div>
    </section>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
