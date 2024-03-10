<?php

$array_1 = [1,2,3];

$array_2 = [
  ['一段目1','一段目2','一段目3'],
  ['二段目1','二段目2','二段目3']
];

echo '<pre>';
var_dump($array_2);
echo '</pre>';

echo $array_2 [1][2];

?>