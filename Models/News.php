<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/DB.php');

class News extends DB
{
    /**
     * PDOインスタンスを生成
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ニュースの全件を返す
     *
     * @param string|null $desc
     * @param integer|null $offset
     * @param integer|null $limit
     * @return array
     */
    public function all(?string $desc = null, ?int $offset = 0, ?int $limit = 0): array
    {
        try {
            $sql = 'SELECT';
            $sql .= ' *';
            $sql .= ' FROM ' . $this->tblMain;
            if ($desc) {
                $sql .= ' ORDER BY posted_at DESC, id DESC';
            }
            if ($limit > 0) {
                $sql .= ' LIMIT ' . $offset . ', ' .  $limit;
            }
            return $this->pdoObj->query($sql)->fetchAll();
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }

    /**
     * フォームから受けた値をもとにDBに一件追加
     *
     * @param array|null $postArr
     * @return void
     */
    public function add(?array $postArr): void
    {
        try {
            $sql  = 'INSERT';
            $sql .= ' INTO ' . $this->tblMain;
            $sql .= ' (posted_at, title, message, image)';
            $sql .= ' VALUES ("' . $postArr['posted'] . '", :title, :message, "' . $postArr['image'] . '")';
            $stmt = $this->pdoObj->prepare($sql);
            $stmt->bindValue(':title',   $postArr['title'], PDO::PARAM_STR);
            $stmt->bindValue(':message', $postArr['message'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }

    /**
     * パラメータから受けたidをもとにDBの一件を取得
     *
     * @param integer|null $id
     * @return boolean|array
     */
    public function find(?int $id): bool|array
    {
        try {
            $sql  = 'SELECT *';
            $sql .= ' FROM ' . $this->tblMain;
            $sql .= ' WHERE id = :id';
            $stmt = $this->pdoObj->prepare($sql);
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }

    /**
     * パラメータから受けたidをもとにDBの一件を削除
     *
     * @param integer|null $id
     * @return void
     */
    public function delete(?int $id): void
    {
        try {
            $sql  = 'DELETE';
            $sql .= ' FROM ' . $this->tblMain;
            $sql .= ' WHERE id = :id';
            $stmt = $this->pdoObj->prepare($sql);
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }
}
