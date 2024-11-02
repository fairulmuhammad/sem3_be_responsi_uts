<?php
include 'config.php';

$nim = @$_POST["nim"];
$password =$_POST['password'];

// Validasi input
if (!empty($nim) && !empty($password)) {
    session_start();
    
    // Query untuk mengambil data user berdasarkan username dan password
    $query = mysqli_query($sambung, "SELECT * FROM testbe WHERE nim='$nim' AND password='$password'");
    $result = mysqli_fetch_assoc($query);
    
    if ($result) { // Jika user ditemukan
        $level = $result['level']; // Mengambil nilai role dari database
        
        // Simpan session akses dan username
        $_SESSION['akses'] = true;
        $_SESSION['account'] = $result;
        $_SESSION['nim'] = $nim;
        $_SESSION['level'] = $level;
        
        // Cek role dari database dan arahkan ke halaman yang sesuai
        if ($level == "Dosen") {
            header("location:./anjay.php");
        } elseif ($level == "Admin") {
            header("location:./anjay.php");
        } elseif ($level == "Mahasiswa") {
            header("location:./anjay.php");
        } else {
            $_SESSION['error'] = "Role tidak dikenali";
            header("location:../login.php?app=gagalrole");
        }
    } else {
        $_SESSION['error'] = "Username atau Password Anda salah";
        header("location:../login.php?app=gagalsalah");
    }
} else {
    $_SESSION['error'] = 'Username atau Password tidak boleh kosong';
    header("location:../login.php?app=gagalkosong");
}
?>