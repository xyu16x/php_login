<?php
//必要な文
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//親クラス呼び出し
require "DB.php";

$db = new DB();
$pdo = $db->connect();

//DB接続
try{
    $pdo;
} catch (PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>
    しばらくしてから再度ログインをして下さい。</p>
    <a href='hettp://localhost/login_mypage/login.php'>ログイン画面へ</a>"
        );
}
//DB接続する際は、ここまで固定文


//値を更新する
$stmt = $pdo->prepare($db->update());

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_POST['comments']);
$stmt->bindValue(5, $_SESSION['id']);

$stmt->execute();


//更新した値を取得
$stmt = $pdo->prepare($db->select_update());
$stmt->bindValue(1, $_SESSION["id"]);

$stmt->execute();

$pdo = NULL;

//SESSIONに代入
while ($row = $stmt->fetch()){
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
    
}

//リダイレクト
header('Location:mypage.php');

?>