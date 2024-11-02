<?php 
require "./config.php";
session_start();

$akses = @$_SESSION["akses"];
if ($akses != true) {
    header("location:../login.php?error=Halaman Dashboard Harus Login");
}

// Fetch data for the user based on "nim" parameter
if (isset($_GET['nim'])) {
    $nim = mysqli_real_escape_string($sambung, $_GET['nim']);
    $sql = "SELECT * FROM testbe WHERE nim='$nim'";
    $result = mysqli_query($sambung, $sql);
    $datauser = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User Data</title>
    <style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #FBD0FC;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Update User Data</h2>
        <form action="proses_update.php" method="POST">
            <input type="hidden" name="nim" value="<?php echo htmlspecialchars($datauser['nim'], ENT_QUOTES, 'UTF-8'); ?>" />
            
            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" id="nilai" name="nilai" value="<?php echo htmlspecialchars($datauser['nilai'], ENT_QUOTES, 'UTF-8'); ?>" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn">Update</button>
            </div>
            <div class="form-group">
                <a href="./anjay.php" class="btn">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
