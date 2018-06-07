<?php
include("includes/init.php");

if(logged_in()){
    if($_SESSION['rank']==1){
        redirect('publisher/index.php');
    }else{
        redirect('admin/index.php');
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>UPC JMI | Portal Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="assets/DAVP_logo.ico" />
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>

    <body>
        <div class="limiter" style="background: #26A65B">
            <div class="container-login100">
                <div class="wrap-login100">
                    <?php validate_user_login_from_web()?>
                    <form class="login100-form validate-form" role="form" method="post">
                        <span class="login100-form-title p-b-48">
						<img src="images/jmi_logo_filled.png" alt="JMI Logo" style="height:80px;width:auto;">
					</span>

                        <div class="wrap-input100 validate-input" data-validate="Invalid LoginID">
                            <input class="input100" type="text" name="loginID">
                            <span class="focus-input100" data-placeholder="LoginID"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass"><i class="zmdi zmdi-eye"></i></span>
                            <input class="input100" type="password" name="pass">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>

                        <div class="form-check input100">
                            <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" style="background: #26A65B !important;">
                            Login
                        </button>
                            </div>
                        </div>

                        <div class="text-center p-t-115">
                            <a class="txt2" href="recover.php">
                        Forgot Password?
                    </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="vendor/bootstrap/js/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>

    </html>
