<?php
if (isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
        $bulk_option = $_POST['bulk_option'];

        switch ($bulk_option) {
            case 'published':
                $query = "UPDATE post SET post_status = '{$bulk_option}' WHERE post_id = {$checkBoxValue}";
                $update_post = mysqli_query($connection, $query);
                break;
            case 'draft':
                $query = "UPDATE post SET post_status = '{$bulk_option}' WHERE post_id = {$checkBoxValue}";
                $update_post = mysqli_query($connection, $query);
                break;
            case 'delete':
                $query = "DELETE FROM post WHERE post_id = {$checkBoxValue}";
                $delete_post = mysqli_query($connection, $query);
                break;
            case 'clone':
                $query = "SELECT * FROM post WHERE post_id = {$checkBoxValue}";
                $selectAllPost = mysqli_query($connection, $query);
                $no = 1;
                while ($rows = mysqli_fetch_array($selectAllPost)) {
                    $postTitle = $rows["post_title"];
                    $post_cat_id = $rows['post_cat_id'];
                    $postAuthor = $rows["post_author"];
                    $postDate = $rows["post_date"];
                    $postImage = $rows["post_image"];
                    $postTage = $rows["post_tags"];
                    $postStatus = $rows["post_status"];
                    $post_content = $rows["post_content"];
                }
                $query = "INSERT INTO post (post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
                $query .= "VALUES({$post_cat_id},'{$postTitle}','{$postAuthor}',now(), '{$postImage}','{$post_content}','{$postTage}','{$postStatus}')";

                $clone_post_query = mysqli_query($connection, $query);
        }
    }
}

?>

<form action="" method="POST">
    <div class="col-xs-12 table-responsive-sm">
        <table class="table table-hover table-bordered" style="text-align: center">
            <caption>View All Post</caption>
            <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0;">
                <select name="bulk_option" id="" class="form-control">
                    <option value="">Select Option</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="clone">Clone</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary"> Add New </a>
            </div>
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAllBoxs"></th>
                    <th>No</th>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM post ORDER BY post_id DESC";
                $selectAllPost = mysqli_query($connection, $query);
                $no = 1;
                while ($rows = mysqli_fetch_assoc($selectAllPost)) {
                    $postID = $rows["post_id"];
                    $postTitle = $rows["post_title"];
                    $postAuthor = $rows["post_author"];
                    $postDate = $rows["post_date"];
                    $postImage = $rows["post_image"];
                    $postTage = $rows["post_tags"];
                    $postComment = $rows["post_comment_count"];
                    $postStatus = $rows["post_status"];
                    $postCategory = $rows["post_cat_id"];
                ?>

                    <tr>
                        <th><input type="checkbox" class="checkBoxs" name="checkBoxArray[]" value="<?php echo $postID ?>"></th>
                        <td><?php echo $no ?></td>
                        <td><?php echo $postID ?></td>
                        <td><?php echo $postAuthor ?></td>
                        <td><a href="../post.php?p_id= <?php echo $postID; ?> " target="_blank"><?php echo $postTitle ?></a></td>

                        <?php

                        $query = "SELECT * FROM category WHERE cat_id = {$postCategory}";
                        $Select_catID = mysqli_query($connection, $query);

                        while ($rows = mysqli_fetch_assoc($Select_catID)) {
                            $catTitle = $rows["cat_title"];

                        ?>

                            <td><?php echo $catTitle ?></td>
                        <?php  } ?>

                        <td><?php echo $postStatus ?></td>
                        <td><img src="../images/<?php echo $postImage ?> " width="100"></td>
                        <td><?php echo $postTage ?></td>
                        <td><?php echo $postComment ?></td>
                        <td><?php echo $postDate ?></td>
                        <td>
                            <a href="posts.php?delete=<?php echo $postID ?>">Delete</a> ||
                            <a href="posts.php?source=edit_post&post_id=<?php echo $postID ?>">Edit</a>
                        </td>
                    </tr>

                <?php $no++;
                } ?>


            </tbody>
        </table>
    </div>
</form>
<?php

if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM post WHERE post_id = {$the_post_id}";
    $delete_post = mysqli_query($connection, $query);
    header("Location: posts.php");
}


?>