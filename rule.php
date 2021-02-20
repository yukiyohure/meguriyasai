<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>特定商標取引表示</title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/rule.css">
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
	<div class="container box">
		<h3 class="text-center">特定商標取引</h3>
		<div class="table-responsive col-md-offset-3 col-md-6">
			<table class="stand text-center table table-bordered table-hover">
				<tbody>
					<tr>
						<th>事業主</th>
						<td>柴田祐輝<br>〒000-0000<br>テキストテキストテキストテキストテキスト<br>123-457-8900</td>
					</tr>
					<tr>
						<th>野菜以外にかかる料金</th>
						<td>・消費税8%・送料</td>
					</tr>
					<tr>
						<th>野菜引渡時期</th>
						<td>原則、受注後4日以内（土日祝祭日、盆正月を除く）／宅急便</td>
					</tr>
					<tr>
						<th>注文方法</th>
						<td>プレゼント</td>
					</tr>
					<tr>
						<th>返品・交換について</th>
						<td>お客様都合よる野菜の返品及び交換は承っておりません。但し、当社原因による野菜の欠陥・不良があった場合には、返品・交換を承ります。この場合の返品期限は、野菜到着後2日以内に、お問い合わせフォームまたはメールにて、その旨を通知するものとし、当社は良品もしくは代替と交換します。</td>
					</tr>
				</tbody>
			</table>
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