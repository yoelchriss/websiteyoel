<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = "";

    if ($_POST['captcha'] != $_SESSION['captcha']) {
        $error = "Captcha salah!";
        $_SESSION['error'] = $error;
        header("Location: suggestion.php");
        exit();
    } else {
        // CAPTCHA validation passed
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $suggestion = htmlspecialchars($_POST['suggestion']);

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "uas_pemweb";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO suggestions (name, email, suggestion) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $suggestion);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            unset($_SESSION['captcha']); // Clear the CAPTCHA from session after it's used
            header("Location: ty_sugg.php"); // Redirect to a thank you page
            exit();
        } else {
            $error = "Error: " . $stmt->error;
            $stmt->close();
            $conn->close();
            $_SESSION['error'] = $error;
            header("Location: suggestion.php");
            exit();
        }
    }
}
?>
