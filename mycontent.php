<?php include "includes/init.php" ?>
<?php
    if (logged_in()) {
        $username=$_SESSION['username'];
    } else {
        redirect("index.php");   
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>
    <body>
        <?php include "includes/nav.php" ?>

        <div class="container">
            <?php 
                show_msg();
            ?>
            <h1 class="text-center"><?php echo $username ?>さんの管理画面</h1>
            <button type="submit" class="btn btn-primary"><a href="post.php" style="color:white;text-decoration:none;">投稿する</a></button>
        <?php include "includes/footer.php" ?>
    </body>
</html>