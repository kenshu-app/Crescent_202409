<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/../util.inc.php');
require_once(dirname(__FILE__) . '/../Models/Auth.php');

session_start();
if (!empty($_SESSION) && $_SESSION['authenticated'] === true) {
    header('Location: index.php');
    exit;
}

$mail = '';
$pass = '';
$isValidated = false;
if (!empty($_POST)) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $isValidated = true;

    if ($mail === '' || preg_match('/^(\s|　)+$/u', $mail)) {
        $mailError = 'メールアドレスを入力してください。';
        $isValidated = false;
    }

    if ($pass === '' || preg_match('/^(\s|　)+$/u', $pass)) {
        $passError = 'パスワードを入力してください。';
        $isValidated = false;
    }

    if ($isValidated === true) {
        $auth = new Auth();
        if ($auth->login($mail, $pass)) {
            session_regenerate_id(true);
            $_SESSION['authenticated'] = true;
            $_SESSION['user'] = $auth->getUserName();
            header('Location: index.php');
            exit;
        } else {
            $verifyError = 'メールアドレスまたはパスワードに誤りがあります。';
        }
    }
}


?>
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
            <?php if (isset($verifyError)):?>
                <p class="error"><?=$verifyError?></p>
            <?php endif;?>
            <form action="" method="post" novalidate>
                <table class="admin entry">
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <input type="email" name="mail">
                            <?php if (isset($mailError)):?>
                                <span class="error"><?=$mailError?></span>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td>
                            <input type="password" name="pass">
                            <?php if (isset($passError)):?>
                                <span class="error"><?=$passError?></span>
                            <?php endif;?>
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
