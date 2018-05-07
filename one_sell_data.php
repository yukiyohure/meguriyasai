<?php $i += 1; ?>
<?php if(($i%2) == 0){?>
<div class="row"><!--class="row"の閉じタグは$each_vege["id"]が奇数だった時の処理に記述-->
	<div class="col-md-4">
		<div class="text-center vege_img">
		<img src="assets/photos/vegetable_image/<?php echo $each_vege["pic"]; ?>">
		</div>
		<div class="text text-center">
			<h4><?php echo $each_vege["name"]; ?>　
				<?php echo $each_vege["amount"]; ?>
				<?php echo $each_vege["unit"]; ?>　
				<?php echo $each_vege["trade_place"]; ?></h4>
				<p><?php echo $each_vege["description"]; ?></p>
				<p><?php echo $each_vege["created"]; ?></p>
		</div>
	</div>
	</div><!-- row の閉じタグ-->
<?php }else{ ?>
		<div class="col-md-offset-2 col-md-4">
	<div class="text-center vege_img">
	<a href="buy.php"><img src="assets/photos/vegetable_image/<?php echo $each_vege["pic"]; ?>"></a>
	</div>
	<div class="text text-center">
		<h4><?php echo $each_vege["name"]; ?>　
			<?php echo $each_vege["amount"]; ?>
			<?php echo $each_vege["unit"]; ?>　
			<?php echo $each_vege["trade_place"]; ?></h4>
			<p><?php echo $each_vege["created"]; ?></p>
	</div>
</div>
<?php if($count == $i){ ?>
</div>
<?php } ?>
<?php }?>