<?php
session_start();
require("dbconnect.php");

$h = 'htmlspecialchars';

// ナビバーに表示するため、サインインしている場合ユーザー情報を取得
$nav = array();
if(!empty($_SESSION["user_id"])){
$sql = 'SELECT * FROM users WHERE :signin_id = id;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":signin_id",$_SESSION["user_id"],PDO::PARAM_INT);
$stmt->execute();
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
}
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ホーム</title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- bootstrap -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/home.css">
</head>
<body>
	<header>
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
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <?php if(isset($_SESSION["user_id"])){ ?>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php">HOME</a></li>
	        <li class="dropdown">
	          <a href="#" class="user_icon dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/photos/user_profile_image/<?php echo $h($rec["pic"]); ?>" width="28" class="img-circle"><?php echo $h($rec["name"]); ?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="mypage.php">マイページ</a></li>
	            <li><a href="product.php">商品一覧</a></li>
	            <li><a href="sell.php">野菜出品</a></li>
	            <li><a href="sell_data.php">出品履歴</a></li>
	            <li><a href="purchase_history.php">購入履歴</a></li>
	            <li><a href="sales.php">購入された履歴</a></li>
	            <li><a href="signout.php">サインアウト</a></li>
	          </ul>
	        </li>
	       </ul>
	    <?php }else{ ?>
	    	<ul class="nav navbar-nav navbar-right">
	    		<li><a href="index.php">HOME</a></li>
	          	<li><a href="signup.php">サインアップ</a></li>
	          	<li><a href="signin.php">サインイン</a></li>
	          	<li><a href="product.php">商品一覧</a></li>
	        </ul>
	    <?php } ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
	</nav>
<!-- /.navbar -->
</header>
<!-- cover -->
	 <div class="jumbotron">
      <div class="container">
        <h1 class="text-center title">巡り野菜</h1>
      </div>
    </div>
<!-- ./cover -->
<!-- text -->
	<div class="main container">
		<div class="row">
			<div class="text-area col-md-offset-3 col-md-6">
				<h2 class="text-center">捨てられる野菜を救おう</h2>
				<p class="text-center">毎日、食べる事ができるにも関わらず野菜たちが捨てられています。消費しきれなかったり沢山収穫し過ぎたり・・・。<br>そんな野菜たちを救うためのサイトです。<br>プロの農家さんでなくても、個人で家庭菜園されている方、野菜が余っている方でも気軽に野菜をあげる事ができます。</p>
			</div>
		</div>
		<div class="choice-area row">
			<div class="col-md-offset-3 col-md-3 text-center">
				<p class="text-center">野菜が欲しい方</p>
				<a class="btn btn-warning text-center" href="product.php" >野菜一覧</a>
			</div>
			<div class="col-md-3 text-center">
				<p class="text-center">野菜をもらった履歴</p>
				<a class="btn btn-warning text-center" href="purchase_history.php">購入履歴</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-3 text-center">
				<p class="text-center">野菜をあげたい方</p>
				<a class="btn btn-warning text-center" href="sell.php" >無料出品</a>
			</div>
			<div class="col-md-3 text-center">
				<p class="text-center">野菜をあげた履歴</p>
				<a class="btn btn-warning " href="sell_data.php">出品履歴</a>
			</div>
		</div>
	</div>
<!-- ./text -->
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

<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>