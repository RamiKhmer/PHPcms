<?php

if (isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    if ($user_firstname == "" || empty($user_firstname)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>First Name</b> !</div>";
    } elseif ($user_lastname == "" || empty($user_lastname)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Last Name</b> !</div>";
    } elseif ($user_role == "" || empty($user_role)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Choose Role ID</b> !</div>";
    } elseif ($username == "" || empty($username)) {
        echo "<div class='alert alert-danger' role='alert'>Please Input the <b>Username</b> !</div>";
    } elseif ($user_email == "" || empty($user_email)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Email</b> !</div>";
    } elseif ($user_password == "" || empty($user_password)) {
        echo "<div class='alert alert-danger' role='alert'>Please Enter the <b>Password</b> !</div>";
    } else {

        //============================================ Move Image to folder ==============================================

        // move_uploaded_file($post_image_temp, "../images/$post_image");

        // ====================== Move image to folder and just insert imgae's name to Database ======================

        $query = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_email, user_password)";
        $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";

        $create_user = mysqli_query($connection, $query);

        // ========== Function Check Query from Database==============

        comfirmDB($create_user);
        echo "<div class='alert alert-success' role='alert'>Add New User Successfully!</div>";
    }
}


?>


<h1 class="page-header">
    Add User
    <small>Subheading</small>
</h1>

<form action="" method="post" enctype="multipart/form-data" class="was-validated">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" placeholder="Enter Firstname">
    </div>

    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" placeholder="Enter Lastname">
    </div>

    <div class="form-group">
        <label for="post_category">Role</label>
        <select id="" class="form-control" name="user_role">
            <option selected value="admin">admin</option>
            <option selected value="subscriber">subscriber</option>
            <option selected value="subscriber">Choose...</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter Username">
    </div>

    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="user_email" placeholder="example@gmail.com">
    </div>

    <!-- <div class="form-group">
        <label for="post_image">User Image</label>
        <input type="file" name="image" class="form-control">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password" placeholder="Enter Password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>