<?php

$contactFile = '.contact.dat';
//fileOpenして変数に格納
$contents = fopen($contactFile, 'a+');

//書き込みするテキストを変数に格納
$addText = 'テストです' . "\n";
// 書き込み関数
fwrite($contents, $addText);
//ファイルを閉じる
fclose($contents);
?>

