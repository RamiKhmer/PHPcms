<?php include "include/db.php" ?>

<?php include "include/header.php" ?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Welcome to Mean Chey University
                <br>
                <small>Search Result</small>
            </h1>

            <?php

            if (isset($_POST['submit'])) {
                $search =  $_POST['search'];

                $query = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";
                $search_query = mysqli_query($connection, $query);

                if (!$search_query) {
                    die(":Query FAILED" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                if ($count == 0) {
                    echo "<h5 style='color:red'>Your search - <span style='color:black'>".$search."</span> - did not match any documents.</h5>";
                } else {

                    echo "<h5 style='color:blue'>About " .$count. " results</h5>"; 

                    while ($rows = mysqli_fetch_assoc($search_query)) {
                        $post_id = $rows["post_id"];
                        $post_title = $rows["post_title"];
                        $post_author = $rows["post_author"];
                        $post_date = $rows["post_date"];
                        $post_image = $rows["post_image"];
                        $post_content = substr($rows["post_content"],0,300);

            ?>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

            <?php }
                }
            }
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

        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "include/sidebar.php" ?>


    </div>
    <!-- /.row -->

    <hr>

    <?php include "include/footer.php" ?>