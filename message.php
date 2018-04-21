<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/message.css">
</head>
<body>
	<header>
<!-- navbar -->
		<nav class="navbar  navbar-inverse  navbar-fixed-top">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"> Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">巡り野菜</a>
				<div class="navbar-collapse collapse">
	        		<ul class="nav navbar-nav navbar-right">
			     		<!-- <li><a href="#">会員登録</a></li>
				 		<li><a href="#">ログイン</a></li> -->
				 		<li><a href="mypage.php">マイページ</a></li>
				 		<li><a href="signout.php">サインアウト</a></li>
				 		<li><a href="product.php">野菜一覧へ</a></li>
			   		</ul>
       			</div>
  			</div>
		</nav>
<!-- /.navbar -->
	</header>
	<div class="box">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 text-center title">
				<h3>メッセージのやりとり</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-3">
				<p>〒〇〇〇〇〇〇〇</p>
				<h6>熊本県天草市・・・・・・・</h6>
				<h6>山田太郎</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-7 scroll">
				<!-- 吹き出し左　始め -->
				<div class="row">
					<div class="col-md-offset-2 text-left col-md-7">
							<p>山田太郎</p>
						<div class="balloon1-left">
			  				<p>こんにちは。これは例です。</p>
						</div>
					</div>
				</div>
				<!-- 吹き出し左　終わり -->
				<!-- 吹き出し右　始め -->
				<div class="row">
					<div class="col-md-offset-3 col-md-7 text-right">
						<div class="balloon1-right">
							<p>こんにちは。これは例です。</p>
						</div>
					</div>
				</div>
				<!-- 吹き出し右　終わり -->
				<!-- 吹き出し右　始め -->
				<div class="row">
					<div class="col-md-offset-3 col-md-7 text-right">
						<div class="balloon1-right">
							<p>こんにちは。これは例です。</p>
						</div>
					</div>
				</div>
				<!-- 吹き出し右　終わり -->
				<!-- 吹き出し右　始め -->
				<div class="row">
					<div class="col-md-offset-3 col-md-7 text-right">
						<div class="balloon1-right">
							<p>こんにちは。これは例です。</p>
						</div>
					</div>
				</div>
				<!-- 吹き出し右　終わり -->
				<!-- 吹き出し左　始め -->
				<div class="row">
					<div class="col-md-offset-2 text-left col-md-7">
							<p>山田太郎</p>
						<div class="balloon1-left">
			  				<p>こんにちは。これは例です。</p>
						</div>
					</div>
				</div>
				<!-- 吹き出し左　終わり -->
				<!-- 吹き出し左　始め -->
				<div class="row">
					<div class="col-md-offset-2 text-left col-md-7">
							<p>山田太郎</p>
						<div class="balloon1-left">
			  				<p>こんにちは。これは例です。</p>
						</div>
					</div>
				</div>
				<!-- 吹き出し左　終わり -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-5">
				<form method="post" action="">
					<textarea class="naiyou" cols="50" rows="1" name="message"></textarea>
					<span class="sousin"><button class="btn-success" type="submit">送信</button></span>
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