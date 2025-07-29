<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "logindb");

// Ambil input dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data user dari database dengan prepared statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        echo "Login berhasil! Selamat datang, " . $row['username'];
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}
$stmt->close();
?>