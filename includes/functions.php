<?php
    
    /**********************HELPER FUNCTIONS*************************/

    function clean($string){
        return htmlentities($string);
    }

    function redirect($location){
        return header("Location:{$location}");
    }

    function set_message($message){
        if(!empty($message)){
            $_SESSION['message']=$message;
        }else{
            $message="";
        }
    }

    function display_message(){
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }


    function token_generator(){
        $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        return $token;
    }


    function display_error($message){
        $message = <<<DELIMITER
    <div class="alert alert-danger alert-dismissible" role="alert">$message</div>
DELIMITER;
        echo $message;
    }

    function display_success($message){
    $message = <<<DELIMITER
        <div class="alert alert-success alert-dismissible" role="alert">$message</div>
DELIMITER;
    echo $message;
}


    function email_exists($email){
        $sql = "SELECT `userID` FROM `userbase` WHERE `emailID`='$email'";
        $result = query($sql);
        if(row_count($result)==1){
            return true;
        }else{
            return false;
        }
    }

    function  send_email($email, $subject, $msg){
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = Config::SMTP_HOST;
        $mail->Username = Config::SMTP_USER;
        $mail->Password = Config::SMTP_PASSWORD;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = Config::SMTP_PORT;


        $mail->setFrom('Dummies@jmi.ac.in','TPO JMI'); //Sender
        $mail->addAddress($email);  //Recipient


        $mail->Subject = $subject;
        $mail->Body    = $msg;
        $mail->AltBody = $msg;

        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

    }

    /**********************REGISTRATION VALIDATION FUNCTIONS*************************/

    function register_user($name, $mailID, $password){

        $name = escape($name);
        $mailID = escape($mailID);
        $password = escape($password);
        $password = strtoupper(md5($password));

        //CAN IMPLEMENT EMAIL VALIDATION BY GENERATING VALIDATION CODE


        if(email_exists($mailID)){
            return 2;
        }else{
            $sql = "INSERT INTO `userbase`(`username`, `emailID`, `password`, `rank`, `hits`) VALUES ('$name','$mailID','$password',0,0)";
            if(query($sql)){
                //SignUP Done
                return 1;
            }else{
                //DB Error Occured
                return 3;
            }


        }

    }


    /**************************LOGIN VALIDATION FUNCTIONS FOR WEB PLATFORM******************************/
    function validate_user_login_from_web(){
        $errors = [];
        $min = 6;
        $max = 9;

        if($_SERVER['REQUEST_METHOD']=="POST") {
            $loginID = clean($_POST['loginID']);
            $password = clean($_POST['pass']);
            $remember = clean(isset($_POST['remember']));
            $_SESSION['remember'] = $remember;

            if(empty($loginID)){
                $errors[] = "Login ID Field Cannot Be Empty";
            }elseif(strlen($loginID)>9){
                $errors[] = "Invalid Login ID Supplied";
            }

            if(empty($password)){
                $errors[] = "Password Field Cannot Be Empty";
            }
            
            

            if(!empty($errors)){
                //PROBLEM REGISTERING DUE TO VALIDATION ERROR
                foreach ($errors as $error){
                    display_error($error);
                }
            }else{
                $tempR = login_user_web($loginID,$password, $remember);
                if($tempR==43){
                    display_error("You have not benn registered yet");
                }elseif($tempR==42){
                    display_error("Awwwww! Seems you misplaced your password. Try Again");
                }elseif($tempR==1){
                    //An Officer has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_officer/index.php");
                }elseif($tempR==2){
                    //A content team member has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_content/index.php");
                }elseif($tempR==3){
                    //A technical team member has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_technical/index.php");
                }elseif($tempR==4){
                    //A research team member has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_research/index.php");
                }elseif($tempR==5){
                    //A relationship team member has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_relationship/index.php");
                }elseif($tempR==6){
                    //A student has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_student/index.php");
                }elseif($tempR==7){
                    //An Alumni has signed in
                    //display_success("Passwords match ".$tempR);
                    redirect("user_alumni/index.php");
                }else{
                    display_error("Some Error Occured ".$tempR);
                }
            }

        }

    }

    function login_user_web($loginID, $password, $remember){
        $sql = "SELECT `loginID`, `password`, `rank` FROM `loginBase` WHERE `loginID`='".escape($loginID)."'";
        //     --------ADDED FOR TESTING PURPOSES
        //echo $sql;
        $result = query($sql);
        if(row_count($result)==1){
            $row = fetch_array($result);
            $rank = $row['rank'];
            if($rank == 0){
                return 0;
            }
            $db_password = $row['password'];
            if(strtoupper(md5($password)) === $db_password){
                //SET SESSION VARIABLES HERE LATER ON
                $_SESSION['loginID'] = $loginID;
                $_SESSION['rank'] = $rank;
                if($remember == "1"){
                    setcookie('loginID',escape($loginID),time()+86400);
                    setcookie('password',escape(md5($password)),time()+86400);
                    setcookie('username',escape($row['username']),time()+86400);
                    setcookie('rank',escape($row['rank']),time()+86400);
                }
                return $rank;
            }else {
                return 42;
            }
        }else{
            return 43;
        }
    }

    /**************************LOGGEDIN FUNCTIONS******************************/
    function logged_in(){
        if(isset($_SESSION['loginID'])){
            return true;
        }else{
            return false;
        }
    }



    /**************************RECOVER PASSWORD FUNCTION******************************/
    function recover_password(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $email = clean($_POST['email']);
            $loginID = clean($_POST['loginID']);
            
            $sql = "SELECT `emailID` FROM `userBase` WHERE `loginID`='$loginID'";
            if(query($sql)){
                $result = query($sql);
                if(row_count($result)==1){
                    $row = fetch_array($result);
                    $reg_mail_id = $row['emailID'];
                    if(strtoupper($email)===strtoupper($reg_mail_id)){
                        $newPassword = strtoupper(token_generator());
                        $msg = "Hello Sir/Madam,<br>As per your request these are your new login credentials : <br><br>Login: ".$loginID."<br>Password: ".$newPassword."<br><br>Regards,<br>TPO, JMI";
                        $subject = "Password Reset Request For UPC JMI Login";
                        if(send_email($email,$subject,$msg)) {
                            if(update_password($loginID,$newPassword)){
                                display_success("A new Password has been mailed to you.");
                            }else{
                                display_error("OOPS!! Password Can't be updated in our database");
                            }   
                        }else{
                            display_error("OOPS!! Some Error At Our End");
                        }
                    }else{
                        display_error("Oopsie Daisy! this is not the email you registered with us");
                    }
                }else{
                    display_error("No Matching Data Found");
                }
            }else{
                display_error("Server Error");
            }
        }
    }

    /*********************************PASSWORD UPDATION**************************************/
    function update_password($loginID,$new_password){
        $new_password = strtoupper(md5($new_password));
        $sql = "UPDATE `loginBase` SET `password`='$new_password' WHERE `loginID`='$loginID'";
        if(query($sql)){
            return 1;
        }else{
            return 0;
        }

    }


    function change_password(){
        if($_SERVER['REQUEST_METHOD']=="POST") {
            $loginID = $_SESSION['loginID'];
            $old_password = $_POST['old_pass'];
            $new_password = $_POST['new_pass'];
            $conf_new_pass = $_POST['conf_new_pass'];
            if ($new_password === $conf_new_pass) {
                $sql = "SELECT `password` FROM `loginBase` WHERE `loginID`='$loginID'";
                $result = query($sql);
                $row = fetch_array($result);
                $password = $row['password'];
                if ($password === strtoupper(md5($old_password))) {
                    update_password($email,$new_password);
                    display_success("Password Updated Successfully");
                    redirect("../logout.php");
                } else {
                    display_error("Old Password Is Wrong");
                }
            } else {
                display_error("Password and Confirm Password do not match");
            }
        }
    }

    /**************ADMIN FUNCTIONS**************/

    function view_submissions($email){
        $_SESSION['view_sub']=$email;
        redirect('submissions.php');
    }




?>