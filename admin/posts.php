<?php
$page = "home";
include('admin-inc/admin-header.php');
include('admin-inc/admin-nav.php');
?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <h1 class="page-header"> HOME <small> posts </small></h1>
            <div class="col-lg-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>categry</th>
                            <th>auther</th>
                            <th>date</th>
                            <th>image</th>
                            <th>edit</th>
                            <th>delet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql   = "SELECT * FROM `posts`";
                        $posts = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($posts)) {
                            $post_id         =     $row['post_id'];
                            $post_title      =     $row['post_title'];
                            $category        =     $row['category'];
                            $post_auther     =     $row['post_auther'];
                            $post_date       =     $row['post_date'];
                            $post_img        =     $row['post_img'];

                        ?>

                            <tr>
                                <th><?= $post_id ?></th>
                                <th><?= $post_title ?></th>
                                <?php
                                $sql = "SELECT * FROM `catrgory` where cat_id = '$category'";
                                $cate = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($cate)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                ?>
                                    <th><?= $cat_title ?></th>
                                <?php } ?>
                                <th><?= $post_auther ?></th>
                                <th><?= $post_date ?></th>
                                <th><img src="../images/<?= $post_img ?>" width="40" alt=""></th>
                                <td class="text-center"><a href="posts.php?edit=<?= $post_id ?>" class="btn btn-primary btn-lg">edit</a></td>
                                <td class="text-center"><a href="posts.php?del=<?= $post_id ?>" class="btn btn-warning btn-lg">delet</a></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
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