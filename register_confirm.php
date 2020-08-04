<?php
    mb_internal_encoding("utf8");

    $temp_pic_name = $_FILES['picture']['tmp_name'];

    $original_pic_name = $_FILES['picture']['name'];
    $path_filename = './image/'.$original_pic_name;

    move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE HTML>
<html lang ="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
</head>

    
    
<body>
    <header>
        <img  class="logo" src="4eachblog_logo.jpg">
    </header>
    
    <div class="contents">
        <h3>会員登録　確認</h3>
            
            <p class="alert">こちらの内容で登録しても宜しいでしょうか？</p>
            <div class="entry_form">
                <p>氏名：
                <?php echo $_POST['name']; ?>
                </p>
            </div>
            
            <div class="entry_form">
                <p>メール：
                <?php echo $_POST['mail']; ?>
                </p>
            </div>
            
            <div class="entry_form">
                <p>パスワード：
                <?php echo $_POST['password']; ?>
            </div>
            
            <div class="entry_form">
                <p>プロフィール写真：
                <?php echo $original_pic_name; ?>
            </div>
            
            <div class="entry_form">
                <p>コメント：
                <?php echo $_POST['comments']; ?>
            </div>
        
            <div class="buttons">
                    <div class="button1">
                        <a href="register.php">戻って修正する</a>
                    </div>
                    <div class="submit">
                        <form action="register_insert.php" method="post">
                            <input type="hidden" value="<?php echo $_POST['name']?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail']?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password']?>" name="password">
                            <input type="hidden" value="<?php echo $original_pic_name?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_POST['comments']?>" name="comments">
                            <input type="submit" class="button2" value="登録する">
                        </form>
                    </div>
            </div>
    </div>
    
    
    <footer>
        ⓒ2018 InterNous.inc All rights reserved
    
    </footer>
    
</body>
</html>