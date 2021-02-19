<?php 
session_start();
require("dbconnect.php");
// require("signin_check.php");

$h = 'htmlspecialchars';
// ナビバーに表示するため、サインインしている場合ユーザー情報を取得
$nav = array();
if(!empty($_SESSION["user_id"])){
$sql = 'SELECT * FROM users WHERE :signin_id = id;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":signin_id",$_SESSION["user_id"],PDO::PARAM_INT);
$stmt->execute();
$nav = $stmt->fetch(PDO::FETCH_ASSOC);
}

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>登録ありがとうございます</title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/thanks.css">
</head>
<body>
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
	      <a class="navbar-brand" href="index.php">巡り野菜</a>
	  </div><!-- /.container -->
	</nav>
<!-- /.navbar -->
	</header>
	<div class="box text-center">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<h3>登録ありがとうございます。</h3>
			</div>
		</div>
		<div class="row to_login">
			<div class="col-md-offset-4 col-md-4">
				<p>続けてサインイン➡︎
				<a class="btn btn-danger" href="signin.php">サインイン画面へ</a></p>
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