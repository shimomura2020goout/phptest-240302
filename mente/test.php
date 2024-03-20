<?php
//パスワードを記録したファイルの場所
echo __FILE__;
// C:\xampp\htdocs\xampp\phptest-240302\mente\test.php
echo'<br>';
//パスワード
echo(password_hash('password1234', PASSWORD_BCRYPT));
// $2y$10$OimlIcuLTrxfpdPi9Y0u5eKGRZkOcNG0O52Oj2hDzmReIJ/kCWYGu
echo'<br>';
//ファイル中身を表示
$contactFile = '.contact.dat';
$fileContents = file_get_contents($contactFile);
// echo $fileContents;

//ファイル書き込み(上書き)
// file_put_contents($contactFile, 'ファイルに書き込みました');

//ファイル書き込み(追加)
// file_put_contents($contactFile, 'ファイルに書き込みました2', FILE_APPEND);

//配列　file,区切る　exlode,　foreach
$allData = file($contactFile);
foreach ($allData as $lineData) {
  $lines = explode(',', $lineData);
  if (isset($lines[0])) {
    echo $lines[0]. '<br>';
  }
  if (isset($lines[1])) {
    echo $lines[1]. '<br>';
  }
  if (isset($lines[2])) {
    echo $lines[2]. '<br>';
  }
  if (isset($lines[3])) {
    echo $lines[3]. '<br>';
  }
  if (isset($lines[4])) {
    echo $lines[4]. '<br>';
  }
}
?>

