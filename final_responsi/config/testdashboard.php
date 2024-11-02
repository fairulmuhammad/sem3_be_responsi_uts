<?php
# Add file config
require "./config.php";
# Start PHP session
session_start();
# Take user role
$akses = @$_SESSION["akses"];
$level = isset($_SESSION['level']) ? $_SESSION['level'] : null;
$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : null;

# Check if user has access
if (!$akses) {
    # Redirect to login if access is denied
    header("location:../login.php?error=Halaman Dashboard Harus Login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="testDashboard.css" />
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div style="background-color: #f6c6fa; height: 10vh; display: flex; justify-content: space-between; padding: 0 20px; color: aliceblue; text-align: center;">
            <img src="/tugas-be/tugas/test1/assets/logo-amikom.png" style="width: 10cm" />
            <div style="background-color: red; width: 107px; height: 35px; margin-top: 20px; border-radius: 5px; justify-content: center; display: flex;">
                <a style="color: white; text-decoration: none; margin-top: 7px" href="proses_logout.php">Log Out</a>
            </div>
        </div>

        <div style="display: flex">
            <!-- Sidebar Navigation -->
            <div style="background-color: #7146a3; height: 90vh; width: 15vw; display: flex; flex-direction: column;">
                <img src="/tugas-be/tugas/test1/assets/WhatsApp Image 2024-06-22 at 22.02.09_02b86005.jpg" alt="avatar" style="border-radius: 50%; width: 100px; height: 100px; margin-top: 20px; margin-bottom: 20px;" />
                <a class="btn5" href="/dashboardMain/dashboard_main.html">Dashboard</a>
                <a class="btn5" href="/profile/profile.html">Profile</a>
            </div>

            <!-- Main Content Area -->
            <div style="background-color: white; height: 90vh; width: 85vw; display: flex; flex-direction: column;">
                <div style="margin-top: 20px; margin-left: 50px">
                    <p style="font-size: 40px">Dashboard</p>
                </div>

                <!-- Admin Section for Adding Data -->
                <?php if ($level === 'Admin'): ?>
                    <div style="background-color: white; height: 10%; width: 90%; margin-top: 20px; margin-left: 50px;">
                        <h2>Tambah Data</h2>
                        <a href="proses_tambahData.php" style="text-decoration: none;">
                            <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Tambah Data</button>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- QR and Active Status -->
                <div style="background-color: white; height: 20%; width: 90%; margin-top: 50px; margin-left: 50px; display: flex; flex-direction: row;">
                    <div style="width: 60%; margin-left: 10px">
                        <img src="/tugas-be/tugas/test1/assets/Qr-Code-Background-PNG.png" alt="avatar" style="width: 100px; height: 100px; margin-top: 20px" />
                    </div>
                    <div style="width: 40%; margin-top: 20px; background-color: #b4ceaf; border-radius: 5px;">
                        <p style="margin-bottom: 5px; margin-top: 5px; font-weight: bold; font-size: large; margin-left: 15px;">Status</p>
                        <p style="margin-bottom: 0.5px; color: green; margin-left: 15px">&#10003; Active</p>
                        <?php
                        // Display user's NIM
                        if (isset($nim)) {
                            echo "<p style='margin-bottom: 5px; color: #616161; margin-left: 15px'>$nim</p>";
                        } else {
                            echo "<p style='margin-bottom: 5px; color: #616161; margin-left: 15px'>NIM tidak ditemukan</p>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Personal Information Section -->
                <div style="background-color: white; height: 30%; width: 90%; margin-top: 20px; margin-left: 50px;">
                    <table style="border-collapse: collapse; width: 100%">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Hashed Password</th>
                            <th>Nilai</th>
                            <?php if ($level === 'Admin' || $level === 'Dosen'): ?>
                                <th>Action</th>
                            <?php endif; ?>
                        </tr>

                        <?php
                        $nomor = 1;
                        // Only display the logged-in Mahasiswa's data, or all data for Admin/Dosen
                        $queryStr = ($level === 'Mahasiswa') ? "SELECT * FROM testbe WHERE nim = '$nim'" : "SELECT * FROM testbe";
                        $query = mysqli_query($sambung, $queryStr);

                        while ($datauser = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td style='text-align: center; padding: 8px;'>$nomor</td>";
                            echo "<td style='text-align: center; padding: 8px;'>{$datauser['nim']}</td>";
                            echo "<td style='text-align: center; padding: 8px;'>{$datauser['email']}</td>";
                            echo "<td style='text-align: center; padding: 8px;'>{$datauser['signupPassword']}</td>";
                            echo "<td style='text-align: center; padding: 8px;'>{$datauser['password']}</td>";
                            echo "<td style='text-align: center; padding: 8px;'>{$datauser['nilai']}</td>";

                            // Action buttons for Admin and Dosen roles
                            if ($level === 'Admin' || $level === 'Dosen') {
                                echo "<td style='text-align: center; padding: 8px;'>";
                                if ($level === 'Dosen') {
                                    echo "<a href='./update_form.php?nim={$datauser['nim']}'>Update Nilai</a>";
                                } elseif ($level === 'Admin') {
                                    
                                    echo "<a href='./proses_delete.php?nim={$datauser['nim']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Delete</a>";
                                }
                                echo "</td>";
                            }
                            echo "</tr>";
                            $nomor++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
