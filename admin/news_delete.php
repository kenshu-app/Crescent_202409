<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/../util.inc.php');
require_once(dirname(__FILE__) . '/../Models/News.php');

const IMG_PATH = '../images/press/';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $pdo = new NEWS();
    $news = $pdo->find($id);

    if ($news != false) {
        $posted  = $news['posted_at'];
        $title   = $news['title'];
        $message = $news['message'];
        $image   = $news['image'];
    } else {
        $idError = '指定されたお知らせは存在しません。';
    }
} else {
    $idError = 'お知らせが指定されていません。';
}

if (isset($_POST['delete'])) {
    $pdo->delete($id);

    header('Location: news_delete_done.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お知らせの削除 | Crescent Shoes 管理</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <header class="adjust">
        <div class="container layout">
            <h2><a href="index.php">Crescent Shoes 管理</a></h2>
            <div>admin<a href="logout.php" class="logout">ログアウト</a></div>
        </div>
    </header>
    <div class="container">
        <main>
            <h1>お知らせの削除</h1>
            <?php if (isset($idError)) : ?>
                <?php if (isset($idError)) : ?>
                    <p class="error"><?= $idError ?></p>
                <?php endif; ?>
                <p><a href="index.php">戻る</a></p>
            <?php else : ?>
                <p>以下のお知らせを削除します。</p>
                <p>よろしければ「削除」ボタンを押してください。</p>
                <form action="" method="post">
                    <table class="admin">
                        <tr>
                            <th>日付</th>
                            <td>
                                <?= $posted ?>
                            </td>
                        </tr>
                        <tr>
                            <th>タイトル</th>
                            <td>
                                <?= $title ?>
                            </td>
                        </tr>
                        <tr>
                            <th>お知らせ内容</th>
                            <td>
                                <?= nl2br($message) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>画像</th>
                            <td><img src="<?= IMG_PATH . ($image ?: 'press.jpg') ?>" width="64" height="64" alt=""></td>
                        </tr>
                    </table>
                    <p>
                        <input type="submit" name="delete" value="削除">
                        <input type="submit" value="キャンセル" formaction="index.php">
                    </p>
                </form>
            <?php endif; ?>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
