<div class="col-md-4">

    <!--=========================== Here is search code ========================================-->

    <?php

    // if(isset($_POST['submit'])){
    //     $search =  $_POST['search'];

    //     $query = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";
    //     $search_query = mysqli_query($connection,$query);

    //     if(!$search_query){
    //         die(":Query FAILED".mysqli_error($connection));
    //     }

    //     $count = mysqli_num_rows($search_query);

    //     if($count == 0){
    //         echo "<h1>Here is the Result : ".$count."</h1>";
    //     }
    //     else{
    //         echo "<h1>Here is the Result : ".$count."</h1>";
    //     }

    // }



    ?>



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Login -->
    <div class="well">
        <img src="images/login.png" alt="" width="30%" style="margin-left:35%">
        <h4 class="text-center" >Login</h4>
        <form action="include/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="input-group-btn">
                    <button name="login" class="btn btn-primary" type="submit">
                        Login
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>




    <!-- Blog Categories Well -->
    <?php
    $query = "SELECT * FROM category";
    $selectAllCat = mysqli_query($connection, $query);

    ?>
    <div class="well">
        <h4>Post Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php
                    while ($rows = mysqli_fetch_assoc($selectAllCat)) {
                        $catTitle = $rows["cat_title"];
                        $catID = $rows["cat_id"];

                        echo "<li><a href='category.php?category=$catID'>{$catTitle}</a></li>";
                    }
                    ?>

                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
    <?php include "widget.php" ?>



</div>