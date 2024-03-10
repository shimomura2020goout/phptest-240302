<?php

// if(条件){
//   条件が真なら実行
// }

  $height = 188;

  if ($height !== 1988){
    echo $height , 'cmです。';
  }else{
    echo $height ,'cmではありません。';
  }

// データの存在チェック　空だったら
// isset empty is_null

$test = '';

if(empty($test)){
  echo '変数は空です。';
}

// データの存在チェック 空ではない

$test = '1';

if(!empty($test)){
  echo '変数は空ではありません。';
}

//三項演算子
//if else
//条件 ? 真 : 偽

$math = 79;
$comment = $math >= 80 ? 'good' : 'not good';

echo $comment;




?>