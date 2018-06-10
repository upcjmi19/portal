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
    <script>
        $(function() {
            $('img').on('click', function() {
                $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
                $('#enlargeImageModal').modal('show');
            });
        });
    </script>
</head>
<body style="background-color: #26A65B; height: 100%;">
    <div class="jumbotron" style="margin-left: 5%;margin-right: 5%;margin-top: 10px;background-color: #ffffff;text-align: center;">
        <h1>Welcome, ALUMNI</h1>
        <h4>What's on your mind today?</h4>
    </div>
</body>
</html>