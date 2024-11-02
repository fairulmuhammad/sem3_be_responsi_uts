<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <title>Register</title>
</head>

<body>
    <!-- <h2>Sign Up</h2>
    <form action="process_register.php" method="POST">
        <input type="text" name="signupNIM" placeholder="NIM" required /><br><br>
        <input type="email" name="signupEmail" placeholder="Email" required /><br><br>
        <input type="password" name="signupPassword" placeholder="Create a password" required /><br><br>
        <input type="password" name="signupConfirmPassword" placeholder="Confirm your password" required /><br><br>
        <button type="submit" class="button">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>-->
    <div class="container">
        <input type="checkbox" id="check" />
            <div class="registration form" style="display: block;">
                <header style="display: flex; flex-direction: column">
                    <div>
                        <img src="logo_amikom_besar.png" style="height: 2cm" />
                    </div>
                    <div
                        style="
                        display: flex;
                        justify-content: center;
                        justify-items: center;
                        font-size:small;
                        ">
                        
                    </div>
                </header>
                <form action="./config/proses_register.php" method="POST">
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
                        <label for="level">Pilih Role</label>
                            <select id="level" name="level" placeholder="Pilih Role">
                            <option value="" disabled selected>Select a car</option>
                                <option value="Admin">Admin</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>

                            </select>
                    <>

                        <!-- id="signupConfirmPassword" -->
                    <div style="display: flex; justify-content:center; flex-direction: column; text-align:center;">
                        <button  type="submit" class="button">Sign Up</button>
                    </div>
                </form>
                <div class="signup">
                    <span class="signup">Already have an account?
                        <a href="login.php">Login</a>
                    </span>
                </div>
            </div>
    </div>
</body>

</html>