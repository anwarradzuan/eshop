
<?php
 $ban = banners::getBy(["b_status" => 1, "b_position" => 1], ["order" => "b_time DESC", "limit" => 1]);
    if(count($ban) > 0){
    	$ban = $ban[0];
?>

	<section class="fw-section" style="background-image: url(<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/banners/<?= $ban->b_file?>);"><span class="overlay" style="background-color: #374250; opacity: .55;"></span>
		<div class="container text-center padding-top-4x padding-bottom-4x">
		<?php
			$check = item_promotion::list();
			
			if(count($check) > 0){
				$check = $check[0]; 
				?>
					<h3 class="display-4 text-normal text-white text-shadow mb-1"><?= $ban->b_name?></h3>
					<h2 class="display-2 text-bold text-white text-shadow"><?= $ban->b_content?></h2>
					<h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br><a class="btn btn-primary" href="<?= PORTAL?>categories/promotion">View Promotion</a>
				<?php
			}else{
				?>
				<h3 class="display-4 text-normal text-white text-shadow mb-1">Promotion for you</h3>
					<h2 class="display-2 text-bold text-white text-shadow">Comming Soon</h2>
					<h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br>
				<?php
			}
		?>
		</div>
	</section>
<?php  
	}
?>
