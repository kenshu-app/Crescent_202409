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
            <p>以下のお知らせを削除します。</p>
            <p>よろしければ「削除」ボタンを押してください。</p>
            <form action="" method="post">
                <table class="admin">
                    <tr>
                        <th>日付</th>
                        <td>
                            2020-05-03
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            さわやかシーズンに登山はいかが？
                        </td>
                    </tr>
                    <tr>
                        <th>お知らせ内容</th>
                        <td>
                            お待たせしました！これまで在庫切れで入手が困難だったクレセントシューズイチオシのトレッキングシューズが再入荷です。身体を動かすと気持ちのよい季節、さわやかな風を感じて登山はいかがでしょう？
                        </td>
                    </tr>
                    <tr>
                        <th>画像</th>
                        <td><img src="../images/press/press03.jpg" width="64" height="64" alt=""></td>
                    </tr>
                </table>
                <p>
                    <input type="submit" name="delete" value="削除">
                    <input type="submit" name="cancel" value="キャンセル">
                </p>
            </form>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
