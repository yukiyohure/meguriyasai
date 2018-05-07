<?php 
session_start();
require("dbconnect.php");
require("signin_check.php");

$h = 'htmlspecialchars';

// ナビバーに表示するため、サインインしている場合ユーザー情報を取得
$rec = array();
if(!empty($_SESSION["user_id"])){
$sql = 'SELECT * FROM users WHERE :signin_id = id;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":signin_id",$_SESSION["user_id"],PDO::PARAM_INT);
$stmt->execute();
$nav = $stmt->fetch(PDO::FETCH_ASSOC);
}

$user_id = $_SESSION["user_id"];

$sql = 'SELECT id FROM vegetables WHERE :created = created';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":created",$_SESSION["created"],PDO::PARAM_STR);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$vegetable_id = $rec["id"];

if(!empty($_POST)){
	$sql = 'INSERT INTO buy_data (buy_day,user_id,vegetable_id) VALUES(NOW(),:user_id,:vegetable_id)';
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":user_id",$user_id,PDO::PARAM_INT);
	$stmt->bindValue(":vegetable_id",$vegetable_id,PDO::PARAM_INT);
	$stmt->execute();

	header("Location:thanks_sell.php");
	exit();
}
 ?>
}
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/buy.css">
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
	      <a class="navbar-brand" href="home.php">巡り野菜</a>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <?php if(isset($_SESSION["user_id"])){ ?>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="home.php">HOME</a></li>
	        <li class="dropdown">
	          <a href="#" class="user_icon dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/photos/user_profile_image/<?php echo $h($nav["pic"]); ?>" width="18" class="img-circle"><?php echo $h($nav["name"]); ?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="mypage.php">マイページ</a></li>
	            <li><a href="sell.php">野菜出品</a></li>
	            <li><a href="product.php">商品一覧</a></li>
	            <li><a href="sell_data.php">出品履歴</a></li>
	            <li><a href="sales.php">購入された履歴</a></li>
	            <li><a href="signout.php">サインアウト</a></li>
	          </ul>
	        </li>
	       </ul>
	    <?php }else{ ?>
	    	<ul class="nav navbar-nav navbar-right">
	          	<li><a href="signup.php">新規登録</a></li>
	          	<li><a href="signin.php">サインイン</a></li>
	          	<li><a href="product.php">商品一覧</a></li>
	        </ul>
	    <?php } ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
	</nav>
<!-- /.navbar -->
	</header>
	<div class="main container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 title text-center">
				<h2 clss="text-center">野菜の確認</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6 text-center">
				<img class="vege_img" src="assets/photos/vegetable_image/<?php echo $_SESSION["pic"]; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="text-center">
					<h4><?php echo $_SESSION["name"]; ?>　
						<?php echo $_SESSION["amount"]; ?>
						<?php echo $_SESSION["unit"]; ?>
					</h4>
					<p><?php echo $_SESSION["description"];?></p>
					<p><?php echo $_SESSION["created"]; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4 text-center">
				<form method="post" action="">
					<a class="btn btn-default" href="product.php">戻る</a>
					<input type="hidden" name="bought">
					<input class="btn btn-danger" type="submit" value="貰う">
				</form>
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