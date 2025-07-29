<?php

$conn = new mysqli("localhost", "root", "", "portodb");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        echo "Username dan password harus diisi!";
        exit;
    }

    // Tanpa hash password
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>