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
                Post Detail
                <small>Get in touch with us</small>
            </h1>

            <?php
            if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
            }


            $query = "SELECT * FROM post WHERE post_id = {$post_id} ";
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
                    by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
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

            <?php

            if (isset($_POST['create_comment'])) {
                $post_id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                // =================== check for empty fill in comment ==============================

                if (empty($comment_author) && empty($comment_content) && empty($comment_email)) {
                    echo "<script>alert('Please fill on your Name, Email and Comment before Submit Your Comment')</script>";
                } else {

                    $comment_content = mysqli_real_escape_string($connection, $comment_content);

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $query .= "VALUES ($post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

                    $comment_result = mysqli_query($connection, $query);

                    if (!$comment_result) {
                        die("Query Failed" . mysqli_error($connection));
                    }

                    // ============================ count comment to post ========================================

                    $query_cmt_count = "UPDATE post SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id";
                    $update_cmt_count = mysqli_query($connection, $query_cmt_count);
                    echo "<div class='alert alert-success' role='alert'>Thanks! Your comment is waiting approving from admin </div>";
                }
            }


            ?>

            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" name="comment_author" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="comment_email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Write a comment" name="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                </form>
            </div>

            <hr>


            <!-- Comment -->

            <!-- <div class="container">
                <div class="row"> -->
            <div class="panel panel-default widget">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span>
                    <h3 class="panel-title" style="display:inline">Recent Comments</h3>
                    <span class="label label-info" style="float: right;">
                        <?php echo $post_comment_count ?></span>
                </div>
                <div class="panel-body">


                    <!--=============================== Comment ======================================-->

                    <?php

                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved' ORDER BY comment_id DESC";
                    $select_all_comments = mysqli_query($connection, $query);
                    $no = 1;
                    while ($rows = mysqli_fetch_assoc($select_all_comments)) {
                        $comment_id = $rows["comment_id"];
                        $comment_post_id = $rows["comment_post_id"];
                        $comment_author = $rows["comment_author"];
                        $comment_content = $rows["comment_content"];
                        $comment_email = $rows["comment_email"];
                        $comment_status = $rows["comment_status"];
                        $comment_date = $rows["comment_date"];

                    ?>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xs-2 col-md-1">
                                    <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                <div class="col-xs-10 col-md-11">
                                    <div>
                                        <a href="#">
                                            <?php echo  $comment_author ?></a>
                                        <div class="mic-info">
                                            By: <a href="#"><?php echo  $comment_email ?></a> on <?php echo  $comment_date ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="comment-text">
                                        <?php echo  $comment_content ?>
                                    </div>
                                    <div class="action">
                                        <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button type="button" class="btn btn-success btn-xs" title="Approved">
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </li><br>

                    <?php } ?>

                    <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span>
                        Show More Comments
                    </a>
                </div>
            </div>
            <!-- </div>
            </div> -->


        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "include/sidebar.php" ?>


    </div>
    <!-- /.row -->

    <hr>

    <?php include "include/footer.php" ?>