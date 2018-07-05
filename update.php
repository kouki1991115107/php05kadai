<?php
include("functions.php");
//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["dai"];
$email  = $_POST["naiyou"];
$naiyou = $_POST["price"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE db SET name=:name, email=:email, naiyou=:naiyou WHERE id=:id");
$stmt->bindValue(':dai',  $dai,   PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou,  PDO::PARAM_STR);
$stmt->bindValue(':price',$price, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: select.php");
  exit;
}

?>
