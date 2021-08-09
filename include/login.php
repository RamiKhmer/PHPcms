<?php include "db.php" ?>
<?php session_start(); ?>


<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password =  $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {
        die("Query Failed " . mysqli_error($connection));
    }

    while ($rows = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $rows['user_id'];
        $db_username = $rows['username'];
        $db_user_password = $rows['user_password'];
        $db_user_firstname = $rows['user_firstname'];
        $db_user_lastname = $rows['user_lastname'];
        $db_user_role = $rows['user_role'];
    }

    // $password = crypt($password, "$2y$10iusesomecrazystrings22");


    if ($username === $db_user_firstname && $password === $db_user_password) {
    
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ../admin");

    } else {

        header("Location: ../index.php");
        
    }




}


?>