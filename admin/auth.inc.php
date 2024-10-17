<?php
/**
 * ログイン認証済みでない場合はログイン画面へリダイレクトする
 *
 * @return void
 */
function authConfirm(): void
{
    if (!empty($_SESSION) && $_SESSION['authenticated'] != true) {
        header('Location: login.php');
        exit;
    }
}
