<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/sell_data.css">
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
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 text-center title">
				<h2>あなたの出品一覧</h2>
			</div>
		</div>
	</div>
	<div class="container product">
		<div class="row">
			<div class="col-md-offset-2 col-md-4">
				<div class="text-center vege_img">
					<a href="buy.php"><img src="assets/photos/kyabetu.jpg"></a>
				</div>
				<div class="text text-center">
					<h4>キャベツ　3玉</h4>
					<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
					<button class="btn btn-danger">出品停止する</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="text-center vege_img">
					<a href="buy.php"><img src="assets/photos/okura.jpeg"></a>
				</div>
				<div class="text text-center">
					<h4>オクラ　15本</h4>
					<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
					<button class="btn btn-danger">出品停止する</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-2 col-md-4">
				<div class="text-center vege_img">
					<a href="buy.php"><img src="assets/photos/tamanegi.jpeg"></a>
				</div>
				<div class="text text-center">
					<h4>玉ねぎ　10個</h4>
					<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
					<button class="btn btn-danger">出品停止する</button>
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