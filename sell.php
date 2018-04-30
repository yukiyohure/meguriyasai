<?php 
session_start();
$h = 'htmlspecialchars';
//書き直しの処理
if((isset($_REQUEST["reaction"])) && ($_REQUEST["reaction"] == "rewrite")){
	$_POST["name"] = $_SESSION["vege"]["name"];
	$_POST["place"] = $_SESSION["vege"]["place"];
	$_POST["amount"] = $_SESSION["vege"]["amount"];
	$_POST["unit"] = $_SESSION["vege"]["unit"];
	$_POST["description"] = $_SESSION["vege"]["description"];
	//何も書かないままだとif(emptyz($errors))の条件に合致してしまうので適当な値または文字を入れておく
	$errors["rewrite"] = true;
}


//ここで定義しておかないと書き直しの処理をしていないときに定義されていないって出る。
$name = '';
$place = '';
$amount = '';
$unit = '';
$description = '';
$errors = array();

//空チェック
if(!empty($_POST)){
	$name = $_POST["name"];
	$place = $_POST["place"];
	$amount = $_POST["amount"];
	$unit = $_POST["unit"];
	$description = $_POST["description"];

	if($name == ""){
		$errors["name"] = "blank";
	}if($place == ""){
		$errors["place"] = "blank";
	}if($amount == ""){
		$errors["amount"] = "blank";
	}if($unit == ""){
		$errors["unit"] = "blank";
	}if($description == ""){
		$errors["description"] = "blank";
	}

	$file_name = ''; //常に存在するように空文字を最初は代入

	if (!isset($_REQUEST['reaction'])){
		$file_name = $_FILES["pic"]["name"];
	}
	var_dump($file_name);
	if(empty($file_name)){
		$errors["pic"] = "blank";
	}


	if(empty($errors)){
		$data_str = date('YmdHis');
		$submit_file_name = $data_str.$file_name;

		move_uploaded_file($_FILES['pic']['tmp_name'], 'assets/photos/vegetable_image/'.$submit_file_name);

		$_SESSION["vege"]["name"] = $_POST["name"];
		$_SESSION["vege"]["place"] = $_POST["place"];
		$_SESSION["vege"]["amount"] = $_POST["amount"];
		$_SESSION["vege"]["unit"] = $_POST["unit"];
		$_SESSION["vege"]["description"] = $_POST["description"];
		$_SESSION["vege"]["pic"] = $submit_file_name;

		header('Location:sell_confirm.php');
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- navbar -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- localcss -->
	<link rel="stylesheet" type="text/css" href="assets/css/sell.css">
	<!-- 普通のjqueryのためのjavaScript -->
	<script
	src="http://code.jquery.com/jquery-3.3.1.slim.min.js"
  	integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  	crossorigin="anonymous"></script>
</head>
<body>
	<script src="assets/js/enter.js"></script>>
	<header>
<!-- navbar -->
		<nav class="navbar  navbar-inverse  navbar-fixed-top">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">巡り野菜</a>
				<div class="navbar-collapse collapse">
	        		<ul class="nav navbar-nav navbar-right">
			     		<li><a href="#">新規登録</a></li>
				 		<li><a href="#">サインイン</a></li>
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
		<div class="row box">
			<div class="col-md-offset-3 col-md-6">
				<form action="sell.php" enctype="multipart/form-data" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="form-group">
							<label for="name">商品名<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="name" id="name" placeholder="商品名を入力してください" value="<?php echo $h($name);?>"/>
							<?php if((isset($errors["name"])) && ($errors["name"] == "blank")){ ?>
							<p class="text-danger">※商品名を入力してください</p>
							<?php } ?>
						</div>
						<div class="form-group">
							<label for="place">受け渡し場所<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="place" id="place" placeholder="例：〇〇県〇〇市付近" value="<?php echo $h($place);?>"/>
							<?php if((isset($errors["place"])) && ($errors["place"] == "blank")){ ?>
							<p class="text-danger">※受け渡し場所を入力してください</p>
							<?php } ?>
						</div>
						<div class="form-group">
							<label for="amount">個数・数量(半角数字)<span class="text-danger">*</span></label>
							<input type="number"  name="amount" id="amount" value="<?php echo $h($amount);?>"/>
							<select name="unit" value="<?php echo $h($unit);?>">
								<option <?php if(isset($unit) && ($unit == "個")){echo "selected";} ?> value="個"/>個</option>
								<option <?php if(isset($unit) && ($unit == "本")){echo "selected";} ?> value="本"/>本</option>
								<option <?php if(isset($unit) && ($unit == "玉")){echo "selected";} ?> value="玉"/>玉</option>
								<option <?php if(isset($unit) && ($unit == "kg")){echo "selected";} ?> value="kg"/>kg</option>
								<option <?php if(isset($unit) && ($unit == "g")){echo "selected";} ?> value="g"/>g</option>
							</select>
							<?php if((isset($errors["amount"])) && ($errors["amount"] == "blank")){ ?>
							<p class="text-danger">※個数を選択してください</p>
							<?php } ?>
							<?php if((isset($errors["unit"])) && ($errors["unit"] == "blank")){ ?>
							<p class="text-danger">※単位を選択してください</p>
							<?php } ?>
						</div>
						<div class="form-group">
							<label for="comment">説明<span class="text-danger">*</span></label>
							<textarea height="" class="form-control" name="description" id="comment" placeholder="例：たくさん余ってしまって私たちでは消費しきれないので、どなたかもらってください"><?php echo $h($description);?></textarea>
							<?php if((isset($errors["description"])) && ($errors["description"] == "blank")){ ?>
							<p class="text-danger">※説明文を入力してください</p>
							<?php } ?>
						</div>
						<div class="form-group">
							<label for="pic">商品画像<span class="text-danger">*</span></label>
							<input class="form-control" type="file" name="pic" id="pic" accept="image/*">
							<?php if((isset($errors["pic"])) && ($errors["pic"] == "blank")){ ?>
							<p class="text-danger">※画像を選択してください</p>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-danger" value="出品する">
					</div>
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