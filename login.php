<?php 
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE HTML>
<html lang ="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
    
<body>
    <header>
        <img  class="logo" src="4eachblog_logo.jpg">
        <a href ="login.php">ログイン</a>
    </header>
    
    <div class="contents">
        <form method="post" action="mypage.php">
        
            <div class="login_form">
                <label><p>メールアドレス</p></label>
                <input class="text" type="text" name="mail" value="<?php echo $_COOKIE['mail']; ?>"required>
            </div>
            
            <div class="login_form">
                <label><p>パスワード</p></label>
                <input class="text" type="text" name="password" value="<?php echo $_COOKIE['password']; ?>" required>
            </div>
            
            <div class="login_check">
                <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep"
                    <?php 
                        if(isset($_COOKIE['login_keep'])){
                            echo "checked='checked'";
                        } ?>>ログイン状態を保持する</label>
            </div>
        
            <input class="button" type="submit" value="ログイン"/>
            
        </form>
    </div>
    
    <footer>
        ⓒ2018 InterNous.inc All rights reserved
    </footer>