<div class="col-xs-12 table-responsive-sm">
    <table class="table table-hover table-bordered">
        <caption>View All Users</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Role</th>
                <th colspan="2">Change Role</th>
                <th colspan="2">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "SELECT * FROM users ORDER BY user_id DESC";
            $select_all_users = mysqli_query($connection, $query);
            $no = 1;
            while ($rows = mysqli_fetch_assoc($select_all_users)) {
                $user_id = $rows["user_id"];
                $username = $rows["username"];
                $user_firstname = $rows["user_firstname"];
                $user_lastname = $rows["user_lastname"];
                $user_email = $rows["user_email"];
                $user_role = $rows["user_role"];
                // $user_date = "Don't Know";

            ?>

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $user_id ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $user_firstname . " " . $user_lastname ?></td>
                    <td><?php echo $user_email ?></td>
                    <td><?php echo $user_role ?></td>

                    <td><a href="users.php?c_admin=<?php echo $user_id ?>">Admin</a></td>
                    <td><a href="users.php?c_sub=<?php echo $user_id ?>">Subscriber</a></td>
                    <td>
                        <a href="users.php?source=edit_user&user_id=<?php echo $user_id ?>">Edit</a>
                    </td>
                    <td>
                        <a href="users.php?delete=<?php echo $user_id ?>">Delete</a>
                    </td>
                </tr>

            <?php $no++;
            } ?>


        </tbody>
    </table>

    <?php

    if (isset($_GET['c_sub'])) {
        $the_user_id = $_GET['c_sub'];

        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id}";
        $delete_user = mysqli_query($connection, $query);

        header("Location: users.php");
    }

    if (isset($_GET['c_admin'])) {
        $the_user_id = $_GET['c_admin'];

        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id}";
        $delete_user = mysqli_query($connection, $query);

        header("Location: users.php");
    }


    if (isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
        $delete_user = mysqli_query($connection, $query);

        header("Location: users.php");
    }

    ?>

</div>