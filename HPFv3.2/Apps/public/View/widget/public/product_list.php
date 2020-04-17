<section class="container padding-top-3x padding-bottom-3x">
	<h3 class="text-center mb-30">Top Products</h3>
	<div class="isotope-grid cols-4 mb-2">
	  	<div class="gutter-sizer"></div>
	 	<div class="grid-sizer"></div>
	  	<!-- Product-->
	  	<?php
	  		$company_c = company::getBy(["c_status" => 1]);
			foreach ($company_c as $company) {
				foreach(items::getBy(["i_status"=> 1, "i_company" => $company->c_id], ["order" => "i_time DESC", "limit" => 16]) as $y){
				$ipid = $y->i_id;
				$t = item_picture::getBy(["ip_item" => $ipid]);
				
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
											<del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?></del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($total), 2) ?>
										<?php
									}else{
										$vtotal = $y->i_price - $promo2->ip_value;
										?>
											<del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?></del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($vtotal), 2) ?>
										<?php
									}
					  			}else{
					  				?>
					  					<?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?>
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
			}
		 ?>
	</div>
	<div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="<?= PORTAL ?>categories">View More</a></div>
</section>