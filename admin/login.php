<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン | Crescent Shoes 管理</title>
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
            <h1>ログイン</h1>
            <p class="error">メールアドレスまたはパスワードに誤りがあります。</p>
            <form action="" method="post" novalidate>
                <table class="admin entry">
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <input type="email" name="mail">
                            <span class="error">メールアドレスを入力してください。</span>
                        </td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td>
                            <input type="password" name="pass">
                            <span class="error">パスワードを入力してください。</span>
                        </td>
                    </tr>
                </table>
                <p>
                    <input type="submit" value="ログイン">
                    ※ユーザー登録がまだの方は<a href="assign.php">こちら</a>
                </p>
            </form>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
