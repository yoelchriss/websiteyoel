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
    <title>Donate Now</title>
    <link rel="stylesheet" href="userstyle.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="content donate-section">
        <h2>Donate Now</h2>
        <form action="process_donate.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="amount">Amount:</label><br>
            <input type="number" id="amount" name="amount" step="0.01" required><br>

            <label for="amount">QRIS:<br></label><br>
            <input type="image" src="img/charity.png" alt="Donate" style="width: 15%;"><br>

            <label for="captcha">Enter Captcha: <?php echo $captcha; ?></label><br>
            <input type="text" id="captcha" name="captcha" required><br><br>

            <input type="submit" value="Donate" class="donate-button">
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
