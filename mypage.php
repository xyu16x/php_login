<?php
mb_internal_encoding("utf8");
session_start();

//親クラス呼び出し
require "DB.php";

$db = new DB();
$pdo = $db->connect();

if(empty($_SESSION['id'])){

try{
    $pdo;
} catch (PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>
    しばらくしてから再度ログインをして下さい。</p>
    <a href='hettp://localhost/login_mypage/login.php'>ログイン画面へ</a>"
        );
}


$stmt = $pdo->prepare($db->select_login());

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

$stmt->execute();

$pdo = NULL;

while ($row = $stmt->fetch()){
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
    
}

if(empty($_SESSION['id'])) {
    header('Location:login_error.php');
}
    
if(!empty($_POST['login_keep'])){
    $_SESSION['login_keep'] = $_POST['login_keep'];
}
}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){
    setcookie('mail', $_SESSION['mail'], time()+60*60*24*7);
    setcookie('password', $_SESSION['password'], time()+60*60*24*7);
    setcookie('login_keep', $_SESSION['login_keep'], time()+60*60*24*7);
} else if(empty($_SESSION['login_keep'])){
    setcookie('mail', time()-1);
    setcookie('password', time()-1);
    setcookie('login_keep', time()-1);
}
?>


<!DOCTYPE HTML>
<html lang ="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<body>
    <header>
        <img  src="4eachblog_logo.jpg">
        <a href ="log_out.php">ログアウト</a>
    </header>
 
    <div class="contents">
        <h3>会員情報</h3>
        <p class="greeting"><?php echo "こんにちは！".$_SESSION['name']."さん"; ?></p>
        
        <div class="profile_left">
            <img src="<?php echo "./image/".$_SESSION['picture']; ?>"/>
        </div>
        
        <div class="profile_right">
            <div class="profile">
                <label>氏名：</label>
                <a><?php echo $_SESSION['name']; ?></a>
            </div>
            
            <div class="profile">
                <label>メールアドレス：</label>
                <a><?php echo $_SESSION['mail']; ?></a>
            </div>
            
                <div class="profile">
                <label>パスワード：</label>
                <a><?php echo $_SESSION['password']; ?></a>
            </div>
        </div>
            
        <div class="comments">
            <?php echo $_SESSION['comments']; ?>
        </div>    
            
        <form action="mypage_hensyu.php" method="post">   
            <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
            <input class="button" type="submit" value="編集する"/>
        </form>

    </div>
    
</body>
    
<footer>
    ⓒ2018 InterNous.inc All rights reserved
</footer>
    
</html>