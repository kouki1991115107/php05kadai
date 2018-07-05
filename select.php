<?php
session_start();

include("functions.php");
chk_ssid();

$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM db_table");
$status = $stmt->execute();

$view="";
if($status==false){
    queryError($stmt);
  }else{
    //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<p>';
      $view .= '<a href="detail.php?id='.$result["id"].'">';
      $view .= h($result["dai"])."[".h($result["naiyou"])."]".":".h($result["price"])."円";
      $view .= '</a>　';
      $view .= '</p>';
    }
  }
  ?>

  <!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>家計簿アプリ</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      <a class="navbar-brand" href="logout.php">logout</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>

