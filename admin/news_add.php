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
            <div>admin<a href="logout.php" class="logout">ログアウト</a></div>
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
                            <input type="date" name="posted">
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <div class="error">タイトルを入力してください</div>
                            <input type="text" name="title" size="80">
                        </td>
                    </tr>
                    <tr>
                        <th>お知らせの内容</th>
                        <td>
                            <div class="error">お知らせ内容を入力してください</div>
                            <textarea name="message" cols="80" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>画像(任意)</th>
                        <td>
                            <input type="file" name="image">
                            <div>画像は64x64ピクセルで表示されます</div>
                        </td>
                    </tr>
                </table>
                <p>
                    <input type="submit" name="add" value="追加">
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
