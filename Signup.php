<?php

require_once "config/database.php";
session_start();

if(isset($_POST['signup']))
{
    $sql = "INSERT INTO `users`( `user_name`, `f_name`, `l_name`, `password`, `dob`, `grade`, `img`) 
    VALUES ('".$_POST['fname'].$_POST['lname']."', '".$_POST['fname']."','".$_POST['lname']."', '".$_POST['pass']."', '".$_POST['dob']."', '".$_POST['grade']."', '".$_POST['pp']."');";
    $conn->query($sql);
    header('Location: Login.php');
}

echo<<<EOT
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="vendor/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account-o material-icons-name"></i></label>
                                <input type="text" name="lname" id="name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="dob" id="dob" placeholder="Your Birthday" required>
                            </div>
                            <div class="form-group">
                                <label for="grade"><i class="zmdi zmdi-play"></i></label>                               
                                <select name="grade" id="grade" required>
                                    <option label="Your Grade"></option>
                                    <option value="6">Grade 6</option>
                                    <option value="7">Grade 7</option>
                                    <option value="8">Grade 8</option>
                                    <option value="9">Grade 9</option>
                                    <option value="10">Grade 10</option>
                                    <option value="11">Grade 11</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required>
                            </div>
                            <div class="form-group">
                                <label for="pp"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" id="pp" name="pp" placeholder="Profile Photo Path" title="Profile Picture" required>

                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="Login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
</body>

</html>
EOT;

?>