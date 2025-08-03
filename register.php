<?php
$conn = new mysqli("localhost", "root", "", "portodb");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        echo '<div style="text-align:center;">
                <div class="loader"></div>
                <p>Username dan password harus diisi!</p>
              </div>
              <script>
                setTimeout(function(){ window.location.href="register.php"; }, 2000);
              </script>
              <style>
                .loader {
                  border: 8px solid #f3f3f3;
                  border-top: 8px solid #3498db;
                  border-radius: 50%;
                  width: 40px;
                  height: 40px;
                  animation: spin 1s linear infinite;
                  margin: 20px auto;
                }
                @keyframes spin {
                  0% { transform: rotate(0deg);}
                  100% { transform: rotate(360deg);}
                }
              </style>';
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo '<div style="text-align:center;">
                <div class="loader"></div>
                <p>Registrasi berhasil! Mengarahkan ke login...</p>
              </div>
              <script>
                setTimeout(function(){ window.location.href="login.html"; }, 2000);
              </script>
              <style>
                .loader {
                  border: 8px solid #f3f3f3;
                  border-top: 8px solid #3498db;
                  border-radius: 50%;
                  width: 40px;
                  height: 40px;
                  animation: spin 1s linear infinite;
                  margin: 20px auto;
                }
                @keyframes spin {
                  0% { transform: rotate(0deg);}
                  100% { transform: rotate(360deg);}
                }
              </style>';
    } else {
        echo '<div style="text-align:center;">
                <div class="loader"></div>
                <p>Error: ' . htmlspecialchars($stmt->error) . '</p>
              </div>
              <script>
                setTimeout(function(){ window.location.href="register.php"; }, 2000);
              </script>
              <style>
                .loader {
                  border: 8px solid #f3f3f3;
                  border-top: 8px solid #e74c3c;
                  border-radius: 50%;
                  width: 40px;
                  height: 40px;
                  animation: spin 1s linear infinite;
                  margin: 20px auto;
                }
                @keyframes spin {
                  0% { transform: rotate(0deg);}
                  100% { transform: rotate(360deg);}
                }
              </style>';
    }

    $stmt->close();
}
?>