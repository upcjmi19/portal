<?php
    include("includes/init.php");
    session_destroy();

    if(isset($_COOKIE['email'])){
        unset($_COOKIE['email']);
        unset($_COOKIE['password']);
        unset($_COOKIE['username']);
        setcookie('email','',time()-60);
        setcookie('password','',time()-60);
        setcookie('username','',time()-60);
    }

    redirect("index.php");