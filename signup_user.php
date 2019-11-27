<?php
include("include/connection.php");

    if(isset($_POST['sign_up'])){

        $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
        $country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
        $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
        $rand = rand(1, 2);

        if($name == ''){
            echo"<script>alert('We can not verify your name')</script>";
        }
        if(strlen($pass)<8){
            echo"<script>alert('Password should be minimum 8 characters!')</script>";
            exit();

        }

        $check_email = "select * from users where user_email='$email'";
        $run_email = mysqli_query($con, $check_email);

        $check = mysqli_num_rows($run_email);

        if($check == 1){

            echo"<script>alert('This email is already in use, please try again!')</script>";
            echo"<script>window.open('signup.php', '_self')</script>";
            exit();
        }
        
        if($rand == 1)
            $profile_pic = "images/1.jpg";
        elseif($rand == )
            $profile_pic = "images/2.jpg";

        $insert = "insert into users (user)";

    }

?>