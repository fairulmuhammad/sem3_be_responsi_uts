<?php
require "./config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nim']) && isset($_POST['nilai'])){
    $nim = mysqli_real_escape_string($sambung, $_POST['nim']);
    $nilai = mysqli_real_escape_string($sambung, $_POST["nilai"]);

    $query = "UPDATE testbe SET nilai='$nilai' WHERE nim='$nim'";
    if (mysqli_query($sambung, $query)) {
        header("Location: ./anjay.php?message=Update successful");
    } else {
        echo "Error updating record: " . mysqli_error($sambung);
    }
}
?>
