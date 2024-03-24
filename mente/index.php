<?php

require_once 'db_connection.php';

// //ユーザ入力なし query
// $sql = 'select * from contacts where id = 1';
// $stmt = $PDO->query($sql);
// $result = $stmt->fetchall();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// // exit;  

//ユーザ入力あり prepare bind execute
$sql = 'select * from contacts where id = :id'; //名前付きプレースホルダー
$stmt = $PDO->prepare($sql); //プリペアードステートメント
$stmt->bindValue(':id', 1, PDO::PARAM_INT); //紐づけ
$stmt->execute(); //実行

echo '<pre>';
var_dump($stmt);
echo '</pre>';
// exit;  

//トランザクション
$PDO->beginTransaction();

try{

//SQL処理
$stmt = $PDO->prepare($sql); //プリペアードステートメント
$stmt->bindValue(':id', 1, PDO::PARAM_INT); //紐づけ
$stmt->execute(); //実行

$PDO->commit();

}catch(PDOException $e){
  $PDO->rollBack();
  echo '<pre>';
  var_dump($e);
  echo '</pre>';
  exit;
}
?>

