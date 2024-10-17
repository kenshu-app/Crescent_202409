<?php

declare(strict_types=1);

require_once(dirname(__FILE__) . '/../util.inc.php');
require_once(dirname(__FILE__) . '/../Models/Auth.php');

session_start();

$user   = '';
$mail   = '';
$pass   = '';
$retype = '';
$isValidated = false;

$auth = new Auth();

if (!empty($_POST)) {
    $user   = $_POST['user'];
    $mail   = $_POST['mail'];
    $pass   = $_POST['pass'];
    $retype = $_POST['retype'];
    $isValidated = true;

    if ($user === '' || preg_match('/^(\s|　)+$/u', $user)) {
        $userError = 'ユーザー名を入力してください。';
        $isValidated = false;
    }

    if ($mail === '' || preg_match('/^(\s|　)+$/u', $mail)) {
        $mailError = 'メールアドレスを入力してください。';
        $isValidated = false;
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailError = '正しいメールアドレスの形式で入力してください。';
        $isValidated = false;
    }

    if ($pass === '' || preg_match('/^(\s|　)+$/u', $pass)) {
        $passError = 'パスワードを入力してください。';
        $isValidated = false;
    } elseif (!preg_match('/^(?=.*\d)(?=.*[a-z]).{8,100}$/', $pass)) {
        $passError = 'パスワードは半角英数各1字以上の8〜100字で入力してください。';
        $isValidated = false;
    }

    if ($retype === '' || preg_match('/^(\s|　)+$/u', $retype)) {
        $retypeError = 'パスワードを再入力してください。';
        $isValidated = false;
    } elseif ($pass !== $retype) {
        $retypeError = '再入力したパスワードを一致させてください。';
        $isValidated = false;
    }

    if ($isValidated === true) {
        $adminArr = [
            'user' => $user,
            'mail' => $mail,
            'pass' => $pass
        ];
        $auth->add($adminArr);

        $auth->login($mail, $pass);
        $_SESSION['authenticated'] = true;
        $_SESSION['user'] = $auth->getUserName();

        header('Location: index.php');
        exit;
    }
}

$adminUsers = $auth->all();

if (isset($_POST['cancel'])) {
    header('Location: login.php');
    exit;
}
?>
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
                            <input type="text" name="user" size="80" value="<?= h($user) ?>">
                            <?php if (isset($userError)) : ?>
                                <span class="error"><?= $userError ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <input type="email" name="mail" size="80" value="<?= h($mail) ?>">
                            <?php if (isset($mailError)) : ?>
                                <span class="error"><?= $mailError ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td>
                            <input type="password" name="pass" size="80" value="<?= h($pass) ?>">
                            <?php if (isset($passError)) : ?>
                                <span class="error"><?= $passError ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <th>再入力</th>
                        <td>
                            <input type="password" name="retype" size="80" value="<?= h($retype) ?>">
                            <?php if (isset($retypeError)) : ?>
                                <span class="error"><?= $retypeError ?></span>
                            <?php endif; ?>
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
                <?php foreach ($adminUsers as $user) : ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['user']?></td>
                        <td><?=$user['mail']?></td>
                        <td><?=$user['pass']?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
