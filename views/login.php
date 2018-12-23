
<div class="row justify-content-center">
    <form method="post" action="actions/dologin.php">
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