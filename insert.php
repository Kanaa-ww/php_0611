<?php

//1. POSTデータ取得
$name      =  $_POST["name"];
$bookname  =  $_POST["bookname"];
$url       =  $_POST["url"];
$genre     =  $_POST["genre"];
$age       =  $_POST["age"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO book_detail_table(name, bookname, url, genre, age, date) VALUES(:name, :bookname, :url, :genre, :age, sysdate())");

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
    echo "SQLエラー: " . $error[2];
    exit;
} else {
    redirect("index.php");
}
?>

