<?php
#ambil get message jika ada
$errorMessage = @$_GET["error"];
#memulai session
session_start();
#ambil status aksessnya
$akses = @$_SESSION["akses"];
#cek akses apakah sudah login
if($akses == true)
{
    header("location:./config/dashboard.php");
    // echo 'berhasil';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
</head>

<body>
    <!-- <h2>Login</h2>
    <form action="process_login.php" method="POST">
        <input type="text" name="nim" placeholder="Masukan NIM" required /><br><br>
        <input type="password" name="password" placeholder="Masukan Password" required /><br><br>
        <button type="submit" class="button">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Sign Up</a></p> -->
    <div class="container">
        <input type="checkbox" id="check" />
        <div class="login form">
            <header>
                <img src="logo_amikom_besar.png" style="height: 3cm" />
            </header>
            <form action="./config/proses_login.php" method="POST">
                <input type="text" name ="nim" placeholder="Masukan NIM" required />
                <input type="password" name ="password" placeholder="Masukan Password" required />
                <div style="display: flex;  flex-direction:column; text-align:center" >
                    <button type="submit" class="button">Login</button>
                    <p href="#">Forgot password?</p>    
                </div>
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                <a href="register.php">Sign Up</a>
                </span>
            </div>
        </div>
    </div>

</body>

</html>

