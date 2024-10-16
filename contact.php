<?php

declare(strict_types=1);

session_start();

require_once dirname(__FILE__) . '/util.inc.php';

$name    = '';
$kana    = '';
$email   = '';
$phone   = '';
$inquiry = '';
$mapNone = true;
$isValidated = false;

if (isset($_SESSION['contact'])) {
    $contact = $_SESSION['contact'];
    $name    = $contact['name'];
    $kana    = $contact['kana'];
    $email   = $contact['email'];
    $phone   = $contact['phone'];
    $inquiry = $contact['inquiry'];
    $mapNone = $contact['mapNone'];
}

if (!empty($_POST)) {
    $name    = $_POST['name'];
    $kana    = $_POST['kana'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $token   = $_POST['token'];
    $inquiry = $_POST['inquiry'];

    $mapNone = false;
    $isValidated = true;

    if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
        $nameError = '※お名前を入力してください';
        $isValidated = false;
    }

    if ($kana === '' || preg_match('/^(\s|　)+$/u', $kana)) {
        $kanaError = '※フリガナを入力してください';
        $isValidated = false;
    } elseif (!preg_match('/^[ァ-ヶー 　]+$/u', $kana)) {
        $kanaError = '※全角カタカナで入力してください';
        $isValidated = false;
    }

    if ($email === '' || preg_match('/^(\s|　)+$/u', $email)) {
        $emailError = '※メールアドレスを入力してください';
        $isValidated = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = '※メールアドレスの形式が正しくありません';
        $isValidated = false;
    }

    if ($inquiry === '' || preg_match('/^(\s|　)+$/u', $inquiry)) {
        $inquiryError = '※お問い合わせ内容を入力してください';
        $isValidated = false;
    }

    if ($isValidated === true) {
        $contact = [
            'name'    => $name,
            'kana'    => $kana,
            'email'   => $email,
            'phone'   => $phone,
            'inquiry' => $inquiry,
            'token'   => $token,
            'mapNone' => false
        ];
        $_SESSION['contact'] = $contact;

        header('Location: contact_conf.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="クレセントシューズは靴の素材と履き心地にこだわる方に満足をお届けする東京の靴屋です。後悔しない靴選びはぜひクレセントシューズにお任せください。">
    <meta name="keyword" content="Crescent,shoes,クレセントシューズ,東京,新宿区,メンズシューズ,レディースシューズ,キッズシューズ,ベビーシューズ">

    <title>Contact | Crescent Shoes</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body id="pageTop">
    <header class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1 class="navbar-header">
                <a href="index.php" class="navbar-brand"><img src="images/logo01.png" alt="LOGO"></a>
            </h1>
            <nav class="navbar-collapse collapse" id="navigation" role="navigation">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">ホーム<span>HOME</span></a></li>
                    <li><a href="about.php">会社概要<span>ABOUT</span></a></li>
                    <li><a href="news.php">ニュース<span>NEWS</span></a></li>
                    <li><a href="shop.php">ショップ<span>ONLINE SHOP</span></a></li>
                    <li><a href="contact.php">お問い合わせ<span>CONTACT</span></a></li>
                </ul>
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="keyword">
                        <span class="input-group-btn"><button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button></span>
                    </div>
                </form>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav>
                    <h1 class="page-header">Contact</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php if ($mapNone) : ?>
            <div class="row">
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6479.926203846024!2d139.7001925!3d35.702525600000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d2f6cba44df%3A0x18b3bc4c95b9f078!2z44CSMTY5LTAwNzMg5p2x5Lqs6YO95paw5a6_5Yy655m-5Lq655S677yS5LiB55uu77yU4oiS77yY!5e0!3m2!1sja!2sjp!4v1439870260921" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <h3>Contact Details</h3>
                    <p>
                        〒169-0073<br>東京都新宿区百人町2-4-8　グレースビル1階
                    </p>
                    <p><i class="fa fa-phone"></i> 03-1234-5678</p>
                    <p><i class="fa fa-envelope-o"></i> info@crescent.com
                    </p>
                    <p><i class="fa fa-clock-o"></i>
                        月-金曜日: 9:00 AM to 5:00 PM</p>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs contactleft">
                <div class="contact-img">
                    <img src="images/contact.jpg">
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="page-header">Send Message</h3>
                <form action="" method="post" class="form-horizontal" novalidate>
                    <input type="hidden" name="token" value="<?= getToken(); ?>">
                    <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">お名前<span>(必須)</span></label>
                        <div class="col-sm-9">
                            <?php if (isset($nameError)) : ?>
                                <div class="text-warning"><?= $nameError ?></div>
                            <?php endif; ?>
                            <input type="text" class="form-control" id="inputname" name="name" value="<?= h($name) ?>">
                            <p class="help-block">(例)山田　太郎</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputkana" class="col-sm-3 control-label">フリガナ<span>(必須)</span></label>
                        <div class="col-sm-9">
                            <?php if (isset($kanaError)) : ?>
                                <div class="text-warning"><?= $kanaError ?></div>
                            <?php endif; ?>
                            <input type="text" class="form-control" id="inputkana" name="kana" value="<?= h($kana) ?>">
                            <p class="help-block">(例)ヤマダ　タロウ ※全角カタカナ</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputemail" class="col-sm-3 control-label">メールアドレス<span>(必須)</span></label>
                        <div class="col-sm-9">
                            <?php if (isset($emailError)) : ?>
                                <div class="text-warning"><?= $emailError ?></div>
                            <?php endif; ?>
                            <input type="email" class="form-control" id="inputemail" name="email" value="<?= h($email) ?>">
                            <p class="help-block">(例)abc@zz.com ※半角英数字</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputtel" class="col-sm-3 control-label">電話番号</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" name="phone" value="<?= h($phone) ?>" id="inputtel">
                            <p class="help-block">(例)03-1234-3214　※ハイフンあり　半角数字</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputmessage" class="col-sm-3 control-label">お問い合わせ内容<span>(必須)</span></label>
                        <div class="col-sm-9">
                            <?php if (isset($inquiryError)) : ?>
                                <div class="text-warning"><?= $inquiryError ?></div>
                            <?php endif; ?>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="inquiry" maxlength="999" style="resize:none"><?= h($inquiry) ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-success btn-lg">内容を確認して送信</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="pagetop margin-top-md">
        <a href="#pageTop" class="center-block text-center" onclick="$('html,body').animate({scrollTop: 0}); return false;"><i class="fa fa-chevron-up center-block "></i>Page Top</a>
    </div>
    <footer class="margin-top-md" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <ul class="list-inline">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="news.php">NEWS</a></li>
                        <li><a href="shop.php">ONLINE SHOP</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                    <small>&copy; Crescent Shoes.All Rights Reserved.</small>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
