<?php
new Controller ($_POST);

switch(url::get(1)){
    default:
		
	Page::load("widget/public/shop_filter_modal");
?>
	<div class="offcanvas-wrapper">
	<?php
		Page::load("widget/public/page_title");
	?>
		<div class="container padding-bottom-3x mb-1">
			<div class="row">
				<div class="col-xl-9 col-lg-8 order-lg-2">
					<div class="shop-toolbar padding-bottom-1x mb-2">
						<div class="column">
							<div class="shop-sorting">
								<label for="sorting">Sort by:</label>
								<?php
									$it = items::getBy(["i_status" => 1]);
									$total = count($it);
									if(!isset($_SESSION['customer_id'])){
										
										?>
										<select class="form-control sorting" id="sorting">
											<option value="lth">Low - High Price</option>
											<option value="htl">High - Low Price</option>
										</select><span class="text-muted">Showing:&nbsp;</span><span>1 - <?= $total ?> items</span>
										<?php
									}else{
										?>
										<select class="form-control sorting2" id="sorting2">
											<option value="lth">Low - High Price</option>
											<option value="htl">High - Low Price</option>
										</select><span class="text-muted">Showing:&nbsp;</span><span>1 - <?= $total ?> items</span>
										<?php
									}
								?>
							</div>
						</div>
					</div>
					<?php
					
						$url = url::get(1);
						
						if($url == "promotion"){
							Turbo::app("public")->View("widget/public/shop_promotion.php");
						}else{
							$category = category::getBy(["c_name" => $url]);
						
							if(count($category) > 0){
								Turbo::app("public")->View("widget/public/shop_category.php");
							}else{
								Turbo::app("public")->View("widget/public/shop_category_default.php");
								
							}
						}
						
					?>
				</div>
				<!-- Sidebar -->
				<div class="col-xl-3 col-lg-4 order-lg-1">
					<button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters">
						<i class="icon-layout"></i>
					</button>
					<aside class="sidebar sidebar-offcanvas">
						<!-- Widget Categories-->
						<section class="widget widget-categories">
							<h3 class="widget-title">Product Categories</h3>
							<ul>
							<?php
								$cat = category::list();
								foreach($cat as $c){
									$tc = DB::conn()->query("SELECT COUNT(ic_category) AS ctotal FROM item_category WHERE ic_category = ?", ["ic_category" => $c->c_id])->results();
									?>
									<li class="">
										<a href="<?= PORTAL ?>categories/<?= $c->c_name ?>"><?= $c->c_name ?></a>
										<span>(<?= $tc[0]->ctotal ?>)</span>
									</li>
									<?php
								}
							?>
							</ul>
						</section>
						<?php
							Page::load("widget/public/also_like");
							Page::load("widget/public/check_out_promo");
						?>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
	<div class="site-backdrop"></div>
<?php
    break;
	
	case "search":
		$search = url::get(2);
		Page::load("widget/public/shop_filter_modal");
		?>
		<div class="offcanvas-wrapper">
		<?php
			Page::load("widget/public/page_title");
		?>
		<div class="container padding-bottom-3x mb-1">
			<div class="row">
				<div class="col-md-12">
					<p>
						Search for	<b>"<?= $search ?>"</b>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<img src="<?= PORTAL_PUBLIC ?>assets/medias/iecommerce/img/no_result-404.png" alt="404 image" width="320">
					<h1>Sorry, No result on that keyword</h1>
				</div>
			</div>
		</div>
			<div class="container padding-bottom-3x mb-1">
				<div class="row">
					<div class="col-xl-9 col-lg-8 order-lg-2">
						<div class="shop-toolbar padding-bottom-1x mb-2">
							<div class="column">
								<div class="shop-sorting">
									<label for="sorting">Sort by:</label>
									<?php
										$it = items::getBy(["i_status" => 1]);
										$total = count($it);
										if(!isset($_SESSION['customer_id'])){
											
											?>
											<select class="form-control sorting" id="sorting">
												<option value="lth">Low - High Price</option>
												<option value="htl">High - Low Price</option>
											</select><span class="text-muted">Showing:&nbsp;</span><span>1 - <?= $total ?> items</span>
											<?php
										}else{
											?>
											<select class="form-control sorting2" id="sorting2">
												<option value="lth">Low - High Price</option>
												<option value="htl">High - Low Price</option>
											</select><span class="text-muted">Showing:&nbsp;</span><span>1 - <?= $total ?> items</span>
											<?php
										}
									?>
								</div>
							</div>
						</div>
						<?php
						
							$url = url::get(1);
							$category = category::getBy(["c_name" => $url]);
							
							if(count($category) > 0){
								Turbo::app("public")->View("widget/public/shop_category.php");
							}else{
								Turbo::app("public")->View("widget/public/shop_category_default.php");
								
							}
						?>
					</div>
					<!-- Sidebar -->
					<div class="col-xl-3 col-lg-4 order-lg-1">
						<button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters">
							<i class="icon-layout"></i>
						</button>
						<aside class="sidebar sidebar-offcanvas">
							<!-- Widget Categories-->
							<section class="widget widget-categories">
								<h3 class="widget-title">Product Categories</h3>
								<ul>
								<?php
									$cat = category::list();
									foreach($cat as $c){
										$tc = DB::conn()->query("SELECT COUNT(ic_category) AS ctotal FROM item_category WHERE ic_category = ?", ["ic_category" => $c->c_id])->results();
										?>
										<li class="">
											<a href="<?= PORTAL ?>categories/<?= $c->c_name ?>"><?= $c->c_name ?></a>
											<span>(<?= $tc[0]->ctotal ?>)</span>
										</li>
										<?php
									}
								?>
								</ul>
							</section>
							<!-- Promo Banner-->
							<section class="promo-box" style="background-image: url(<?= PORTAL?>assets/medias/iecommerce/img/banners/02.jpg);">
								<!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
								<div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
									<h4 class="text-light text-thin text-shadow">New Collection of</h4>
									<h3 class="text-bold text-light text-shadow">Sunglassess</h3>
									<a class="btn btn-sm btn-primary" href="#">Shop Now</a>
								</div>
							</section>
						</aside>
					</div>
				</div>
			</div>
		</div>
		<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
		<div class="site-backdrop"></div>
		<?php
	break;
	
    case "view_item":
        ?>
        <div class="offcanvas-wrapper">
            <div class="page-title">
                <div class="container">
                    
                    <?php
                        $t = url::get(0);
                        $y = menus::getBy(["m_url" => $t]);
                        if(count($y) > 0){
                            $y= $y[0];
                    ?>
                    <div class="column">
                          <h1><?= $y->m_name?></h1>
                    </div>
                    <div class="column">
                        <ul class="breadcrumbs">
                            <li>
                                <a href="<?= PORTAL?>">Home</a>
                            </li>
                            <li class="separator">&nbsp;</li>
                            <li>
                                <a href="<?= PORTAL?>/<?= url::get(0);?>"><?= $y->m_name?></a>
                            </li>
                            <li class="separator">&nbsp;</li>
                            <li>View Product</li>
                        </ul>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
			
            <div class="container padding-bottom-3x mb-1">
                <?php
                    $x = url::get(2);
                    $y = items::getBy(["i_key" => $x, "i_status" => 1]);
                    if(count($y) > 0){
                        $y = $y[0];
						$xx = $y->i_id;
						$comp = company::getBy(["c_id" => $y->i_company]);
                        ?>
                        <div class="row">
                            <div class="col-md-6">
							<?php
							$pic = DB::conn()->q("SELECT * FROM item_picture WHERE ip_item = '$xx' AND ip_order > 0 ORDER BY ip_order ASC")->results();
							if($pic > 0){
							?>
                                <div class="product-gallery">
                                	<?php
										$promo = item_promotion::getBy(["ip_item" => $xx]);
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
                                	<!-- <span class="product-badge text-danger">30% Off</span> -->
                                    <div class="gallery-wrapper">
                                        <div class="gallery-item video-btn text-center">
                                        	<?php
                                        		if(!empty($y->i_vidUrl)){
                                        			//preg_match("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", $y->i_vidUrl, $matches);
													parse_str($y->i_vidUrl, $get_array);
													foreach ($get_array as $key => $value) {
														$x = $value;
														break;
													}
                                        			?>
                                        			<a href="#" data-toggle="tooltip" data-type="video" data-video="&lt;div class=&quot;wrapper&quot;&gt;&lt;div class=&quot;video-wrapper&quot;&gt;&lt;iframe class=&quot;pswp_video&quot; width=&quot;960&quot; height=&quot;640&quot; src=&quot;//www.youtube.com/embed/<?php echo $x ?>&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;/div&gt;&lt;/div&gt;" title="Watch video"></a>
                                        			<?php
                                        		}else{}
                                        	?>
                                            
                                        </div>
                                    </div>
                                    <div class="product-carousel owl-carousel gallery-wrapper">
                                    	<?php
                                    		$nop = 0;
                                    		foreach($pic as $p){
                                    			?>
                                    			<div class="gallery-item" data-hash="x<?= $p->ip_id?>">
		                                            <a href="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $p->ip_file?>" data-size="1000x667">
		                                                <img src="<?= PORTAL_BUSINESS?>assets/medias/iecommerce/img/shop/products/<?= $p->ip_file?>" alt="Product">
		                                            </a>
		                                        </div>
                                    			<?php
                                    			$nop++;
                                    		}
                                    	?>
                                    </div>
                                    <ul class="product-thumbnails">
                                    	<?php
                                    		$nop = 0;
                                    		foreach($pic as $p){
										?>
											<li class="<?= !$nop ? "active" : "" ?>">
												<a href="#x<?= $p->ip_id?>"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $p->ip_file?>" alt="Product"></a>
											</li>
										<?php
                                    			$nop++;
                                    		}
                                    	?>
                                    </ul> 
                                </div>
							<?php
							}
							?>
                            </div>
							
                            <div class="col-md-6">
                                <div class="padding-top-2x mt-2 hidden-md-up"></div>
                                <div class="rating-stars">
                                	<?php
							  			$check_rating = item_review::getBy(["ir_item" => $xx]);
										if(count($check_rating) > 0){
											$rating = DB::conn()->q("SELECT SUM(ir_rating) as tot_rating, COUNT(ir_item) as tot_cust FROM item_review WHERE ir_item = '$xx'")->results();
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
												echo "<span class='text-muted align-middle'>&nbsp;&nbsp;".$avg_rating." | ".$tot_cust." customer reviews</span>";
											}else{
												
											}
										}
				  					?>
                                </div>
                                <h2 class="padding-top-1x text-normal"><?= $y->i_name?></h2><span class="text-muted align-middle">By <a href="<?= PORTAL ?>company/<?= $comp[0]->c_key ?>"><?= $comp[0]->c_name ?></a></span>
								<span class="h2 d-block">
									<?php
										$promo2 = item_promotion::getBy(["ip_item" => $xx]);
										if(count($promo2) > 0){
							  				$promo2 = $promo2[0];
											$pro_type = $promo2->ip_type;
											if($pro_type == 1){
												$pro_total = ($y->i_price *  $promo2->ip_value) / 100;
												$total = $y->i_price - $pro_total;
												?>
													<del class="text-muted text-normal">
														<?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?>
													</del>&nbsp;
													
													<?= Currency::getSign() ?>
													<span data-price="<?= $total ?>" id="total-price">
														<?= number_format(Currency::getPrice($total), 2) ?>
													</span>
													<span 
														id="price-total-loading" 
														class="spinner-border text-primary mr-2"
													></span>
												<?php
											}else{
												$vtotal = $y->i_price - $promo2->ip_value;
												?>
													<del class="text-muted text-normal">
														<?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?>
													</del>&nbsp;
													
													<?= Currency::getSign() ?>
													<span data-price="<?= $vtotal ?>" id="total-price">
														<?= number_format(Currency::getPrice($vtotal), 2) ?>
													</span>
													<span 
														id="price-total-loading" 
														class="spinner-border text-primary mr-2"
													></span>
												<?php
											}
							  			}else{
							  				?>
											<?= Currency::getSign() ?>
											<span data-price="<?= $y->i_price ?>" id="total-price">
							  					<?= number_format(Currency::getPrice($y->i_price), 2) ?>
											</span>
											<span 
												id="price-total-loading" 
												class="spinner-border text-primary mr-2"
											></span>
							  				<?php
							  			}
									?>
								</span>
								
                                <p><?= $y->i_description?></p>
                                <div class="row margin-top-1x">
								<?php
									$io = item_option::getBy(["io_item"=> $y->i_id], ["order" => "io_type ASC"]);
									$nov = 0;
									foreach($io as $option){
										$type = $option->io_type;
									?>	
									<div class="col-sm-12">
										<div class="form-group text-left">
											<label class="" for="size"><?= $option->io_name ?>:</label>
										<?php
											if($type == 1){
										?>
											<input type="hidden" class="add-select-value add-select-value-<?= $nov ?>" value="0" />
											<select name="<?= $option->io_name ?>"
												class="form-control io-option io-option-<?= $option->io_id ?> add-select-price add-price"
												data-nov="add-select-value-<?= $nov ?>"
												data-type="<?= $type ?>" 
												data-id="<?= $option->io_id ?>"
											>
												<option value="">Please Select</option>
												<?php
													foreach(item_option_value::getBy(["iov_option" => $option->io_id]) as $value){
												?>
													<option value="<?= $value->iov_value ?>" data-price="<?= $value->iov_price ?>">
														<?= $value->iov_value ?>
														
														<?php
															if($value->iov_price){
														?>
															(<?= Currency::GetSign()?> <?= $value->iov_price ?>)
														<?php
															}
														?>
													</option>
												<?php
													}
												?>
											</select>
										<?php
												$nov++;
											}elseif($type == 2){
										?>
											<input type="hidden" class="add-radio-value add-radio-value-<?= $nov ?>" value="0" />
											<?php
												foreach(item_option_value::getBy(["iov_option" => $option->io_id]) as $value){
											?>
												<div class="custom-control custom-radio custom-control-inline">
													<input 
														name="<?= $option->io_name ?>" 
														data-type="<?= $type ?>" 
														class="custom-control-input io-option io-option-<?= $option->io_id ?> add-radio-price add-price"
														type="radio" 
														id="ex-radio-<?= $value->iov_id ?>" 
														value="<?= $value->iov_value ?>"
														data-price="<?= $value->iov_price ?>"
														data-id="<?= $option->io_id ?>" 
														data-nov="add-radio-value-<?= $nov ?>"
													/>
													
													<label 
														class="custom-control-label" 
														for="ex-radio-<?= $value->iov_id ?>"
													>
														<?= $value->iov_value ?>
													<?php
														if($value->iov_price){
													?>
														(<?= Currency::GetSign()?> <?= $value->iov_price ?>)
													<?php
														}
													?>
													</label>
												</div>
										<?php
												}
												
												$nov++;
											}else{
												foreach(item_option_value::getBy(["iov_option" => $option->io_id]) as $value){
										?>
												<input type="hidden" class="add-check-value add-check-value-<?= $nov ?>" value="0" />
												<div class="custom-control custom-checkbox custom-control-inline" data-id="<?= $option->io_id ?>">
													<input 
														name="<?= $option->io_name ?>[]" 
														data-type="<?= $type ?>" 
														class="custom-control-input io-option io-option-<?= $option->io_id ?> add-check-price add-price" 
														type="checkbox" 
														data-id="<?= $option->io_id ?>" 
														id="ex-check-<?= $value->iov_id ?>" 
														value="<?= $value->iov_value ?>"
														data-nov="add-check-value-<?= $nov ?>"
													/>
													<label 
														class="custom-control-label" 
														for="ex-check-<?= $value->iov_id ?>"
													>
														<?= $value->iov_value ?> 
													<?php
														if($value->iov_price){
													?>
														(<?= Currency::GetSign()?> <?= $value->iov_price ?>)
													<?php													
														}
													?>
													</label>
												</div>
										<?php
													$nov++;
												}
											}
										?>
										</div>
									</div>
									<?php
										
										}
										
										$cl = clients::getBy(["cl_id" => $y->i_client]);
										$i_cat = item_category::getBy(["ic_item" => $y->i_id]);
										if(count($i_cat) > 0){
											$i_cat = $i_cat[0];
											$catog = category::getBy(["c_id" => $i_cat->ic_category]);
											if(count($catog) > 0){
												$catog = $catog[0];
											}
										}
										
										$shipping_add = [
											"contact_name"	=> "John Doe",
											"phone"			=> "",
											"email"			=> "",
											"street1"		=> "Kuala Lumpur",
											"city"			=> "Wilayah Persekutuan",
											"postal_code"	=> "50050",
											"state"			=> "Wilayah Persekutuan",
											"country"		=> "MY",
											"type"			=> "residential"
										];
										
										if(isset($_SESSION['customer_login'])){
											$cust_add = customer_address::getBy(["ca_customer" => $_SESSION['customer_id'], "ca_status" => 1]);
											
											if(count($cust_add) > 0){
												$cust_add = $cust_add[0];
												
												$shipping_add = [
													"contact_name"	=> $cust_add->ca_name,
												    "phone"			=> $cust_add->ca_phone,
												    "email"			=> $cust_add->ca_email,
												    "street1"		=> $cust_add->ca_address,
												    "city"			=> $cust_add->ca_city,
												    "postal_code"	=> $cust_add->ca_postal,
												    "state"			=> $cust_add->ca_state,
												    "country"		=> $cust_add->ca_country,
											     	"type"			=> "residential"
												];
											}else{
												$cust_add = customer_address::getBy(["ca_customer" => $_SESSION['customer_id']]);
												
												if(count($cust_add)){
													$cust_add = $cust_add[0];
												
													$shipping_add = [
														"contact_name"	=> $cust_add->ca_name,
														"phone"			=> $cust_add->ca_phone,
														"email"			=> $cust_add->ca_email,
														"street1"		=> $cust_add->ca_address,
														"city"			=> $cust_add->ca_city,
														"postal_code"	=> $cust_add->ca_postal,
														"state"			=> $cust_add->ca_state,
														"country"		=> $cust_add->ca_country,
														"type"			=> "residential"
													];
												}
											}
										}
									?>	
									<div class="col-sm-12">
										<button id="shipping-button" class="btn btn-sm btn-primary disabled" data-toggle="modal" data-target="#modalShipping">
											<span id="shipping-button-text">Loading Shipping</span>
											
											<span 
												id="shipping-button-loading" 
												class="spinner-border spinner-border-sm text-white mr-2"
											></span>
										</button>
										<?php
											if(!isset($_SESSION["customer_id"])){
											?>
											<br />
											<i>
												*Please login to check shipping availability to your place.
											</i>
											<?php
											}else{
											?>
											<br />
											<i>
												<span id="shipping-no"></span>
											</i>
											<?php
											}
										?>
									</div>
									<?php
										$portal_api = PORTAL_API;
										$secure_token = TOKEN_SECURE;
										
										$basic_info = ["akey" => $secure_token, "item" => $y->i_key, "quantity" => 1];
										$dataJson = array_merge($basic_info, $shipping_add);
										$dataJson = json_encode($dataJson);
										$currency = Currency::getSign();
										Page::Script(<<<S
											shipping_list = [];
											pick_shipping = {
												price: 0
											};
											additional_cost = 0;
											dataJson = $dataJson;
											
											function get_shipping(){
												$("#available-shipping-list").html(`
													<tr>
														<td colspan="3" class="text-center">
															<span id="price-total-loading" class="spinner-border text-primary mr-2"></span>
														</td>
													</tr>
												`);
												
												$("#price-total-loading").show();
												$("#total-price").hide();
												
												$.ajax({
													url: "$portal_api/shipping",
													method: "POST",
													data: dataJson,
													dataType: "json"
												}).done(function(res){
													if(res.status == "success"){
														
														shipping_list = res.data.list;
														pick_shipping = res.data.pick.full;
														update_total_price();
														update_shipping_button();
														
														var html = "";
														res.data.list.forEach(function(x){
															if(x.service_name == res.data.pick.service_name){
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
																</tr>
															`;
														});
														$("#available-shipping-list").html(html);
														$(".add2cart").removeAttr("disabled");
													}else{
														shipping_list = [];
														update_total_price();
														$("#shipping-button-text").text("No Shipping Available");
														$("#shipping-no").text("*Shipping is not available to your default address. Please update your address.");
													}
													
													$("#shipping-button-loading").hide();
													$("#price-total-loading").hide();
												}).fail(function(){
													shipping_list = [];
													Alert("error", "Fail fetching data from API server.");
													$("#shipping-button-text").text("No Shipping Available");
													$("#price-total-loading").hide();
												});
											}
											
											setTimeout(function(){
												get_shipping();
											}, 100);
											
											$(".select-address").on("change", function(){
												address = $(this).val();
												
												$.ajax({
													url: "$portal_api/customer/address",
													method: "POST",
													data: {
														akey: "$secure_token",
														action: "get",
														address: address
													},
													dataType: "json"
												}).done(function(res){
													if(res.status == "success"){
														dataJson = {
															akey: "$secure_token",
															item: "$y->i_key",
															contact_name: res.data.ca_name,
															phone: res.data.ca_phone,
															email: res.data.ca_email,
															street1: res.data.ca_address,
															city: res.data.ca_city,
															postal_code: res.data.ca_postal,
															state: res.data.ca_state,
															country: res.data.ca_country,
															type: "residential",
															quantity: $(".quantity").val()
														};
														
														get_shipping();
													}else{
														Alert("error", res.message);
													}
												}).fail(function(){
													Alert("error", "Faile connection to API server.");
												});
											});
											
											
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
												
												shipping_list.forEach(function(x){
													if(x.rate_id == rate_id){
														pick_shipping = x;
														update_total_price();
														update_shipping_button();
														return;
													}
												});
											});
											
											$(".add-select-price").on("change", function(){
												$("#price-total-loading").show();
												$("#total-price").hide();
												class_name = $(this).attr("data-nov");
												$.ajax({
													url: "$portal_api/item/item_option",
													method: "POST",
													data: {
														akey: "$secure_token",
														item: "$y->i_key", 
														option: $(this).val()
													},
													dataType: "json"
												}).done(function(res){
													if(res.status == "success"){
														$("." + class_name).val(res.data.iov_price);
													}else{
														$("." + class_name).val(0);
													}
													
													update_total_price();
												}).fail(function(){
													Alert("error", "Fail connecting to API server.");
													update_total_price();
												});
											});
																						
											$(".add-radio-price").on("change", function(){
												$("#price-total-loading").show();
												$("#total-price").hide();
												class_name = $(this).attr("data-nov");
												$.ajax({
													url: "$portal_api/item/item_option",
													method: "POST",
													data: {
														akey: "$secure_token",
														item: "$y->i_key", 
														option: $(this).val()
													},
													dataType: "json"
												}).done(function(res){
													if(res.status == "success"){
														$("." + class_name).val(res.data.iov_price);
													}else{
														$("." + class_name).val(0);
													}
													
													update_total_price();
												}).fail(function(){
													Alert("error", "Fail connecting to API server.");
													update_total_price();
												});
											});
											
											$(".add-check-price").on("click", function(){
												class_name = $(this).attr("data-nov");
												
												if($(this).is(":checked")){
													$("#price-total-loading").show();
													$("#total-price").hide();
													
													$.ajax({
														url: "$portal_api/item/item_option",
														method: "POST",
														data: {
															akey: "$secure_token",
															item: "$y->i_key", 
															option: $(this).val()
														},
														dataType: "json"
													}).done(function(res){
														if(res.status == "success"){
															$("." + class_name).val(res.data.iov_price);
														}else{
															$("." + class_name).val(0);
														}
														
														update_total_price();
													}).fail(function(){
														Alert("error", "Fail connecting to API server.");
														update_total_price();
													});
												}else{
													$("." + class_name).val(0);
													update_total_price();
												}
											});
											
											function update_total_price(){
												original = parseFloat($("#total-price").attr("data-price"));
												
												$(".add-select-value").each(function(){
													original += parseFloat($(this).val());
												});
												
												$(".add-radio-value").each(function(){
													original += parseFloat($(this).val());
												});
												
												$(".add-check-value").each(function(){
													original += parseFloat($(this).val());
												});
												
												total = (
													parseFloat(pick_shipping.price) +
													(
														(
															original + 
															parseFloat(additional_cost)
														) 
														* parseInt($(".quantity").val())
													)
												).toFixed(2);
												
												if(isNaN(total)){
													(
														parseFloat($("#total-price").attr("data-price")) * 
														parseInt($(".quantity").val())
													).toFixed(2);
												}else{
													$("#total-price").text(
														total
													);
												}	
												$("#price-total-loading").hide();
												$("#total-price").show();
											}
											
											function update_shipping_button(){
												$("#shipping-button").removeClass("disabled");
												$("#shipping-button-text").text(
													"Estimation Shipping: $currency " + 
													parseFloat(pick_shipping.price).toFixed(2) + " - " + 
													pick_shipping.delivery
												);
											}
											
											$(".quantity").on("change", function(){
												dataJson.quantity = $(this).val();
												get_shipping();
												update_total_price();
											});
											
											$(".quantity").on("keyup", function(){
												dataJson.quantity = $(this).val();
												get_shipping();
												update_total_price();
												
											});
											
											update_total_price();
											
											
											
S
);
									?>
                                	<div class="col-sm-4">
										<br />
						                <div class="form-group">
							            	<label for="quantity">Quantity</label>
							            	<input class="form-control quantity" type="number" name="i_quantity" min="1" placeholder="1" value="1"/>
						                </div>
					              	</div>
					            </div>
                                <div class="padding-bottom-1x mb-2">
                                    <span class="text-medium">Categories:&nbsp;</span>
									<?php
										$icat = item_category::getBy(["ic_item" => $y->i_id]);
										if(count($icat) > 0){
											$icat = $icat[0];
											$cate = category::getBy(["c_id" => $icat->ic_category]);
											if(count($cate) > 0){
												$cate = $cate[0];
												?>
												<a class="navi-link" href="<?= PORTAL?>shop"> <?= $cate->c_name?></a>
												<?php
											}
										}
									?>
                                </div>
                                <hr class="mb-3">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                                        <div class="share-links">
                                            <a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook">
                                                <i class="socicon-facebook"></i>
                                            </a>
                                            <a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter">
                                                <i class="socicon-twitter"></i>
                                            </a>
                                            <a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram">
                                                <i class="socicon-instagram"></i>
                                            </a>
                                            <a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +">
                                                <i class="socicon-googleplus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="sp-buttons mt-2 mb-2">
									<?php
										if(!isset($_SESSION['customer_id'])){
									?>
										<button class="btn btn-primary add2cart" disabled data-row="<?= $y->i_key ?>" data-toggle="modal" data-target="#modalCentered"><i class="icon-bag"></i> Add to Cart</button>
									<?php
										}else{
											$wish = wishlist::getBy(["w_customer" => $_SESSION['customer_id'], "w_item" => $y->i_key]);
											if(count($wish) > 0){
												$red = "red";
											}else{
												$red = "";
											}
											
											?>
												<button class="btn btn-outline-secondary btn-sm whishlist-add" data-item="<?= $y->i_key ?>" title="Whishlist">
													<i class="icon-heart " style="color:<?= $red ?>"></i>
												</button>
												<button class="btn btn-primary add-cart1 add2cart" disabled data-row="<?= $y->i_key ?>">
													<i class="icon-bag"></i> Add to Cart
												</button>
											<?php
										}
									?>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        <div class="row padding-top-3x mb-3">
                            <div class="col-lg-12 ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Description</a></li>
                                    <?php
                                    	$att = item_attribute::getBy(["ia_item" => $y->i_id]);
										if(count($att)){
											$att = $att[0];
										?>
											<li class="nav-item"><a class="nav-link" href="#specification" data-toggle="tab" role="tab">Specitfication</a></li>
										<?php
										}
										
                                    	$tot_rev = item_review::getBy(["ir_item" => $y->i_id]);
										?>
									<li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews (<?= count($tot_rev) ?>)</a></li>
									<li class="nav-item"><a class="nav-link" href="#company" data-toggle="tab" role="tab">Company Details</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    	<?php
                                    		$detail = item_detail::getBy(["id_item" => $y->i_id]);
											if(count($detail) > 0){
												$detail = $detail[0];
											?>
												<p class="mb-30"><?= $detail->id_detail ?></p>
											<?php
											}else{
											?>
												<p class="mb-30"><?= $y->i_description ?></p>
											<?php
											}
                                    	?>
                                        
                                    </div>
                                    <div class="tab-pane fade show" id="specification" role="tabpanel">
                                    	<?php
                                    		$att_view = item_attribute::getBy(["ia_item" => $y->i_id]);
											if(count($att_view) > 0){
												
												foreach($att_view as $av){
												?>
													<p class="mb-30"><b><?= $av->ia_name ?></b> : <?= $av->ia_value ?></p>
												<?php
												}
											}else{
											}
                                    	?>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    	<?php
                                    		$rev = item_review::getBy(['ir_item' => $y->i_id]);
											
											if(count($rev) > 0){
												foreach($rev as $r){
													$cust = customers::getBy(["c_id" => $r->ir_customer]);
													if(count($cust) > 0){
														$cust = $cust[0];
														
														?>
														<div class="comment">
				                                            <div class="comment-author-ava">
				                                            	<?php
				                                            		if(empty($cust->c_picture)){
				                                            			?>
				                                            			<img src="<?= PORTAL?>/assets/medias/iecommerce/img/reviews/default.jpg" alt="Review author">
				                                            			<?php
				                                            		}else{
				                                            			?>
				                                            			<img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/<?= $cust->c_picture ?>" alt="Review author">
				                                            			<?php
				                                            		}
				                                            	?>
				                                            </div>
				                                            <div class="comment-body">
				                                                <div class="comment-header d-flex flex-wrap justify-content-between">
				                                                    <h4 class="comment-title"><?= $r->ir_subject ?> <span class="comment-meta"><?= date("j F Y h:i:s\ ", $r->ir_time) ?></span></h4>
				                                                    <div class="mb-2">
				                                                        <div class="rating-stars">
				                                                        	<?php
				                                                        		for($ix = 0; $ix < 5; $ix++){
				                                                        			if($ix < $r->ir_rating){
				                                                        				$filled = "filled";
				                                                        			}else{
				                                                        				$filled = "";
				                                                        			}
				                                                        		?>
				                                                        			<i class="icon-star <?= $filled ?>"></i>
				                                                        		<?php
				                                                        		}
				                                                        	?>
				                                                        </div>
				                                                    </div>
				                                                </div>
				                                                <p class="comment-text"><?= $r->ir_review ?></p>
				                                                <div class="comment-footer"><span class="comment-meta"><?= $cust->c_email ?></span></div>
				                                            </div>
				                                        </div>
														<?php
														
													}else{
														echo "Customer Not found";
													}
													?>
														
													<?php
												}
											}else{
												
											}
                                    	?>
                                        <!-- Review Form-->
                                        <?php
											if(isset($_SESSION['customer_id'])){
												$check = item_review::getBy(["ir_customer" => $_SESSION['customer_id'], "ir_item" => $y->i_id]);
												$oi = order_item::getBy(["oi_customer" => $_SESSION["customer_id"], "oi_item" => $y->i_id]);
												
												if(count($check) < count($oi)){
                                        		?>
                                        		<h5 class="mb-30 padding-top-1x">Leave Review</h5>
		                                        <form class="row" method="post" action="">
		                                            <div class="col-sm-6">
		                                                <div class="form-group">
		                                                    <label for="review_name">Email</label>
		                                                    <input class="form-control form-control-rounded" type="text" name="ir_name" id="review_name" value="<?= $_SESSION['customer_login'] ?>" readonly>
		                                                </div>
		                                            </div>
		                                            <div class="col-sm-6">
		                                                <div class="form-group">
		                                                    <label for="review_subject">Subject</label>
		                                                    <input class="form-control form-control-rounded" type="text" name="ir_subject" id="review_subject" required>
		                                                </div>
		                                            </div>
		                                            <div class="col-sm-6">
		                                                <div class="form-group">
		                                                    <label for="review_rating">Rating</label>
		                                                    <select class="form-control form-control-rounded" name="ir_rating" id="review_rating">
		                                                        <option value="5" >5 Stars</option>
		                                                        <option value="4" >4 Stars</option>
		                                                        <option value="3" >3 Stars</option>
		                                                        <option value="2">2 Stars</option>
		                                                        <option value="1">1 Star</option>
		                                                    </select>
		                                                </div>
		                                            </div>
		                                            <div class="col-12">
		                                                <div class="form-group">
		                                                    <label for="review_text">Review </label>
		                                                    <textarea class="form-control form-control-rounded" name="ir_review" id="review_text" rows="8" required></textarea>
		                                                </div>
		                                            </div>
		                                            <div class="col-12 text-right">
		                                            	<?php
								            				Controller::form("public/review",
								            				[
								            				"type"  => "add"  
								            				]);
								            			?>
								            			<input class="form-control form-control-rounded" type="hidden" name="ir_item" value="<?= $y->i_id ?>">
								            			<input type="hidden" name="CSRFToken" value="OWY4NmQwODE4ODRjN2Q2NTlhMmZlYWEwYzU1YWQwMTVhM2JmNGYxYjJiMGI4MjJjZDE1ZDZMGYwMGEwOA==">
		                                                <button class="btn btn-outline-primary" type="submit">Submit Review</button>
		                                            </div>
		                                        </form>
                                        		<?php
												}else{
													echo "You have placed review before. You can only place a review at once after success purchase.";
												}
                                        	}else{
                                        		echo "Please login to place a review.";
                                        	}
                                        ?>
                                    </div>
                                    <div class="tab-pane fade show" id="company" role="tabpanel">
                                    	<?php
                                    		$com_d = company::getBy(["c_id" => $y->i_company]);
											if(count($com_d) > 0){
												$com_d = $com_d[0];
											?>
												<div class="row">
													<div class="col-md-2">
														<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/<?= empty($com_d->c_logo) ? "default.png" : $com_d->c_logo ?>" alt="" class="" style="max-width: 100%;">								
													</div>
													<div class="col-md-6">
														
														<?php
															if(!empty($comp->c_address)){
																$address = $comp->c_address . ", " . $comp->c_postalCode . ", " . $comp->c_city . ", " . $comp->c_state;
															}else{
																$address = "Address havent set by the Company";
															}
														?>
														Name : <?= $com_d->c_name ?><br />
														Tel : <?= $com_d->c_phone ?><br />
														Email : <?= $com_d->c_email ?><br />
														Business Type : <?= !empty($comp->c_details) ? $comp->c_details : "Null" ?><br />
														Address : <?= $address ?>
													</div>
												</div>
											<?php
											}
                                    	?>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <?php
						Page::load("widget/public/recommended_product");
                    }else{
                    	?>
                		<div class="container">
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<img src="<?= PORTAL_PUBLIC ?>assets/medias/iecommerce/img/no_result-404.png" alt="404 image" width="320">
									<h1>Sorry, Item Not Found</h1>
								</div>
							</div>
						</div>
                    	<?php
                    	
                    	Page::load("widget/public/recommended_product");
                    }
                ?>
            </div>
        </div>
        <!-- Back To Top Button-->
        <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
        
        <!-- Photoswipe container-->
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
        <div class="modal fade" id="modalCentered" tabindex="-1" role="dialog" style="">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Member Login</h4>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="" method="post" action="">
							<div class="form-group input-group">
								<input class="form-control" name="username" type="email" placeholder="Email or Username" required><span class="input-group-addon"><i class="icon-head"></i></span>
							</div>
							<div class="form-group input-group">
								<input class="form-control" name="password" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
							</div>
							<div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" id="remember_me" checked>
									<label class="custom-control-label" for="remember_me">Remember me</label>
								</div><a class="navi-link" href="<?= PORTAL?>password_recovery">Forgot password?</a>
							</div>
							<div class="text-center text-sm-right">
								<?php
									Controller::form("public/login",
									[
									"type"  => "login"  
									]);
								?>
								<input type="hidden" name="CSRFToken" value="OWY4NmQwODE4ODRjN2Q2NTlhMmZlYWEwYzU1YWQwMTVhM2JmNGYxYjJiMGI4MjJjZDE1ZDZMGYwMGEwOA==">
								<button class="btn btn-primary margin-bottom-none" type="submit">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalShipping" tabindex="-1" role="dialog" style="">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Shipping Available</h4>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
						<?php
							if(!isset($_SESSION["customer_id"])){
							?>
							<div class="col-md-2">
								Estimation to:
							</div>
							
							<div class="col-md-4">
								<?= $shipping_add["street1"] ?>, <?= $shipping_add["city"] ?>, <?= $shipping_add["postal_code"] ?>, <?= $shipping_add["country"] ?>
								
								<br />
								
							</div>
							
							<div class="col-md-12">
								<i>
									*Please login to get a correct shipping cost to your place.
								</i>
							</div>
							<?php
							}else{
							?>
							<div class="col-md-2">
								Ship to:
							</div>
							<div class="col-md-4">
								<select class="form-control select-address">
								<?php
									foreach (customer_address::getBy(["ca_customer" => $_SESSION["customer_id"]]) as $ca) {
										if($ca->ca_status){
											$selected = "selected";
										}else{
											$selected = "";
										}
								?>
									<option value="<?= $ca->ca_id ?>" <?= $selected ?>>
										<?= $ca->ca_address ?>
									</option>
								<?php
									}
								?>
								</select>
							</div>
							
							<?php
							}
						?>
						</div><br />
						<div class="row">
							<div class="col-md-12 text-center">
								List Available Shipping:
							</div>
						</div><br />
						<div class="row">
							<div class="col-md-12 table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Carrier</th>
											<th class="text-right">Cost <?= Currency::getSign() ?></th>
											<th class="text-center">Estimate Delivery</th>
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
        <?php
    break;
    }
?>
<?php
	// $_token = F::UniqKey();
	// $token = Token::create($_token, "cart");
?>
<script>
	cartno = $("#cart-item-container > div").length;
	
	$(document).on("click", ".add-cart1", function(){
		$list = listData();
		/**/
    	$text = JSON.stringify($list);
		shippingL = base64_encode(JSON.stringify(shipping_list));
		
		//console.log(base64_decode(shippingL));
		
		$.ajax({
			url : "<?= PORTAL_API ?>cart",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "addCart") ?>",
				item: $(this).attr("data-row"),
				quantity: $(".quantity").val(),
				data : base64_encode($text),
				ship_id : $("#shipping_id").val(),
				shipping: shippingL
			},
			dataType : "json"  
		}).done(function(res){
			if(res.status == "success"){
				Alert("success", res.message);
				$("#cart-item-container").html(res.data);
			}else{
				Alert("error", res.message);
			}
			
			cartno += 1;
		}).fail(function(){
			console.log("fail adding item to cart");
		})
		/**/
	});
	
	function listData(){
		$list = {
			values: []
		};
		
		$(".io-option").each(function(){
            switch($(this).attr("data-type")){
            	case "1":
            		 if($(this).val() != ""){
            			$list.values[$(this).attr("data-id")] = $(this).val();
            		}
            	break;
            	
            	case "2":
                	if($(this).is(":checked")){
                		$list.values[$(this).attr("data-id")] = $(this).val();
                	}
            	break;
            	
            	case "3":
            		if($(this).is(":checked")){
            			
            			if($list.values[$(this).attr("data-id")] != undefined){
            				$list.values[$(this).attr("data-id")] += "," + $(this).val();
            			}else{
            				$list.values[$(this).attr("data-id")] = $(this).val();
            			}
                	}
            	break;
            }
        });
        
        return $list;
    }
	
	$(document).on("click", ".whishlist-add", function(){
		if($(this).children(".icon-heart").css("color") == "rgb(255, 0, 0)"){
			
			$(this).children(".icon-heart").css("color", "#606975");
		}else{
			$(this).children(".icon-heart").css("color", "red");
		}
		
		$.ajax({
			url : "<?= PORTAL_API ?>item/wish_list",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "addWish") ?>",
				item: $(this).attr("data-item")
			},
			dataType : "json" 
		});
	});
	
	$(document).on("change", ".sorting", function(){
		$.ajax({
			url : "<?= PORTAL_API ?>item/sorting",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "sorting") ?>",
				id_sort: $(this).val()
			},
			dataType : "json" 
		}).done(function(res){
			if(res.status == "success"){
				displayData(res.data);
			}else{
				Alert("error", "Data not save");
			}
			 
		});		
	});
			
	function displayData(data){
        $data = "";
        
        
        $data +=`
				<div class="gutter-sizer"></div>
				<div class="grid-sizer"></div>
        `;
        
        data.forEach(function(x){
            
            $data += `
            <!-- Product-->
            <div class="grid-item">
                <div class="product-card">
                    <a class="product-thumb" href="<?= PORTAL ?>categories/view_item/`+ x.i_key +`">
                        <img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/`+ x.picture.ip_file +`" alt="Product">
                    </a>
                    <h3 class="product-title"><a href="<?= PORTAL ?>categories/view_item/`+ x.i_key +`">`+ x.i_name +`</a></h3>
                    <h4 class="product-price"><?= Currency::getSign() ?>`+ x.i_price +`</h4>
                    <div class="product-buttons">
                        <a class="btn btn-outline-primary btn-sm add-cart" href="<?= PORTAL ?>categories/view_item/`+ x.i_key +`">View Product</a>
                    </div>
                </div>
            </div>
            `;
        });
        
        $("#view_sorting").html($data);

    }
	
	$(document).on("change", ".sorting2", function(){
		
		$.ajax({
			url : "<?= PORTAL_API ?>item/sorting",
			method : "POST",
			data : {
				akey : "<?= TOKEN_SECURE ?>",
				action: "<?= F::Encrypt(TOKEN_SECURE . "sorting") ?>",
				id_sort: $(this).val()
			},
			dataType : "json" 
		}).done(function(res){
			if(res.status == "success"){
				displayData2(res.data);
				//console.log(res.data);
			}else{
				Alert("error", "Sorting failed");
			}
			 
		})
		
	});
			
	function displayData2(data){
    	$data = "";
        
        $data +=`
				<div class="gutter-sizer"></div>
				<div class="grid-sizer"></div>
        `;
        
        data.forEach(function(x){
            
            $data += `
            <!-- Product-->
            <div class="grid-item">
                <div class="product-card">
                    <a class="product-thumb" href="<?= PORTAL ?>categories/view_item/`+ x.i_key +`">
                        <img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/`+ x.picture.ip_file +`" alt="Product">
                    </a>
                    <h3 class="product-title"><a href="<?= PORTAL ?>categories/view_item/`+ x.i_key +`">`+ x.i_name +`</a></h3>
                    <h4 class="product-price"><?= Currency::getSign() ?>`+ x.i_price +`</h4>
                    <div class="product-buttons">
                        <button class="btn btn-outline-secondary btn-sm whishlist-add" title="Whishlist" data-item="`+ x.i_key +`">
						 	<i class="icon-heart" style="color:`+ x.red +`;" ></i>
						 </button>
                        <a class="btn btn-outline-primary btn-sm add-cart" href="<?= PORTAL ?>categories/view_item/`+ x.i_key +`">View Product</a>
                    </div>
                </div>
            </div>
            `;
        });
        
    	$("#view_sorting").html($data);
    }
</script>