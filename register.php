<!DOCTYPE HTML>
<html lang ="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="a.css">
</head>
    
    
    
<body>
    <header>
        <img  class="logo" src="4eachblog_logo.jpg">
    </header>
    
    <div class="contents">
        <h3>会員登録</h3>
        
        <form method="post" action="register_confirm.php" enctype="multipart/form-data">
            <div class="entry_form">
                <label><p class="warning">必須</p>氏名</label>
                <input class="text" type="text" name="name" required>
            </div>
            
            <div class="entry_form">
                <label><p class="warning">必須</p>メールアドレス</label>
                <input class="text"  type="text" name="mail"
                       pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._%+-]+¥.[a-z]{2, 3}$" required>
            </div>
            
            <div class="entry_form">
                <label><p class="warning">必須</p>パスワード</label>
                <input class="text"  type="text" name="password" id="password"
                       pattern="^[a-zA-Z0-9]{6,}$" required>
            </div>
            
            <div class="entry_form">
                <label><p class="warning">必須</p>パスワード確認</label>
                <input class="text"  type="text" name="confirm_password" id="confirm"
                       oninput="ConfirmPassword(this)">
            </div>
            
            <div class="entry_form">
                <p class="profile"><label>プロフィール写真</label></p>
                <input type="hidden" name="max_file_size" value="1000000"/>
                <input class="file" type="file" name="picture"/>
            </div>
            
            <div class="entry_form">
                <label>コメント</label>
                <textarea name="comments" cols="50" rows="8"></textarea>
            </div>
                
            <input class="button" type="submit" value="登録する"/>
            
        </form>

    </div>
    
    
    <footer>
        ⓒ2018 InterNous.inc All rights reserved
    
    </footer>
    
    <script>
        function ConfirmPassword(confirm){
            var input1 = password.value;
            var input2 = confirm.value;
            
            if(input1 != input2){
                confirm.setCustomValidity("パスワードが一致しません。");
            } else {
                confirm.setCustomValidity('');
            }
        }
    </script>
    
</body>
    
</html>