<?php 


// 変数 動的型付
$test = 12345;
$test = 'テキストを入れてみました。';

echo $test;

$test1 = 12345;
$test2 = 67890;
$test3 = $test1 . $test2;
var_dump($test3);
phpinfo();

?>