<?php 
session_start();
require("signin_check.php");
require("dbconnect.php");

$h = "htmlspecialchars";
// ナビバーに表示するため、サインインしている場合ユーザー情報を取得
$nav = array();
if(!empty($_SESSION["user_id"])){
$sql = 'SELECT * FROM users WHERE :signin_id = id;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":signin_id",$_SESSION["user_id"],PDO::PARAM_INT);
$stmt->execute();
$nav = $stmt->fetch(PDO::FETCH_ASSOC);
}

//ログインしているユーザーのidと商品のuser_idが一致しているデータを取得
$sql = 'SELECT * FROM vegetables WHERE user_id = :signin_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":signin_id",$_SESSION["user_id"],PDO::PARAM_INT);
$stmt->execute();

//購入された商品に「購入されました」と表示するために処理を行う
$one_sell_data = array();
while(1){
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec == false){
		break;
	}
	// if($rec["display_flag"] == '1'){
	// 	$sold = 'sold';
	// 	$sold_id = $rec["id"];
	// }
	$one_sell_data[] = $rec;
}

//削除ボタンが押されたらvegetableテーブルからデータを削除する
if(!empty($_POST)){
	$sql = 'DELETE FROM vegetables WHERE :vege_id = id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":vege_id",$_POST["delete"],PDO::PARAM_INT);
	$stmt->execute();

	header("Location:sell_data.php");
	exit();
}
?>
<!DOCTYPE html> 
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>出品履歴</title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/sell_data.css">
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
	          <a href="#" class="user_icon dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/photos/user_profile_image/<?php echo $h($nav["pic"]); ?>" width="28" class="img-circle"><?php echo $h($nav["name"]); ?><span class="caret"></span></a>
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
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 text-center title">
				<h2>あなたの出品一覧</h2>

			</div>
		</div>
	</div>
	<div class="main">
	<?php
	$i = 0;
	foreach($one_sell_data as $each_vege){
		$count = count($one_sell_data);
		include("one_exibition.php");
	} 

	//出品した商品がない場合テキストを表示する
	if(empty($one_sell_data)){?>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<h4 class="text-center">-出品した商品はありません-</h4>
		</div>
	</div>
	<?php } ?>
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