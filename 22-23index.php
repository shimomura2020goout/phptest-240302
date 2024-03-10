<?php
//引数2つ、戻り値あり
function sumPrice($int1, $int2){
  $int3 = $int1 * $int2;
  return $int3;
}

$total = sumPrice(9,5);
echo $total;
?>