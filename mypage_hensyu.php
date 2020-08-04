<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_POST['from_mypage'])){
    header("Location:login_error.php");
}

?>


<!DOCTYPE HTML>
<html lang ="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="m_hensyu.css">
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
        
        <form method="post" action="mypage_update.php">

            <div class="profile_right">
                <div class="hensyu_form">
                    <label>氏名：</label>
                    <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name">
                </div>

                <div class="hensyu_form">
                    <label>メールアドレス：</label>
                    <input type="text" value="<?php echo $_SESSION['mail']; ?>" name="mail">
                </div>

                <div class="hensyu_form">
                    <label>パスワード：</label>
                    <input type="text" value="<?php echo $_SESSION['password'] ?>" name="password">
                </div>
            </div>
            
            <div class="hensyu_form">
                <textarea class="comments" name="comments"  cols="40" rows="4"><?php echo $_SESSION['comments']; ?></textarea>
            </div>
            
            <input class="button" type="submit" value="この内容に変更する"/>
            
        </form>

    </div>

    
</body>
    
<footer>
    ⓒ2018 InterNous.inc All rights reserved
</footer>
    
</html>