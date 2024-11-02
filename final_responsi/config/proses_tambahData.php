<?php
require("./config.php");
session_start();

$akses = @$_SESSION["akses"];

if ($akses != true) {
    header("location:./login.php?pesan=belum_login");
}

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $signupPassword = $_POST['signupPassword'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Input validation: Check if the passwords match
    if ($signupPassword !== $password) {
        echo "<div class='error'>Password dan Signup Password harus sama!</div>";
    } else {
        // Lakukan validasi input jika diperlukan
        $password_encrypted = ($password); // Menggunakan MD5, namun disarankan untuk ganti dengan bcrypt di masa depan

        // Insert data baru ke dalam database
        $query = "INSERT INTO testbe (nim, email, signupPassword, password, level) VALUES ('$nim','$email','$signupPassword', '$password_encrypted', '$level')"; // Added missing comma
        if (mysqli_query($sambung, $query)) {
            header("location:./anjay.php?pesan=berhasil_tambah");
        } else {
            echo "<div class='error'>Terjadi kesalahan: " . mysqli_error($sambung) . "</div>"; // Changed $connect to $sambung
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FBD0FC;
            margin: 0;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }

        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h2>Tambah Data User</h2>
    </header>

    <div class="container">
        <form action="" method="POST">
        <input type="text"  name="nim" placeholder="NIM" required/> 
            
            <!-- id="signupNIM" -->
            <input type="text"  name="email" placeholder="Email" required/>
            <!-- id="signupEmail" -->
            <input
                type="password"
                name="signupPassword"
                placeholder="Create a password" 
                required/>
                <!-- id="signupPassword" -->
            <input
                type="password"
                
                placeholder="Confirm your password" 
                name="password"
                required/>
                <label for="level">Pilih Role</label required>
                            <select id="level" name="level" placeholder="Pilih Role" required>
                            <option value="" disabled selected required>Select a Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>

                            </select>

            <button type="submit" name="submit" class="btn">Tambah Data</button>
        </form>
        <a href="./anjay.php" class="back-btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>