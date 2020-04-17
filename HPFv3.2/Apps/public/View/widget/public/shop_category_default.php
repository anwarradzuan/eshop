<?php
	$limit = 6;
	$pg = url::get('2');
	
	$x = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1)")->results();
	$total_item = count($x);
	$page_total = ceil($total_item/$limit);
	
	if($pg > $page_total){
		$page = $page_total;
	}else{
		if(empty($pg)){
			$page = "1";
		}else{
			$page = (int)$pg;
		}	
	}
	
	if(empty($page)){
		$position = 0;
		$page = 1;
	}else{
		$position = ($page - 1) * $limit;
	}
	$item = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1) LIMIT $position, $limit")->results();
	$no = $position + 1;
	
	if(!isset($_SESSION['customer_id'])){
		?>
		<div class="isotope-grid cols-3 mb-2" id="view_sorting">
			<div class="gutter-sizer"></div>
			<div class="grid-sizer"></div>
		<?php
		foreach ($item as $y) {
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
											<div class="product-badge text-danger"><?= Currency::getSign() ?><?= number_format(Currency::getPrice($promo->ip_value), 2) ?> Off</div>
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
							<h3 class="product-title"><a href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>"><?= F::trimWord($y->i_name, 24)?></a></h3>
							<h4 class="product-price">
								<!-- <?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?> -->
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
							<div class="product-buttons" id="view_wish">
								<!-- <button class="btn btn-outline-primary btn-sm add-cart" data-row="<?= $ipid ?>">Add to Cart</button> -->
								<a class="btn btn-outline-primary btn-sm add-cart" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">View Product</a>
							</div>
						</div>
					</div>
				
				<?php	
			}
			$no++;
		}
		?>
		</div>
		<?php
	}else{
		?>
		<div class="isotope-grid cols-3 mb-2" id="view_sorting">
			<div class="gutter-sizer"></div>
			<div class="grid-sizer"></div>
		<?php
		$no = 0;
		foreach($item as $y){
			$ipid = $y->i_id;
			$ikey = $y->i_key;
			$t = item_picture::getBy(["ip_item" => $ipid, "ip_order" => 1]);
			
			if(count($t) > 0){
			$t = $t[0];
				?>
				
					<!-- Product-->
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
											<div class="product-badge text-danger"><?= Currency::getSign() ?><?= number_format(Currency::getPrice($promo->ip_value), 2) ?> Off</div>
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
							<h3 class="product-title"><a href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>"><?= F::trimWord($y->i_name, 24)?></a></h3>
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
												<del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?></del><?= Currency::getSign() ?><?= $total ?>
											<?php
										}else{
											$vtotal = $y->i_price - $promo2->ip_value;
											?>
												<del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?></del><?= Currency::getSign() ?><?= $vtotal ?>
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
									$cust = $_SESSION['customer_id'];
									$w = wishlist::getBy(["w_item" => $ikey, "w_customer" => $cust]); 
									if(count($w) > 0){
										$red = "red";
									}else{
										$red = "";
									}
								?>
								<button class="btn btn-outline-secondary btn-sm whishlist-add" title="Whishlist" data-item="<?= $ikey ?>">
									<i class="icon-heart heart-<?= $no ?>" style="color:<?= $red ?>;" ></i>
								</button>
								<a class="btn btn-outline-primary btn-sm add-cart" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">View Product</a>
							</div>
						</div>
					</div>
				
				<?php
			}
		$no++;
		}
	?>
	</div>
	<?php
	}
?>
<nav class="pagination">
<?php
	$x = items::{"list"}(["where" => "i_status = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1)"]);
	$total_item = count($x);
	$total = ceil($total_item/$limit);
	
	if($page > 1){
		$prev = $page - 1;
		?>
		<div class="column text-left hidden-xs-down">
			<a class="btn btn-outline-secondary btn-sm" href="<?php echo PORTAL?>categories/page/<?= $prev ?>">Prev&nbsp;<i class="icon-arrow-left"></i></a>
		</div>
		<?php
	}else{
		?>
		<div class="column text-left hidden-xs-down">
			<a class="btn btn-outline-secondary btn-sm">Prev&nbsp;<i class="icon-arrow-left"></i></a>
		</div>
		<?php
	}
	?>
	<div class="column">
		<ul class="pages">
	<?php
	for ($i=1; $i<= $total; $i++)
	if($i != $page){
		?>
			<li class=""><a href="<?php echo PORTAL?>categories/page/<?= $i ?>"><?= $i ?></a></li>
		<?php
	}else{
		?>
			<li class="active"><a href="<?php echo PORTAL?>categories/page/<?= $i ?>"><?= $i ?></a></li>
		<?php
	}
	?>
		</ul>
	</div>
	<?php
	if($page < $total){
		$next = $page + 1;
		?>
		<div class="column text-right hidden-xs-down">
			<a class="btn btn-outline-secondary btn-sm" href="<?php echo PORTAL?>categories/page/<?= $next ?>">Next&nbsp;<i class="icon-arrow-right"></i></a>
		</div>
		<?php
		
	}else{
		?>
		<div class="column text-right hidden-xs-down">
			<a class="btn btn-outline-secondary btn-sm">Next&nbsp;<i class="icon-arrow-right"></i></a>
		</div>
		<?php
	}
?>
		
</nav>
