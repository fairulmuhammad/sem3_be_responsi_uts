<?php

$server= "localhost";

$user = "root";

$password = "";

$nama_database = "test1";

$sambung = mysqli_connect($server,$user,$password,$nama_database);

if(!$sambung){
    die("koneksi database gagal = ".mysqli_connect_error());
}
else {
    // echo "database berhasil terkoneksi";
}

?>