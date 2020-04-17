<!-- Related Products Carousel-->
<h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">Recommended Product for You</h3>
	<!-- Carousel-->
<div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
	<!-- Product-->
	<?php
		$product = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1)")->results();
		foreach($product as $y){
		$ipid = $y->i_id;
		$t = item_picture::getBy(["ip_item" => $ipid, "ip_order" => 1]);
		
		if(count($t) > 0){
		$t = $t[0];
	?>
	  	<div class="grid-item">
			<div class="product-card">
				<?php
					$promo = item_promotion::getBy(["ip_item" => $ipid]);
					if(count($promo) > 0){
						$promo = $promo[0];
						if($promo->ip_type == 1){
							?>
								<div class="product-badge text-danger"><?= $promo->ip_value ?> % Off</div>
							<?php
						}else{
							?>
								<div class="product-badge text-danger"><?= Currency::getSign() ?><?= $promo->ip_value ?> Off</div>
							<?php
						}
					}else{
						
					}
				?>
			  	<div class="rating-stars">
			  		<?php
			  			$check_rating = item_review::getBy(["ir_item" => $ipid]);
						if(count($check_rating) > 0){
							$rating = DB::conn()->q("SELECT SUM(ir_rating) as tot_rating, COUNT(ir_item) as tot_cust FROM item_review WHERE ir_item = '$ipid'")->results();
							if(count($rating) > 0){
								$rating = $rating[0];
								$rate = $rating->tot_rating;
								$tot_cust = $rating->tot_cust;
								$avg_rating = round($rate / $tot_cust);
								
								for($rt = 0; $rt <5; $rt++){
									if($rt < $avg_rating){
										$filled = "filled";
									}else{
										$filled = "";
									}
									?>
										<i class="icon-star <?= $filled?>"></i>
									<?php
								}
								echo "<span>(".$tot_cust.")</span>";
							}else{
								
							}
						}
						
			  		?>
				</div><br /><br />
			  	<a class="product-thumb" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">
			  		<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $t->ip_file?>" alt="Product">
			  	</a>
			  	<h3 class="product-title">
			  		<a href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>"><?= f::trimWord($y->i_name, 24)?></a>
			  	</h3>
			  	<h4 class="product-price">
			  		<?php
			  			$promo2 = item_promotion::getBy(["ip_item" => $ipid]);
			  			if(count($promo2) > 0){
			  				$promo2 = $promo2[0];
							$pro_type = $promo2->ip_type;
							if($pro_type == 1){
								$pro_total = ($y->i_price *  $promo2->ip_value) / 100;
								$total = $y->i_price - $pro_total;
								?>
									<del><?= Currency::getSign() ?><?= $y->i_price?></del><?= Currency::getSign() ?><?= $total ?>
								<?php
							}else{
								$vtotal = $y->i_price - $promo2->ip_value;
								?>
									<del><?= Currency::getSign() ?><?= $y->i_price?></del><?= Currency::getSign() ?><?= $vtotal ?>
								<?php
							}
			  			}else{
			  				?>
			  					<?= Currency::getSign() ?><?= $y->i_price?>
			  				<?php
			  			}
			  		?>
			  	</h4>
			  	<div class="product-buttons">
			  		<?php
			  			if(isset($_SESSION['customer_id'])){
			  				?>
			  					<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
			  				<?php
			  			}else{
			  				
			  			}
			  		?>
					<a class="btn btn-outline-primary btn-sm" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">View Product</a>
			  	</div>
			</div>
	  	</div>
	<?php
			}
		}
	 ?>
</div>