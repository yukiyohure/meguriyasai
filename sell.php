<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/sell.css">
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
				<a class="navbar-brand" href="#">巡り野菜</a>
				<div class="navbar-collapse collapse">
	        		<ul class="nav navbar-nav navbar-right">
			     		<!-- <li><a href="#">新規登録</a></li>
				 		<li><a href="#">サインイン</a></li> -->
				 		<li><a href="signout.php">サインアウト</a></li>
				 		<li><a href="mypage.php">マイページ</a></li>
			   		</ul>
       			</div>
  			</div>
		</nav>
<!-- /.navbar -->
	</header>
	<div class="container">
		<div class="title text-center">
			<h2>商品情報入力 </h2>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<form action="" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<div>
							<label for="name">商品名</label>
							<input class="form-control" type="text" name="name" id="name" placeholder="商品情報を入力してください" />
						</div>
						<div>
							<label for="amount">個数・数量</label>
							<input class="form-control" type="text" name="amount" id="amount" placeholder="単位も忘れずに入力してください" />
						</div>
						<div>
							<label for="comment">説明やコメント</label>
							<textarea class="form-control" id="comment"></textarea>
						</div>
						<div>
							<label for="pic">画像ファイルの添付</label>
							<input class="form-control" type="file" name="pic" id="pic">
						</div>
					</div>
					<div class="form-group">
						<button class="form-control btn-danger" type="submit">出品</button>
						<!-- <input type="submit" name=""> -->
					</div>
				</form>
			</div>
		</div>
	</div>
	<footer>
  	<div class="navbar  navbar-inverse navbar-fixed-bottom"> 
	  	<div class="container">
	      <div class="navbar-text pull=left">
		    	<p> © meguriyasai 2018.<a href="mailto:yukiyohure@gmail.com">お問い合わせはこちら</a></p>
		   	</div>
		 	</div>
		</div>
	</footer>

<!-- navbar -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>