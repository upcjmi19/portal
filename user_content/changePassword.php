<?php include "navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ATA | Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style>
        img {
            cursor: zoom-in;
        }

    </style>
</head>

<body style="background-color: #26A65B; height: 100%;">
    <div class="jumbotron" style="margin-left: 5%;margin-right: 5%;margin-top: 10px;background-color: #ffffff;text-align: center;">
        <h1>Welcome, CONTENT</h1>
        <h4>Wanna Change The Password?</h4>
        <h6>Well, here you can.</h6>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-12">
        <div class="container rounded" style="background-color: #FFFFFF;width: 40%;padding: 50px;margin-top: 20px;">

            <h4>Change Password</h4>
            <hr>
            <div class="container" style="width: 60%;">
                <?php change_password()?>
                <form role="form" method="post">
                    <input class="input100" type="password" name="old_pass" placeholder="Current Password" style="margin: 10px; width: 100%;" required>
                    <br>
                    <input class="input100" type="password" name="new_pass" placeholder="New Password" style="margin: 10px; width: 100%;" required>
                    <br>
                    <input class="input100" type="password" name="conf_new_pass" placeholder="Confirm New Password" style="margin: 10px; width: 100%;" required>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin: 5px; width: 100%;">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</body>

</html>
