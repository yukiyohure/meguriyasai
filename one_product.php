<?php
//購入ボタンが押されたときにsell_confirm.phpへ送るためにsession変数へデータを代入
if(!empty($_POST)){
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["amount"] = $_POST["amount"];
	$_SESSION["unit"] = $_POST["unit"];
	$_SESSION["trade_place"] = $_POST["trade_place"];
	$_SESSION["description"] = $_POST["description"];
	$_SESSION["created"] = $_POST["created"];
	$_SESSION["pic"] = $_POST["pic"];

	header("Location:buy.php");
	exit();
}

$i += 1;
if(($i%2) == 0){
 ?>
<div class="row"><!--class="row"の閉じタグは$each_vege["id"]が奇数だった時の処理に記述-->
	<div class="col-md-4">
		<div class="text-center vege_img">
		<img src="<?php echo $each_vege["pic"]; ?>">
		</div>
		<div class="text text-center">
			<h4><?php echo $each_vege["name"]; ?>　
				<?php echo $each_vege["amount"]; ?>
				<?php echo $each_vege["unit"]; ?>　
				<?php echo $each_vege["trade_place"]; ?></h4>
				<!-- 野菜説明欄は詳細ページに表示するようにする -->
				<p><?php echo $each_vege["created"]; ?></p>
				<form method="post" action="">
					<input type="hidden" name="name" value="<?php echo $each_vege["name"]; ?>">
					<input type="hidden" name="amount" value="<?php echo $each_vege["amount"]; ?>">
					<input type="hidden" name="unit" value="<?php echo $each_vege["unit"]; ?>">
					<input type="hidden" name="trade_place" value="<?php echo $each_vege["trade_place"]; ?>">
					<input type="hidden" name="description" value="<?php echo $each_vege["description"]; ?>">
					<input type="hidden" name="pic" value="<?php echo $each_vege["pic"]; ?>">
					<input type="hidden" name="created" value="<?php echo $each_vege["created"]; ?>">
					<button class="btn btn-danger" type="submit" name="buy">詳細を見る</button>
				</form>
		</div>
	</div>
	</div><!-- row の閉じタグ-->
<?php }else{ ?>
	<div class="row">
	<div class="col-md-offset-2 col-md-4">
	<div class="text-center vege_img">
	<img src="<?php echo $each_vege["pic"]; ?>">
	</div>
		<div class="text text-center">
			<h4><?php echo $each_vege["name"]; ?>　
				<?php echo $each_vege["amount"]; ?>
				<?php echo $each_vege["unit"]; ?>　
				<?php echo $each_vege["trade_place"]; ?></h4>
				<!-- 野菜説明欄は詳細ページに表示するようにする -->
				<p><?php echo $each_vege["created"]; ?></p>
				<form method="post" action="">
					<input type="hidden" name="name" value="<?php echo $each_vege["name"]; ?>">
					<input type="hidden" name="amount" value="<?php echo $each_vege["amount"]; ?>">
					<input type="hidden" name="unit" value="<?php echo $each_vege["unit"]; ?>">
					<input type="hidden" name="trade_place" value="<?php echo $each_vege["trade_place"]; ?>">
					<input type="hidden" name="description" value="<?php echo $each_vege["description"]; ?>">
					<input type="hidden" name="pic" value="<?php echo $each_vege["pic"]; ?>">
					<input type="hidden" name="created" value="<?php echo $each_vege["created"]; ?>">
					<button class="btn btn-danger" type="submit" name="buy">詳細を見る</button>
				</form>
		</div>
	</div>
<?php if($count == $i){ ?>
</div>
<?php } ?>
<?php }?>