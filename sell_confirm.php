<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/sell_confirm.css">
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
				 		<li><a href="#">サインイン</a></li> -->
				 		<li><a href="signout.php">サインアウト</a></li>
				 		<li><a href="mypage.php">マイページ</a></li>
				 		<li><a href="product.php">野菜一覧へ</a></li>
			   		</ul>
       			</div>
  			</div>
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
				<div class="col-md-offset-4 col-md-2">
					<h4>商品名：</h4>
				</div>
				<div class="col-md-2">
					<h4>茄子</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-4 col-md-2">
					<h4>個数・数量：</h4>
				</div>
				<div class="col-md-2">
					<h4>9個</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-4 col-md-2">
					<h4>取引場所</h4>
				</div>
				<div class="col-md-2">
					<h4>長野県長野市</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-4 col-md-2">
					<h4>説明・コメント：</h4>
				</div>
				<div class="col-md-4">
					<h4>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</h4>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-offset-4 col-md-2">
					<h4>商品画像：</h4>
				</div>
				<div class="col-md-4 product_img">
					<img src="assets/photos/nasubi.jpg">
				</div>
			</div>
			<div class="row btn_zone">
				<div clasS="col-md-offset-3 col-md-6 text-center">
					<h4>以上の内容で出品しますか？</h4>
				</div>
			</div>
			<div class="row btn_zone">
				<div clasS="col-md-offset-3 col-md-6 text-center">
					<a class="btn btn-danger" href="thanks_sell.php">出品する</a>
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