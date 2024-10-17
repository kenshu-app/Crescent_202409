<?php

declare(strict_types=1);

session_start();
require_once(dirname(__FILE__) . '/auth.inc.php');
authConfirm();

require_once(dirname(__FILE__) . '/../Models/News.php');
require_once(dirname(__FILE__) . '/../util.inc.php');

const IMG_PATH = '../images/press/';
$posted  = (new DateTime())->format('Y-m-d');
$title   = '';
$message = '';
$image   = '';
$isValidated = false;

if (!empty($_POST)) {
    $posted  = $_POST['posted'];
    $title   = $_POST['title'];
    $message = $_POST['message'];
    $isValidated = true;

    if ($title === '' || preg_match('/^(\s|　)+$/u', $title)) {
        $titleError = 'タイトルを入力して下さい';
        $isValidated = false;
    } elseif (mb_strlen($title) > 20) {
        $titleError = 'タイトルを20文字以内で入力して下さい';
        $isValidated = false;
    }

    if ($message === '' || preg_match('/^(\s|　)+$/u', $message)) {
        $messageError = 'お知らせ内容を入力して下さい';
        $isValidated = false;
    }

    if ($isValidated === true) {
        if (!empty($_FILES)) {
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = mb_convert_encoding(basename($_FILES['image']['name']), 'cp932', 'utf8');
                if (!move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    IMG_PATH . $image
                )) {
                    $imageError = 'アップロードに失敗しました';
                }
            } elseif ($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
                // 何もしない
            } else {
                $imageError = 'アップロードに失敗しました';
            }
        }
        $postArr = [
            'posted'  => $posted,
            'title'   => $title,
            'message' => $message,
            'image'   => $image
        ];
        (new News())->add($postArr);

        header('Location: news_add_done.php');
        exit;
    }
}


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お知らせの追加 | Crescent Shoes 管理</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <header class="adjust">
        <div class="container layout">
            <h2><a href="index.php">Crescent Shoes 管理</a></h2>
            <?php include dirname(__FILE__) . '/account.parts.php'; ?>
        </div>
    </header>
    <div class="container">
        <main>
            <h1>お知らせの追加</h1>
            <p>情報を入力し、「追加」ボタンを押してください。</p>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="admin">
                    <tr>
                        <th>日付(任意)</th>
                        <td>
                            <input type="date" name="posted" value="<?=$posted?>">
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <?php if (isset($titleError)):?>
                                <div class="error"><?=$titleError?></div>
                            <?php endif;?>
                            <input type="text" name="title" size="80" value="<?=h($title)?>">
                        </td>
                    </tr>
                    <tr>
                        <th>お知らせの内容</th>
                        <td>
                            <?php if (isset($messageError)):?>
                                <div class="error"><?=$messageError?></div>
                            <?php endif;?>
                            <textarea name="message" cols="80" rows="5"><?=h($message)?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>画像(任意)</th>
                        <td>
                            <?php if (isset($imageError)):?>
                                <p class="error"><?=$imageError?></p>
                            <?php endif;?>
                            <input type="file" name="image" >
                            <div>画像は64x64ピクセルで表示されます</div>
                            <img class="media-object" src="<?=IMG_PATH . ($image ?: 'press.jpg')?>" height="64" width="64" alt="">
                        </td>
                    </tr>
                </table>
                <p>
                    <input type="submit" name="add" value="追加">
                    <input type="submit" value="キャンセル" formaction="index.php">
                </p>
            </form>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
