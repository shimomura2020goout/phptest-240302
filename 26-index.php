<?php
//指定文字列で分割
$str_2 = '指定文字列で、分割するよ！';

var_dump(explode('、', $str_2));

//implode
$str_3 = '指定の文字列が含まれるか確認する';

echo preg_match('/文字列/', $str_3);
echo "\n";

echo mb_substr('かきくけこ', 2);
?>