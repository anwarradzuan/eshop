<?php
	$comp = company::getBy(["c_key" => url::get(1), "c_status" => 1]);
	if(count($comp) > 0){
		$comp = $comp[0];
		$tot_pro = items::getBy(["i_company" => $comp->c_id]);
		$com_id = $comp->c_id;
		?>
		<!-- Off-Canvas Wrapper-->
		<div class="offcanvas-wrapper">
			<div class="container padding-top-1x mb-2">
				<div class="row">
					<div class="col-md-12">
						<aside class="user-info-wrapper">
		                    <div class="user-cover" style="background-image: url(<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/blurr_back.JPG);">
		                        <!-- <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div> -->
		                    </div>
		                    <div class="user-info">
		                        <div class="user-avatar">
		                        	<?php
										if(!empty($comp->c_logo)){
											?>
												<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/<?= $comp->c_logo ?>" alt="Intelligent eCommerce">
											<?php
										}else{
											?>
												<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/company_default.png" alt="Intelligent eCommerce">
											<?php
										}
		                        	?>
		                       </div>
		                        <div class="user-data">
		                        	<div class="row">
		                        		<div class="col-md-4">
		                        			Company Name: <b><?= $comp->c_name ?></b><br />
		                        			Joined:  <b><?= $comp->c_date ?></b>
		                        		</div>
		                        		<div class="col-md-4">
		                        			<?php
		                        				$tot_order = order_item::getBy(["oi_company" => $com_id]);
												if(count($tot_order) > 0){
													$tot_order = count($tot_order);
												}else{
													$tot_order = 0;
												}
		                        			?>
		                        			<i class="fa fa-archive" aria-hidden="true"></i> Products : <b><?= count($tot_pro); ?></b><br />
		                        			<i class="fa fa-credit-card " aria-hidden="true"></i> Sold : <b><?= $tot_order ?></b>
		                        		</div>
		                        		<div class="col-md-4">
		                        			<?php
		                        				
		                        			?>
		                        			<?php
		                        				$tot_rater = item_review::getBy(["ir_company" => $comp->c_id]);
												
												if(count($tot_rater) > 0){
													$sum_rate = DB::conn()->q("SELECT SUM(ir_rating) as total_rate FROM item_review WHERE ir_company = '$com_id'")->results();
													if(count($sum_rate) > 0){
														$sum_rate = $sum_rate[0];
														$average = ($sum_rate->total_rate / count($tot_rater));
														?>
														<i class="fa fa-thumbs-up "></i> Ratings : <b><?= !empty($average) ? $average:"0" ?></b><br />
	                        							<i class="fa fa-star"></i> Total rating : <b><?= count($tot_rater) ?></b><br />
                        								<i class="fa fa-user"></i> Total Rater : <b><?= !empty($sum_rate->total_rate) ? $sum_rate->total_rate:"0" ?></b><br />
														<?php
													}else{
														
													}
												}else{
													?>
														<i class="fa fa-thumbs-up "></i> Ratings : <b>0</b><br />
		                        						<i class="fa fa-star"></i> Total rating : <b>0</b><br />
	                        							<i class="fa fa-user"></i> Total Rater : <b>0</b><br />
													<?php
												}
												
		                        			?>
		                        			
		                        		</div>
		                        	</div>
		                        </div>
		                    </div>
		                </aside>
					</div>
				</div><br />
				<div class="row">
					<div class="col-md-6">
						<div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true }">
							<?php
								$company_banner = company_cms::getBy(["cc_company" => $comp->c_id], ["order" => "cc_order ASC"]);
								if(count($company_banner) > 0){
									foreach ($company_banner as $banner){
										?>
										<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/banner/<?= $banner->cc_file ?>">
										<?php
									}
								}else{
									?>
										<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/comp_banner.JPG">
									<?php
								}
							?>
						</div>
					</div>
					<div class="col-md-6">
						<?php
							if(!empty($comp->c_address)){
								$address = $comp->c_address . ", " . $comp->c_postalCode . ", " . $comp->c_city . ", " . $comp->c_state;
							}else{
								$address = "Address havent set by the Company";
							}
						?>
						<h5>About Company</h5>
						Phone : <?= $comp->c_phone ?><br />
						Email : <?= $comp->c_email ?><br />
						Address : <?= $address ?><br />
						Description : <?= !empty($comp->c_details) ? $comp->c_details : "Null" ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table id="table_id" class="table table-hover">
						    <thead class="thead-inverse">
						        <tr>
						            <th>Product Image</th>
						            <th>Name</th>
						            <th class="text-center">Price (<?= Currency::getSign() ?>)</th>
						            <th class="text-center">Rating</th>
						            <th class="text-center">:::</th>
						        </tr>
						    </thead>
						    <tbody>
						    	<?php
								foreach(items::getBy(["i_status"=> 1, "i_company" => $comp->c_id], ["order" => "i_time DESC", "limit" => 16]) as $y){
									$ipid = $y->i_id;
									$t = item_picture::getBy(["ip_item" => $ipid]);
									
									if(count($t) > 0){
									$t = $t[0];
									
									?>
										<tr>
											<td width="20%">
												<a class="product-thumb" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">
											  		<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $t->ip_file?>" alt="Product">
											  	</a>
											</td>
											<td>
												<h6 class="product-title">
											  		<a style="text-decoration: none; color: black" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>"><?= f::trimWord($y->i_name, 30)?></a>
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
											  	</h6>
											</td>
											<td class="text-center">
												<h6 class="product-price">
											  		<?php
											  			$promo2 = item_promotion::getBy(["ip_item" => $ipid]);
											  			if(count($promo2) > 0){
											  				$promo2 = $promo2[0];
															$pro_type = $promo2->ip_type;
															if($pro_type == 1){
																$pro_total = ($y->i_price *  $promo2->ip_value) / 100;
																$total = $y->i_price - $pro_total;
																?>
																	<del style="color:#9da9b9;"><?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?></del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($total), 2) ?>
																<?php
															}else{
																$vtotal = $y->i_price - $promo2->ip_value;
																?>
																	<del style="color:#9da9b9;"><?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?></del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($vtotal), 2) ?>
																<?php
															}
											  			}else{
											  				?>
											  					<?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?>
											  				<?php
											  			}
											  		?>
											  	</h4>
											</td>
											<td class="text-center">
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
														}else{
															echo "No rating yet";
														}
														
											  		?>
												</div>
											</td>
											<td class="text-center">
												<a class="btn btn-outline-primary btn-sm" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">View Product</a>
											</td>
										</tr>
									<?php
									}
								}
								?>
						    </tbody>
						</table> 
					</div>
				</div>
			</div>
		</div>
		<!-- Back To Top Button-->
		<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
		<!-- Backdrop-->
		<div class="site-backdrop"></div>
		<?php
	}else{
		Page::Load("404");
	}
?>
<script>
	$(document).ready( function () {
	    $('#table_id').DataTable();
	    
	     responsive: true
	} );
</script>
