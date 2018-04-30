<?php 
  session_start();
  $h = 'htmlspecialchars';
  //データベースに接続
  require('dbconnect.php');
  //直接check.phpに訪れられた時はsignup.phpに強制遷移させる
  if(!isset($_SESSION['register'])){
    header("Location:signup.php");
    exit();
  }

  //signup.phpから送られてきたSESSION変数をわかりやすい変数に代入
  $name = $_SESSION['register']['name'];
  $postal_code = $_SESSION['register']['postal_code'];
  $address = $_SESSION['register']['address'];
  $email = $_SESSION['register']['email'];
  $password = $_SESSION['register']['password'];
  $pic = $_SESSION['register']['pic'];

  // 登録ボタンが押された時のみ処理するif文
  if(!empty($_POST)){
    $sql = 'INSERT INTO users (name,postal_code,address,email,password,pic,created) VALUES(:name,:postal_code,:address,:email,:password,:pic,NOW());';
    // $sql = 'INSERT INTO `users` SET `name`=?,`postal_code` = ?,`address` = ?,`email` = ?,`password` = ?,`pic` = ?,`created` = NOW()';
    // $data = array($name,$postal_code,$address,$email,password_hash($password,PASSWORD_DEFAULT),$pic); //⬅︎⬆この組み合わせは数が合わなかったり間違えたりする。︎
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':postal_code',$postal_code,PDO::PARAM_INT);
    $stmt->bindValue(':address',$address,PDO::PARAM_STR);
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    $stmt->bindValue(':password',password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
    $stmt->bindValue(':pic',$pic,PDO::PARAM_STR);
    // $stmt->execute($data);
    $stmt->execute();

    unset($_SESSION['register']);
    header('Location:thanks.php');
    exit();

  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/check.css">
</head>
<body>
	<header>
<!-- navbar -->
		<nav class="navbar  navbar-inverse  navbar-fixed-top">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"> Toggle navigation</span>
					<span class="icon-bar"> </span>
					<span class="icon-bar"> </span>
					<span class="icon-bar"> </span>
				</button>
				<a class="navbar-brand" href="home.php">巡り野菜</a>
				<div class="navbar-collapse collapse">
	        	<ul class="nav navbar-nav navbar-right">
  			     	<!-- <li><a href="#">新規登録</a></li>
  				 		<li><a href="#">サインイン</a></li>
  				 		<li><a href="#">マイページ</a></li> -->
			   		</ul>
       	</div>
  		</div>
		</nav>
<!-- /.navbar -->
	</header>
	<body style="margin-top: 60px">
  <div class="container">
    <div class="row box">
      <div class="col-xs-8 col-xs-offset-2">
        <h2 class="text-center content_header">アカウント情報確認</h2>
        <div class="row">
          <div class="col-md-offset-2 col-md-2">
            <!-- <img src="../user_profile_img/<?php //echo htmlspecialchars($img_name); ?>" class="img-responsive img-thumbnail"> -->
            <img class="globe" src="assets/photos/user_profile_image<?php echo $h($pic); ?>">
          </div>
          <div class="col-md-offset-2 col-md-6">
            <div>
              <span>ユーザー名</span>
              <p class="lead"><?php echo $h($name); ?></p>
            </div>
            <div>
              <span>郵便番号</span>
              <p class="lead"><?php echo '〒: '.$h($postal_code); ?></p>
              <span>住所</span>
              <p class="lead"><?php echo $h($address); ?></p>
            </div>
            <div>
              <span>メールアドレス</span>
              <p class="lead"><?php echo $h($email); ?></p>
            </div>
            <div>
              <span>パスワード</span>
              <p class="lead">●●●●●●●●</p>
            </div>
            <form method="POST" action="">
              <a href="signup.php?action=rewrite" class="btn btn-default">&laquo;&nbsp;戻る</a> |
              <input type="hidden" name="action" value="submit">
              <input type="submit" class="btn btn-danger" value="ユーザー登録">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	<footer>
    <div class="navbar  navbar-inverse navbar-fixed-bottom"> 
        <div class="container">
            <div class="navbar-text pull=left">
            <p> © meguriyasai 2018.</p>
          </div>
          <div class="navbar-text pull=right">
            <a href="mailto:yukiyohure@gmail.com">お問い合わせはこちら</a>
          </div>
          <div class="navbar-text pull=right">
            <a href="rule.php">特定商標取引表示</a>
          </div>
      </div>
    </div>
  </footer>

<!-- navbar -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>