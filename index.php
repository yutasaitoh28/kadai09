<?php include "includes/init.php" ?>
<?php
require_once('includes/php_functions.php');

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_content_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<?php include "includes/header.php" ?>
<body id="main">
    <?php include "includes/nav.php" ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($contents as $content): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                        <?php if ($content['img']): ?>
                            <img src="./images/<?=$content['img']?>" alt="" class="bd-placeholder-img card-img-top" >
                        <?php else: ?>
                            <img src="./images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
                        <?php endif ?>
                        <div class="card-body">
                            <h3><?= $content['title'] ?></h3>
                            <p class="card-text"><?= nl2br($content['content']) ?></p>
                            <p class="card-text">投稿者：<?= nl2br($content['content']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">登録日:<?= $content['date'] ?></small>
                            </div>
                            <?php if (!is_null($content['update_time'])): ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">更新日:<?= $content['update_time'] ?></small>
                            </div>
                            <?php endif ?>
                            <button type="submit" class="btn btn-primary"><a href="detail.php?id=<?=$content['id']?>" style="color:white;text-decoration:none;">編集する</a></button>
                        </div>
                        </div>
                    </div>
                <!-- </a> -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>