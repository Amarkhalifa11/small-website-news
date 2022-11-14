<?php
$page = "home";
include('admin-inc/admin-header.php');
include('admin-inc/admin-nav.php');
?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <h1 class="page-header"> HOME <small> add posts </small></h1>
            <div class="col-lg-12">

                <?php
                if (isset($_POST['btn_add'])) {
                    $post_title   = $_POST['post_title'];
                    $category     = $_POST['category'];
                    $post_auther  = $_POST['post_auther'];
                    $post_date    = date('y-m-d');
                    $post_content = $_POST['post_content'];

                    $image_name = $_FILES['post_img']['name'];
                    $tmp        = $_FILES['post_img']['tmp_name'];
                    move_uploaded_file($tmp,"../images/$image_name");

                    $sql = "INSERT INTO `posts`
                    (`post_title`, `category`, `post_auther`, `post_content`, `post_date`, `post_img`)
                    VALUES 
                    ('$post_title','$category','$post_auther','$post_content','$post_date','$image_name')";
                    $new_post = mysqli_query($connection,$sql);
                    header("location:posts.php");


                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class=" form-group">
                        <label for="">title</label>
                        <input class="form-control" type="text" name="post_title">
                    </div>

                    <div class=" form-group">
                        <label for="">category</label>
                        <select class="form-control" name="category">
                            <?php
                            $sql = "SELECT * FROM `catrgory`";
                            $cat = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($cat)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                            ?>
                                <option value="<?= $cat_id ?>"><?= $cat_title ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class=" form-group">
                        <label for="">auther</label>
                        <input class="form-control" type="text" name="post_auther">
                    </div>


                    <div class=" form-group">
                        <label for="">post_img</label>
                        <input class="form-control" type="file" name="post_img">
                    </div>

                    <div class=" form-group">
                        <label for="">content</label>
                        <textarea class="form-control" rows="5" name="post_content"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="btn_add" class="btn btn-primary btn-block btn-lg">add post</button>
                    </div>


                </form>


            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
include('admin-inc/admin-footer.php');
?>