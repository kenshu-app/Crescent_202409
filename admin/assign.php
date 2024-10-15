<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員登録 | Crescent Shoes 管理</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <header class="adjust">
        <div class="container layout">
            <h2><a href="index.php">Crescent Shoes 管理</a></h2>
        </div>
    </header>
    <div class="container">
        <main>
            <h1>会員登録</h1>
            <form action="" method="post" novalidate>
                <table class="admin entry">
                    <tr>
                        <th>ユーザー名</th>
                        <td>
                            <input type="text" name="user" size="80">
                            <span class="error">ユーザー名を入力してください。</span>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <input type="email" name="mail" size="80">
                            <span class="error">メールアドレスを入力してください。</span>
                            <span class="error">正しいメールアドレスの形式で入力してください。</span>
                        </td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td>
                            <input type="password" name="pass" size="80">
                            <span class="error">パスワードを入力してください。</span>
                            <span class="error">パスワードは半角英数各1字以上の8〜100字で入力してください。</span>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <th>再入力</th>
                        <td>
                            <input type="password" name="retype" size="80">
                            <span class="error">パスワードを再入力してください。</span>
                            <span class="error">再入力したパスワードを一致させてください。</span>
                        </td>
                    </tr>
                </table>
                <p>
                    <input type="submit" name="assign" value="登録">
                    <input type="submit" name="cancel" value="キャンセル">
                </p>
            </form>
            <table class="adminlist">
                <tr>
                    <th>番号</th>
                    <th>ユーザー名</th>
                    <th>メールアドレス</th>
                    <th>パスワード</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>taro</td>
                    <td>taro@sample.com</td>
                    <td>$2y$10$HfxnbyyJJ3EAg6Uohq4IyuXi3t5aY4DH4O67P2FHMzgSSS3uK6bi2</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>jiro</td>
                    <td>jiro@sample.com</td>
                    <td>$2y$10$HfxnbyyJJ3EAg6Uohq4IyuXi3t5aY4DH4O67P2FHMzgSSS3uK6bi2</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>saburo</td>
                    <td>saburo@sample.com</td>
                    <td>$2y$10$HfxnbyyJJ3EAg6Uohq4IyuXi3t5aY4DH4O67P2FHMzgSSS3uK6bi2</td>
                </tr>
            </table>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
