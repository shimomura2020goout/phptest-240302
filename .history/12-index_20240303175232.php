<?php

$array_member = [
  'name'=> 'シモムラ',
  'height' => 188,
  'hobby' => 'サッカー'
];

echo $array_member['hobby'];



$array_member_2 = [
  '本田'=> [
    'height' => 170,
    'hobby' => 'soccer',
  ],
  '香川'=> [
    'height' => 178,
    'hobby' => 'soccer2',  ]
];

echo $array_member_2['香川']['height'];

echo '<pre>';
var_dump($array_member_2);
echo '</pre>';

?>