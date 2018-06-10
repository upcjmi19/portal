<?php
require '../vendor/autoload.php';
include("../includes/init.php");
if(!logged_in()){
    redirect("../index.php");
}else{
    if($_SESSION['rank']!=3){
        redirect("../logout.php");
    }
}
?>
<html lang="en">

<nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="background: #0d4f02 !important">
    <a class="navbar-brand" href="#">
        <img src="../images/jmi_logo.png" alt="logo" style="width:40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContents" aria-controls="navbarContents" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContents">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="changePassword.php">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Log out</a>
            </li>
        </ul>
    </div>
</nav>
</html>