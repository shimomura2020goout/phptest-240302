<?php

$text = 'あいうえお';

echo strlen($text);
echo "\n";
echo mb_strlen($text);

//置換
$str = '文字列を置換します。';
echo str_replace('文字列','もじれつう',$str)
?>