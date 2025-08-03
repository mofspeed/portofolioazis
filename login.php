<?php
$conn = new mysqli("localhost", "root", "", "portodb");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Verifikasi tanpa hash (langsung dibandingkan)
    if ($password === $row['password']) {
        echo "
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Login Sukses</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    font-family: Arial, sans-serif;
                    background: linear-gradient(to right, #00b09b, #96c93d);
                    color: white;
                    animation: fadeOut 1s ease-in-out 3s forwards;
                }

                .message {
                    font-size: 24px;
                    padding: 20px;
                    background-color: rgba(0, 0, 0, 0.3);
                    border-radius: 10px;
                    animation: popUp 1s ease-out;
                }

                @keyframes popUp {
                    from { transform: scale(0.8); opacity: 0; }
                    to { transform: scale(1); opacity: 1; }
                }

                @keyframes fadeOut {
                    to { opacity: 0; }
                }
            </style>
            <script>
                setTimeout(function(){
                    window.location.href = 'dashboard.html';
                }, 4000); // waktu delay dalam milidetik (4 detik)
            </script>
        </head>
        <body>
            <div class='message'>Login berhasil! Selamat datang, {$row['username']}</div>
        </body>
        </html>
        ";
        exit;
    } else {
        echo "
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Password Salah</title>
            <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Arial, sans-serif;
                background: linear-gradient(to right, #ff512f, #dd2476);
                color: white;
                animation: fadeOut 1s ease-in-out 2.5s forwards;
            }
            .message {
                font-size: 22px;
                padding: 18px 28px;
                background-color: rgba(0,0,0,0.3);
                border-radius: 10px;
                animation: shake 0.5s, popUp 0.8s;
            }
            @keyframes shake {
                0% { transform: translateX(0); }
                20% { transform: translateX(-10px); }
                40% { transform: translateX(10px); }
                60% { transform: translateX(-10px); }
                80% { transform: translateX(10px); }
                100% { transform: translateX(0); }
            }
            @keyframes popUp {
                from { transform: scale(0.8); opacity: 0; }
                to { transform: scale(1); opacity: 1; }
            }
            @keyframes fadeOut {
                to { opacity: 0; }
            }
            </style>
            <script>
            setTimeout(function(){
                window.location.href = 'login.php';
            }, 3000); // kembali ke login setelah 3 detik
            </script>
        </head>
        <body>
            <div class='message'>Password salah!</div>
        </body>
        </html>
        ";
    }
}

$stmt->close();
?>