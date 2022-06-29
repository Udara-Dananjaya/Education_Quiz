<?php

require_once "config/database.php";


session_start();
if(isset($_SESSION['Session_Id']))
{
    header('Location: Profile.php');
}

if (isset ($_POST['signin'])) {
    
    if ($stmt = $conn->prepare('SELECT  user_name, password,img FROM users WHERE user_name = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $user_name, $password,$img);
            $stmt->fetch();
            $post_password=$_POST['password'];
            if ($post_password== $password) {
                session_regenerate_id();
                $_SESSION['Session_Id']=$_POST['username'];
                $_SESSION['img']=$img;
                
                header('Location: Profile.php');
            } else {
                echo "<script>alert('Incorrect Password');document.location='login.php'</script>";
            }
        } else {
           echo "<script>alert('Incorrect Email Address');document.location='login.php'</script>";
        }
        $stmt->close();
    }
}

echo<<<EOT

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="vendor/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="main">

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="Signup.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
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