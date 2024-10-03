<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="userstyle.css">
</head>
<style>
    .center-content {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    .forum-options {
        display: flex;
    }

    .forum-button {
        margin: 10px;
        width: 200px; /* Adjust the width as needed */
        height: 250px; /* Adjust the height as needed */
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
        box-sizing: border-box;
    }

    .forum-image {
        width: 80px; /* Set a fixed width */
        height: 80px; /* Set a fixed height */
        object-fit: cover;
        margin-bottom: 10px;
    }

    .forum-button h1 {
        font-size: 16px; /* Adjust the font size as needed */
        margin: 10px 0; /* Add some margin around the heading */
    }
</style>
<body>
    <?php
    include 'config.php';
    include 'header.php';
    ?>

    <div class="center-content">
        <div class="forum-options">
            <a href="donate.php" class="forum-button">
                <img src="img/Donate.png" alt="Donate" class="forum-image">
                <h1>Make your Donation Now!</h1>
            </a>
            <a href="suggestion.php" class="forum-button">
                <img src="img/Form.jpg" alt="Suggestion" class="forum-image">
                <h1>Give us your Suggestion</h1>
            </a>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'footer.php'; ?>
</body>
</html>
