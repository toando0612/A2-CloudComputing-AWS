<?php
    // Start the session
    session_start();

    define('DEFAULT_PAGE','about');

    require("lib/connect.php");
    // cái này là ph[]ng thức get tr3n dường dẫn , xem nhé
    //http://localhost/Project/?page=newsong biến page đó
    if(isset($_GET['url'])){
        //ví dụ như dường dẫn trên thì
        //$p = newsong
        $url = $_GET['url'];
    }
    else{
        $url = DEFAULT_PAGE;

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>English Journal</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!-- Social Footer, Colour Matching Icons -->
        <!-- Include Font Awesome Stylesheet in Header -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./style/css/style.css">
    </head>
    <body>
        <div class="container">
            <?php
                include ('layouts/header.php');

                include ('layouts/navbar.php');

                if(isset($_SESSION['message']['text'])) {
                // Display message
                echo "<div class=\"alert alert-{$_SESSION['message']['type']}\">{$_SESSION['message']['text']}</div>";

                // Display message from session
                unset($_SESSION['message']['text']);
                }

            // phần này là switch case nhé ,
                switch ($url) {

                    case 'user':{
                        if( !isset($_SESSION['user']) ){
                            if($_GET['type'] == "login" && isset($_GET['type'])){
                                //file login.php nằm trong thư mục page nek
                                // để cái này gọi là cắt nhỏ html ra cho nó gọn dễ quản lí tại vài trang web sẽ có
                                // nhiều bố cục giống nhau chỉ có phần nội dung là thay đôi xem nhé
                                require("views/login.php");
                            }
                            else if ($_GET['type'] == "register" && isset($_GET['type'])) {

                                require("views/register.php");
                            }
                            // else{
                            //     header("location:index.php");
                            // }
                        }
                        else if($_GET['type'] == "logout" && isset($_GET['type'])){
                            if (isset($_SESSION['user'])){
                                unset($_SESSION['user']);
                                header("Location../?url=about");
                            }

                        }
                        else{
                            header("location:index.php");
                        }
                        break;
                    }

                    case 'list_words':{
                        require("views/list_words.php");
                        break;
                    }
                    case 'form_words':{
                        require("views/form_words.php");
                        break;
                    }
                    case 'about':{
                        require("views/about.php");
                        break;
                    }


                    default:
                        require("views/about.php");
                        break;
                }


                include ('layouts/footer.php');
            ?>


        </div>
    </body>
</html>