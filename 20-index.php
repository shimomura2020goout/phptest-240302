<?php

// for (continue, break)
for($i = 0; $i < 10; $i++){
  if($i === 5){
    // break;
    continue;
  }
  echo $i;
}

//while

echo "\n";

$j = 0;
while($j < 5){
  echo $j;
  $j++;
}

?>