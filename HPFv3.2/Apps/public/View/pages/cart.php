<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
<?php
	Page::load("widget/public/page_title");
	
	$check_cart = carts::getBy(["c_customer" => $_SESSION["customer_id"]]);
	if(count($check_cart) > 0){
		?>
		<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<div class="row">
	      	<div class="col-xl-9 col-lg-8">
				<!-- <div class="custom-control custom-checkbox custom-control-inline text-center">
					<input class="custom-control-input text-center checkAll" checked type="checkbox" id="ex-check-5">
					<label class="custom-control-label" for="ex-check-5">Select All</label>
				</div><br/><br/><br/> -->
				<?php
					$bs = DB::Conn()->query("SELECT DISTINCT c_company FROM carts WHERE c_customer = ? ORDER BY c_id DESC", ["c_customer" => $_SESSION["customer_id"]])->results();
					$ntotal = 0;
					$nrow = 0;
					foreach($bs as $b){
						$c = company::getBy(["c_id" => $b->c_company]);
						if(count($c) > 0){
							$c = $c[0];
							if($c->c_status == 0){
								$border_color =	"border-danger";
								$bg_color = "bg-danger";
								$text = "<span class='fa fa-warning'></span> This company is not available anymore. Please remove this item.";
								$tr_com = "table-danger";
							}else{
								$border_color =	"border-info";
								$bg_color = "bg-info";
								$text = "";
								$tr_com = "";
							}
				?>
						<div class="card <?= $border_color ?>">
							<div class="card-header <?= $bg_color ?> text-white">
								<div class="row">
									<div class="col-md-4">
										Company: <b><a href="<?= PORTAL_PUBLIC ?>company/<?= $c->c_key ?>" style="text-decoration: none; color: white;"><?= $c->c_name ?></a></b>
									</div>
									<div class="col-md-8">
										<?= $text ?>
									</div>
								</div>
							</div>
							
							<div class="card-body">
								<table class="table table-hover table-bordered table-responsive">
									<thead class="table-info">
										<tr>
											<!-- <th class="text-center" width="5%">
												<div class="custom-control custom-checkbox custom-control-inline text-center">
												</div>	
											</th> -->
											<th class="text-left">Image</th>
											<th class="text-left">Item Details</th>
											<th class="text-right" width="15%">Price (<?= Currency::getSign() ?>)</th>
											<th class="text-center" width="5%">Quantity</th>
											<th class="text-right" width="15%">Shipping Cost (<?= Currency::getSign() ?>)</th>
											<th class="text-right" width="15%">Total (<?= Currency::getSign() ?>)</th>
											<th class="text-center" width="10%">:::</th>
										</tr>
									</thead>
									
									<tbody>
									<?php
										$cis = carts::getBy(["c_company" => $c->c_id, "c_customer" => $_SESSION["customer_id"]], ["order" => "c_time DESC"]);
										$tquantity = 0;
										$ttotal = 0;
										$ttemp = 0;
										$qtemp = 0;
										
										foreach($cis as $ci){
											$i = items::GetBy(["i_id" => $ci->c_item]);
											
											if(count($i) > 0){
												$i = $i[0];
												
												$pt = $i->i_price * $ci->c_quantity;
											
												foreach(item_promotion::getBy(["ip_item" => $i->i_id]) as $ips){
													if($ips->ip_type == 1){
														$pt = $pt - ($pt * $ips->ip_value / 100);
														//$pv = $ips->ip_value;
													}else{
														$pt = $pt - $ips->ip_value;
														//$pv = "";
													}
												}
												
												if($i->i_status == 1){
													$tr_bg = "";
													$note = "";
												}else{
													$tr_bg = "table-danger";
													$note = "<br /><br /><div class='alert-danger'><i class='icon-ban'></i>This item is not available anymore. Please remove the item.</div>";
												}
										?>
										<tr class="<?= $tr_bg ?><?= $tr_com ?>">
											<!-- <td class="text-center">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input checked class="custom-control-input chk chk-<?= $nrow ?>" data-key="<?= $ci->c_key ?>" type="checkbox" id="ex-check-<?= $ci->c_id ?>">
													<label class="custom-control-label" for="ex-check-<?= $ci->c_id ?>"></label>
												</div>
											</td> -->
											<td class="text-center" width="10%">
												<?php
													$pic = item_picture::getBy(["ip_item" => $i->i_id]);
													?>
														<a class="product-thumb" href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $i->i_key ?>/<?= $i->i_name ?>"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product"></a>
													<?php
												?>
											</td>
											<td class="">
												<strong><?= $i->i_name ?></strong><br />
											<?php
												$cds = cart_detail::GetBy(["cd_cart" => $ci->c_id]);
												
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
													<b><?= $note ?></b>
												<?php
											?>
											</td>
											<td class="text-right">
												<?php
													$i_op = cart_detail::getBy(["cd_cart" => $ci->c_id]);
													if(count($i_op) > 0){
														$ori_price = 0;
														foreach($i_op as $iop){
															$ioc_price = $iop->cd_price;
															
															$ori_price += $ioc_price;
														}
														?>
															<?= Currency::getSign() ?><?= number_format(Currency::getPrice(($pt + $ori_price) * $ci->c_quantity), 2) ?>
														<?php
														$pt = ($pt + $ori_price) * $ci->c_quantity;
													}else{
														?>
														 	<?= Currency::getSign() ?><?= number_format(Currency::getPrice($pt), 2) ?>
														<?php
														$pt = $pt * $ci->c_quantity;
													}
			
												?>
											</td>
											<td class="text-center" width="10%">
												<?= $ci->c_quantity ?>
												<!-- <input type="number" class="form-control item-quantity quantity-<?= $ci->c_id ?>" data-cid="<?= $ci->c_id ?>" data-company="<?= $ci->c_company ?>" min="1" value="<?= $ci->c_quantity ?>"> -->
											</td>
											<td class="text-center">
												<?= Currency::getSign() ?><?= number_format(Currency::getPrice($ci->c_shipping_cost), 2) ?>
											</td>
											<td class="text-right subtotal subtotal-<?= $ci->c_id ?>"><?= number_format(Currency::getPrice($pt + $ci->c_shipping_cost), 2) ?></td>
											<td>
												<button class="btn btn-sm btn-danger rem-cart" data-toggle="modal" data-target="#removeCart" data-cid="<?= $ci->c_id ?>" >
													<span class="fa fa-trash"></span> Remove
												</button>
												<!-- <button class="btn btn-sm btn-outline-danger remove-cart3" data-row="<?= $ci->c_id ?>>
													<span class="fa fa-trash"></span> Delete
												</button> -->
												 
											</td>
										</tr>
										<?php
												$cb = false;
												
												if($c->c_status){
													$cb = true;
												}
												
												if($cb){
													if(!$i->i_status){
														$cb = false;
													}
												}
												
												if($cb){
													$ttemp += $pt + $ci->c_shipping_cost;
													$qtemp += $ci->c_quantity;
												}
												
												$tquantity += $ci->c_quantity;
												$ttotal += $pt + $ci->c_shipping_cost; 
											
											}
										}
									?>
										<tr>
											<td colspan="4" class="text-center">
												<strong>Total</strong>
											</td>
											<td class="text-center"><strong class="sumquan sumquan-<?= $c->c_id ?>"><?= $tquantity ?></strong></td>
											<td class="text-right"><strong class="sub-comp-total sub-comp-total-<?= $c->c_id ?>"><?= number_format($ttotal, 2) ?></strong></td>
										</tr>
									</tbody>
								</table>
							
							</div>
						</div>
						<br />
				<?php
						$ntotal += $ttemp;
						$nrow++;
						}
					}
				?>
					<div class="card">
						<div class="card-header">
							Summary
						</div>
						
						<div class="card-body">
							<table class="table table-hover table-fluid table-bordered">
								<tbody>
									<tr>
										<td>
											<h4>Total</h4>
										</td>
										<td class="text-right">
											<h4 class="total gtotal"><?= Currency::getSign() ?> <?= number_format($ntotal, 2) ?></h4>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="shopping-cart-footer">
					  	<div class="column"><a class="btn btn-outline-secondary" href="<?= PORTAL_PUBLIC ?>categories"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
					  	<div class="column"><button class="btn btn-success checkout">Checkout</button></div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4">
		            <aside class="sidebar">
		              	<div class="padding-top-2x hidden-lg-up"></div>
						<?php
							Page::load("widget/public/also_like");
							
							Page::load("widget/public/check_out_promo");
							
							Page::load("widget/public/promotion_widget");
						?>
		            </aside>
	          	</div>
				
			</div>
      	</div>
		<?php
	}else{
		?>
		<div class="container padding-bottom-3x mb-1">
			<div class="row">
				<div class="col-md-12">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<img src="<?= PORTAL_PUBLIC ?>assets/medias/iecommerce/img/no_result-404.png" alt="404 image" width="320">
					<h1>Your cart is empty</h1><br />
					<a class="btn btn-primary" href="<?= PORTAL_PUBLIC ?>categories">Go for shopping now</a>
				</div>
			</div>
		</div>
		<?php
	}
?>
</div>
<!-- Back To Top Button-->
<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="pswp__bg"></div>
  	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
  			<div class="pswp__item"></div>
  			<div class="pswp__item"></div>
  			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button pswp__button--share" title="Share"></button>
				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
				  			<div class="pswp__preloader__donut"></div>
						</div>
				  	</div>
				</div>
			</div>
		  	<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
		  	</div>
		  	<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
		  	<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
		  	<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
		 	</div>
		</div>
	</div>
</div>
<!-- Backdrop-->
<div class="site-backdrop"></div>
<div class="modal fade" id="removeCart" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title">Remove Item From Cart</h4>
        		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         	</div>
         	<div class="modal-body">
            	<p>Are you sure to remove this item?</p>
          	</div>
          	<div class="modal-footer">
            	<button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            	<input class="cart-id" type="hidden" id="cart_id" value="">
            	<button class="btn btn-danger btn-sm remove-cart3" data-row=""type="button">Yes</button>
          	</div>
        </div>
  	</div>
</div>
<?php
	// $_token = F::UniqKey();
	// $token = Token::create($_token, "cart");
?>
<script>
//window.onload = function(){
	
	$(document).on("click", ".checkout", function(){
		
		ckey = [];
		
		$(".chk").each(function(x){
			if(!$(this).is(":checked")){
				ckey.push($(this).attr("data-key"))
			}
		});
				
		$.ajax({
			url : "<?= PORTAL_API ?>cart",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "selectCart") ?>",
				//cart_key: ckey.join(","),
			},
			dataType : "json"  
		}).done(function(res){
			console.log(res)
			if(res.status == "success"){
				$(".total").text(res.data);
				
				window.location.href = "<?= PORTAL ?>check_out";	
				
			}else{
				$(".total").text("MYR 0.00");
			}
		})
	});
	
	$(document).on("click", ".chk, .checkAll", function(){
		ckey = [];
		
		$(".chk").each(function(x){
			if(!$(this).is(":checked")){
				ckey.push($(this).attr("data-key"))
			}
		});
				
		$.ajax({
			url : "<?= PORTAL_API ?>cart",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "selectCart") ?>",
				cart_key: ckey.join(","),
			},
			dataType : "json"  
		}).done(function(res){
			// console.log(res)
			if(res.status == "success"){
				$(".total").text(res.data);
			}else{
				$(".total").text("MYR 0.00");
			}
		})
	});

	$(document).on("click", ".remove-cart3", function(){
	//console.log("sadasd");
		$.ajax({
			url : "<?= PORTAL_API ?>cart",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "removeCart") ?>",
				cart_id: $(".cart-id").val(),
				
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
	
	$(document).on("change", ".item-quantity", function(){
			$row_id = $(this).attr("data-cid");
			$row_comp = $(this).attr("data-company");
			$.ajax({
				url : "<?= PORTAL_API ?>cart",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action		: "<?= F::Encrypt(TOKEN_SECURE . "quantity") ?>",
					quantity	: $(this).val(),
					cart_id		: $(this).attr("data-cid")
				},
				dataType : "json" 
			}).done(function(res){
				// console.log(res);
				if(res.status == "success"){
					$(".subtotal-" + $row_id).text(res.stotal)
					$(".sumquan-" + $row_comp).text(res.sumquan)
					$(".sub-comp-total-" + $row_comp).text(res.sub_com_total)
					//$(".gtotal").text(res.gtotal)
				}else{
					Alert("error", res.message);
				}
			});
			
			ckey = [];
		
			$(".chk").each(function(x){
				if(!$(this).is(":checked")){
					ckey.push($(this).attr("data-key"))
				}
			});
					
			$.ajax({
				url : "<?= PORTAL_API ?>cart",
				method : "POST",
				data : {
					akey : "<?= TOKEN_SECURE ?>",
					action: "<?= F::Encrypt(TOKEN_SECURE . "selectCart") ?>",
					cart_key: ckey.join(","),
				},
				dataType : "json"  
			}).done(function(res){
				 //console.log(res)
				if(res.status == "success"){
					$(".total").text(res.data);
				}else{
					$(".total").text("USD 0.00");
				}
			});
		});
	
	$(document).on("click", ".rem-cart", function () {
	    	var cart_id = $(this).attr('data-cid');
	    	
	     	$(".modal-footer, .cart-id").val(cart_id);
	});
	
	 $(".checkAll").click(function () {
	     $('input:checkbox').not(this).prop('checked', this.checked);
	 });
	 
	 
	 $(".chk").on("click", function(){
	 	row = $(this).attr("data-row");
	 	
	 	$('.chk-' + row).not(this).prop('checked', this.checked);
	 });
//};
</script>