<?php

include("functions.php");

if(
    !isset($_POST["dai"]) || $_POST["dai"]=="" ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]=="" ||
    !isset($_POST["price"]) || $_POST["price"]=="" 
){
    exit('ParamError');
}

//1. POSTデータ取得
$dai   = $_POST["dai"];
$naiyou  = $_POST["naiyou"];
$price = $_POST["price"];


//2. DB接続します(エラー処理追加)
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO db_table(id, dai, naiyou, price)VALUES(NULL, :a1, :a2, :a3)");
$stmt->bindValue(':a1', $dai,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $naiyou,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $price, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    queryError($stmt);
  
  }else{
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
  }
  ?>
