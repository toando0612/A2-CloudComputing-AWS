<?php
    require("lib/connect.php");
        $error = array();
        $data = array();
        if (!empty($_POST['do-login'])) {
        }
if(isset($_POST['do-login'])){

    // get username and password
    $data['username'] = isset($_POST['username']) ? $_POST['username'] : '';
    $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';

    // check data
    if (empty($data['username'])) {
        $error['username'] = 'Enter username';
    }
    if (empty($data['password'])) {
        $error['password'] = 'Enter password';
    }
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
        if ($result = mysqli_query($con,$sql))
        {
            $rowcount = mysqli_num_rows($result);
            if($rowcount){
                $_SESSION['user'] = mysqli_fetch_assoc($result);
                // echo "<pre>";
                // die();
                if($_SESSION['user']['level']==1){

                    header("location:admin");
                }
                else{
                    header("location:index.php");
                }
            }
        }
    }

}
?>
<div class="row justify-content-center">
    <form method="post">
        <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" name="username" class="form-control" id="username">
            <div style="color:red;">
                <?php echo isset($error['username']) ? $error['username'] : ''; ?>
            </div>
        </div>
        <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" value="" name="password" class="form-control" id="pwd">
            <div style="color:red;">
                <?php echo isset($error['password']) ? $error['password'] : ''; ?>
            </div>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="do-login" value="Login" />
            <a href="?url=user&type=register" class="form">Sign Up Now</a>
        </div>

    </form>
</div>