<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/../Models/News.php');

const IMG_PATH = '../images/press/';

$news = (new News())->all('desc');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お知らせ一覧 | Crescent Shoes 管理</title>
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
            <h1>お知らせ一覧</h1>
            <p><a href="news_add.php">お知らせの追加</a></p>
            <table class="admin">
                <tr>
                    <th>日付</th>
                    <th>タイトル／お知らせ内容</th>
                    <th>画像(64x64)</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                <?php foreach ($news as $item):?>
                <tr>
                    <td><?=$item['posted_at']?></td>
                    <td><span class="title"><?=$item['title']?></span><?=$item['message']?></td>
                    <td><img src="<?=IMG_PATH . ($item['image'] ?: 'press.jpg')?>" width="64" height="64" alt=""></td>
                    <td><a href="news_edit.php?id=<?=$item['id']?>">編集</a></td>
                    <td><a href="news_delete.php?id=<?=$item['id']?>">削除</a></td>
                </tr>
                <?php endforeach;?>
            </table>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
