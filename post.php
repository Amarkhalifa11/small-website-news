<?php
$page = "posts";
include('includes/header.php');
include('includes/nav.php');
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->


            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql        = "SELECT * FROM `posts` where post_id = '$id' ";
                $posts      = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($posts)) {

                    $post_id       = $row['post_id'];
                    $post_title    = $row['post_title'];
                    $post_date     = $row['post_date'];
                    $post_img      = $row['post_img'];
                    $post_auther   = $row['post_auther'];
                    $category      = $row['category'];
                    $post_content  = $row['post_content'];
                    // $post_content  = substr($row['post_content'], 0, 300);
            ?>
                    <!-- Title -->
                    <h1><?= $post_title ?></h1>
                    <!-- Author -->
                    <p class="lead">by <a href="#"><?= $post_auther ?></a></p>
                    <hr>
                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span><?= $post_date ?></p>
                    <hr>
                    <!-- Preview Image -->
                    <img class="img-responsive" src="images/<?= $post_img ?>" alt="">
                    <hr>
                    <!-- Post Content -->
                    <p class="lead"><?= $post_content ?></p>
                    <hr>

                <?php
                }
                ?>

                <!-- Blog Comments -->


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="POST" action="">
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <?php
                if (isset($_POST['add_comment'])) {
                    $comment_post_id = $_GET['id'];
                    $comment_content = $_POST['comment_content'];

                    $insertsql = "INSERT INTO `comments`(`comment_post_id`, `comment_date`, `comment_content`) VALUES ('$comment_post_id',now(),'$comment_content')";
                    $ad_comment = mysqli_query($connection, $insertsql);

                    // header("location:post.php?id=$comment_post_id");
                }
                ?>

                <!-- Posted Comments -->


                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `comments` where comment_post_id = '$id'";
                $a = mysqli_query($connection, $sql,);
                while ($row = mysqli_fetch_assoc($a)) {
                    $comment_content = $row['comment_content'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_date = $row['comment_date'];
                  
                ?>
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">the content : <?= $comment_content ?>
                                <br><small>the date :<?=$comment_date?></small>
                            </h4>
                        </div>
                    </div>
                <?php } ?>
            <?php
            }
            ?>
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