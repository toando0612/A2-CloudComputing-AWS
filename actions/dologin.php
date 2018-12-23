<?php
session_start();

require("../lib/connect.php");
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
    if ($result = mysqli_query($con,$sql)) {
        $rowcount = mysqli_num_rows($result);
        if($rowcount){
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            if($_SESSION['user']['level']==1){
                $_SESSION['message'] = array(                   //update session
                    'text' => "Hello boss {$_SESSION['user']['username']}",
                    'type' => 'success'
                );
                header("location:../?url=list_words");
            }
            else{
                header("location:../?url=list_words");
                $_SESSION['message'] = array(                   //update session
                    'text' => "Hello {$_SESSION['user']['username']}",
                    'type' => 'success'
                );
                header("location:../?url=list_words");
            }
        }else{
            $_SESSION['message'] = array(                   //update session
                'text' => "Wrong username or password",
                'type' => 'danger'
            );
            header("location:../?url=login");
        }
    }

}else{
    $_SESSION['message'] = array(                   //update session
        'text' => 'Please enter username and password',
        'type' => 'danger'
    );
    header("location:../?url=login");

}
?>