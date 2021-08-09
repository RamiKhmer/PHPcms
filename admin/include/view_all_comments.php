<div class="col-xs-12 table-responsive-sm">
    <table class="table table-hover table-bordered">
        <caption>View All Comment</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In Respone to Post</th>
                <th>Date</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Dalete</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "SELECT * FROM comments ORDER BY comment_id DESC";
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

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $comment_id ?></td>
                    <td><?php echo $comment_author ?></td>
                    <td><?php echo $comment_content ?></td>
                    <td><?php echo $comment_email ?></td>
                    <td><?php echo $comment_status ?></td>

                    <?php
                    $query = "SELECT * FROM post WHERE post_id = {$comment_post_id}";
                    $Select_post = mysqli_query($connection, $query);

                    while ($rows = mysqli_fetch_assoc($Select_post)) {
                        $post_id = $rows["post_id"];
                        $post_title = $rows["post_title"];

                    ?>
                        <td><a href="../post.php?p_id=<?php echo $post_id ?>" target="_blank"><?php echo $post_title ?></a></td>
                    <?php  } ?>

                    <td><?php echo $comment_date ?></td>
                    <td><a href="comments.php?approve=<?php echo $comment_id ?>">Approve</a></td>
                    <td><a href="comments.php?unapprove=<?php echo $comment_id ?>">Unapprove</a></td>
                    <td><a href="comments.php?delete=<?php echo $comment_id ?>&del_p_id=<?php echo $comment_post_id ?>">Delete</a></td>
                </tr>

            <?php $no++;
            } ?>


        </tbody>
    </table>

    <?php

    if (isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}";
        $approve_post = mysqli_query($connection, $query);
        header("Location: comments.php");
    }


    if (isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}";
        $unapprove_post = mysqli_query($connection, $query);
        header("Location: comments.php");
    }


    if (isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $post_id_id = $_GET['del_p_id'];

        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
        $delete_post = mysqli_query($connection, $query);

        // =========================Delete comment Count from Post=======================================

        $query_cmt_count = "UPDATE post SET post_comment_count = post_comment_count - 1 WHERE post_id =  $post_id_id";
        $update_cmt_count = mysqli_query($connection, $query_cmt_count);

        header("Location: comments.php");
    }



    ?>

</div>