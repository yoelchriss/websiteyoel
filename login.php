<?php
session_start();
require_once 'config.php';

$loginError = ""; // Inisialisasi pesan kesalahan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah kredensial cocok dengan admin
    if ($username === 'admin@admin.com' && $password === 'admin') {
        $_SESSION['user_id'] = 1; // ID admin khusus
        $_SESSION['username'] = 'admin';
        $_SESSION['role'] = 'admin';
        header("Location: dashboard_admin.php");
        exit();
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        
        if($_SESSION['role'] === 'admin') {
            header("Location: dashboard_admin.php");
        } else {
            header("Location: dashboard_user.php");
        }
        exit();
    } else {
        $loginError = "Login gagal. Periksa kembali username dan password Anda.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Login Page</title>
</head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="img/fortius.jpg" alt="">
        <div class="text">
          <span class="text-1">Fortius Esport</span>
          <span class="text-2">Fortius Esports merupakan sebuah wadah olahraga elektronik ( E-Sport ) Universitas
Multimedia Nusantara. Pada awalnya, Fortius merupakan sebuah komunitas esports Universitas Multimedia Nusantara yang berdiri pada Februari 2019. Seiring berjalannya waktu, Fortius Esports menjadi
Unit Kegiatan Mahasiswa secara resmi pada November 2019.</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
          <img class="fortius-esports-logo" src="img/logo1.png">
            <div class="title">Login</div>
          <form action="login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="username" placeholder="Username" required><br>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required><br>
              </div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <p style="color: red;"><?php echo $loginError; ?></p>
            </div>
        </form>
      </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
