<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
//if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
//    exit("Login Error");
//}else{
//    session_regenerate_id(true);
//    $_SESSION["chk_ssid"] = session_id();
//}
sschk();


//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM book_detail_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
/* div{padding: 10px;font-size:16px;}
td,th{border: 1px solid black;}
div { padding: 10px; font-size: 16px; } */
table { width: 100%; table-layout: fixed; border-collapse: collapse; }
td, th { border: 1px solid black; }
th { text-align: center; background-color: #f2f2f2; }
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?=$_SESSION["name"]?>さん、こんにちは！
        <!-- <?=$_SESSION["name"]?>さん、こんにちは！ -->
      <a class="navbar-brand" href="index.php">データ登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>

      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    
    <div class="container jumbotron"> 
      <table>
        <!--  テーブルのヘッダーを追加 -->
        <thead>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>書籍名</th>
            <th>URL</th>
            <th>ジャンル</th>
            <th>年齢</th>
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
              <th>操作</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>

      <table>
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?=$v["id"]?></td>
          <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["name"]?></a></td>
          <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["bookname"]?></a></td>
          <td><a href="<?=$v["url"]?>" target="_blank">Amazon</a></td>
          <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["genre"]?></a></td>
          <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["age"]?></a></td>
          <?php if($_SESSION["kanri_flg"]=="1"){ ?>
            <td><a href="delete.php?id=<?=$v["id"]?>">[削除]</a></td>
            <?php } ?>          
        </tr>
        <?php } ?>
      </table>
  </div>
</div>
<!-- Main[End] -->





<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>