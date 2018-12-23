<?php
require("../lib/connect.php");

session_start();
if ( $_POST['email'] != '' &&
    $_POST['username'] != '' &&
    $_POST['password'] != '' ){

    require('../validate.php');

    if (!is_email($_POST['email'])) {

        $_SESSION['message'] = array(                   //update session
            'text' => "Invalid email address️",
            'type' => 'danger'

        );
        header("Location:../?url=register");

    }else {
        $username = addslashes($_POST['username']);
        $email    = addslashes($_POST['email']);
        $password = addslashes($_POST['password']) ? md5($_POST['password']) : ''; //encode password md5

        // check if username or email exist
        $sql    = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0){
            $_SESSION['message'] = array(                   //update session
                'text' => "Email or Username already used!️",
                'type' => 'danger'

            );
            header("Location:../?url=register");

        } else {
            // insert to table
            $sql = "INSERT INTO user (email, username, password) VALUES ('$email','$username','$password')";
            if (mysqli_query($con, $sql)) {
                $_SESSION['message'] = array(                   //update session
                    'text' => "Please login ❤️",
                    'type' => 'success'
                );
                header("Location:../?url=login");
            }
        }
    }

}
?>