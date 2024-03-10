<?php
// 複数の値 foreach

$members = [
  'name' => '下村',
  'height' => 188,
  'hobby' => 'バスケットボール',
];

// valeu
foreach($members as $member){
  echo $member;
}

// コンソールログで改行
echo "\n";
// key && valeu

foreach($members as $member => $value){
  echo $member , 'は' , $value , 'です';
}

echo "\n";

$members_2 = [
  '下村' => [
    'height' => 188,
    'hobby' => 'バスケットボール'
  ],
  '下村2' => [
    'height' => 195,
    'hobby' => 'バレーボール'
  ]
];
//多段階の配列を展開
foreach($members_2 as $member_1){
  foreach($member_1 as $member => $value){
    echo $member , "は" , $value , "です。";
  }
}
?>