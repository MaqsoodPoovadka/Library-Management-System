<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
    <div class="side-bar p-sm-4 p-3">
        <div class="search-hotel border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">Search Here..</h3>
            <form action="search.php">
                <input type="search" placeholder="Search by..." name="key" id="myInput" required="">
                <input type="submit" value=" ">
            </form>
        </div>
        <!-- Category -->
        <div class="range border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">Category</h3>
            <div class="w3l-range" id="myDIV">
                <ul>
                    <?php
                        // SQL query to select data from database 
                        $crun = mysqli_query($connect, "SELECT * FROM `categories` LIMIT 10");
                        while ($rows = mysqli_fetch_assoc($crun)) {
                    ?>
                    <li  class="my-1">
                        <a href="category.php?cat=<?php echo str_replace('&','%26',$rows['category']);?>"><?php echo $rows['category'];?></a>
                    </li>
                    <?php   }   ?>
                </ul>
            </div>
        </div>
        <!-- //Category -->
        <!-- Language -->
        <div class="left-side border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">Language</h3>
            <div class="w3l-range">
                <ul>
                    <?php
                        // SQL query to select data from database 
                        $crun = mysqli_query($connect, "SELECT * FROM `languages`");
                        while ($rows = mysqli_fetch_assoc($crun)) {
                    ?>
                    <li  class="my-1">
                        <a href="language.php?lang=<?php echo $rows['language'];?>"><?php echo $rows['language'];?></a>
                    </li>
                    <?php   }   ?>
                </ul>
            </div>
        </div>
        <!-- //Language -->
        <!-- Author -->
        <div class="left-side py-2">
            <h3 class="agileits-sear-head mb-3">Author</h3>
            <div class="w3l-range">
                <ul>
                    <?php
                        // SQL query to select data from database 
                        $crun = mysqli_query($connect, "SELECT * FROM `authors` LIMIT 20");
                        while ($rows = mysqli_fetch_assoc($crun)) {
                    ?>
                    <li  class="my-1">
                        <a href="author.php?aut=<?php echo $rows['author_name'];?>"><?php echo $rows['author_name'];?></a>
                    </li>
                    <?php   }   ?>
                </ul>
            </div>
        </div>
        <!-- //Author -->
    </div>
</div>