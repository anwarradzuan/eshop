<?php
    switch(url::get(1)){
    	
    case "":
?>
	<!-- Off-Canvas Wrapper-->
	<div class="offcanvas-wrapper">
	<?php
		Page::load("widget/public/page_title");
	?>
		<!-- Page Content-->
		<div class="container padding-bottom-3x mb-2">
			<div class="row">
				<!-- Checkout Adress-->
				<div class="col-xl-9 col-lg-8">
					<?php
						Page::load("widget/public/checkout_tab");
					?>
					
					<div class="table-responsive">
                        <table class="table table-hover margin-bottom-none">
                            <thead class="">
                                <tr>
                                    <th class="text-left"><h4>Shipping Address</h4></th>
                                    <th class="text-right"><a class="btn btn-primary btn-sm btn-block" href="<?= PORTAL_CUSTOMER ?>account/address">Manage Address</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$cust_id = $_SESSION['customer_id'];
                            		$ca = customer_address::getBy(['ca_customer' => $cust_id]);
                            		if(count($ca) > 0){
                            			foreach($ca as $cal){
                            				$def = "table-warning";
                            				?>
                                				<tr class="<?= $cal->ca_status == 1 ? $def : "" ?> address-<?= $cal->ca_id ?>">
			                                        <td width="80%">
			                                        	Name : <b><?= $cal->ca_name ?></b><br />
			                                        	Phone : <?= $cal->ca_phone ?><br />
			                                        	Address :<?= $cal->ca_address ?> <?= $cal->ca_postal ?> <?= $cal->ca_city ?>
			                                        	<?php
			                                        		$t = countries::getBy(["c_id" => $cal->ca_country]);
															if(count($t) > 0){
																$t = $t[0];
																
																echo $t->c_name;
															}
			                                        	?>
			                                        </td>
			                                        <td class="text-right">
                                        				<button 
                                        					class="btn <?= $cal->ca_status==1 ? "btn-secondary" : "btn-success" ?> btn-sm btn-block select-address" 
                                        					ca-id="<?= $cal->ca_id ?>"
                                        					type="button" 
                                        					<?= $cal->ca_status==1 ? "disabled" : "" ?>
                                        					data-row="<?= $cal->ca_id ?>"
                                    					>
                                    						Set As Default
                                						</button>
			                                        			
			                                        	<a 
															class="btn btn-outline-primary btn-sm btn-block" 
															href="<?= PORTAL_CUSTOMER ?>account/address/edit/<?= $cal->ca_id ?>"
														>
															Edit
														</a>
			                                        </td>
			                                    </tr>
                                			<?php
                            			}
                            		}else{
                            			?>
                            				<tr>
		                                        <td class="text-center" colspan="2"><h5>You haven't regisster any address yet</h5></td>
		                                    </tr>
                            			<?php
                            		}
                            	?>
                            </tbody>
                        </table>
                    </div>
                    <div class="checkout-footer margin-top-1x">
					  	<div class="column hidden-xs-down"><a class="btn btn-outline-secondary" href="<?= PORTAL ?>cart/"><i class="icon-arrow-left"></i>&nbsp;Back</a></div>
					  	<div class="column"><a class="btn btn-primary continue-address"> Continue</a></div>
					</div>
				</div>
			<!-- Sidebar          -->
			<div class="col-xl-3 col-lg-4">
				<aside class="sidebar">
					<div class="padding-top-2x hidden-lg-up"></div>
					
					<?php
						Page::load("widget/public/order_summary");
						
						Page::load("widget/public/also_like");
						
						Page::load("widget/public/check_out_promo");
					?>
				</aside>
			</div>
			</div>
		</div>
	</div>
	<!-- Back To Top Button-->
	<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>

	<!-- Backdrop-->
	<div class="site-backdrop"></div>
<?php
	break;
	
	case"2":
	?>
		<!-- Off-Canvas Wrapper-->
	<div class="offcanvas-wrapper">
	<?php
	Page::load("widget/public/page_title");
	?>
		<!-- Page Content-->
		<div class="container padding-bottom-3x mb-2">
			<div class="row">
				<!-- Checkout Adress-->
				<div class="col-xl-9 col-lg-8">
				<?php
					Page::load("widget/public/checkout_tab");
				?>
					<h4>Orders Review</h4>
					<hr class="padding-bottom-1x">
					<div class="table-responsive shopping-cart">
					  	<table class="table">
							<thead>
							  	<tr>
									<th>Product Name</th>
									<th class="text-center">Price</th>
									<th class="text-center">Subtotal</th>
							  	</tr>
							</thead>
							
							<tbody>
							<?php
							$cust_ship = customer_address::getBy(["ca_customer" => $_SESSION['customer_id'], "ca_status"=> 1]);
							if(count($cust_ship) > 0){
								$add = $cust_ship[0];
							}
							
							$cart = Cart::listAll();
							$shipping = 0;
							$total = 0;
							
							foreach ($cart as $ca){
									
								if($ca->i_status == 1){
									
									$i = items::GetBy(["i_id" => $ca->i_id]);
										if(count($i) > 0){
										$i = $i[0];
								?>
									<tr>
										<td>
											<div class="product-item">
											<?php
												$pic = item_picture::getBy(["ip_item" => $i->i_id]);
											?>
												<a class="product-thumb" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $i->i_key ?>/<?= $i->i_name ?>">
													<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product" />
												</a>
												
												<div class="product-info">
													<h4 class="product-title">
														<a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $i->i_key ?>/<?= $i->i_name ?>">
															<?= $i->i_name ?>
															<small>x <?= $ca->cart->c_quantity ?></small>
														</a>
													</h4>
													
													<?php
														$cds = cart_detail::GetBy(["cd_cart" => $ca->cart->c_id]);
														
														if(count($cds) > 0){
															$iox = 0;
															foreach($cds as $cd){
																$io = item_option::getBy(["io_id" => $cd->cd_io]);
																
																if($iox){
																	echo " | ";
																}
																
																if(count($io) > 0){
																	$io = $io[0];
																?>
																	<strong><?= $io->io_name ?>: </strong> <?= $cd->cd_iov ?> <?= $cd->cd_price != 0 ? "(". Currency::getSign() . number_format($cd->cd_price , 2) .")" : "" ?>
																<?php
																}else{
																?>
																	<strong>Unknown: </strong> <?= $cd->cd_iov ?>
																<?php
																}
																
																$iox++;
															}
														}else{
															echo "No options";
														}
														
													?>
													<br /><br />
													<strong>Shipping:</strong> <br />
													
													<a href="#modalShipping" class="change-shipping btn-<?= $ca->cart->c_key ?>" data-key="<?= $ca->cart->c_key ?>" data-toggle="modal">
														<?= $ca->cart->c_shipping_name ?> <br />
														<?= $ca->cart->c_shipping_deliver ?><br />
														<?= Currency::getSign() ?><?= number_format($ca->cart->c_shipping_cost, 2) ?>
													</a><br />
													<strong>Total Shipping:</strong> 
													
													<!-- <span data-value="<?= $ca->c_shipping_cost * $ca->c_quantity ?>" class="total-shipping total-shipping-<?= $ca->c_key ?>"><?= Currency::getSign() ?><?= number_format($ca->c_shipping_cost * $ca->c_quantity, 2) ?></span> -->
													<span data-value="<?= $ca->cart->c_shipping_cost ?>" class="total-shipping total-shipping-<?= $ca->cart->c_key ?>"><?= Currency::getSign() ?><?= number_format($ca->cart->c_shipping_cost, 2) ?></span>

												</div>
											</div>
										</td>
										
										<td class="text-center">
											<?= Currency::getSign() ?><?= number_format(($ca->cart->c_gtotal / $ca->cart->c_quantity), 2) ?>
										</td>
										<td class="text-center text-lg text-medium">
											<?= Currency::getSign() ?><?= number_format($ca->cart->c_gtotal, 2) ?><br />
										</td>
									</tr>
									<?php
									}
								}
							}
							?>
								<tr>
									<td class="text-right" colspan="2">Inc. Shipping Cost</td>
									<td class="text-right" id="total-shipping"><?= number_format(Cart::shippingSub(), 2) ?></td>
								</tr>
								<tr>
									<td class="text-right" colspan="2"><strong>Total</strong></td>
									<td class="text-right"><strong id="grand-total" data-value="<?= Cart::activeTotal() ?>"><?= number_format(Cart::activeTotal(), 2) ?></strong></td>
								</tr>
							</tbody>
					  	</table>
					</div>
					
					<div class="row padding-top-1x mt-3">
					  	<div class="col-sm-6">
							<h5>Shipping to:</h5>
							<ul class="list-unstyled">
								<?php
									$cust_ship = customer_address::getBy(["ca_customer" => $_SESSION['customer_id'], "ca_status"=> 1]);
									if(count($cust_ship) > 0){
										$cust_ship = $cust_ship[0];
										
										?>
											<li><span class="text-muted">Name:</span><?= $cust_ship->ca_name ?></li>
										  	<li><span class="text-muted">Address:</span>
												<?= $cust_ship->ca_address ?>, 
												<?= $cust_ship->ca_postal ?> 
												<?= $cust_ship->ca_city ?>, 
												<?= $cust_ship->ca_state ?>.
											</li>
										  	<li><span class="text-muted">Phone:</span><?= $cust_ship->ca_phone ?></li>
										  	<li><span class="text-muted">Email:</span><?= $cust_ship->ca_email ?></li>
										<?php
										
									}
								?>
							</ul>
					  	</div>
					</div>
					<div class="checkout-footer margin-top-1x">
					  	<div class="column hidden-xs-down"><a class="btn btn-outline-secondary" href="<?= PORTAL ?>check_out"><i class="icon-arrow-left"></i>&nbsp;Back</a></div>
					  	<div class="column"><a class="btn btn-primary" href="<?= PORTAL ?>check_out/3"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></a></div>
					</div>
				</div>
				<!-- Sidebar          -->
				<div class="col-xl-3 col-lg-4">
					<aside class="sidebar">
					  	<div class="padding-top-2x hidden-lg-up"></div>
						<?php
						Page::load("widget/public/order_summary");
						
						Page::load("widget/public/also_like");
						
						Page::load("widget/public/check_out_promo");
						?>
					</aside>
				</div>
			</div>
      </div>
	</div>
	<?php
		$portal_api = PORTAL_API;
		$secure_token = TOKEN_SECURE;
		$sign = Currency::getSign();
		
	Page::Script(<<<S
		current_list = [];		
		$(".change-shipping").on("click", function(){
			get_shipping($(this).attr("data-key"))
		});
		
		function get_shipping(key){
			current_list = [];
			$("#available-shipping-list").html(`
				<tr>
					<td colspan="4" class="text-center">
						<span id="price-total-loading" class="spinner-border text-primary mr-2"></span>
					</td>
				</tr>
			`);
			
			$.ajax({
				method: "POST",
				url: "$portal_api" + "cart/" + key,
				data:{
					akey: "$secure_token",
					action: "list_shipping"
				},
				dataType: "json"
			}).done(function(res){
				if(res.status == "success"){
					current_list = res.data.list;
					
					html = "";
					res.data.list.forEach(function(x){
						if(x.rate_id == res.data.pick.rate_id){
							selected  = "disabled";
							color = "success";
							text = `
								<span class="check-box">
									<span class='fa fa-check'></span> Current
								</span>
							`;
						}else{
							selected = "";
							color = "warning";
							text = `
								<span class="check-box">
									<span class='fa fa-circle-o'></span> Choose this
								</span>
							`;
						}
						
						html += `
						<tr>
							<td>`+ x.service_name +`</td>
							<td class="text-right">`+ parseFloat(x.price).toFixed(2) +`</td>
							<td class="text-center">`+ x.delivery +`</td>
							<td class="text-right">
								<button class="btn btn-sm btn-`+ color +` shipping-pick `+ selected +`" data-key="`+ key +`" data-id="`+ x.rate_id +`">
									`+ text +`
								</button>
							</td>
						</tr>
						`
					});
					
					$("#available-shipping-list").html(html);
				}else{
					$("#available-shipping-list").html(`
						<tr>
							<td colspan="4" class="text-center">
								`+ res.message +`<br />
							</td>
						</tr>
					`);
				}
			}).fail(function(){
				console.log("Fail fetching cart information");
			});
		}
		
		$(document).on("click", ".shipping-pick", function(){
			$("[name=shipping_id]").val($(this).attr("data-id"))
			$("#price-total-loading").show();
			$("#total-price").hide();
			
			$(".shipping-pick").removeClass("btn-success");
			$(".shipping-pick").removeClass("disabled");
			$(".shipping-pick").addClass("btn-warning");
			$(".shipping-pick").children(".check-box").remove();
			$(".shipping-pick").append(`
				<span class="check-box">
					<span class='fa fa-circle-o'></span> Choose this
				</span>
			`);
			
			$(this).addClass("btn-success");
			$(this).addClass("disabled");
			$(this).removeClass("btn-warning");
			$(this).children(".check-box").remove();
			$(this).append(`
				<span class="check-box">
					<span class='fa fa-check'></span> Current
				</span>
			`);
			
			rate_id = $(this).attr("data-id");
			key = $(this).attr("data-key");
			current_list.forEach(function(x){
				if(x.rate_id == rate_id){
					$.ajax({
						method: "POST",
						url: "$portal_api" + "cart/" + key,
						data:{
							akey: "$secure_token",
							action: "select_shipping",
							shipping: base64_encode(JSON.stringify(x))
						},
						dataType: "json"
					}).done(function(res){
						if(res.status == "success"){
							$(".total-shipping-" + key).text("$sign" + parseFloat(res.data.total).toFixed(2));
							$(".total-shipping-" + key).attr("data-value", res.data.total);
							
							total_shipping = 0;
							$(".total-shipping").each(function(){
								total_shipping += parseFloat($(this).attr("data-value"));
							});
							
							$("#total-shipping").text(total_shipping.toFixed(2));
							$("#grand-total").text(
								(
									parseFloat($("#grand-total").attr("data-value")) +
									total_shipping
								).toFixed(2)
							);
						}else{
							Alert("error", res.message);
						}
					}).fail(function(){
						console.log("Fail updating shipping");
					});
					
					$(".btn-" + key).html(
						x.service_name + "<br /> " + x.delivery + "<br /> $sign" + parseFloat(x.price).toFixed(2)
					);
					return;
				}
			});
		});
		
		
S
);
	
	?>
	<div class="modal fade" id="modalShipping" tabindex="-1" role="dialog" style="">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Shipping Available</h4>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2">
							Ship to:
						</div>
						<div class="col-md-4">
						<?php
							$cust_add = customer_address::getBy(["ca_customer" => $_SESSION['customer_id']]);
												
							if(count($cust_add)){
								$cust_ship = $cust_add[0];
							?>
								<?= $cust_ship->ca_address ?>, 
								<?= $cust_ship->ca_postal ?> 
								<?= $cust_ship->ca_city ?>, 
								<?= $cust_ship->ca_state ?>.
							<?php
							}else{
							?>
								Please <a href="<?= PORTAL ?>customer/check_out/">select/create address</a> before selecting shipping.
							<?php							
							}
						?>
						</div>
						
					</div><br />
					<div class="row">
						<div class="col-md-12 text-center">
							List Available Shipping:
						</div>
					</div><br />
					<div class="row">
						<div class="col-md-12 table-responsive table-hover">
							<table class="table">
								<thead>
									<tr>
										<th>Carrier</th>
										<th class="text-right">Cost <?= Currency::getSign() ?></th>
										<th class="text-center">Estimate Delivery</th>
										<th class="text-right">:::</th>
									</tr>
								</thead>
								<tbody id="available-shipping-list">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Back To Top Button-->
	<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>

	<!-- Backdrop-->
	<div class="site-backdrop"></div>
	<?php
	break;
	
	case"3":
		$pro_no = F::UniqKey("BILL_");
	?>
	<div class="offcanvas-wrapper">
	<?php
		Page::load("widget/public/page_title");
	?>
		<div class="container padding-bottom-3x mb-2">
	    	<div class="row">
		      	<div class="col-xl-9 col-lg-8">
		            <?php
						Page::load("widget/public/checkout_tab");
					?>
		            <h4>Payment</h4>
		            <hr class="padding-bottom-1x">
		            <div class="accordion" id="accordion" role="tablist">
						<div class="card">
							<div class="card-header" role="tab">
								<h6><a href="#card" data-toggle="collapse"><i class="icon-columns"></i>Invoice</a></h6>
							</div>
							<div class="collapse show" id="card" data-parent="#accordion" role="tabpanel">
								<div class="card-body">
									<!-- Bill No : <b><?= $pro_no ?></b><br /><br /> -->
									<p>Order Details:</p>
									<div clsss="row">
										<div class="col-md-8">
										<?php
											$id = $_SESSION['customer_id'];
	                						$address = customer_address::getBy(['ca_customer' => $id, "ca_status" => 1]);
											if(count($address) > 0){
												$address = $address[0];
											?>
												<strong>Address to:</strong>
												Name: <?= $address->ca_name ?><br />
												Phone: <?= $address->ca_phone ?><br />
												Address: 
												<?= $address->ca_address ?>, 
												<?= $address->ca_postal ?>, 
												<?= $address->ca_city ?>, 
												<?= $address->ca_state ?><br />
											<?php
											}
										?>
										</div>
									</div><br />
									<div class="row">
										<div class="col-md-12">
											<table class="table table-bordered text-center">
												<thead>
						                			<tr style="background: #ebebeb">
						                				<th class="text-center">Item</th>
						                				<th class="text-center">Price (<?= Currency::getSign() ?>) </th>
						                				<th class="text-center">Quantity</th>
						                				<th class="text-center">Total (<?= Currency::getSign() ?>)</th>
						                			</tr>
						                		</thead>
						                		<tbody>
												<?php
													$ship = 0;
													$fee_total = 0;
													//$cart = carts::getBy(["c_customer" => $_SESSION['customer_id']]);
													$cart = Cart::listAll();
													
													foreach ($cart as $ca) {
														if($ca->i_status == 1){
															
															$i = items::getBy(["i_id" => $ca->cart->c_item]);
															if(count($i) > 0){
																$i = $i[0];
																?>
																<tr>
																	<td>
																		<a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $i->i_key ?>"><?= $i->i_name ?></a><br />
																		(<?php
																			$cds = cart_detail::GetBy(["cd_cart" => $ca->cart->c_id]);
															
																			if(count($cds) > 0){
																				$iox = 0;
																				foreach($cds as $cd){
																					$io = item_option::getBy(["io_id" => $cd->cd_io]);
																					
																					if($iox){
																						echo " | ";
																					}
																					
																					if(count($io) > 0){
																						$io = $io[0];
																					?>
																						<strong><?= $io->io_name ?>: </strong> <?= $cd->cd_iov ?> <?= $cd->cd_price != 0 ? "(". Currency::getSign() . number_format($cd->cd_price , 2) .")" : "" ?>
																					<?php
																					}else{
																					?>
																						<strong>Unknown: </strong> <?= $cd->cd_iov ?>
																					<?php
																					}
																					
																					$iox++;
																				}
																			}else{
																				echo "No options";
																			}
																		?>)
																	</td>
																	<td>
																		<?= Currency::getSign() ?><?= number_format(($ca->cart->c_gtotal / $ca->cart->c_quantity), 2) ?>
																	</td>
																	<td>x<?= $ca->cart->c_quantity ?></td>
																	<td>
																		<?= number_format($ca->cart->c_gtotal, 2) ?>
																	</td>
																</tr>
																<?php
																$fee_total += $ca->cart->c_commission_value;
															}
														}
													}
													
													$customer = $_SESSION['customer_id'];
													$stotal = DB::conn()->query("SELECT SUM(c_gtotal) AS gtotal FROM carts WHERE c_customer = ?", ["c_customer" => $customer])->results();

													$stotal = $stotal[0];
												?>
													<tr>
														<td colspan="3" class="text-right">
															<strong>Sub Total</strong>
														</td>
														<td><?= number_format(Cart::activeSubTotal(), 2) ?></td>
													</tr>
													
													<tr>
														<td colspan="3" class="text-right">
															<strong>Total Shipping</strong>
														</td>
														<td><?= number_format(Cart::shippingSub(), 2) ?></td>
													</tr>
													
													<tr>
														<td colspan="3" class="text-right">
															<strong>Fees</strong>
														</td>
														<td><?= number_format($fee_total, 2) ?></td>
													</tr>
													
													<tr>
														<td colspan="3" class="text-right"><strong>Grand Total</strong></td>
														<td><b><?= Currency::getSign() ?><?= number_format((Cart::activeTotal() + $fee_total), 2) ?></b></td>
													</tr>													
						                		</tbody>
						                	</table>
										</div>
									</div>
								</div>
							</div>
						</div>
		            </div>
		            <div class="checkout-footer margin-top-1x">
		              	<div class="column"><a class="btn btn-outline-secondary" href="<?= PORTAL ?>check_out/2"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back</span></a></div>
		             	<div class="column" id="paypalBtn"></div>
		              	<script>
							paypal.Buttons({
								createOrder: function(data, actions){
							  		// Set up the transaction
								  	return actions.order.create({
								    	purchase_units: [{
								      		amount: {
								        		value: "<?= round(Currency::getPrice(Cart::activeTotal() + $fee_total), 2) ?>"
											},
											invoice_id: "<?= $pro_no ?>"
								        }]
								    });
							    },
							    onApprove: function(data, actions) {
							      	// Capture the funds from the transaction
							      	return actions.order.capture().then(function(details) {
							      		//console.log(details);
							      		list_data = base64_encode(JSON.stringify(details));
							      		$.ajax({
											url : "<?= PORTAL_API ?>item/payment_success",
											method : "POST",
											data : {
												akey : "<?= TOKEN_SECURE ?>",
												action: "<?= F::Encrypt(TOKEN_SECURE . "payment_success") ?>",
												pro : "<?= $pro_no ?>",
												total : "<?= round(Currency::getPrice(Cart::activeTotal() + $fee_total), 2) ?>",
												commission : "<?= round(Currency::getPrice($fee_total), 2) ?>",
												list : list_data
											},
											dataType : "json" 
										}).done(function(res){
											console.log(res);
											if(res.status == "success"){
												window.location ="<?= PORTAL_CUSTOMER ?>account/order";
											}else{
												Alert("error", res.message);
											}
										})
							      	});
							    }
							}).render('#paypalBtn');
						</script>
		            </div>
		      	</div>
	          	<!-- Sidebar          -->
	          	<div class="col-xl-3 col-lg-4">
		            <aside class="sidebar">
		              	<div class="padding-top-2x hidden-lg-up"></div>
						<?php
							Page::load("widget/public/order_summary");
						
							Page::load("widget/public/also_like");
							
							Page::load("widget/public/check_out_promo");
						?>
		            </aside>
	          	</div>
	        </div>
	 	</div>
	</div>
	<!-- Back To Top Button-->
	<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>

	<!-- Backdrop-->
	<div class="site-backdrop"></div>
	<?php
	break;
	
	default:
	 	Page::load("404");
	break;
	}
?>
<script>
	$(document).on("click", ".select-address", function(){
		$(".select-address").removeAttr("disabled");
		$(".select-address").addClass("btn-success");
		$(".select-address").addClass("btn-secondary");
		$(".select-address").parent().parent().removeClass("table-warning");
		
		$(this).attr("disabled", "true");
		$(this).removeClass("btn-success");
		$(this).addClass("btn-secondary");
		$(".address-" + $(this).attr("data-row")).addClass("table-warning");

		
		$.ajax({
			url : "<?= PORTAL_API ?>customer/account",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action : "<?= F::Encrypt(TOKEN_SECURE . "setDefault") ?>",
				ca_id : $(this).attr('ca-id')
			},
			dataType : "json" 
		}).done(function(res){
			//console.log(res)
			if(res.status == "success"){
				Alert("success", res.message);
			}else{
				Alert("error", res.message);
			}
		})
	});
	
	$(document).on("click", ".continue-address", function(){
		$.ajax({
			url : "<?= PORTAL_API ?>customer/account",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action : "<?= F::Encrypt(TOKEN_SECURE . "checkAddress") ?>"
			},
			dataType : "json" 
		}).done(function(res){
			console.log(res)
			if(res.status == "success"){
				window.location.href = '<?= PORTAL_CUSTOMER ?>check_out/2';
			}else{
				Alert("error", res.message);
			}
		})
	});
</script>