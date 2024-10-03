<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = "";

    if ($_POST['captcha'] != $_SESSION['captcha']) {
        $error = "Captcha salah!";
        $_SESSION['error'] = $error;
        header("Location: donate.php");
        exit();
    } else {
        // CAPTCHA validation passed
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amount = $_POST['amount'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "uas_pemweb";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO donations (name, email, amount) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $email, $amount);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: thank_you.php");
            exit();
        } else {
            $error = "Error: " . $stmt->error;
            $stmt->close();
            $conn->close();
            $_SESSION['error'] = $error;
            header("Location: donate.php");
            exit();
        }
    }
}
?>
