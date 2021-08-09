<form action="" method="post">
    <div class="form-group">
        <?php

        if (isset($_GET["edit"])) {
            $cat_ID = $_GET["edit"];
            $query = "SELECT * FROM category WHERE cat_id = {$cat_ID}";
            $Select_catID = mysqli_query($connection, $query);

            while ($rows = mysqli_fetch_assoc($Select_catID)) {
                $catTitle = $rows["cat_title"];
        ?>
                <hr><br>
                <div class="form-group" style="text-align: right">
                    <input class="btn btn-danger" type="submit" name="close_update_cat" value="Close">
                </div>
                <label for="cat-title">Update Category of <b><?php echo "\"" . $catTitle . "\"" ?></b></label>
               
                <input value="<?php if (isset($catTitle)) {
                                    echo $catTitle;
                                } ?>" class="form-control" type="text" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
    </div>
<?php
            }
        } ?>


<?php


if (isset($_POST["update_cat"])) {
   
        $the_catTitle = $_POST["cat_title"];
        $query = "UPDATE category SET cat_title = '{$the_catTitle}' WHERE cat_id = {$the_catID}";
        $delete_catID = mysqli_query($connection, $query);
    
}

?>

</form>