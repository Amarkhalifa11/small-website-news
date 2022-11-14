<?php
$page = "home";
include('includes/header.php');
include('includes/nav.php');
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                SAFA NEWS
                <small>HOME</small>
            </h1>


            <?php
            if(isset($_GET['cid'])){
                $cid = $_GET['cid'];
            
            $sql        = "SELECT * FROM `posts` where category = '$cid'";
            $posts      = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($posts)) {

                $post_id       = $row['post_id'];
                $post_title    = $row['post_title'];
                $post_date     = $row['post_date'];
                $post_img      = $row['post_img'];
                $post_auther   = $row['post_auther'];
                $category      = $row['category'];
                $post_content  = $row['post_content'];
                // $post_content  = substr($row['post_content'],0,300);
            ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?id=<?=$post_id?>"><?=$post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?=$post_auther?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?=$post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?=$post_img?>" alt="">
                <hr>
                <p><?=$post_content?></p>
                <a class="btn btn-primary" href="post.php?id=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php
            }
            ?>





<?php }?>
        </div>

        <?php
        include('includes/sidebar.php');
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php
    include('includes/footer.php');
    ?>