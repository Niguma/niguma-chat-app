<?php
include("include/connection.php");

    if(isset($_POST['sign_up'])){   //honnan szopja ki a sign_up -t?? ===> connection.php-n keresztul????//  

        $name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
        $country = htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
        $gender = htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
        $rand = rand(1, 2);

        if($name == ''){
            echo"<script>alert('We can not verify your name')</script>";
        }

        if(strlen($pass)<8){

            echo"<script>alert('Password should be minimum 8 characters!')</script>";
            exit();
        }

        $check_email = "SELECT user_email FROM user WHERE user_email = ?"
        /* "SELECT * FROM users WHERE user_email='$email'"; */
        $run_email = mysqli_query($con,$check_email);

        $check = mysqli_num_rows($run_email);

        if($check == 1){

            echo"<script>alert('This email is already in use, please try again!')</script>";
            echo"<script>window.open('signup.php','_self')</script>";
            exit();
        }
        
        if($rand == 1)
            $profile_pic = "images/1.jpg";
        else if($rand == 2)
            $profile_pic = "images/2.jpg";

            $insert = "INSERT INTO users(user_name, user_pass, user_email, user_profile, user_country, user_gender) VALUES( '$name','$pass','$email','$profile_pic','$country','$gender')";

        $query = mysqli_query($con,$insert);
        
        if($query){

            echo"<script>alert('Congratulations $name, your account has been created successfully')</script>";
            echo"<script>window.open('signin.php','_self')</script>";
        }
        else{

            echo"<script>alert('Ooops! Something went wrong, try again, dummy!')</script>";
            echo"<script>window.open('signup.php','_self')</script>";
        }
    }

?>