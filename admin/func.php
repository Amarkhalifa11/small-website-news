<?php
function del(){
    global $connection;
    if (isset($_GET['del'])) {
        $delcat      = $_GET['del'];
        $deletsql    = "DELETE FROM `catrgory` WHERE cat_id = '$delcat' ";
        $deletcat    = mysqli_query($connection, $deletsql);
        header("location:category.php");
    }
}

function insert(){
    global $connection;
    if (isset($_POST['add_cat'])) {
        $category = $_POST['cat_title'];

        $insertsql = "INSERT INTO `catrgory` (`cat_title`) VALUES ('$category')";
        $addcat    = mysqli_query($connection, $insertsql);
        header("location:category.php");
    }
}

function edit(){
    global $connection;

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
    ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">edit category</label>
                <?php
                $sql      = "SELECT * FROM `catrgory` where cat_id = '$id'";
                $category = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($category)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                ?>
                    <input type="text" name="cat_title" class="form-control" value="<?= $cat_title ?>">
                <?php
                }
                ?>
            </div>
            <div class="text-center">
                <input type="submit" name="edit_cat" class="btn btn-warning btn-lg ">
            </div>
        </form>
    <?php
    }
    ?>
    <?php
    if (isset($_POST['edit_cat'])) {
        $new = $_POST['cat_title'];
        echo $new;
        $updatesql = "UPDATE `catrgory` SET `cat_title` = '$new' WHERE `cat_id` = '$id'";
        $updatecat    = mysqli_query($connection, $updatesql);
        header("location:category.php");
    }
}
?>