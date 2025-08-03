<?php


session_start();

if (isset($_SESSION['user'])) {
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portofolio Azis - Selamat Datang</title>
  <script src="script.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/php.css">
</head>
<body>
  <div class="container">
    <img src="img/me1.jpg" alt="Foto Profil Azis" class="profile-img">
    <h1>Selamat Datang di Portofolio Azis</h1>
    <p>Temukan karya, pengalaman, dan perjalanan saya di dunia digital.<br>Silakan login atau daftar untuk melanjutkan ke portofolio.</p>
    <div class="auth-buttons">
      <a href="login.html" class="btn">Login</a>
      <a href="register.html" class="btn">Register</a>
    </div>
  </div>
</body>
</html> 