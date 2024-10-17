<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/DB.php');

class Auth extends DB
{
    protected $loginedUser;

    /**
     * PDOインスタンスを生成
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * セッターとしてログイン済みのユーザを設定
     *
     * @param array $adminUser
     * @return void
     */
    public function setUser(array $adminUser): void
    {
        $this->loginedUser = $adminUser;
    }

    /**
     * ゲッターとしてログイン済みのユーザ名のみを返す
     *
     * @return boolean|string
     */
    public function getUserName(): bool|string
    {
        return $this->loginedUser['user'];
    }

    /**
     * メールとパスワードを受けてログイン認証結果を返す
     *
     * @param string|null $mail
     * @param string|null $pass
     * @return boolean
     */
    public function login(?string $mail, ?string $pass)
    {
        try {
            $sql  = 'SELECT *';
            $sql .= ' FROM ' . $this->tblAdmin;
            $sql .= ' WHERE mail = :mail';
            $stmt = $this->pdoObj->prepare($sql);
            $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
            $stmt->execute();
            $adminUser = $stmt->fetch();
            if (
                $adminUser &&
                $adminUser['mail'] == $mail &&
                password_verify($pass, $adminUser['pass'])
            ) {
                $this->setUser($adminUser);
                return true;
            }
            return false;
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }
}
