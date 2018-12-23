<h1 style="text-align:center;">Register</h1>
<?php
require("lib/connect.php");
// Code PHP xử lý validate
$error = array();
$data  = array();
if ( isset($_POST['do-register']) ) {
    // Lấy dữ liệu
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['username']    = isset($_POST['username']) ? $_POST['username'] : '';
    $data['password']   = isset($_POST['password']) ? $_POST['password'] : '';
    // Check validating
    require('./validate.php');
    if (empty($data['email'])) {
        $error['email'] = 'Please enter your email';
    }

    if (empty($data['username'])) {
        $error['username'] = 'Please enter username';
    }
    if (empty($data['password'])) {
        $error['password'] = 'Please enter your password';
    }

    else if (!is_email($data['email'])) {
        $error['email'] = 'Invalid email address';
    }

    // store
    if (!$error) {

        if (isset($_POST['do-register'])) {
            $username = addslashes($_POST['username']);
            $email    = addslashes($_POST['email']);
            $password = addslashes($_POST['password']) ? md5($_POST['password']) : ''; //encode password md5

            // check if username or email exist
            $sql    = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                ?>
                <div style="color:red; text-align:center;"><?php
                    echo "email or username already used! ";
                    ?></div>
                <?php
            } else {
                // insert to table
                $sql = "INSERT INTO user (email, username, password) VALUES ('$email','$username','$password')";

                if (mysqli_query($con, $sql)) {
                    header("Location:../?url=list_words");
                }
            }
        }
    }
}
?>
<div class="row justify-content-center">
    <form id="login_table" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="text" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" placeholder=""/>
                <div style="color:red;"><?php echo isset($error['email']) ? $error['email'] : '';?></div>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" placeholder="" />
                <div style="color:red;"><?php echo isset($error['username']) ? $error['username'] : ''; ?></div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" type="password" name="password" value="" placeholder="" />
            <div style="color:red;"><?php echo isset($error['password']) ? $error['password'] : ''; ?></div>
        </div>
        <div class="form-group">
            <input class="" type="submit" value="Register" name="do-register" />
            <input type="reset" value="Clear" />
        </div>

        <div class="form-group">
            Having account
            <a class="btn btn-outline-secondary" data-toggle="tooltip" title="Click to login!" href="?page=user&type=login">Login</a>
        </div>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
</form>
</div>