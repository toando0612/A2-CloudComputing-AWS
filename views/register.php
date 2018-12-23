<h1 style="text-align:center;">Register</h1>

<div class="row justify-content-center">
    <form id="login_table" method="post" action="actions/doregister.php">
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