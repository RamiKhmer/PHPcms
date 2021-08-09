<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

<!-- Navigation -->

<?php include "include/navigation.php"; ?>

<?php

if (isset($_POST['submit'])) {
    $message = "";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT randsalt FROM users";
        $select_randsalt = mysqli_query($connection, $query);

        if (!$select_randsalt) {
            die("QUERY Failded ===========>>>>>>" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt);
        $randsalt = $row['randsalt'];

        $password = crypt($password, $randsalt);

        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber')";
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("QUERY Failded ===========>>>>>>" . mysqli_error($connection) . " " . mysqli_errno($connection));
        }

        $message = "<div class='alert alert-success' role='alert'>Registration Successfully </div>";
    } else {
        $message = "<div class='alert alert-danger' role='alert'>Please fill your information befor Registration !!! </div>";
    }
} else {
    $message = "";
}

?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <?php echo $message ?>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Enter Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "include/footer.php"; ?>