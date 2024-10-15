<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お知らせ一覧 | Crescent Shoes 管理</title>
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
            <h1>お知らせ一覧</h1>
            <p><a href="news_add.php">お知らせの追加</a></p>
            <table class="admin">
                <tr>
                    <th>日付</th>
                    <th>タイトル／お知らせ内容</th>
                    <th>画像(64x64)</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                <tr>
                    <td>2020-07-10</td>
                    <td><span class="title">本格的に夏到来</span>日差しも強くなってきました。そろそろ海が恋しい季節。潮風を感じながら砂浜を散歩するのも気持ちいいですね。クレセントシューズおすすめの洗濯機でも洗えるスニーカー、夏のニーズにお応えしてお手入れもラクラクです。</td>
                    <td><img src="../images/press/press01.jpg" width="64" height="64" alt=""></td>
                    <td><a href="news_edit.php?id=1">編集</a></td>
                    <td><a href="news_delete.php?id=1">削除</a></td>
                </tr>
                <tr>
                    <td>2020-06-02</td>
                    <td><span class="title">雨の日を楽しもう！</span>雨の日のお出かけにはどの靴を履いていくか迷うことありませんか？クレセントシューズのレインシューズは強力な防水加工かつ靴の中がむれない構造になっていて雨の日でも安心です。</td>
                    <td><img src="../images/press/press02.jpg" width="64" height="64" alt=""></td>
                    <td><a href="news_edit.php?id=1">編集</a></td>
                    <td><a href="news_delete.php?id=1">削除</a></td>
                </tr>
                <tr>
                    <td>2020-05-03</td>
                    <td><span class="title">さわやかシーズンに登山はいかが？</span>お待たせしました！これまで在庫切れで入手が困難だったクレセントシューズイチオシのトレッキングシューズが再入荷です。身体を動かすと気持ちのよい季節、さわやかな風を感じて登山はいかがでしょう？</td>
                    <td><img src="../images/press/press03.jpg" width="64" height="64" alt=""></td>
                    <td><a href="news_edit.php?id=1">編集</a></td>
                    <td><a href="news_delete.php?id=1">削除</a></td>
                </tr>
                <tr>
                    <td>2020-04-20</td>
                    <td><span class="title">春色がやってきた</span>春色のパステルカラー！たくさんの明るい色が店内を飾っています。足元から明るく、お出かけの気分を上げていきましょう！たくさん歩いても大丈夫、ローヒールの靴もたくさん入荷しております。ぜひ店舗にも足をお運びください。</td>
                    <td><img src="../images/press/press04.jpg" width="64" height="64" alt=""></td>
                    <td><a href="news_edit.php?id=1">編集</a></td>
                    <td><a href="news_delete.php?id=1">削除</a></td>
                </tr>
                <tr>
                    <td>2020-03-25</td>
                    <td><span class="title">春の兆し</span>凍えたていた大地にやわらかい日差しがさしてきましたね。そろそろ春の準備です。お散歩にも最適のウォーキングシューズはいかがですか？ウォークラインを考慮した構造で足への負担をやわらげています。ぜひ一度お試しください。</td>
                    <td><img src="../images/press/press05.jpg" width="64" height="64" alt=""></td>
                    <td><a href="news_edit.php?id=1">編集</a></td>
                    <td><a href="news_delete.php?id=1">削除</a></td>
                </tr>
            </table>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
