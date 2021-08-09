<?php include "include/db.php" ?>

<?php include "include/header.php" ?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            if (isset($_GET['category'])) {
                $cat_id = $_GET['category'];
            }

            $query2 = "SELECT * FROM category WHERE cat_id = {$cat_id}";
            $selectAllCat2 = mysqli_query($connection, $query2);
            while ($rows2 = mysqli_fetch_assoc($selectAllCat2)) {
                $catTitle2 = $rows2["cat_title"];
            }


            ?>


            <h1 class="page-header">
                The Post Category of <b><?php echo $catTitle2; ?></b>
                <!-- <small>Get in touch with us</small> -->
            </h1>

            <?php

            //          


            $query = "SELECT * FROM post WHERE post_cat_id = {$cat_id}";

            $selectAllPost = mysqli_query($connection, $query);

            $count = mysqli_num_rows($selectAllPost);

            if ($count == 0) {
                echo "<h5 style='color:blue'>About " . $count . " results founed</h5>";
                echo "<h3 style='color:red'> The Category of - <span style='color:black'>" . "$catTitle2" . "</span> - did not have any documents yet.</h3>";
            } else {

                echo "<h5 style='color:blue'>About " . $count . " results founed</h5>";

                while ($rows = mysqli_fetch_assoc($selectAllPost)) {
                    $post_id = $rows["post_id"];
                    $post_title = $rows["post_title"];
                    $post_author = $rows["post_author"];
                    $post_date = $rows["post_date"];
                    $post_image = $rows["post_image"];
                    $post_content = substr($rows["post_content"],0,300);

            ?>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php }
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
            <?php } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "include/sidebar.php" ?>


    </div>
    <!-- /.row -->

    <hr>

    <?php include "include/footer.php" ?>