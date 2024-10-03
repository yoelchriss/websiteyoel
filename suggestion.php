<?php
session_start();

function generateCaptcha($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

$captcha = generateCaptcha();
$_SESSION['captcha'] = $captcha;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestion</title>
    <link rel="stylesheet" href="userstyle.css">
    <style>
        .content {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="content suggestion-section">
        <h2>Suggestion</h2>
        <form action="process_suggestion.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="suggestion">Suggestion:</label><br>
            <textarea id="suggestion" name="suggestion" required></textarea><br>

            <label for="captcha">Enter Captcha: <?php echo $captcha; ?></label><br>
            <input type="text" id="captcha" name="captcha" required><br><br>

            <input type="submit" value="Suggest!" class="donate-button">
        </form>
    </div>
    <br><br><br><br><br><br><br><br>    <br><br>
    <?php include 'footer.php'; ?>
</body>
</html>
