<?php 
session_start();
require('dbconnect.php');
//空チェック
$errors = array();

$email = '';
$password = '';

//クッキー情報の存在をチェックし、あれば、POST送信されてきたように$_POST変数へ代入
  if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])){
    $_POST["input_email"] = $_COOKIE['email'];
    $_POST["input_password"] = $_COOKIE['password'];
    $_POST["save"] = "on";
  }

if(!empty($_POST)){
	$email = $_POST["input_email"];
	$password = $_POST["input_password"];

	$_POST["save"] = '';

	//メールアドレスのデータが一致すれば処理を実行
	if (($email != '') && ($password != '')) {
		//データベースとの照合処理
		$sql = 'SELECT * FROM users WHERE email = :email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":email",$email,PDO::PARAM_STR);
		$stmt->execute();
		$record = $stmt->fetch(PDO::FETCH_ASSOC);

		//メールアドレスでの本人確認
		if($record == false){
			$errors["signin"] = 'failed';
		}

		//パスワードのデータが一致するかどうか検証
		if($password && isset($record["password"]) && password_verify($password,$record["password"])){
			//一致した場合、SESSION変数にIDを保存(ユーザーがログインしているかの判断材料にするため)
			$_SESSION["user_id"] = $record["id"];

			//自動ログインが指示されていたら、クッキーにログイン情報を保存
			if ($_POST["save"] == "on"){
	            //time() 現在時間を1970/01/01 0:00:00から秒数で表した数字
	            //2週間後を有効期限に設定している
	            setcookie('email',$email,time() + 60*60*24*14);
	            setcookie('password',$password,time() + 60*60*24*14);
	        }
			//timeline.phpに移動
			header("Location:home.php");
			exit();
		}else{
			$errors["signin"] = "failed";
		}
	}else{
		$errors["signin"] = 'blank';
	}

}

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>サインイン</title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/signin.css">
	<script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
</head>
<body>
	<script src="assets/js/enter.js"></script>
	<header>
<!-- navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="home.php">巡り野菜</a>
	  </div><!-- /.container -->
	</nav>
<!-- /.navbar -->
	</header>
	<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Learn SNS</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3 ">
        <h2 class="text-center content_header">ログイン</h2>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="input_email" class="form-control" id="email" placeholder="example@gmail.com">
            <?php if(isset($errors["signin"]) && ($errors["signin"] == "blank")){ ?>
          	<p class="text-danger">※メールアドレスとパスワードを正しく入力してください</p>
          	<?php } ?>
            <?php if ((isset($errors["signin"])) && ($errors["signin"] == 'failed')){ ?>
            <p class="text-danger">サインインに失敗しました</p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="input_password" class="form-control" id="password" placeholder="4 ~ 16文字のパスワード">
          </div>
          <div class="form-group">
          <label>自動サインイン</label>
          <input type="checkbox" name="save" value="on" checked>
      	  </div>
          <input type="submit" class="btn btn-danger" value="ログイン">
          <a href="signup.php" style="float: right; padding-top: 6px;" class="text-success">未登録の方はこちら</a>
        </form>
      </div>
    </div>
  </div><!-- 
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html> -->
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