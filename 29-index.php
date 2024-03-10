<?php

$globalVariable = 'グローバル変数';

function checkScope(){
  $localVariable = 'ローカル変数';
  echo $localVariable;

}
echo $globalVariable;
checkScope();
?>