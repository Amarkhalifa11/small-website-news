<?php
$page = "home";
include('admin-inc/admin-header.php');
include('admin-inc/admin-nav.php');
include('func.php');
?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <h1 class="page-header"> HOME <small> category </small></h1>
            <div class="col-md-6">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                            <th>EDIT</th>
                            <th>DELET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $sql      = "SELECT * FROM `catrgory`";
                        $category = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($category)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $cat_title ?></td>
                                <td class="text-center"><a href="category.php?edit=<?= $cat_id ?>" class="btn btn-primary btn-lg">edit</a></td>
                                <td class="text-center"><a href="category.php?del=<?= $cat_id ?>" class="btn btn-warning btn-lg">delet</a></td>
                            </tr>

                        <?php
                        }
                        ?>

                        <?php
                        del()
                        ?>

                    </tbody>
                    <?php
                    insert()
                    ?>
                </table>
            </div><!-- col-md-6 left  -->

            <div class="col-md-6">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="">add category</label>
                        <input type="text" name="cat_title" class="form-control">
                    </div>
                    <div class="text-center">
                        <input type="submit" name="add_cat" class="btn btn-warning btn-lg ">
                    </div>
                </form>

                <?php
                edit()
                ?>


            </div><!-- col-md-6 right  -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
include('admin-inc/admin-footer.php');
?>