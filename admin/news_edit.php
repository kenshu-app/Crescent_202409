<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お知らせの編集 | Crescent Shoes 管理</title>
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
            <h1>お知らせの編集</h1>
            <p>情報を入力し、「保存」ボタンを押してください。</p>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>日付(任意)</th>
                        <td>
                            <div class="error">※日付は「0000-00-00」の形式で入力してください</div>
                            <input type="date" name="posted" value="2020-05-03">
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <div class="error">※タイトルを入力してください</div>
                            <input type="text" name="title" size="80" value="さわやかシーズンに登山はいかが？">
                        </td>
                    </tr>
                    <tr>
                        <th>お知らせの内容</th>
                        <td>
                            <div class="error">※お知らせ内容を入力してください</div>
                            <textarea name="message" cols="80" rows="5">お待たせしました！これまで在庫切れで入手が困難だったクレセントシューズイチオシのトレッキングシューズが再入荷です。身体を動かすと気持ちのよい季節、さわやかな風を感じて登山はいかがでしょう？</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>画像(任意)</th>
                        <td>
                            <input type="file" name="image">
                            <div><img src="../images/press/press03.jpg" width="64" height="64" alt=""></div>
                        </td>
                    </tr>
                </table>
                <p>
                    <input type="submit" name="save" value="保存">
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
