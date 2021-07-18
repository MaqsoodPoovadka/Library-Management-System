<?php date_default_timezone_set("Asia/Kolkata"); ?><!-- Navigation -->
<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin Panel | GCK Library</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <!--a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-bell-o"></i><span class="badge">4</span></a-->
            <ul class="dropdown-menu">
                <!--<li class="dropdown-menu-header">
                    <strong>Messages</strong>
                    <div class="progress thin">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/1.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                        <span class="label label-info">NEW</span>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/2.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                        <span class="label label-info">NEW</span>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/3.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/4.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/5.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/pic1.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="dropdown-menu-footer text-center">
                    <a href="#">View all messages</a>
                </li>-->
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                        <?php
                            if ($user['photo']>1) {
                                echo '<img src="uploads/'. $user['photo'].  '" alt="no-image">';
                            } else {
                                echo '<img src="images/0.png" alt="no-image">';
                            }
                        ?>
            </a>
            <ul class="dropdown-menu">
                
                <li class="dropdown-menu-header text-center">
                    <strong>Account - <?php echo $uid; ?></strong></li>
                <li class="avatar">
                    <a href="#">
                        <?php
                            if ($user['photo']>1) {
                                echo '<img src="uploads/'. $user['photo'].  '" alt="no-image">';
                            } else {
                                echo '<img src="images/0.png" alt="no-image">';
                            }
                        ?>
                        <!--img src="images/1.png" alt="" /-->
                        <div><?php echo $user['username']; ?></div>
                        <small><?php echo $user['role']; ?></small>
                    </a>
                </li>
                <!--li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Updates <span
                            class="label label-info">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-envelope-o"></i> Messages <span
                            class="label label-success">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Tasks <span
                            class="label label-danger">42</span></a></li>
                <li><a href="#"><i class="fa fa-comments"></i> Comments <span
                            class="label label-warning">42</span></a></li-->
                <li class="dropdown-menu-header text-center">
                    <strong>Settings</strong>
                </li>
                <li class="m_2"><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings </a></li>
                <li class="m_2"><a href="users.php"><i class="fa fa-users"></i> Users </a></li>
                <!--li class="divider dropdown-menu-header"></li-->
                
                <li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
    
    <form class="navbar-form navbar-right">
        <!--input type="text" class="form-control" value="Search..." onfocus="this.value = '';"
            onblur="if (this.value == '') {this.value = 'Search...';}"-->
        <input type="text" class="form-control" value="<?php echo date("d-m-Y") ." - ". date("h:i:sa");?>" readonly>
    </form>
    
    
    
    
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                </li>


                
                <li>
                    <a href="#"><i class="fa fa-book nav_icon"></i>Books<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="add-book.php">Add Book</a>
                        </li>
                        <li>
                            <a href="book-catalogue.php">Catalogue</a>
                        </li>
                        <li>
                            <a href="authors.php">Authors</a>
                        </li>
                        <li>
                            <a href="categories.php">Categories</a>
                        </li>
                        <li>
                            <a href="publishers.php">Publishers</a>
                        </li>
                        <li>
                            <a href="languages.php">Languages</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-book nav_icon"></i>Circulation<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="circulation.php">Circulations</a>
                        </li>
                        <li>
                            <a href="issue-book.php">Issue Book</a>
                        </li>
                        <li>
                            <a href="return-book.php">Return Book</a>
                        </li>
                        <li>
                            <a href="renew-book.php">Renew Book</a>
                        </li>
                        <li>
                            <a href="reservation.php">Reservation</a>
                        </li>
                        <li>
                            <a href="due.php">Fine</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li>
                    <a href=""><i class="fa fa-user nav_icon"></i>Members<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="members.php">Member Details</a>
                        </li>
                        <li>
                            <a href="add-student.php">Add Student</a>
                        </li>
                        <li>
                            <a href="add-staff.php">Add Staff</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!--<li>
                    <a href="#"><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="compose.html">Compose email</a>
                        </li>
                    </ul>-->
                    <!-- /.nav-second-level -->
                <!--</li>
                <li>
                    <a href="widgets.html"><i class="fa fa-flask nav_icon"></i>Widgets</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-check-square-o nav_icon"></i>Forms<span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="forms.html">Basic Forms</a>
                        </li>
                        <li>
                            <a href="validation.html">Validation</a>
                        </li>
                    </ul>-->
                    <!-- /.nav-second-level -->
                <!--</li>
                <li>
                    <a href="#"><i class="fa fa-table nav_icon"></i>Tables<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="basic_tables.html">Basic Tables</a>
                        </li>
                    </ul>-->
                    <!-- /.nav-second-level -->
                <!--</li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw nav_icon"></i>Css<span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="media.html">Media</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                    </ul>-->
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>