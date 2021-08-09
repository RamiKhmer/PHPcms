<?php include "include/header.php" ?>
<?php include "function.php" ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/navigation.php" ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Profile
                        <small>Subheading</small>
                    </h1>



                    <?php

                    if (isset($_SESSION['username'])) {
                        $get_username = $_SESSION['username'];

                        $query = "SELECT * FROM users WHERE username = '{$get_username}'";
                        $select_user_profile_query = mysqli_query($connection, $query);

                        while ($rows = mysqli_fetch_array($select_user_profile_query)) {
                            $user_id = $rows["user_id"];
                            $username = $rows["username"];
                            $user_firstname = $rows["user_firstname"];
                            $user_lastname = $rows["user_lastname"];
                            $user_email = $rows["user_email"];
                            $user_role = $rows["user_role"];
                            $user_password = $rows["user_password"];
                        }
                    }

                    ?>

                    <?php


                    if (isset($_POST['update_user'])) {

                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
                        $username = $_POST['username'];
                        $user_email = $_POST['user_email'];
                        $user_role = $_POST['user_role'];
                        $user_password = $_POST['user_password'];

                        // $post_image = $_FILES['image']['name'];
                        // $post_image_temp = $_FILES['image']['tmp_name'];

                        // move_uploaded_file($post_image_temp, "../images/$post_image");

                        // if (empty($post_image)) {
                        //     $query = "SELECT * FROM post WHERE post_id = $catch_post_id ";
                        //     $select_image = mysqli_query($connection, $query);

                        //     while ($row = mysqli_fetch_array($select_image)) {
                        //         $post_image = $row['post_image'];
                        //     }
                        // }

                        // $post_content = mysqli_real_escape_string($connection, $post_content);

                        $query = "UPDATE users SET ";
                        $query .= "user_firstname = '{$user_firstname}', ";
                        $query .= "user_lastname = '{$user_lastname}', ";
                        $query .= "username = '{$username}', ";
                        $query .= "user_email = '{$user_email}', ";
                        $query .= "user_role = '{$user_role}', ";
                        $query .= "user_password = '{$user_password}' ";
                        $query .= "WHERE username = '{$get_username}'";


                        $update_user = mysqli_query($connection, $query);
                        // comfirmDB($update_post);

                        if (!$update_user) {
                            die("Query Failed ====>> " . mysqli_error($connection));
                        }

                        // header("Location: posts.php?source=edit_post&post_id= {$catch_post_id} ");
                        echo "<div class='alert alert-success' role='alert'>You Have Update Your Profile Successfully!</div>";
                    }






                    ?>



                    <form action="" method="post" enctype="multipart/form-data" class="was-validated">

                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input value="<?php echo $user_firstname ?>" type="text" class="form-control" name="user_firstname" placeholder="Enter Firstname">
                        </div>

                        <div class="form-group">
                            <label for="title">Last Name</label>
                            <input value="<?php echo $user_lastname ?>" type="text" class="form-control" name="user_lastname" placeholder="Enter Lastname">
                        </div>

                        <div class="form-group">
                            <label for="post_category">Role</label>
                            <select id="" class="form-control" name="user_role">

                                <?php

                                if ($user_role == 'admin') {
                                    echo "<option selected value='subscriber'>subscriber</option>";
                                } else {
                                    echo "<option selected value='admin'>admin</option>";
                                }

                                ?>
                                <option selected value="subscriber"><?php echo $user_role ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Username</label>
                            <input value="<?php echo $username ?>" type="text" class="form-control" name="username" placeholder="Enter Username">
                        </div>

                        <div class="form-group">
                            <label for="title">Email</label>
                            <input value="<?php echo $user_email ?>" type="email" class="form-control" name="user_email" placeholder="example@gmail.com">
                        </div>

                        <!-- <div class="form-group">
    <label for="post_image">User Image</label>
    <input type="file" name="image" class="form-control">
</div> -->

                        <div class="form-group">
                            <label for="post_tags">Password</label>
                            <input value="<?php echo $user_password ?>" type="password" class="form-control" name="user_password" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">
                        </div>

                    </form>





                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->



    <?php include "include/footer.php" ?>