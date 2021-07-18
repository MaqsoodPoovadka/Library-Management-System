

<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                <p class="text-white text-lg-left text-center">Government College Kasaragod
                    <i class="fas fa-book ml-1"></i>
                </p>
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <li class="text-center border-right text-white">
                        <a href="admin" class="text-white">
                            <i class="fas fa-user mr-2"></i>Admin Login</i></a>
                    </li>
                    <!--li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#loginModal" class="text-white">
                            <i class="fas fa-sign-in-alt mr-2">LMod</i>
                        </a>
                    </li-->

                    <?php
                        if ($_SESSION==NULL) {
                            echo 
                            '<li class="text-center text-white">
                                <a href="login.php" class="text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Log In</a>
                            </li>';
                        } else {
                            echo 
                            '<li class="text-center border-right text-white">
                                <a href="logout.php" class="text-white">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out</a>
                            </li>
                            <li class="text-center text-white">
                                <a href="profile.php" class="text-white">
                                    <i class="fas fa-user mr-2"></i>'.$mbr['name'].'</a>
                            </li>';
                        }
                    ?>

                    <!-- <li class="text-center text-white">
                        <a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i>Register </a>
                    </li-->
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>


<!-- modals -->
<!-- log in -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label class="col-form-label">UserID</label>
                        <input type="text" class="form-control" placeholder=" " name="userid" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="password" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" name="login" value="Log in">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                        </div>
                    </div>
                    <p class="text-center dont-do mt-3">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#exampleModal2">
                            Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder=" " name="Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder=" " name="Email" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="Password" id="password1"
                            required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder=" " name="Confirm Password"
                            id="password2" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Register">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                            <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms
                                & Conditions</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //modal -->
<!-- //top-header -->

<!-- header-bottom-->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center">
                    <a href="index.php" class="font-weight-bold font-italic">
                        <img src="images/library-logo.jpg" width=80px alt=" " class="img-fluid"> GCK Library
                    </a>
                </h1>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <!-- search -->
                    <?php
                        if(empty($key))
                        $key="";
                    ?>
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="search.php">
                            <!--select class="form-control" name="stype" required="">
                                <option>All Categories</option>
                                <option value="title">Title</option>
                                <option value="author">Author</option>
                                <option value="category">Category</option>
                            </select-->
                            <input class="form-control mr-sm-2" list="search" type="search" name="key" placeholder="Search"
                                aria-label="Search" value="<?php echo $key;?>" required>
                                    <!--datalist id="search">
                                        <?php
                                            $crun = mysqli_query($connect, "SELECT DISTINCT author, title FROM `books`");
                                            while ($rw = mysqli_fetch_assoc($crun)) {
                                                echo '
                                                    <option>' . $rw['author'] . '</option>
                                                ';
                                            }
                                        ?>
                                    </datalist-->
                            <button class="btn my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <a href="profile.php">
                                <button class="btn w3view-cart" type="submit" name="submit" value="">
                                    <i class="fas fa-user"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop locator (popup) -->
<!-- //header-bottom -->

<!-- navigation -->
<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="agileits-navi_search">
                <!--form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
                        <option value="">All Categories</option>
                        <option value="Televisions">Televisions</option>
                        <option value="Headphones">Headphones</option>
                        <option value="Computers">Computers</option>
                        <option value="Appliances">Appliances</option>
                        <option value="Mobiles">Mobiles</option>
                        <option value="Fruits &amp; Vegetables">Tv &amp; Video</option>
                        <option value="iPad & Tablets">iPad & Tablets</option>
                        <option value="Cameras & Camcorders">Cameras & Camcorders</option>
                        <option value="Home Audio & Theater">Home Audio & Theater</option>
                    </select>
                </form-->
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
                    <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            <div class="agile_inner_drop_nav_info p-4">
                                <h5 class="mb-3">Books</h5>
                                <div class="row">
                                    
                                    <div class="col-sm-6 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <?php
                                            // SQL query to select data from database 
                                            $crun = mysqli_query($connect, "SELECT * FROM `categories`");
                                            while ($rows = mysqli_fetch_assoc($crun)) {
                                            ?>
                                                <li>
                                                    <a href="category.php?cat=<?php echo str_replace('&','%26',$rows['category']);?>"><?php echo $rows['category'];?></a>
                                                </li>
                                            <?php 
                                                } 
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Author
                        </a>
                        <div class="dropdown-menu">
                            <div class="agile_inner_drop_nav_info p-4">
                                <h5 class="mb-3">Author</h5>
                                <div class="row">
                                    
                                    <div class="col-sm-6 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <?php
                                            // SQL query to select data from database 
                                            $crun = mysqli_query($connect, "SELECT * FROM `authors`");
                                            while ($rows = mysqli_fetch_assoc($crun)) {
                                            ?>
                                                <li>
                                                    <a href="author.php?aut=<?php echo $rows['author_name'];?>"><?php echo $rows['author_name'];?></a>
                                                </li>
                                            <?php 
                                                } 
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Language
                        </a>
                        <div class="dropdown-menu">
                            <div class="agile_inner_drop_nav_info p-4">
                            <h5 class="mb-3">Language</h5>
                                <div class="row">

                                     <div class="col-sm-6 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <?php
                                            // SQL query to select data from database 
                                            $crun = mysqli_query($connect, "SELECT * FROM `languages`");
                                            while ($rows = mysqli_fetch_assoc($crun)) {
                                            ?>
                                                <li>
                                                    <a href="language.php?lang=<?php echo $rows['language'];?>"><?php echo $rows['language'];?></a>
                                                </li>
                                            <?php 
                                                } 
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->