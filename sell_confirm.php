<?php
session_start();
require 'vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;

require("signin_check.php");
//データベースに接続
require("dbconnect.php");
require("cloudinaryConnect.php");

//直接sell_cconfirm.phpに訪れられた時はsell.phpに強制遷移させる
if(!isset($_SESSION["vege"])){
	header("Location:sell.php");
	exit();
}

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

//sell.phpから送られてきたSESSION関数を簡単な名前の変数に代入
$name = $_SESSION["vege"]["name"];
$place = $_SESSION["vege"]["place"];
$amount = $_SESSION["vege"]["amount"];
$unit = $_SESSION["vege"]["unit"];
$description = $_SESSION["vege"]["description"];
$pic = $_SESSION["vege"]["pic"];

//出品するボタンが押されたら処理する
if(!empty($_POST)){
	$ret = (new UploadApi())->upload('assets/photos/vegetable_image/'.$pic);

	$sql = "INSERT INTO vegetables (name,trade_place,amount,unit,description,pic,created,user_id) VALUES(:name,:trade_place,:amount,:unit,:description,:pic,NOW(),:user_id);";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":name",$name,PDO::PARAM_STR);
	$stmt->bindValue(":trade_place",$place,PDO::PARAM_STR);
	$stmt->bindValue(":amount",mb_convert_kana($amount,'n'),PDO::PARAM_STR);//全角数字のデータを送信時に半角に変換
	$stmt->bindValue(":unit",$unit,PDO::PARAM_STR);
	$stmt->bindValue(":description",$description,PDO::PARAM_STR);
	$stmt->bindValue(":pic",$ret["url"],PDO::PARAM_STR);
	$stmt->bindValue(":user_id",$_SESSION["user_id"],PDO::PARAM_INT);
	$stmt->execute();

	unset($_SESSION["vege"]);
	header("Location:thanks_sell.php");
	exit();
}

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>出品内容確認</title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/sell_confirm.css">
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
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <?php if(isset($_SESSION["user_id"])){ ?>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php">HOME</a></li>
	        <li class="dropdown">
	          <a href="#" class="user_icon dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $h($nav["pic"]); ?>" width="28" class="img-circle"><?php echo $h($nav["name"]); ?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="mypage.php">マイページ</a></li>
	            <li><a href="product.php">野菜一覧</a></li>
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
	          	<li><a href="signup.php">サインアップ</a></li>
	          	<li><a href="signin.php">サインイン</a></li>
	          	<li><a href="product.php">野菜一覧</a></li>
	        </ul>
	    <?php } ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
	</nav>
<!-- /.navbar -->
	</header>
	<div class="box">
		<div classs="row">
			<div class="col-md-offset-3 col-md-6 title text-center">
				<h2>入力情報確認</h2>
			</div>
		</div>
		<div class="confirm_box">
			<div class="row">
				<div class="text-right col-md-offset-4 col-md-2">
					<h4>野菜名：</h4>
				</div>
				<div class="col-md-2">
					<h4><?php echo $h($name); ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="text-right col-md-offset-4 col-md-2">
					<h4>取引場所：</h4>
				</div>
				<div class="col-md-2">
					<h4><?php echo $h($place); ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="text-right col-md-offset-4 col-md-2">
					<h4>個数・数量：</h4>
				</div>
				<div class="col-md-2">
					<h4><?php echo $h($amount).$h($unit); ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="text-right col-md-offset-4 col-md-2">
					<h4>説明・コメント：</h4>
				</div>
				<div class="col-md-4">
					<h4><?php echo $h($description); ?></h4>
				</div>
			</div>
			<div class="row ">
				<div class="text-right col-md-offset-4 col-md-2">
					<h4>野菜画像：</h4>
				</div>
				<div class="col-md-4 product_img">
					<img src="assets/photos/vegetable_image/<?php echo $h($pic); ?>">
				</div>
			</div>
			<div class="row btn_zone">
				<div clasS="col-md-offset-3 col-md-6 text-center">
					<h4>以上の内容で出品しますか？</h4>
				</div>
			</div>
			<div class=" col-md-offset-3 col-md-6 text-center">
				<form method="POST" action="">
	            <a href="sell.php?reaction=rewrite" class="btn btn-default">&laquo;&nbsp;戻る</a>
	            <input type="hidden" name="reaction" value="submit">
	            <input type="submit" class="btn btn-danger" value="出品する">
			</div>
			<div class="col-md-offset-3 col-md-6 text-center">
				<p>※[戻る]を押した場合、野菜画像を再選択する必要があります</p>
			</div>
			</form>
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