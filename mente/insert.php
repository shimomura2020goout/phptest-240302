<?php

//DB PDO
function insertContact($request){
require 'db_connect.php';

$params = [
  'name' => $request['your_name'],
  'email' => $request['email'],
  'url' => $request['url'],
  'gender' => $request['gender'],
  'age' => $request['age'],
  'contact' => $request['contact'],
  ];




$count = 0;
$columns = '';
$values = '';

foreach(array_keys($params) as $key){
  if($count++ > 0){
    $columns .= ',';
    $values .= ',';
  }
  $columns .= $key;
  $values .= ':' . $key;
}

$sql = 'insert into contacts ('. $columns .') values ('. $values .')'; //SQL
$stmt = $PDO->prepare($sql); //プリペアードステートメント
$stmt->execute($params); //実行
}
//insert->DB

?>