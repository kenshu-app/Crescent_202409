<?php

declare(strict_types=1);
session_start();

if (!empty($_SESSION) && $_SESSION['authenticated'] == true) {
    header('Location: index.php');
    exit;
}

require_once(dirname(__FILE__) . '/../util.inc.php');
require_once(dirname(__FILE__) . '/../Models/Auth.php');

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
            $_SESSION['user'] = $auth->getUserName();
            $_SESSION['authenticated'] = true;

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body class="bg-light">
    <header class="adjust" style="height:40px">
        <div class="container layout">
            <h2><a href="index.php">Crescent Shoes 管理</a></h2>
        </div>
    </header>
    <div class="container">
        <main>
            <form action="" method="post" class="form-signin d-b mt-5 mx-auto" style="width:400px" novalidate>
                <div class="card-deck text-center">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">
                                <img src="../images/logo01.png" width="100">
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php if (isset($verifyError)) : ?>
                                <p class="error alert alert-danger"><?= $verifyError ?></p>
                            <?php endif; ?>
                            <?php if (isset($mailError)) : ?>
                                <p class="error alert alert-danger"><?= $mailError ?></p>
                            <?php endif; ?>
                            <div class="input-group mb-3">
                                <label class="input-group-text" style="width:9em">
                                    メールアドレス
                                </label>
                                <input type="email" name="mail" value="<?= h($mail) ?>" class="form-control" autofocus>
                            </div>
                            <?php if (isset($passError)) : ?>
                                <p class="error alert alert-danger"><?= $passError ?></p>
                            <?php endif; ?>
                            <div class="input-group mb-3">
                                <label class="input-group-text" style="width:9em">
                                    パスワード
                                </label>
                                <input type="password" name="pass" value="<?= h($pass) ?>" class="form-control" autofocus>
                            </div>
                            <div class="d-grid">
                                <input class="btn btn-lg btn-primary" type="submit" name="login" value="ログイン">
                            </div>
                            <div class="mt-3">※ユーザー名・パスワードの登録は<a href="assign.php">こちら</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <footer>
            <p class="text-center">&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
