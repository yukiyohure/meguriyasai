<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/mypage.css">
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
			     		<!-- <li><a href="signup.php">会員登録</a></li> -->
				 		<!-- <li><a href="signin.php">サインイン</a></li> -->
				 		<!-- <li><a href="mypage.php">マイページ</a></li> -->
				 		<li><a href="signout.php">サインアウト</a></li>
				 		<li><a href="product.php">野菜一覧へ</a></li>
			   		</ul>
       			</div>
  			</div>
		</nav>
<!-- /.navbar -->
	</header>
	<div class="text-center">
		<h3>マイページ</h3>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-2">
		<img class="globe" src="assets/photos/ironman.jpg">
		</div>
		<div class="col-md-2 text-center">
			<h4>名前：ゆうき</h4>
			<h4>email：teat@test</h4>
			<a class="btn btn-danger" href="sell_data.php">出品履歴</a><br>
			<a class="btn btn-danger" href="buy_data.php">購入履歴</a><br>
			<a class="btn btn-danger" href="sales.php">買われた記録</a>
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