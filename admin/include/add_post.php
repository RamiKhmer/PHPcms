<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_cat_id = $_POST['post_cat_id_type'];

    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    if ($post_title == "" || empty($post_title)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Title</b> !</div>";
    } elseif ($post_author == "" || empty($post_author)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Author</b> !</div>";
    } elseif ($post_cat_id == "" || empty($post_cat_id)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Category ID</b> !</div>";
    } elseif ($post_image == "" || empty($post_image)) {
        echo "<div class='alert alert-danger' role='alert'>Please Input the <b>Image</b> !</div>";
    } elseif ($post_content == "" || empty($post_content)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Content</b> !</div>";
    } elseif ($post_tags == "" || empty($post_tags)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Tags</b> !</div>";
    } elseif ($post_status == "" || empty($post_status)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Author</b> !</div>";
    } else {

        //============================================ Move Image to folder ==============================================

        move_uploaded_file($post_image_temp, "../images/$post_image");

        // ================================check category type my title =========================

        $query = "SELECT * FROM category WHERE cat_title = '{$post_cat_id}'";
        $Select_catID = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($Select_catID)) {
            $catID_byTitle = $rows["cat_id"];
        }

        // ====================== Move image to folder and just insert imgae's name to Database ======================

        $query = "INSERT INTO post (post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
        $query .= "VALUES({$catID_byTitle},'{$post_title}','{$post_author}',now(), '{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

        $create_post_query = mysqli_query($connection, $query);

        // ========== Function Check Query from Database==============

        comfirmDB($create_post_query);
        // ===============Select Post ID for alert below =====================================

        $catch_post_id = mysqli_insert_id($connection);

        echo "<div class='alert alert-success' role='alert'>Insert New Post Successfully!  <a href='../post.php?p_id={$catch_post_id}' target='_blank'>View Post</a> or <a href='posts.php'>Go To Admin List All Post</a></div>";
    }
}


?>


<h1 class="page-header">
    Add Post
    <small>Subheading</small>
</h1>

<form action="" method="post" enctype="multipart/form-data" class="was-validated">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
    </div>

    <!-- <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <input type="text" class="form-control" name="post_cat_id" placeholder="Enter Post Category">
    </div> -->

    <!-- ================================================= -->

    <div class="form-group">
        <label for="post_category">Post Category Type</label>
        <!-- <input value="<?php echo $post_cat_id; ?>" type="text" class="form-control" name="post_cat_id" placeholder="Enter Post Category"> -->
        <select id="" class="form-control" name="post_cat_id_type">
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

    <!-- ======================================================== -->

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" placeholder="Enter Post Author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select id="" class="form-control" name="post_status">
            <option selected value="published">published</option>
            <option selected value="draft">draft</option>
            <option selected value="draft">Select Option</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" placeholder="Enter Post Tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="mytextarea" cols="30" rows="30" placeholder="Enter Post Content"></textarea>
    </div>

    <div class="form-group" style="text-align: right">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>