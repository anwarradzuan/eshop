<style>
@media screen and (max-width: 769px) {
	.select-category{
		position: absolute;
		z-index: 1900;
		top: 50% !important;
		left: -19px !important;
		transform: translate(0, -53%);
	}
	.search-product{
		display: block;
		position: relative;
		width: 118%;
		left: -11%;
		padding-left: 168px !important;
		top: 5px !important;
	}
	.cart-item{
		display: table-cell;
		vertical-align: middle;
		position: relative;
	}
	#select-input{
		width: 145px  !important;
	}
}
@media screen and (max-width: 717px) {
	.select-category{
		position: absolute;
		z-index: 1900;
		top:48% !important;
		left: 9px !important;
		transform: translate(0, -53%);
	}
	.search-product{
		display: block;
		position: relative;
		width: 81%;
		left: -3%;
	}
	.cart-item{
		display: table-cell;
		vertical-align: middle;
		top: -63px;
		position: relative;
	}
	#select-input{
		width: 145px  !important;
	}
	.logo-mie{
		display : none !important;
	}
	.input-search{
		padding-left: 152px !important;
		padding-right: 0 !important;
	}
	.icon-search-main{
		right: 103px !important;
		margin-top: -2px;
		z-index: 1;
	}
}
</style>

<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<div class="container-fluid">
	<header class=" navbar navbar-sticky">
		<div class="">
			<div class="row">
				<div class="col-md-3">
					<div class="site-branding">
						<div class="inner logo-mie">
			            <?php
			            	$logo = infos::getBy(["i_status" => 1]);
			            ?>
			            <!-- Site Logo-->
			            <a class="site-logo" href="<?= PORTAL_PUBLIC ?>">
							<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= (count($logo) > 0 ?  $logo[0]->i_logo: "") ?>" alt="Intelligent eCommerce" style="width:260px !important">
			            </a>
			            </div>
		            </div>
				</div>
				
				<div class="col-md-6 search-box" style="padding-top: 1%; position: relative;">
					<div class="input-group form-inline select-category" style="position: absolute; z-index: 1900; top: 50%; left: 20px; transform: translate(0, -53%)">
						<select class="form-control category-select" id="select-input" style=" width: 250px;" onchange="location = this.value;">
							<option value="<?= PORTAL_PUBLIC ?>categories/">All</option>
							<?php
								$cat_url = url::get('1');
								foreach (category::list() as $cat) {
									
									?>
										<option value="<?= PORTAL_PUBLIC ?>categories/<?= $cat->c_name ?>" <?= ($cat->c_name == $cat_url ? "selected" : "") ?> ><?= $cat->c_name ?></option>
									<?php
								}
							?>
						</select>
					</div>
					
					<div class="input-group form-group">
						<span class="input-group-btn icon-search-main">
							<button class="btn" type="submit" disabled="">
								<i class="icon-search"></i>
							</button>
						</span>
						<input class="form-control form-control-lg search-product input-search" type="text" style="padding-left: 260px;" placeholder="Search">
						<div class="result-box" style="position: absolute; align:right; margin-top: 2%; padding-top: 10px; background-color: white"></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="toolbar">
				        <div class="inner">
				            <div class="tools cart-item">
				            	<?php
				                $url_cart = url::get("0");
								if($url_cart != "cart" AND $url_cart != "check_out"){
				                    if(isset($_SESSION["customer_login"])){
				                        ?>
				                        <div class="cart cart_view" style="background-color: rgb(243, 156, 18); color: white; border: 1px solid #d09829;">
				                        	<a href="<?= PORTAL_CUSTOMER ?>cart"></a>
				                        	<i class="icon-bag"></i>
				                        	<span class="count" id="quantity_cart">0</span>
				                        	<span class="subtotal">
				                        		<?= Currency::getSign()?><span id="cart_total">0</span>
				                        	</span>
				                        	
					                        <div class="toolbar-dropdown">
					                        	<div id="cart-item-container">
					                        	<?php
					                        		$customer = $_SESSION['customer_id'];
					                        		$cart = carts::getBy(["c_customer" => $customer], ["limit" => 5]);
													
													if(count($cart) > 0){
														$cartno = 0;
														foreach ($cart as $xy) {
															$pic = item_picture::getBy(["ip_item" => $xy->c_item]);
															$item = items::getBy(["i_id" => $xy->c_item]);
															if(count($item) > 0){
																$item = $item[0];
																?>
																<div class="dropdown-product-item cart-item-<?= $cartno ?>">
									                                <span class="dropdown-product-remove remove-cart" data-row="<?= $xy->c_id ?>" data-no="<?= $cartno ?>"><i class="icon-cross"></i></span>
									                                <a class="dropdown-product-thumb" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $item->i_key ?>">
									                                    <img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product">
									                                </a>
									                                <div class="dropdown-product-info">
									                                    <a class="dropdown-product-title" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $item->i_key ?>"><?= F::trimWord($item->i_name, 24) ?></a>
									                                    <span class="dropdown-product-details">(x<?= $xy->c_quantity ?>) = <?= Currency::getSign()?><?= number_format($xy->c_gtotal + $xy->c_shipping_cost, 2)  ?>
								                                    	<?php
								                                    		$cart_d = cart_detail::getBy(["cd_cart" => $xy->c_id]);
																			if(count($cart_d) > 0){
																				$kotak = [];
																				foreach ($cart_d as $yyy){
																					$kotak[] = $yyy->cd_iov;
																				}
																				echo implode(', ', $kotak);
																			}else{}
								                                    	?></span>
									                                </div>
									                            </div>
																<?php
															}
															$cartno++;
														}
													}else{
														?>
														<div class="dropdown-product-item" id="cart-empty-message">
							                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
							                                <div class="dropdown-product-info">
							                                    <a class="dropdown-product-title">Your Cart Is Empty</a>
							                                </div>
							                            </div>
														<?php
													}
					                        	?>
				                        		</div>
				                        		<?php
				                        			$cart_check = carts::getBy(["c_customer" => $customer]);
													if(count($cart_check) > 0){
														?>
														<div class="toolbar-dropdown-group">
							                                <div class="column"><a class="btn btn-sm btn-block btn-warning" href="<?= PORTAL_CUSTOMER ?>cart">View Cart</a></div>
							                                <!-- <div class="column"><a class="btn btn-sm btn-block btn-success" href="<?= PORTAL_CUSTOMER ?>check_out/">Checkout</a></div> -->
							                            </div>
														<?php
													}else{
														
													}
				                        		?>
					                        	
					                        </div>
					                    </div>
				                        <?php
				                    }
								}
								?>
				                <?php
				                    if(!isset($_SESSION["customer_login"])){
				                        ?>
				                           	<div class="cart" style="background-color: rgb(243, 156, 18); color: white; border: 1px solid #d09829;">
				                           		<a href="<?= PORTAL ?>login"></a>
				                           		<i class=""></i>
				                           		<span class="count" style""><b>Login</b></span>
				                           	</div>
				                        <?php
				                    }else{
				                        ?>
				                        <div class="account" style="background-color: rgb(243, 156, 18); color: white; border: 1px solid #d09829;">
				                        	<?php
				                        		$x = $_SESSION['customer_id'];
												$customer = customers::getBy(["c_id" => $x]);
												if(count($customer) > 0){
													$customer = $customer[0];
													?>
													<a href="<?= PORTAL_CUSTOMER ?>account/profile"></a>
					                                <i class="icon-head"></i>
					                                <ul class="toolbar-dropdown" style="margin-left: 0px !important; left: -350% !important;">
					                                    <li class="sub-menu-user">
					                                    	<?php
					                                    		if(!empty($customer->c_picture)){
					                                    			
																	?>
																		<div class="user-ava">
																			<a href="<?= PORTAL_CUSTOMER ?>account/profile">
																				<img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/<?= $customer->c_picture ?>" alt="<?= $customer->c_name ?>">
																			</a>
																		</div>
																	<?php
																	
					                                    		}else{
					                                    			
																	?>
																		<div class="user-ava"><img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/default.png" alt="<?= $customer->c_name ?>"></div>
																	<?php
																	
					                                    		}
					                                    	?>
					                                        <div class="user-info">
					                                            <h6 class="user-name"><?= $customer->c_name ?></h6><span class="text-xs text-muted"></span>
					                                        </div>
					                                    </li>
					                                    <li><a href="<?= PORTAL_CUSTOMER ?>account/profile">My Profile</a></li>
					                                    <li><a href="<?= PORTAL_CUSTOMER ?>account/order">Orders List</a></li>
					                                    <li><a href="<?= PORTAL_CUSTOMER ?>account/wishlist">Wishlist</a></li>
					                                    <li class="sub-menu-separator"></li>
					                                    <li><a href="<?= PORTAL_CUSTOMER ?>logout"> <i class="icon-unlock"></i>Logout</a></li>
					                                </ul>
													<?php
												}
				                        	?>
				                        </div>
				                        <?php
				                    }
				                ?>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</header>
</div>
<script>
	$(document).click(function(){  
  		$('.result-box').hide(); //hide the button
	});

	$(document).on("keyup", ".search-product", function(e){
		$.ajax({
			url : "<?= PORTAL_API ?>item/search",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "search") ?>",
				key : $(this).val()
			},
			dataType : "json" 
		}).done(function(res){
			//console.log(res);
			if(res.status == "success"){
				$(".result-box").html(res.data).show();
				
				if(e.keyCode == 13){
					e.preventDefault();
					window.location = "<?= PORTAL?>categories/view_item/"+ res.key;
				}
			}else{
				$(".result-box").html(res.data).show();
				
				if(e.keyCode == 13){
					e.preventDefault();
					window.location = "<?= PORTAL?>categories/search/"+ res.key;
				}
			}
		})	
	});
	
	$(document).on("click", ".remove-cart", function(){
		$(".cart-item-" + $(this).attr("data-no")).remove();
		$.ajax({
			url : "<?= PORTAL_API ?>cart",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "removeCart") ?>",
				cart_id: $(this).attr("data-row")
				
			},
			dataType : "json" 
		}).done(function(res){
			//console.log(res);
			if(res.status == "success"){
			}else{
				Alert("error", res.message);
			}
		})	
	});
	
    <?php
    	if(isset($_SESSION["customer_id"])){
    		?>
    		function total_cart(){
		        $.ajax({
		            url : "<?= PORTAL_API ?>cart",
		            method : "POST",
		            data : {
		                akey : "<?= TOKEN_SECURE ?>",
		                action: "<?= F::Encrypt(TOKEN_SECURE . "totalCart") ?>"
		            },
		            dataType:"json"
		        }).done(function(res){
		        	//console.log(res);
		            if(res.status == "success"){
		            	rows = res.data;
		            	quan = res.quantity
		            	if(rows == null){
		            		rows = 0;
		            		
							$("#cart_total").html(rows);
							
		            	}else{
		            		$("#quantity_cart").html(quan);
		            		$("#cart_total").html(rows.toFixed(2));
		            	}
		            }else{
		                rows = 0;
						
						$("#cart_total").html(rows);
		            }
		        })
		    };
		    
    		(function Polling(){
				setTimeout(function(){
					
					total_cart();
					
					if(true){
						Polling();
					}
				}, 1000);
			})();
    		<?php
    	}else{
    		
    	}
    ?>
    
</script>