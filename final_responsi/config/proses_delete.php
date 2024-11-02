<?php
//memulai session
session_start();

require"./config.php";
//mengambil value akses
$akses = @$_SESSION['akses'];
//cek akses
if ($akses != true){
    //jiika tidak memiliki akses lempar ke login
    header("location:./login.php");

}else{
        //jika punya akses, ambil value user dengan get
        $nim = @$_GET["nim"];
        //validasi untuk get user
    if(empty($nim)){
        //lempar ke dashboard ketika username kosong
        header("location:./anjay.php");
    }
    //proses penghapusan data
    $query = "DELETE FROM  testbe WHERE nim = '$nim'";
    //
    mysqli_query($sambung,$query);
    //setelah berhasil mengahpus lempar ke dashboard
    header("location:./anjay.php");


}

?>
