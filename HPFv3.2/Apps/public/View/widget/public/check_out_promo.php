<!-- Promo Banner-->
<?php
    $promo = items::getBy(["i_order" => 2], ["order" => "i_date DESC", "limit" => 1]);
	if(count($promo) > 0){
		$promo = $promo[0];
		$pic = item_picture::getBy(["ip_item" => $promo->i_id]);
		if(count($pic) > 0){
			$pic = $pic[0];
			?>
			<section class="promo-box" style="background-image: url(<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $pic->ip_file?>);"><span class="overlay-dark" style="opacity: .4;"></span>
				<div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
					<h4 class="text-light text-thin text-shadow">New Promotion</h4>
					<h3 class="text-bold text-light text-shadow"><?= $promo->i_name ?></h3><a class="btn btn-outline-white btn-sm" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $promo->i_key ?>/<?= $promo->i_name ?>">View</a>
				</div>
			</section>
			<?php
		}		
	}else{
		 $rand = DB::conn()->q("SELECT * FROM items WHERE i_status = '1' ORDER BY RAND() LIMIT 1")->results();
		 if(count($rand) > 0){
		 	$rand = $rand[0];
			$pic = item_picture::getBy(["ip_item" => $rand->i_id]);
			if(count($pic) > 0){
				$pic = $pic[0];
				?>
				<section class="promo-box" style="background-image: url(<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $pic->ip_file?>);"><span class="overlay-dark" style="opacity: .4;"></span>
					<div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
						<h4 class="text-light text-thin text-shadow">New Collection of</h4>
						<h3 class="text-bold text-light text-shadow"><?= $rand->i_name ?></h3><a class="btn btn-outline-white btn-sm" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $rand->i_key ?>/<?= $rand->i_name ?>">View</a>
					</div>
				</section>
				<?php
			}
		 }
	}
?>