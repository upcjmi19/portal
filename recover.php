<?php
require("./vendor/autoload.php");
require("./vendor/phpmailer/phpmailer/src/PHPMailer.php");
include("includes/init.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>UPC JMI | Recover</title>
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
                    <?php recover_password()?>
                    <form class="login100-form validate-form" role="form" method="post">
                        <span class="login100-form-title p-b-48">
						<img src="images/jmi_logo_filled.png" alt="JMI Logo" style="height:80px;width:auto;">
					</span>

                        <div class="wrap-input100 validate-input" data-validate="Invalid LoginID">
                            <input class="input100" type="text" name="loginID">
                            <span class="focus-input100" data-placeholder="LoginID"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                            <input class="input100" type="text" name="email">
                            <span class="focus-input100" data-placeholder="Associated Email-ID"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" style="background: #26A65B !important;">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>

                        <div class="text-center p-t-115">
                            <a class="txt2" href="index.php">
                        LOG IN?
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
