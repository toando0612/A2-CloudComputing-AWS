<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./?url=about">
            <img src="style/icons/homepic.png" width="30" height="30" style="margin-top: 6px" alt="" >
        </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php
                if ( isset($_SESSION['user']) && $_SESSION['user'] ){
                    echo "<a class=\"nav-link\" href='views/logout.php'><span class=\"glyphicon glyphicon-user\" style=\"font-size:15px\">".$_SESSION['user']['username']. "</span>Logout</a>";
                }
                elseif (!isset($_SESSION['user']) && !$_SESSION['user'] )
                {
                    echo '<a class="nav-link" href="./?url=login">
                            <span class="glyphicon glyphicon-user" style="font-size:15px"/>
                            Login  </a></li>';
                    echo '<li class="nav-item">
                            <a class="nav-link" href="./?url=register">  Register  </a>';

                }
                ?>
            </li>
            <li class="nav-item" >
            <?php if($_SESSION['user']['level']==1) {
                echo '  <a class="nav-link" href = "./?url=form_words" > Add<span class="glyphicon glyphicon-check" style = "font-size:12px" ></span ></a >';
            }
            ?>
            </li >
            <li class="nav-item">
                <a class="nav-link" href="./?url=list_words">List<span class="glyphicon glyphicon-list" style="font-size:12px"></span></a>
            </li>
        </ul>
        <ul class="nav justify-content-end">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
    </div>
</nav>