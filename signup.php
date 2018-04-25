<?php 
	session_start();
	$h = 'htmlspecialchars';
	//書き直しの処理
	if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "rewrite") {
	  $_POST["input_name"] = $_SESSION["register"]["name"];
	  $_POST["input_postal_code"] = $_SESSION["register"]["postal_code"];
	  $_POST["input_address"] = $_SESSION["register"]["address"];
	  $_POST["input_email"] = $_SESSION["register"]["email"];
	  $_POST["input_password"] = $_SESSION["register"]["password"];

	  $errors["rewrite"] = true;
	  // var_dump($_POST);
	}

	$name ='';
	$postal_code = '';
	$address = '';
	$email = '';

	$errors = array();
	//「確認」ボタンが押された時にバリデーション処理のために要素の中が空白だった場合、errros配列にエラーメッセージを代入
	if(!empty($_POST)){
		$name = $_POST["input_name"];
		$postal_code = $_POST["input_postal_code"];
		$address = $_POST["input_address"];
		$email = $_POST["input_email"];
		$password = $_POST["input_password"];
		$count = strlen($password);//パスワードの文字数を$countに代入

		if ($name == "") {
			$errors["name"] = "blank";
		}if ($postal_code == "") {
			$errors["postal_code"] = "blank";
		}if ($address == "") {
			$errors["address"] = "blank";
		}if ($email == "") {
			$errors["email"] = "blank";
		}if ($password == "") {
			$errors["password"] = "blank";
		}elseif($count < 4){//パスワードの文字数が４文字未満だった場合errors配列にエラーメッセージを代入
			$errors["password"] = "length";
		}

		//以下の条件で$_FILESが使用可能
		//1.formタグにenctype属性と値にmultipart/formdataが設定されている
		//2.formタグでPOST送信されている
		//$_FILES['キー名']['name']：画像名を取得
		$file_name = ''; //常に存在するように空文字を最初は代入
		if (!isset($_REQUEST['action'])){
		    $file_name = $_FILES["pic"]["name"];
		}

		if(empty($file_name)){
			$errors["pic"] = "blank";
		}

		//$errorsが空の時＝バリデーション成功
		if(empty($errors)){
			$date_str = date('YmdHis');//YmdHisを指定することで取得フォーマットを指定
			$submit_file_name = $date_str.$file_name;
			//送信された画像をuse_profile_imgにアップロード
			//user_profile_img/.$submit_file_nameと文字連結をすることで
			//user_profile_img/20170903073829.jpgのような保存先を指定している
			// move_uploaded_file(filename, destination(目的地))
			move_uploaded_file($_FILES['pic']['tmp_name'],'user_profile_image/'.$submit_file_name);

			//遷移先でも扱えるようにsession関数にデータを保存
			$_SESSION['register']['name'] = $_POST['input_name'];
			$_SESSION['register']['postal_code'] = $_POST['input_postal_code'];
			$_SESSION['register']['address'] = $_POST['input_address'];
			$_SESSION['register']['email'] = $_POST['input_email'];
			$_SESSION['register']['password'] = $_POST['input_password'];
			//上記3つは$_SESSION['register'] = $_POST;という書き方で一文にまとめることができる

			$_SESSION['register']['pic'] = $submit_file_name;
			//画像のアップロードが完了したらページ遷移
			header('Location:check.php');
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
	<link rel="stylesheet" type="text/css" href="assets/css/signup.css">
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
			     		<li><a href="#">新規登録</a></li>
				 		<li><a href="#">サインイン</a></li>
				 		<li><a href="#">マイページ</a></li>
			   		</ul>
       			</div>
  			</div>
		</nav>
<!-- /.navbar -->
	</header>
	<div class="col-xs-8 col-xs-offset-2 box">
        <h2 class="text-center content_header">アカウント作成</h2>
        <form method="POST" action="signup.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" name="input_name" class="form-control" id="name" placeholder="山田 太郎" value="<?php echo $h($name);?>">
            <?php if ((isset($errors["name"])) && ($errors["name"] == "blank")){ ?>
            <p class="text-danger">※ユーザー名を入力してください</p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="address">住所(郵便番号ハイフン無)</label><br>
            <label for="postal_code">〒</label>
            <input type="text" name="input_postal_code" placeholder="〇〇〇〇〇〇〇" value="<?php echo $h($postal_code);?>">
            <?php if ((isset($errors["postal_code"])) && ($errors["postal_code"] == "blank")){ ?>
            <p class="text-danger">※郵便番号を入力してください</p>
            <?php } ?>
            <input type="text" name="input_address" class="form-control" id="address" placeholder="〇〇県△△市＊＊＊＊＊＊" value="<?php echo $h($address);?>">
            <?php if ((isset($errors["address"])) && ($errors["address"] == "blank")){ ?>
            <p class="text-danger">※住所を入力してください</p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="input_email" class="form-control" id="email" placeholder="example@gmail.com" value="<?php echo $h($email);?>">
            <?php if ((isset($errors["email"])) && ($errors["email"] == "blank")){ ?>
            <p class="text-danger">※メールアドレスを入力してください</p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="password">パスワード(4文字以上)</label>
            <input type="password" name="input_password" class="form-control" id="password" placeholder="4 ~ 16文字のパスワード">
            <?php if ((isset($errors["password"])) && ($errors["password"] == "blank")){ ?>
            <p class="text-danger">※パスワードを入力してください</p>
            <?php } ?>
            <?php if((isset($errors["password"])) && ($errors["password"] == "length")){ ?>
            <p class="text-danger">※パスワードは4文字以上入力してください</p>
            <?php } ?>
            <?php if(!empty($errors)){ ?>
            <p class="text-danger">※パスワードを再入力してください</p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="pic">プロフィール画像</label>
            <input type="file" name="pic" id="pic" accept="image/*"><!-- accept="image/*"：画像データのみを許容 -->
            <?php if((isset($errors["pic"])) && ($errors["pic"] == "blank")){ ?>
            <p class="text-danger">※画像を選択してください</p>
            <?php } ?>
          </div>
          <input type="submit" class="btn btn-danger" value="確認">
          <a href="signin.php" style="float: right; padding-top: 6px;" class="text-success">登録済みの方はこちら</a>
        </form>
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