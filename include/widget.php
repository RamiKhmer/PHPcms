<div class="well">
        <h3>Recently Posts list</h3>
        <?php
        $no = 1;
        $query = "SELECT * FROM post ORDER BY post_id DESC";
        $selectAllpost = mysqli_query($connection, $query);
        while ($rows = mysqli_fetch_assoc($selectAllpost)) {
                $post_Title = $rows["post_title"];
                $post_id = $rows["post_id"];
        ?>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                        <h5><?php echo $no . " - " . $post_Title ?></h5>
                </a>
        <?php
                $no++;
        }
        ?>
</div>

<div class="well">
<h3>The most pupular post</h3>


<!-- <?php 
$query_max = "SELECT MAX(post_comment_count) FROM post";
$max_post = mysqli_query($connection, $query_max);
while ($rows = mysqli_fetch_assoc($max_post)) {
        $post_Title1 = $rows["post_title"];
        $post_content1 = substr($rows["post_content"], 0, 100);

?>
        <h4><?php echo $post_Title1 ?></h4>
        <p><?php echo $post_content1 ?></p>

        <?php
               
        }
        ?> -->
</div>


