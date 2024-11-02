<!-- <
include('/xampp/htdocs/tugas-be/week5/testing/test2/config/config.php');

    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $signupPassword = $_POST['signupPassword'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO testbe (nim, email, signupPassword, password) VALUES ('$nim', '$email','$signupPassword', '$password')";
    $query = mysqli_query($sambung, $sql);

    if($query){
        header("location:../login.php?app=berhasil login");
        exit;
    }else {
        echo "gagal";
    }
?> -->


<?php
include('../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $nim = trim($_POST['nim']);
    $email = trim($_POST['email']);
    $signupPassword = trim($_POST['signupPassword']);
    $password = trim($_POST['password']);
    $level =$_POST['level'];

    // Input validation
    $errors = [];

    // Validate NIM
    if (empty($nim)) {
        $errors[] = "NIM tidak boleh kosong.";
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = "Email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    // Validate Passwords
    if (empty($signupPassword) || empty($password)) {
        $errors[] = "Password tidak boleh kosong.";
    } elseif ($signupPassword !== $password) {
        $errors[] = "Password dan Signup Password harus sama! ";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='error'>$error</div>";
        }
        exit; // Stop execution if there are validation errors
    }

    // Encrypt password
    $password_encrypted = ($password); // Consider using password_hash() for better security

    // Prepare the SQL statement
    $sql = "INSERT INTO testbe (nim, email, signupPassword, password, level) VALUES ('$nim', '$email', '$signupPassword', '$password_encrypted', '$level')";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        header("location:../login.php?app=berhasil_login");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($sambung);
    }
} else {
    echo "Request method tidak valid.";
}
?>