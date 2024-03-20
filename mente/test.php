<?php
//パスワードを記録したファイルの場所
echo __FILE__;
// C:\xampp\htdocs\xampp\phptest-240302\mente\test.php
echo'<br>';
//パスワード
echo(password_hash('password1234', PASSWORD_BCRYPT));
// $2y$10$OimlIcuLTrxfpdPi9Y0u5eKGRZkOcNG0O52Oj2hDzmReIJ/kCWYGu
?>

