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
                        Dashboard
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                    <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                </div>
            </div>
            <!-- /.row -->
            <!-- ===================================== admin Widgets =================================================== -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM post";
                                    $select_post = mysqli_query($connection, $query);
                                    $post_count = mysqli_num_rows($select_post);


                                    ?>



                                    <div class='huge'><?php echo $post_count ?></div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM comments";
                                    $select_comment = mysqli_query($connection, $query);
                                    $comment_count = mysqli_num_rows($select_comment);


                                    ?>
                                    <div class='huge'><?php echo $comment_count ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connection, $query);
                                    $users_count = mysqli_num_rows($select_users);


                                    ?>
                                    <div class='huge'><?php echo $users_count ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM category";
                                    $select_cat = mysqli_query($connection, $query);
                                    $cat_count = mysqli_num_rows($select_cat);


                                    ?>
                                    <div class='huge'><?php echo $cat_count ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- ===================== Chart By Google ===================================== -->

            <?php
            
            $query = "SELECT * FROM post WHERE post_status = 'draft'";
            $select_draft_post = mysqli_query($connection, $query);
            $post_draft_count = mysqli_num_rows($select_draft_post);

            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
            $select_unapp_comment = mysqli_query($connection, $query);
            $unapp_cmt_count = mysqli_num_rows($select_unapp_comment);

            $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
            $select_sub_user = mysqli_query($connection, $query);
            $sub_user_count = mysqli_num_rows($select_sub_user);

            $publish_post = $post_count - $post_draft_count;


            ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Chart Information
                        <small>Structure</small>
                    </h1>

                </div>
            </div>


            <div class="row">

                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php

                            $element_text = ['All Posts','Active Posts', 'Draft Posts', 'Comments', 'Unapprove Comments', 'Users', 'Subscribers', 'Categories'];
                            $element_count = [$post_count,$publish_post, $post_draft_count, $comment_count, $unapp_cmt_count, $users_count, $sub_user_count, $cat_count];

                            for ($i = 0; $i < count($element_text); $i++) {
                                echo "['{$element_text[$i]}', {$element_count[$i]}],";
                            }
                            ?>
                            // ['Posts', 1000],

                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };
                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>



        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php include "include/footer.php" ?>