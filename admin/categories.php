<?php include "include/header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <!-- <?php if ($connection) echo "Hello"; ?> -->

    <?php include "include/navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Category
                        <small>Subheading</small>
                    </h1>

                    <!-- ============= Insert Form ============= -->


                    <div class="col-xs-12">

                        <?php

                        if (isset($_POST["submit"])) {
                            $catTitle = $_POST["cat_title"];
                            if ($catTitle == "" || empty($catTitle)) {
                                echo "<div class='alert alert-danger' role='alert'>Please Fill The Value in the Category!</div>";
                            } else {
                                $query = "INSERT INTO category(cat_title)";
                                $query .= "VALUES('{$catTitle}')";



                                $create_category_query = mysqli_query($connection, $query);

                                if (!$create_category_query) {
                                    die("QUERY Failed =======>>>>>>>>>" . mysqli_error($connection));
                                } else {
                                    echo "<div class='alert alert-success' role='alert'>Insert The Category of <b>" . $catTitle . "</b> Successful!</div>";
                                }
                            }
                        }

                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- ============= Update Form ============= -->

                        <?php

                        if (isset($_GET['edit'])) {
                            $the_catID = $_GET['edit'];

                            include "include/update_cat.php";
                        }
                        if (isset($_POST['close_update_cat'])) {
                            header("Location: categories.php");
                        }

                        ?>

                    </div>
                    <?php
                    $query = "SELECT * FROM category";
                    $selectAllCat = mysqli_query($connection, $query);

                    ?>

                    <!-- ============= Table Data Of Form ============= -->


                    <div class="col-xs-12 table-responsive-sm">
                        <table class="table table-hover table-bordered">
                            <caption>Lists of Categories</caption>
                            <thead>
                                <tr class="table-info">
                                    <th scope="col">N<sup>O</sup></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col" colspan="2" style='text-align: center'>Option</th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                $no = 1;
                                while ($rows = mysqli_fetch_assoc($selectAllCat)) {
                                    $catTitle = $rows["cat_title"];
                                    $catID = $rows["cat_id"];
                                    echo "<tr class='table-info'>";
                                    echo "<td>{$no}</td>";
                                    echo "<td>{$catID}</td>";
                                    echo "<td><a href='#'>{$catTitle}</a></td>";
                                    echo "<td class='bg-info' style='text-align: center'><a href='categories.php?edit={$catID}'>Edit</a></td>";
                                    echo "<td class='bg-danger' style='text-align: center'><a href='categories.php?delete={$catID}'>Delete</a></td>";
                                    echo "</tr>";
                                    $no++;
                                }

                                ?>

                                <!-- ============= Delete Record in Table ============= -->



                                <?php

                                if (isset($_GET["delete"])) {
                                    $the_catTID = $_GET["delete"];
                                    $query = "DELETE FROM category WHERE cat_id = {$the_catTID}";
                                    $delete_catID = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                }

                                ?>



                                <!-- <td>1</td>
                                    <td>001</td>
                                    <td>JavaScript</td> -->


                            </tbody>
                        </table>

                    </div>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "include/footer.php" ?>