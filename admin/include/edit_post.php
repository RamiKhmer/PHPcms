<div class="form-group" style="text-align: right">
    <a href="posts.php"><input class="btn btn-danger" type="submit" name="close_update_post" value="Close"></a>
</div>

<h1 class="page-header">
    Edit Post
    <small>Subheading</small>
</h1>

<?php

if (isset($_GET['post_id'])) {

    $catch_post_id = $_GET['post_id'];
    $query = "SELECT * FROM post WHERE post_id = {$catch_post_id}";
    $Select_postID = mysqli_query($connection, $query);

    while ($rows = mysqli_fetch_assoc($Select_postID)) {
        $post_title = $rows["post_title"];
        $post_author = $rows["post_author"];
        $post_cat_id = $rows["post_cat_id"];
        $post_status = $rows["post_status"];
        $post_image = $rows["post_image"];
        $post_tags = $rows["post_tags"];
        $post_content = $rows['post_content'];
        $post_date = $rows["post_date"];
    }

    //=================== Update Post ========================
    if (isset($_POST['update_post'])) {

        $post_author = $_POST['author'];
        $post_title = $_POST['title'];
        $post_cat_id = $_POST['post_cat'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if (empty($post_image)) {
            $query = "SELECT * FROM post WHERE post_id = $catch_post_id ";
            $select_image = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['post_image'];
            }
        }

        //===================catch category id by title =============================

        $query = "SELECT * FROM category WHERE cat_title = '{$post_cat_id}'";
        $Select_catID = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($Select_catID)) {
            $catID_byTitle = $rows["cat_id"];
        }



        $post_content = mysqli_real_escape_string($connection, $post_content);

        $query = "UPDATE post SET ";
        $query .= "post_title = '{$post_title}', ";
        // $query .= "post_cat_id = 7, ";
        $query .= "post_cat_id = $catID_byTitle, ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$catch_post_id}";


        $update_post = mysqli_query($connection, $query);
        // comfirmDB($update_post);

        if (!$update_post) {
            die("Query Failed ====>> " . mysqli_error($connection));
        }

        // header("Location: posts.php?source=edit_post&post_id= {$catch_post_id} ");
        echo "<div class='alert alert-success' role='alert'>Update Post Successfully! <a href='../post.php?p_id={$catch_post_id}' target='_blank'>View Post</a> or <a href='posts.php'>Edit More Post</a></div>";
    }


    //===========================================




?>

    <form action="" method="post" enctype="multipart/form-data" class="was-validated">

        <div class="form-group">
            <label for="title">Post Title</label>
            <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title" placeholder="Enter Post Title">
        </div>

        <div class="form-group">
            <label for="post_category">Post Category ID</label>
            <!-- <input value="<?php echo $post_cat_id; ?>" type="text" class="form-control" name="post_cat_id" placeholder="Enter Post Category"> -->
            <select id="" class="form-control" name="post_cat">
                <!-- <option selected>Choose...</option> -->

                <?php

                $query = "SELECT * FROM category";
                $Select_cat = mysqli_query($connection, $query);

                comfirmDB($Select_cat);

                while ($rows = mysqli_fetch_assoc($Select_cat)) {
                    $catTitle = $rows["cat_title"];

                    echo "<option selected>{$catTitle}</option>";
                }

                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="author">Post Author</label>
            <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author" placeholder="Enter Post Author">
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select id="" class="form-control" name="post_status">
                <!-- <option selected>Choose...</option> -->
                <?php 
                if($post_status == 'published'){echo ' <option selected>draft</option>'; }
                else{echo ' <option selected>published</option>'; }
                ?>
                <option selected><?php echo $post_status ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label><br><small>Current Image</small><br>
            <img width="200" src="../images/<?php echo $post_image; ?>">
            <br><small>Choose another image</small>
            <input value="<?php echo $post_image; ?>" type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" placeholder="Enter Post Tags">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="mytextarea" cols="30" rows="30"><?php echo $post_content; ?>
                </textarea>
        </div>

        <div class="form-group" style="text-align: right">
            <input class="btn btn-success" type="submit" name="update_post" value="Update Post">
        </div>


    </form>

<?php

}

?>