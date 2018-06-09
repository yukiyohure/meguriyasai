<?php
$i += 1;
if(($i%2) == 0){
?>
<div class="row"><!--class="row"の閉じタグは$each_vege["id"]が奇数だった時の処理に記述-->
	<div class="col-md-4">
		<div class="text-center vege_img">
		<img src="assets/photos/vegetable_image/<?php echo $h($each_vege["pic"]); ?>">
		</div>
		<div class="text text-center">
			<h4><?php echo $h($each_vege["name"]); ?>　
				<?php echo $h($each_vege["amount"]); ?>
				<?php echo $h($each_vege["unit"]); ?>　
				<?php echo $h($each_vege["trade_place"]); ?>
			</h4>
			<p><?php echo $h($each_vege["description"]); ?></p>
			<p><?php echo $h($each_vege["created"]); ?></p>
			<form method="post" action="">
				<input type="hidden" name="delete" value="<?php echo $h($each_vege["id"]); ?>">
				<?php if($each_vege["display_flag"] == 1){ ?>
				<h4><購入されました></h4>
				<?php }else{ ?>
				<button class="btn btn-danger" type="submit">削除する</button>
				<?php } ?>
			</form>
		</div>
	</div>
	</div><!-- row の閉じタグ-->
<?php }else{ ?>
	<div class="row">
		<div class="col-md-offset-2 col-md-4">
			<div class="text-center vege_img">
			<img src="assets/photos/vegetable_image/<?php echo $h($each_vege["pic"]); ?>">
			</div>
			<div class="text text-center">
				<h4><?php echo $h($each_vege["name"]); ?>　
					<?php echo $h($each_vege["amount"]); ?>
					<?php echo $h($each_vege["unit"]); ?>　
					<?php echo $h($each_vege["trade_place"]); ?>
				</h4>
			<p><?php echo $h($each_vege["description"]); ?></p>
			<p><?php echo $h($each_vege["created"]); ?></p>
			<form method="post" action="">
				<input type="hidden" name="delete" value="<?php echo $h($each_vege["id"]); ?>">
				<?php if($each_vege["display_flag"] == 1){ ?>
				<h4><購入されました></h4>
				<?php }else{ ?>
				<button class="btn btn-danger" type="submit">削除する</button>
				<?php } ?>
			</form>
		</div>
	</div>
<?php if($count == $i){ ?>
</div>
<?php } ?>
<?php }?>