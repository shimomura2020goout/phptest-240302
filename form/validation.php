<?php

function validation($request){ //$_POST連想配列

  $errors = [];

  if(empty($request['your_name']) || 20 < mb_strlen($request['your_name']) ) {
    $errors[] = '氏名を入力してください。20文字以内にしてください。';
  }

  if(empty($request['contact']) || 200 < mb_strlen($request['contact']) ) {
    $errors[] = '問い合わせ内容を入力してください。200文字以内にしてください。';
  }

  if(empty($request['caution'])){
    $errors[] = '注意事項のチェックは必須です。';
  }


  if(empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL,)){
    $error[] = 'メールアドレスは正しい形式で入力ください。';
  }

  if(!empty($request['url'])){
    if(!filter_var($request['url'], FILTER_VALIDATE_URL)){
      $error[] = 'ホームページは正しいURLで入力ください。';
    }
  }

  if(!isset($request['gender'])){
    $error[] = '性別選択は必須です。';
  }

  if(empty($request['age']) || 6 < $request['age']){
    $error[] = '年齢選択は必須です。';
  }


  return $errors;

}

?>