<style>
	.vr {
	    width:10px;
	    background-color:#000;
	    position:absolute;
	    top:0;
	    bottom:0;
	    left:150px;
	}
</style>
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
<?php
new Controller ($_POST);
    Page::load("widget/public/page_title");
?>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <div class="col-lg-4">
                <aside class="user-info-wrapper">
                    <div class="user-cover" style="background-image: url(<?= PORTAL?>assets/medias/iecommerce/img/account/igor-kasalovic-tNDvFkxkBHo-unsplash.jpg);">
                        <!-- <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div> -->
                    </div>
                    <div class="user-info">
                        <div class="user-avatar">
                        	<?php
                        		$cust_id = $_SESSION['customer_id'];
                    			$pic = customers::getBy(["c_id" => $cust_id]);
								if(count($pic) > 0){
									$pic = $pic[0];
									
									if(!empty($pic->c_picture)){
										?>
											<img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/<?= $pic->c_picture ?>" alt="Intelligent eCommerce">
										<?php
									}else{
										?>
											<img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/default.png" alt="Intelligent eCommerce">
										<?php
									}
								}
                        	?>
                       </div>
                        <div class="user-data">
                            <?= $_SESSION['customer_login'];?><span>Joined <?= $pic->c_date ?></span>
                        </div>
                    </div>
                </aside>
                <nav class="list-group">
                	<?php
                		$nav = url::get(1);
						$actived = "active";	
                	?>
                    <a class="list-group-item with-badge <?= $nav == "order" ? $actived: "" ?>" href="<?= PORTAL_CUSTOMER ?>account/order">
                    	<?php
                    		$cust_id = $_SESSION['customer_id'];
                    		$order = order_item::getBy(['oi_customer' => $cust_id]);
							if(count($order) > 0){
								$os = count($order);
								?>
									<i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill"><?= $os ?></span>
								<?php
							}else{
								?>
									<i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill"></span>
								<?php
							}
                    	?>
                    </a>
                    <a class="list-group-item <?= $nav == "profile" ? $actived: "" ?>" href="<?= PORTAL_CUSTOMER ?>account/profile">
                        <i class="icon-head"></i>Profile
                    </a>
                    <a class="list-group-item <?= $nav == "address" ? $actived: "" ?>" href="<?= PORTAL_CUSTOMER ?>account/address">
                        <i class="icon-map"></i>Addresses
                    </a>
                    <a class="list-group-item with-badge <?= $nav == "wishlist" ? $actived: "" ?>" href="<?= PORTAL_CUSTOMER ?>account/wishlist">
                    	<?php
                    		$cust_id = $_SESSION['customer_id'];
                    		$wish = wishlist::getBy(["w_customer" => $cust_id]);
							if(count($wish) > 0){
								$total = count($wish);
								?>
									<i class="icon-heart"></i>Wishlist<span class="badge badge-primary badge-pill"><?= $total ?></span>
								<?php
							}else{
								?>
									<i class="icon-heart"></i>Wishlist<span class="badge badge-primary badge-pill"></span>
								<?php
							}
                    	?>
                    </a>
                    <a class="list-group-item with-badge <?= $nav == "cart" ? $actived: "" ?>" href="<?= PORTAL_CUSTOMER ?>cart">
                    	<?php
                    		$cust_id = $_SESSION['customer_id'];
                    		$cart = carts::getBy(["c_customer" => $cust_id]);
							if(count($cart) > 0){
								$total = count($cart);
								?>
									<i class="icon-tag"></i>Cart<span class="badge badge-primary badge-pill "><?= $total ?></span>
								<?php
							}else{
								?>
									<i class="icon-tag"></i>Cart<span class="badge badge-primary badge-pill "></span>
								<?php
							}
                    	?>
                    </a>
                </nav>
            </div>
            <?php
            switch(url::get(1)){
                case "order":
					switch (url::get(2)) {
						
						case "" :
							?>
							<div class="col-lg-8">
		                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
		                        <div class="table-responsive">
		                            <table class="table table-hover margin-bottom-none">
		                                <thead>
		                                    <tr>
		                                        <th>Item Details</th>
		                                        <th>Date Purchased</th>
		                                        <th>Status</th>
		                                        <th class="text-right">Amount (<?= Currency::getSign()?>)</th>
		                                        <th class="text-right">:::</th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                	<?php
		                                		$cust_id = $_SESSION['customer_id'];
		                                		$order_item = order_item::getBy(['oi_customer' => $cust_id], ["order" => "oi_id DESC"]);
		                                		if(count($order_item) > 0){
		                                			foreach($order_item as $or){
		                                				$order = orders::getBy(["o_id" => $or->oi_order]);
														if(count($order) > 0){
															$order = $order[0];
															$order_cancel = order_cancel::getBy(["oc_order_item" => $or->oi_id]);
															?>
				                                				<tr>
							                                        <td>
							                                        	<?php
							                                        		$item = items::getBy(["i_id" => $or->oi_item ]);
																			if(count($item) > 0){
																				$item = $item[0];
																				$pic = item_picture::getBy(["ip_item" => $item->i_id, "ip_order" => 1]);
																				
																				?>
																				<div class="row">
																					<div class="col-md-4">
																						<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product" width="" >
																					</div>
																					<div class="col-md-8">
																					Name : <?= $item->i_name ?> <br />
																					<?php
										                                				$od = order_detail::getBy(["od_order_item" => $or->oi_id]);
																						if(count($od) > 0){
																							$n = 0;
																							foreach ($od as $option){
																								if($n > 0){
																									echo " | ";
																								}
																								?>
																								<strong><?= $option->od_io_name ?>: </strong> <?=  $option->od_iov ?>
																								<?php
																								$n++;
																							}
																						}else{
																							
																						}
										                                			?><br />
																					</div>
																				</div>
																					
																				<?php
																			}else{
																				
																			}
							                                        	?>
							                                        </td>
							                                        <td><?= $or->oi_date ?></td>
							                                        <td>
							                                        	<?php
							                                        		if($or->oi_cancel == 1){
							                                        			echo "<span class='text-danger'>Canceled</span>";
							                                        		}else{
							                                        			foreach (Setting::$order as $key => $value) {
																					if($or->oi_shipping_status == $key){
																						echo "<b>" . $value . "</b><br />";
																					}
																				}
																				
																				if(count($order_cancel) > 0){
																					echo "<i>Cancel Requested</i>";
																				}else{}
							                                        		}
							                                        	
							                                        		
							                                        	?>
							                                        </td>
							                                        <td class="text-right"><span class="text-medium"><?= number_format($or->oi_gtotal + $or->oi_shipping_cost +  $or->oi_commission_value, 2) ?></span></td>
							                                        <td class="text-right" width="10%">
							                                        	<a class="btn btn-outline-primary btn-block btn-sm" href="<?= PORTAL ?>account/order/view_order/<?= $or->oi_key ?>">View Details</a>
							                                        	<?php
							                                        		if(count($order_cancel) > 0){
																				
																			}else{
																				//if($or->oi_shipping_status == 4 || $or->oi_shipping_status == 2 || $or->oi_shipping_status == 1){
																				if($or->oi_shipping_status == 4){
								                                        		echo "Disputed";
								                                        		}elseif($or->oi_shipping_status == 2 || $or->oi_shipping_status == 1){
								                                        			
								                                        		}else{
								                                        			?>
								                                        			<a class="btn btn-outline-danger btn-block btn-sm cancel-order" data-target="#cancelOrder" data-toggle="modal" order-id="<?= $or->oi_id ?>">Cancel order</a>
								                                        			<?php
								                                        		}
																			}	
							                                        	?>
							                                        </td>
							                                    </tr>
				                                			<?php
														}
		                                			}
		                                		}else{
		                                			?>
		                                				<tr>
					                                        <td class="text-center" colspan="4"><h5>Your order is empty</h5></td>
					                                    </tr>
		                                			<?php
		                                		}
		                                	?>
		                                </tbody>
		                            </table>
		                        </div>
		                        <hr>
		                    </div>
							<?php
						break;
						
						case 'view_order':
							$order = order_item::getBy(["oi_key" => url::get(3)]);
							if(count($order) > 0){
								$order =$order[0];
								foreach(Setting::$order as $k => $v){
									if($k == $order->oi_shipping_status){
										$order_status = $v;
									}
								}
								?>
								<div class="col-lg-8">
	                       	 		<div class="padding-top-2x mt-2 hidden-lg-up"></div>
	                       	 		<div class="mb-1">
										<div class="card mb-3">
											<div class="p-4 text-white text-lg bg-dark rounded-top">
												<a class="btn btn-primary" href="<?= PORTAL ?>account/order">Back</a>
												<span class="text-uppercase">Order No - </span>
												<span class="text-medium"><?= $order->oi_key ?></span>
											</div>
											<div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
												<div class="w-100 text-center py-1 px-2"><span class='text-medium'>Shipped Via:</span> <?= $order->oi_shipping_name ?></div>
												<div class="w-100 text-center py-1 px-2"><span class='text-medium'>Status:</span> <b><?= $order->oi_cancel == 1 ? "<span class='text-danger'>Cancelled</span>":$order_status ?> </b></div>
												<div class="w-100 text-center py-1 px-2"><span class='text-medium'>Order Date:</span> <?= $order->oi_date ?></div>
											</div>
											<?php
											 if($order->oi_cancel == 1){
												 ?>
												 <div class="row">
												 	<div class="col-md-12"><br/>
												 		<h2 class="text-center text-danger">Order Cancelled</h2>
												 	</div>
												 </div>
												 <div class="row">
												 	<div class="col-md-1"></div>
												 	 <div class="col-md-10 table-responsive padding-bottom-2x">
							                            <table class="table table-bordered margin-bottom-none">
							                                <thead class="bg-info">
							                                    <tr>
							                                        <th colspan="3" class="text-center"><h6>Order Logs</h6></th>
							                                    </tr>
							                                </thead>
							                                <tbody>
							                                	<?php
							                                		$order_cancel = order_cancel::getBy(["oc_order_item" => $order->oi_id], ["order" => "oC_id ASC"]);
																	
																	if(count($order_cancel) > 0){
																		
																		foreach ($order_cancel as $cancel) {
																			
																			?>
																			<tr>
										                                		<td><?= date("j F Y (h:i:s\ a) ", $cancel->oc_time) ?></td>
										                                		<td>
										                                			<?php 
										                                				if($cancel->oc_customer > 0){
										                                					echo "Customer";
										                                				}else{
										                                					echo "Vendor";
										                                				}
										                                			?>
										                                			
										                                		</td>
										                                		<td><?= $cancel->oc_message ?></td>
										                                	</tr>
																			<?php
																		}
																		
																	}else{
																		
																	}
							                                	?>
							                                </tbody>
							                            </table>
							                        </div><br />
												 </div>
												 <?php
												 	$check_or = order_refund::getBy(["or_order_item" => $order->oi_id]);
													if(count($check_or) > 0){
														$pypal_fix = 2;													?>
													<div class="row">
														<div class="col-md-1"></div>
												 		<div class="col-md-10 table-responsive padding-bottom-2x">
							                            	<table class="table table-bordered margin-bottom-none">
								                            	<thead class="bg-success">
								                                    <tr>
								                                        <th colspan="4" class="text-center"><h6>Refund Logs</h6></th>
								                                    </tr>
								                                </thead>
								                                <tbody>
								                                	<?php
								                                		$order_ref = order_refund::getBy(["or_order_item" => $order->oi_id], ["order" => "or_id ASC"]);
																		
																		if(count($order_ref) > 0){
																			
																			foreach ($order_ref as $ref) {
																				if($ref->or_status > 0){
																					$status = "<b>Paid</b>";
																					$p_fix = "<i>(-" . Currency::getSign() . " ". number_format($pypal_fix, 2) . " PayPal fix charge)";
																				}else{
																					$status = "<b>Unpaid</b>";
																					$p_fix = "";
																				}
																				?>
																				<tr>
											                                		<td><?= date("j F Y (h:i:s\ a) ", $ref->or_time) ?></td>
											                                		<td>
											                                			<?= $status ?>
											                                			
											                                		</td>
											                                		<td><?= $ref->or_details ?></td>
											                                		<td><b><?= Currency::getSign() ?><?= number_format($ref->or_amount, 2) ?></b><br /> <?= $p_fix ?></td>
											                                	</tr>
																				<?php
																			}
																			
																		}
								                                	?>
								                                </tbody>
								                            </table>
							                        	</div><br />
													 </div>
												 	<?php	
													}
											 }else{
												$complete = "completed";
											 	?>
											 	<div class="card-body">
													<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
														<div class="step <?= $completed ?>">
															<div class="step-icon-wrap">
																<div class="step-icon"><i class="pe-7s-cart"></i></div>
															</div>
															<h4 class="step-title">Confirmed Order</h4>
														</div>
														<div class="step <?= $completed ?>">
															<div class="step-icon-wrap">
																<div class="step-icon"><i class="pe-7s-config"></i></div>
															</div>
															<h4 class="step-title">Processing Order</h4>
														</div>
														<div class="step <?= $completed ?>">
															<div class="step-icon-wrap">
																<div class="step-icon"><i class="pe-7s-compass"></i></div>
															</div>
															<h4 class="step-title">To Ship</h4>
														</div>
														<div class="step <?= $order->oi_shipping_status >= 1 ? $completed : "" ?>">
															<div class="step-icon-wrap">
																<div class="step-icon"><i class="pe-7s-car"></i></div>
															</div>
															<h4 class="step-title">Product Dispatched</h4>
														</div>
														<div class="step <?= $order->oi_shipping_status == 1 ? $completed : "" ?>">
															<div class="step-icon-wrap">
																<div class="step-icon"><i class="pe-7s-home"></i></div>
															</div>
															<h4 class="step-title">Product Delivered</h4>
														</div>
													</div>
												</div>
											 	<?php
											 }
											?>
										</div>
									</div>
									<?php
										if($order->oi_cancel == 1){
											
										}else{
											?>
											<div class="table-responsive">
					                            <table class="table table-bordered margin-bottom-none">
					                                <thead class="thead-default">
					                                    <tr>
					                                        <th colspan="2" class="text-center"><h3>Delivery Address</h3></th>
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                	<?php
					                                		$order_ship = order_shipping::getBy(["os_id" => $order->oi_shipping]);
															if(count($order_ship) > 0){
																$order_ship = $order_ship[0];
																?>
																	<tr>
								                                		<td>
								                                			<b><?= $order_ship->os_name ?></b><br />
								                                			<?= $order_ship->os_phone ?><br />
								                                			<?= $order_ship->os_address ?><br />
								                                			<?= $order_ship->os_postal ?>, <?= $order_ship->os_state  ?>.
								                                		</td>
								                                		<td class="text-center">
								                                			<?php
								                                        		if(!empty($order->oi_tracking)){
								                                        			
																					?>
																						<?= $order->oi_shipping_name ?> | Tracking Number: <b><?= $order->oi_tracking ?></b>
																					<?php
																					
								                                        		}else{
								                                        			foreach (Setting::$order as $s => $k) {
																						if($s == $order->oi_shipping_status){
																							echo $k;
																						}
																					}
																					if($order->oi_shipping_status == 4){
																						?>
																							<br /> by <?= $order->oi_cancel_by ?>
																						<?php
																					}else{
																						
																					}
								                                        		}
								                                        	?>
								                                		</td>
								                                	</tr>
																<?php
															}else{
																
															}
					                                	?>
					                                </tbody>
					                            </table>
					                        </div><br />
											<?php
										}
									?>
									<div class="table-responsive">
			                            <table class="table table-bordered margin-bottom-none">
			                                <thead class="bg-info">
			                                    <tr>
			                                        <th colspan="3" class="text-center"><h3>Item Details</h3></th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                	<?php
			                                		$items = items::getBy(["i_id" => $order->oi_item]);
													if(count($items) > 0){
														$items = $items[0];
														$pic = item_picture::getBy(["ip_item" => $items->i_id]);
														?>
														<tr>
					                                		<td width="20%">
					                                			<a class="product-thumb" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $items->i_key ?>"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product"></a>
					                                		</td>
					                                		<td><br />
					                                			<b><a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $items->i_key ?>"><?= F::TrimWord($items->i_name, 30) ?></a> x <?= $order->oi_quantity ?></b><br />
					                                			<?php
					                                				$od = order_detail::getBy(["od_order_item" => $order->oi_id]);
																	if(count($od) > 0){
																		$n = 0;
																		foreach ($od as $option){
																			if($n > 0){
																				echo " | ";
																			}
																			?>
																			<strong><?= $option->od_io_name ?>: </strong> <?=  $option->od_iov ?> <?= $option->od_price != 0 ? "(". Currency::getSign() . number_format($option->od_price , 2) .")" : "" ?>
																			<?php
																			//echo "<b>" . $option->od_iov . "</b>";
																			$n++;
																		}
																	}else{
																		
																	}
					                                			?><br />
					                                		</td>
					                                		<td class="text-right"><br />
					                                			<!-- <br />Price: <b><?= Currency::getSign()?><?= number_format($order->oi_gtotal, 2) ?></b><br />
					                                			Shipping cost: <b><?= Currency::getSign()?><?= number_format($order->oi_shipping_cost, 2) ?></b><br />
					                                			Fee: <b><?= Currency::getSign()?><?= number_format($order->oi_commission_value, 2) ?></b><br /> -->
					                                			<b><?= Currency::getSign()?><?= number_format($order->oi_gtotal + $order->oi_shipping_cost + $order->oi_commission_value, 2) ?></b><br/>
					                                		</td>
					                                	</tr>	
														<?php
													}else{
														
													}
			                                	?>
			                                </tbody>
			                            </table>
			                        </div><br />
	                   	 		</div>
								<?php
							}else{
								?>
								<div class="col-lg-8">
		                        	<div class="padding-top-2x mt-2 hidden-lg-up"></div>
		                        	<div class="col-md-12 text-center">
		                        		<img class="d-block m-auto" src="<?= PORTAL?>assets/medias/iecommerce/img/404_art.jpg" style="width: 100%; max-width: 550px;" alt="404">
		                        		<h2>Order not found</h2>
		                        		<a href="<?= PORTAL ?>account/order">Go back</a>
		                        	</div>
		                        </div>
								<?php
							}
						break;
						
						default:
							?>
								<div class="col-lg-8">
		                        	<div class="padding-top-2x mt-2 hidden-lg-up"></div>
		                        	<div class="col-md-12 text-center">
		                        		<img class="d-block m-auto" src="<?= PORTAL?>assets/medias/iecommerce/img/404_art.jpg" style="width: 100%; max-width: 550px;" alt="404">
		                        		<h2>Order not found</h2>
		                        		<a href="<?= PORTAL ?>account/order">Go back</a>
		                        	</div>
		                        </div>
							<?php
							
						break;
					}
                break;
                case "":
                case "profile":
                    ?>
                    <div class="col-lg-8">
                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                        <form class="row" action="" method="POST" enctype="multipart/form-data">
						<?php
							$cid =  $_SESSION['customer_id'];
							$c = customers::getBy(["c_id" => $cid]);
							if(count($c) > 0){
								$c = $c[0];
							
						?>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-fn">Full Name</label>
									<input class="form-control cname" type="text" id="account-fn" name="c_name" value="<?= $c->c_name ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-fn">Gender</label>
									<select class="form-control" id="" name="gender" required>
										<option value="">Select Gender...</option>
										<?php
											foreach(Setting::$gender as $a => $b){
												?>
													<option value="<?= $a ?>" <?= $a == $c->c_gender? "selected" : "" ?> ><?= $b ?></option>
												<?php
											}
										?>
					                	
					                </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-email">E-mail Address</label>
									<input class="form-control cemail" type="email" id="account-email" value="<?= $c->c_email ?>" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-phone">Phone Number</label>
									<input class="form-control phone" type="text" id="account-phone" name="c_phone" value="<?= $c->c_phone ?>" required>
								</div>
							</div>
							<div class="col-12">
								<hr class="mt-2 mb-3">
								<div class="col-md-12 text-center">
									<i>Refund order will tranfered to this account number</i>
								</div>
								
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-fn">Bank</label>
									<select class="form-control" id="" name="c_bank" required>
										<option value="">Please Select</option>
										<?php
											foreach(Setting::$bankName as $a => $b){
												?>
													<option value="<?= $a ?>" <?= $a == $c->c_bank? "selected" : "" ?> ><?= $b ?></option>
												<?php
											}
										?>
					                	
					                </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-phone">Account Number</label>
									<input class="form-control phone" type="text" id="account-acc" name="c_acc" value="<?= $c->c_acc ?>" required>
								</div>
							</div>
							<div class="col-12">
								<hr class="mt-2 mb-3">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-pass">Username</label>
									<input class="form-control npass" type="text" id="" name="c_login" value="<?= $c->c_login ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-pass">Current Password</label>
									<input class="form-control npass" type="password" id="account-pass" name="old_pass">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-pass">New Password</label>
									<input class="form-control npass" type="password" id="account-pass" name="n_pass">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-confirm-pass">Confirm Password</label>
									<input class="form-control cpass" type="password" id="account-confirm-pass" name="c_pass">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="account-confirm-pass">Profile Picture</label>
									<div class="custom-file">
				                  <input class="custom-file-input" type="file" accept="image/*" name="file" value="<?=  $c->c_picture ?>">
				                  <label class="custom-file-label" for="file-input">Choose file...</label>
				                </div>
								</div>
							</div>
							<div class="col-12">
                            <hr class="mt-2 mb-3">
								<div class="d-flex flex-wrap justify-content-between align-items-center">
									<div class="custom-control custom-checkbox d-block">
									</div>
									<?php
			            				Controller::form("account",
			            				[
			            				"action"  => "update"  
			            				]);
			            			?>
									<button class="btn btn-primary margin-right-none" type="">Update Profile</button>	
									
								</div>
							</div>
						  <?php
							}
						  ?>
                        </form>
					</div>
                    <?php
                break;
                
                case "address":
                
					switch (url::get(2)) {
						case "add":
							?>
							<div class="col-lg-8">
		                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
		                        <div class="row">
		                        	<div class="col-md-6"><h4>Address</h4></div>
		                        	<div class="col-md-6 text-right"><a class="btn btn-outline-primary btn-sm" href="<?= PORTAL ?>account/address">Back</a></div>
		                        </div>
		                        <hr class="padding-bottom-1x">
		                        <form class="row">
									<div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-company">Full Name</label>
		                                    <input class="form-control ca-name" type="text" id="" value="" placeholder="Full name">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-company">Email</label>
		                                    <input class="form-control ca-email" type="text" id="" value="" placeholder="Email">
		                                </div>
		                            </div>
		                            <div class="col-md-12">
		                                <div class="form-group">
		                                    <label for="account-company">Address</label>
		                                    <textarea class="form-control ca-address" placeholder="Address"></textarea>
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    <label for="account-company">Phone Number</label>
		                                    <input class="form-control ca-phone" type="text" id="" value="" placeholder="Phone Number">
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    <label for="account-country">Country</label>
											<select class="form-control ca-country" id="" name="c_country">
												<?php
													foreach(countries::list() as $t){
														?>
														<option value="<?= $t->c_code ?>" ><?= $t->c_name ?></option>
														<?php
													}
												?>
											</select>
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    <label for="account-city">State/Province</label>
		                                    <input class="form-control ca-state" type="text" id="" value="" placeholder="State">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-city">City</label>
		                                    <input class="form-control ca-city" type="text" id="" value="" placeholder="City">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-zip">ZIP/Postal Code</label>
		                                    <input class="form-control ca-postal" type="text" id="" value="" placeholder="ZIP/Postal Code">
		                                </div>
		                            </div>
		                            <div class="col-12 padding-top-1x">
		                                <!-- <h4>Shipping Address</h4>
		                                <hr class="padding-bottom-1x">
		                                <div class="custom-control custom-checkbox d-block">
		                                    <input class="custom-control-input" type="checkbox" id="same_address" checked>
		                                    <label class="custom-control-label" for="same_address">Same as Contact Address</label>
		                                </div> -->
		                                <hr class="margin-top-1x margin-bottom-1x">
		                                <div class="text-right">
		                                    <button class="btn btn-success margin-bottom-none addAddress" type="button">Save</button>
		                                </div>
		                            </div>
	                            </form>
							<?php
						break;
						case "edit":
							?>
							<div class="col-lg-8">
		                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
		                        <div class="row">
		                        	<div class="col-md-6"><h4>Address</h4></div>
		                        	<div class="col-md-6 text-right"><a class="btn btn-outline-primary btn-sm" href="<?= PORTAL ?>account/address">Back</a></div>
		                        </div>
		                        <hr class="padding-bottom-1x">
		                        <form class="row">
								<?php
									$cid =  $_SESSION['customer_id'];
									$c = customer_address::getBy(["ca_customer" => $cid, "ca_id" => url::get('3')]);
									if(count($c) > 0){
										$c = $c[0];
								?>
									<div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-company">Full Name</label>
		                                    <input class="form-control ca-name" type="text" id="" value="<?= $c->ca_name ?>" placeholder="Full name">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-company">Email</label>
		                                    <input class="form-control ca-email" type="text" id="" value="<?= $c->ca_email ?>" placeholder="Email">
		                                </div>
		                            </div>
		                            
		                            <div class="col-md-12">
		                                <div class="form-group">
		                                    <label for="account-company">Address</label>
		                                    <textarea  class="form-control ca-address"><?= $c->ca_address ?></textarea>
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    <label for="account-company">Phone Number</label>
		                                    <input class="form-control ca-phone" type="text" id="" value="<?= $c->ca_phone ?>" placeholder="Phone Number">
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    <label for="account-country">Country</label>
											<select class="form-control ca-country" id="checkout-country" name="">
												<?php
													foreach(countries::list() as $t){
														?>
														<option value="<?= $t->c_code ?>" <?= ($t->c_code == $c->ca_country ? "selected" : "") ?>><?= $t->c_name ?></option>
														<?php
													}
												?>
											</select>
		                                </div>
		                            </div>
		                            <div class="col-md-4">
		                                <div class="form-group">
		                                    <label for="account-city">State/Province</label>
		                                    <input class="form-control ca-state" type="text" id="account-city" value="<?= $c->ca_state ?>">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-city">City</label>
		                                    <input class="form-control ca-city" type="text" id="account-city" value="<?= $c->ca_city ?>">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="account-zip">ZIP/Postal Code</label>
		                                    <input class="form-control ca-postal" type="text" id="account-zip" value="<?= $c->ca_postal ?>" required>
		                                </div>
		                            </div>
		                            <div class="col-12 padding-top-1x">
		                                <!-- <h4>Shipping Address</h4>
		                                <hr class="padding-bottom-1x">
		                                <div class="custom-control custom-checkbox d-block">
		                                    <input class="custom-control-input" type="checkbox" id="same_address" checked>
		                                    <label class="custom-control-label" for="same_address">Same as Contact Address</label>
		                                </div> -->
		                                <hr class="margin-top-1x margin-bottom-1x">
		                                <div class="text-right">
		                                    <button class="btn btn-primary margin-bottom-none updateAddress" type="button">Update Address</button>
		                                </div>
		                            </div>
	                            <?php
		                            }
	                            ?>
	                           </form>
                  			</div>
							<?php
						break;
						
						default:
							?>
							<div class="col-lg-8">
		                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
		                        <div class="table-responsive">
		                            <table class="table table-hover margin-bottom-none">
		                                <thead>
		                                    <tr>
		                                        <th class="text-left"><h4>My Addresses</h4></th>
		                                        <th class="text-right"><a class="btn btn-primary btn-sm btn-block" href="<?= PORTAL ?>account/address/add">Add Address</a></th>
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                	<?php
		                                		$cust_id = $_SESSION['customer_id'];
		                                		$ca = customer_address::getBy(['ca_customer' => $cust_id]);
		                                		if(count($ca) > 0){
		                                			foreach($ca as $cal){
		                                				$def = "table-warning";
														$country = countries::getBy(["c_code" => $cal->ca_country]);
														if(count($country) > 0){
															$country = $country[0];
															
														}else{
															
														}
		                                				?>
			                                				<tr class="<?= $cal->ca_status == 1 ? $def : "" ?> address-<?= $cal->ca_id ?>">
						                                        <td width="80%">
						                                        	Name : <b><?= $cal->ca_name ?></b><br />
						                                        	Phone : <?= $cal->ca_phone ?><br />
						                                        	Address : <?= $cal->ca_address ?> <?= $cal->ca_postal ?> <?= $cal->ca_city ?>, <?= $cal->ca_state ?>, <?= $country->c_name ?>
						                                        	<?php
						                                        		$t = countries::getBy(["c_id" => $cal->ca_country]);
																		if(count($t) > 0){
																			$t = $t[0];
																			
																			echo $t->c_name;
																		}
						                                        	?>
						                                        </td>
						                                        <td  class="text-right">
						                                        	<button 
			                                        					class="btn <?= $cal->ca_status==1 ? "btn-secondary" : "btn-success" ?> btn-sm btn-block select-address" 
			                                        					ca-id="<?= $cal->ca_id ?>"
			                                        					type="button" 
			                                        					<?= $cal->ca_status==1 ? "disabled" : "" ?>
			                                        					data-row="<?= $cal->ca_id ?>"
			                                    					>
			                                    						Set As Default
			                                						</button>
						                                        	<a class="btn btn-outline-primary btn-sm btn-block" href="<?= PORTAL ?>account/address/edit/<?= $cal->ca_id ?>">Edit</a>
						                                        	<a class="btn btn-outline-danger btn-sm btn-block del-address" data-toggle="modal" data-target="#deleteAddress" data-item="<?= $cal->ca_id ?>" title="Remove Address" style="cursor: pointer;">
						                                                Delete
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
		                        <hr>
		                    </div>
							<?php
						break;
					}
                break;
                
                case "wishlist":
                    ?>
                    <div class="col-lg-8">
                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                        <!-- Wishlist Table-->
                        <div class="table-responsive wishlist-table margin-bottom-none">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th class="text-center"><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modalCentered2">Clear Wishlist</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                            	<?php
                            		$cust = $_SESSION["customer_id"];
                            		$wish = wishlist::getBy(["w_customer" => $cust]);
									if(!empty($wish)){
										foreach($wish as $t){
											$item = items::getBy(["i_key" => $t->w_item]);
											if(count($item) > 0){
												$item = $item[0];
												$pic = item_picture::getBy(["ip_item" => $item->i_id]);
												?>
												<tr>
			                                        <td>
			                                            <div class="product-item"><a class="product-thumb" href="<?= PORTAL ?>categories/view_item/<?= $item->i_key ?>"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product"></a>
			                                                <div class="product-info">
			                                                    <h4 class="product-title"><a href="<?= PORTAL ?>categories/view_item/<?= $item->i_key?>"><?= $item->i_name ?></a></h4>
			                                                    <div class="text-lg text-medium text-muted"><?= Currency::getSign() ?><?= number_format($item->i_price , 2) ?></div>
			                                                    <!-- <div>Availability:
			                                                        <div class="d-inline text-success">In Stock</div>
			                                                    </div> -->
			                                                </div>
			                                            </div>
			                                        </td>
			                                        <td class="text-center">
			                                            <a class="remove-from-cart rem-wish" data-toggle="modal" data-target="#modalCentered" data-item="<?= $item->i_key ?>" title="Remove item" style="cursor: pointer;">
			                                                <i class="icon-cross"></i>
			                                            </a>
			                                        </td>
			                                    </tr>
												<?php
											}
											
										}
									}else{
										?>
										<tr>
	                                        <td class="center-text">
	                                        	Your wishlist is empty.
	                                        </td>
	                                    </tr>
										<?php
									}
                            	?>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mb-4">
                    </div>
                    <?php
                break;
				
				default:
					
					?>
						<div class="col-lg-8">
                        	<div class="padding-top-2x mt-2 hidden-lg-up"></div>
                        	<div class="col-md-12 text-center">
                        		<img class="d-block m-auto" src="<?= PORTAL?>assets/medias/iecommerce/img/404_art.jpg" style="width: 100%; max-width: 550px;" alt="404">
                        		<h2>Page not found</h2>
                        		<a href="<?= PORTAL ?>account/profile">Go back</a>
                        	</div>
                        </div>
					<?php
				break;
            }
            ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCentered" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title">Remove Item From Wishlist</h4>
        		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         	</div>
         	<div class="modal-body">
            	<p>Are you sure to remove this item?</p>
          	</div>
          	<div class="modal-footer">
            	<button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            	<input class="wish-id" type="hidden" value="">
            	<button class="btn btn-danger btn-sm deleteWish" data-row="" type="button">Yes</button>
          	</div>
        </div>
  	</div>
</div>
<div class="modal fade" id="modalCentered2" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title">Remove Item From Wishlist</h4>
        		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         	</div>
         	<div class="modal-body">
            	<p>Are you sure to remove all Wishlist?</p>
          	</div>
          	<div class="modal-footer">
            	<button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            	<button class="btn btn-danger btn-sm deleteAllWish" data-row="" type="button">Yes</button>
          	</div>
        </div>
  	</div>
</div>
<div class="modal fade" id="deleteAddress" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title">Remove Address</h4>
        		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         	</div>
         	<div class="modal-body">
            	<p>Are you sure?</p>
          	</div>
          	<div class="modal-footer">
            	<button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            	<input class="address-id" type="hidden" value="">
            	<button class="btn btn-danger btn-sm delete-address" data-row="" type="button">Yes</button>
          	</div>
        </div>
  	</div>
</div>
<div class="modal fade" id="cancelOrder" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title">Cancel Order</h4>
        		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         	</div>
         	<div class="modal-body">
            	<p><b>Are you sure to cancel the order?</b></p>
            	Reason:
            	<textarea class="form-control order-reason"></textarea>
          	</div>
          	<div class="modal-footer">
            	<button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            	<input class="order-id" type="hidden" value="">
            	<button class="btn btn-danger btn-sm cancel-order-after" data-row="" type="button">Yes</button>
          	</div>
        </div>
  	</div>
</div>
<?php
	// $_token = F::Encrypt(F::UniqKey("account"));
	// $token = Token::create($_token, "account_");
?>
<script>

		$(document).on("click", ".profile", function(){
			$list = listData();
			$text = JSON.stringify($list);
			
			$.ajax({
				url : "<?= PORTAL_API ?>customer/account",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "updateProfile") ?>",
					data : base64_encode($text)
				},
				dataType : "JSON" 
			}).done(function(res){
				
				if(res.status == "success"){
					Alert("success", res.message);
				}else{
					Alert("error", res.message);
				}
			})
			
		});
		
		$(document).on("click", ".cancel-order-after", function(){
			// console.log('asdasdas')
			// console.log($(".order-id").val());
			// console.log($(".order-reason").val());
			
			$.ajax({
				url : "<?= PORTAL_API ?>customer/account",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "cancelOrder") ?>",
					order_id : $(".order-id").val(),
					order_reason : $(".order-reason").val()
				},
				dataType : "JSON" 
			}).done(function(res){
				 console.log(res)
				if(res.status == "success"){
					// Alert("success", res.message);
					window.location = window.location;
				}else{
					Alert("error", res.message);
				}
			})
			
		});
		
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
					//window.location = window.location;
				}else{
					Alert("error", res.message);
				}
			})
		});
		
		function listData(){
			$list = {
				cname: $(".cname").val(),
				cphone: $(".phone").val(),
				npass: $(".npass").val(),
				cpass: $(".cpass").val()
			}
			return $list;
		};
		
		$(document).on("click", ".deleteWish", function(){
			$.ajax({
				url : "<?= PORTAL_API ?>item/wish_list",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "deleteWish") ?>",
					item: $(".wish-id").val()
				},
				dataType : "json" 
			}).done(function(res){
				//console.log(res);
				if(res.status == "success"){
					//Alert("success", res.message);
					//displayData(res.data);
					//console.log(res.data);
					window.location = window.location;
				}else{
					Alert("error", res.message);
				}
			})
			
		});
		
		$(document).on("click", ".deleteAllWish", function(){
			$.ajax({
				url : "<?= PORTAL_API ?>item/wish_list",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "deleteAllWish") ?>"
				},
				dataType : "json" 
			}).done(function(res){
				//console.log(res);
				window.location = window.location;
			})
			
		});
		
		$(document).on("click", ".addAddress", function(){
			$.ajax({
				url : "<?= PORTAL_API ?>customer/account",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "addAddress") ?>",
					ca_name: $(".ca-name").val(),
					ca_address: $(".ca-address").val(),
					ca_country: $(".ca-country").val(),
					ca_state: $(".ca-state").val(),
					ca_city: $(".ca-city").val(),
					ca_phone: $(".ca-phone").val(),
					ca_email: $(".ca-email").val(),
					ca_postal: $(".ca-postal").val()
				},
				dataType : "JSON" 
			}).done(function(res){
				//console.log(res);
				//window.location = window.location;
				
				if(res.status == "success"){
					Alert("success", res.message);
					setTimeout(function(){
			           window.location.href = '<?= PORTAL ?>account/address';
			        }, 1000);
				}else{
					Alert("error", res.message);
				}
			})
			
		});
		
		$(document).on("click", ".updateAddress", function(){
			$.ajax({
				url : "<?= PORTAL_API ?>customer/account",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "updateAddress") ?>",
					ca_name: $(".ca-name").val(),
					ca_address: $(".ca-address").val(),
					ca_country: $(".ca-country").val(),
					ca_state: $(".ca-state").val(),
					ca_city: $(".ca-city").val(),
					ca_phone: $(".ca-phone").val(),
					ca_email: $(".ca-email").val(),
					ca_postal: $(".ca-postal").val(),
					ca_id: "<?= url::get('3') ?>"
				},
				dataType : "JSON" 
			}).done(function(res){
				//console.log(res);
				//window.location = window.location;
				
				if(res.status == "success"){
					Alert("success", res.message);
					
				}else{
					Alert("error", res.message);
				}
			})
			
		});
		
		$(document).on("click", ".delete-address", function(){
			$.ajax({
				url : "<?= PORTAL_API ?>customer/account",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action: "<?= F::Encrypt(TOKEN_SECURE . "deleteAddress") ?>",
					ca_id: $(".address-id").val()
				},
				dataType : "JSON" 
			}).done(function(res){
				//console.log(res);
				//window.location = window.location;
				
				if(res.status == "success"){
					window.location = window.location;
				}else{
					Alert("error", res.message);
				}
			})
			
		});
		$(document).on("click", ".rem-wish", function () {
		    	var cart_id = $(this).attr('data-item');
		    	
		     	$(".modal-footer, .wish-id").val(cart_id);
		});
		
		$(document).on("click", ".del-address", function () {
		    	var address_id = $(this).attr('data-item');
		    	
		     	$(".modal-footer, .address-id").val(address_id);
		});
		
		$(document).on("click", ".cancel-order", function () {
		    	var order_id = $(this).attr('order-id');
		    	
		     	$(".modal-footer, .order-id").val(order_id);
		});
</script>