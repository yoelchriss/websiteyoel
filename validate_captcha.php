<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_captcha = $_POST['captcha_input'];

    if ($user_captcha === $_SESSION['captcha']) {
        echo 'Captcha verification successful!';
    } else {
        echo 'Captcha verification failed. Please try again.';
    }

    // Clear the captcha from the session to prevent reuse
    unset($_SESSION['captcha']);
}
?>
