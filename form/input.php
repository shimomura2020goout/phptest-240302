<?php
session_start();

require 'validation.php';
// require 'insert.php';

header('X-FRAME-OPTIONS:DENY');
if(!empty($_POST)){
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES,"UTF-8");
  }

$pageFlag = 0;
$errors = validation($_POST);

if(!empty($_POST['btn_confirm']) && empty($errors)){
  $pageFlag = 1;
}
if(!empty($_POST['btn_submit'])){
  $pageFlag = 2;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
<body>


<?php if($pageFlag === 1 ) : ?>

<?php if(isset($_POST['csrf']) && $_POST['csrf'] === $_SESSION['csrfToken']) : ?>
  
  <form method="POST" action="input.php">
    氏名
    <?php echo h($_POST['your_name']) ;?>
  <br>
  メールアドレス
  <?php echo h($_POST['email']) ;?>
    <br>
  ホームページ
  <?php echo h($_POST['url']) ;?>
  <br>
  性別
  <?php
    if($_POST['gender'] === '0'){ echo 'mens'; }
    if($_POST['gender'] === '1'){ echo 'ladys'; }
?>
  <br>
  年齢
  <?php
    if($_POST['age'] === '1'){ echo '-19'; }
    if($_POST['age'] === '2'){ echo '20-'; }
    if($_POST['age'] === '3'){ echo '30-'; }
    if($_POST['age'] === '4'){ echo '40-'; }
    if($_POST['age'] === '5'){ echo '50-'; }
    if($_POST['age'] === '6'){ echo '60-'; }
  ?>
  <br>
  問い合わせ内容
  <br>
  <input type="submit" name="back" value="戻る">
  <input type="submit" name="btn_submit" value="送信する">
  <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']) ;?>">
  <input type="hidden" name="email" value="<?php echo h($_POST['email']) ;?>">
  <input type="hidden" name="url" value="<?php echo h($_POST['url']) ;?>">
  <input type="hidden" name="gender" value="<?php echo h($_POST['gender']) ;?>">
  <input type="hidden" name="age" value="<?php echo h($_POST['age']) ;?>">
  <input type="hidden" name="contact" value="<?php echo h($_POST['contact']) ;?>">
  <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']) ;?>">
</form>
<?php endif; ?>
<?php endif; ?>

<?php if($pageFlag === 2 ) : ?>
  <?php 
  if($_POST['csrf'] === $_SESSION['csrfToken'])
:?>

// DB接続
<?php require '../mente/insert.php';
insertContact($_POST);
?>
// DB保存


  送信完了しました。
<?php unset($_SESSION['csrfToken']); ?>
<?php endif; ?>
<?php endif; ?>

<?php if($pageFlag === 0 ) : ?>
<?php
  if(!isset($_SESSION['csrfToken'])){
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
  }
  $token = $_SESSION['csrfToken']; //短い変数で戻り値として活用したいために変数化した
?>

  <?php if(!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
  <?php echo '<ul>' ;?>
  <?php
  foreach($errors as $error){
      echo '<li>' . $error . '</li>';
    }
  ?>
  <?php echo '</ul>' ;?>
    <?php endif ;?>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="input.php">
          <div class="form-group">
            <label for="your_name">氏名</label>
            <input type="text" class="form-control" id="your_name" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name']) ;} ?>" required>
          </div>
          <div class="form-group">
            <label for="email">メール</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']) ;} ?>" required>
          </div>
          <div class="form-group">
            <label for="url">ホームページ</label>
          <input type="url" class="form-control" id="url" name="url" value="<?php if(!empty($_POST['url'])){echo h($_POST['url']) ;} ?>" required>
          </div>
          <div class="form-group">
            <label for="gender">性別</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="gender1" name="gender" value="0"
                <?php if(isset($_POST['gender']) && $_POST['gender'] === '0') { echo 'checked'; } ?>>
                <label for="gender1" class="form-check-label">男性</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="gender2" name="gender" value="1"
                <?php if(isset($_POST['gender']) && $_POST['gender'] === '1') { echo 'checked'; } ?>>
                <label for="gender2" class="form-check-label">女性</label>
            </div>
          </div>
          <div class="form-group">
            <label for="age">年齢</label>
            <select name="age">
                <option value="">選択してください</option>
                <option value="1">19歳まで</option>
                <option value="2">20歳</option>
                <option value="3">30歳</option>
                <option value="4">40歳</option>
                <option value="5">50歳</option>
                <option value="6">60歳以上</option>
            </select>
          </div>
          <div class="form-group">
            <label for="contact">問い合わせ内容</label>
            <textarea class="form-control" id="contact" name="contact" rows="3"><?php if(!empty($_POST['contact'])){echo h($_POST['contact']) ;} ?></textarea>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="caution" name="caution" value="1">
            <label for="caution" class="form-check-label">注意事項</label>
          </div>
          <br>
          <inputtype="hidden" name="csrf" value="<?php echo $token; ?>">
          <input class="btn btn-info" type="submit" name="btn_confirm" value="確認する">
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>