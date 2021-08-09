<?php include "include/db.php" ?>
<?php include "include/header.php" ?>
<!-- Navigation -->
<?php include "include/navigation.php" ?>

<?php 
 if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    $post_author = $_GET['author'];
}

?>

<!-- Page Content -->

<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                All Post By <a><?php echo $post_author ?></a>
                <small>Get in touch with us</small>
            </h1>

            <?php
           
            $query = "SELECT * FROM post WHERE post_author = '{$post_author}' ";
            $selectAllPost = mysqli_query($connection, $query);

            while ($rows = mysqli_fetch_assoc($selectAllPost)) {
                $post_title = $rows["post_title"];
                $post_author = $rows["post_author"];
                $post_date = $rows["post_date"];
                $post_image = $rows["post_image"];
                $post_content = $rows["post_content"];
                $post_comment_count = $rows["post_comment_count"];
            ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href=""><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <br>
                <hr>
            <?php } ?>



            <!--=========================== Posted Comments ======================================-->

           


        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "include/sidebar.php" ?>


    </div>
    <!-- /.row -->

    <hr>

    <?php include "include/footer.php" ?>