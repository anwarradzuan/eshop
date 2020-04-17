<?php
Turbo::app("public")->Classes("Shipping");
switch (input::POST('action')){
    case  F::Encrypt(Input::post("akey") . "addCart"):
		$list = JSON_decode(base64_decode(input::POST('data')));
		
		$customer= $_SESSION['customer_id'];
		$i = items::getBy(['i_key' => input::POST("item")]);
		
		if(count($i) > 0){
			$i = $i[0];
			
			$i_promo = item_promotion::getBy(["ip_item" => $i->i_id]);
			if(count($i_promo) > 0){
				$i_promo = $i_promo[0];
				$pro_type = $i_promo->ip_type;
				if($pro_type == 1){
					$pro_total = ($i->i_price *  $i_promo->ip_value) / 100;
					$t_price = $i->i_price - $pro_total;
					
				}else{
					$t_price = $i->i_price - $i_promo->ip_value;
				}
			}else{
				$t_price = $i->i_price;
			}
			
			$ios = item_option::getBy(["io_item" => $i->i_id]);
			$exists = false;
			
			if(count($ios) > 0){
				$missing = [];
				
				foreach($ios as $io){
					$iok = "io_" . $io->io_id;
					if(isset($list->values[$io->io_id])){
						if(!empty($list->values[$io->io_id])){
							
						}else{
							$missing[] = $io->io_name;
						}
					}else{
						$missing[] = $io->io_name;
					}
				}
				
				if(count($missing) < 1){
					$data = [];
					
					$bool = true;
					$found = [];
					foreach($list->values as $key => $val){
						if(!empty($val)){
							$cd = DB::Conn()->query("SELECT * FROM cart_detail WHERE cd_io = ? AND cd_iov = ? AND cd_cart IN (SELECT c_id FROM carts WHERE c_customer = ?)",
							[
								"cd_io"			=> $key,
								"cd_iov"		=> $val,
								"c_customer"	=> $_SESSION["customer_id"]
								
							])->results();
							
							if(count($cd) == 0){
								$bool = false;
							}else{
								@$found[$cd[0]->cd_cart] += 1;
							}
						}
					}
					
					if($bool){
						$exists = true;					
						$cart_id = array_keys($found, max($found))[0];
						$pick_c = carts::getBy(["c_id" => $cart_id]);
						$pick_c =$pick_c[0];
						$quantity1 = $pick_c->c_quantity + input::POST("quantity");
						
						if(count($pick_c) > 0){
							$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"], "ca_status" => 1]);
			
							if(count($cax)){
								$cax = $cax[0];
							}else{
								$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"]]);
								
								if(count($cax)){
									$cax = $cax[0];
								}else{
									die(json_encode([
										"status"	=> "error",
										"code"		=> "NO_ADDRESS",
										"message"	=> "Please add your address to proceed adding cart."
									]));
								}
							}
							
							$comp = company::getBy(["c_id" => $i->i_company]);
				
							if(count($comp) > 0){
								$comp = $comp[0];
							}else{
								die(json_encode([
									"status"	=> "error",
									"code"		=> "COMPANY_NOT_FOUND",
									"message"	=> "Current company not found."
								]));
							}
							
							$i_cat = item_category::getBy(["ic_item" => $i->i_id]);
							if(count($i_cat) > 0){
								$i_cat = $i_cat[0];
								$catog = category::getBy(["c_id" => $i_cat->ic_category]);
								if(count($catog) > 0){
									$catog = $catog[0];
								}else{
									unset($catog);
								}
							}
							
							$s = Shipping::getRateEasyParcel(
								[
									"contact_name"	=> $comp->c_name,
									"company_name"	=> $comp->c_name,
									"street1"		=> $comp->c_address,
									"country"		=> $comp->c_country,
									"postal_code"	=> $comp->c_postalCode,
									"city"			=> $comp->c_city,
									"phone"			=> $comp->c_phone,
									"street2"		=> null,
									"street3"		=> null,
									"state"			=> $comp->c_state,
									"email"			=> $comp->c_email,
									"fax"			=> $comp->c_fax
								],
								[
									"contact_name"	=> $cax->ca_name,
									"phone"			=> $cax->ca_phone,
									"email"			=> $cax->ca_email,
									"street1"		=> $cax->ca_address,
									"city"			=> $cax->ca_city,
									"postal_code"	=> $cax->ca_postal,
									"state"			=> $cax->ca_state,
									"country"		=> $cax->ca_country,
									"type"			=> "residential"
								],
								[
									"weight_value"		=> $i->i_weight * $quantity1,
									"width"				=> $i->i_width * $quantity1,
									"height"			=> $i->i_height,
									"length"			=> $i->i_length,
									"item_description"	=> !isset($catog) ? $catog[0]->c_name : "NIL",
									"quantity" 			=> Input::post("quantity"),
									// "amount"			=> "300",
									"sku" 				=> $i->i_sku
								]
							);
							
							if(count($s) > 0){
								$ss = $s[0];
							}else{
								die(json_encode([
									"status"	=> "error", 
									"code"		=> "NO_SHIPPING_AVAILABLE",
									"message"	=> "No shipping available for this time."
								]));
							}
							
							$gtotal = $quantity1 * $t_price;
							
							$overall = $gtotal + $ss->price;
					
							if($overall <= 15){
								$commission_rate = 8;
								$commission_value = $overall * 8 / 100;
							}elseif($overall > 100){
								$commission_rate = 5;
								$commission_value = $overall * 5 / 100;
							}else{
								$commission_rate = 7;
								$commission_value = $overall * 7 / 100;
							}
							
							$data = [
								"c_quantity" 			=> $quantity1, 
								"c_gtotal" 				=> $gtotal,
								"c_shipping_cost" 		=> $ss->price, 
								"c_shipping_name" 		=> $ss->service_name, 
								"c_shipping_id" 		=> $ss->rate_id, 
								"c_shipping_deliver" 	=> $ss->delivery,
								"c_commission" 			=> $commission_rate,
								"c_commission_value" 	=> number_format($commission_value, 2)
							];
							carts::updateBy(["c_id" => $cart_id], $data);	
							
							foreach(carts::getBy(["c_customer" => $_SESSION["customer_id"]]) as $cart){
								$p = $cart->c_price;
								$q = $cart->c_quantity;
								
								foreach(cart_detail::getBy(["cd_cart" => $cart->c_id]) as $cd){
									$p += $cd->cd_price;
								}
								
								$total = ($p * $q); //+ $cart->c_shipping_cost;
								
								$check_total = $total + $ss->price;
									
								if($check_total <= 15){
									$new_commission_rate 	= 8;
									$new_commission_value 	= $check_total * 8 / 100;
								}elseif($overall > 100){
									$new_commission_rate 	= 5;
									$new_commission_value 	= $check_total * 5 / 100;
								}else{
									$new_commission_rate 	= 7;
									$new_commission_value 	= $check_total * 7 / 100;
								}
								
								$data_new = [
									"c_gtotal" 				=> $total,
									"c_commission" 			=> $new_commission_rate,
									"c_commission_value" 	=> number_format($new_commission_value, 2),
									"c_shipping_cost" 		=> $ss->price, 
									"c_shipping_name" 		=> $ss->service_name, 
									"c_shipping_id" 		=> $ss->rate_id, 
									"c_shipping_deliver" 	=> $ss->delivery
								];
								
								carts::updateBy(["c_key" => $pick_c->c_id], $data_new);
							}
												
							$customer = $_SESSION['customer_id'];
							$cart = carts::getBy(["c_customer" => $customer], ["limit" => 5]);
							
							if(count($cart) > 0){
								$content = "";
								$cartno = 0;
								foreach ($cart as $xy) {
									$pic = item_picture::getBy(["ip_item" => $xy->c_item]);
									$item = items::getBy(["i_id" => $xy->c_item]);
									if(count($item) > 0){
										$item = $item[0];
										$content .= '   
										<div class="dropdown-product-item cart-item-' . $cartno .'">
											<span class="dropdown-product-remove remove-cart" data-row="'. $xy->c_id .'" data-no="'. $cartno .'"><i class="icon-cross"></i></span>
											<a class="dropdown-product-thumb" href="'. PORTAL_PUBLIC .'categories/view_item/'. $item->i_key .'">
												<img src="'. PORTAL_BUSINESS .'assets/medias/iecommerce/img/shop/products/'. ((count($pic) > 0) ? $pic[0]->ip_file : "") .'" alt="Product">
											</a>
											<div class="dropdown-product-info">
												<a class="dropdown-product-title" href="'. PORTAL_PUBLIC .'categories/view_item/'. $item->i_key .'">'. F::trimWord($item->i_name, 24) .'</a>
												<span class="dropdown-product-details">(x'.$xy->c_quantity .') = '. Currency::getSign() . ' ' . number_format(($xy->c_gtotal + $xy->c_shipping_cost), 2) .'<br />
										';
										$cart_d = cart_detail::getBy(["cd_cart" => $xy->c_id]);
										if(count($cart_d) > 0){
											$kotak = [];
											foreach ($cart_d as $yyy){
												$kotak[] = $yyy->cd_iov;
											}
											$content .= implode(', ', $kotak);
										}
														
									   $content .= '
										   </span>
											</div>
										</div>';

									}
									$cartno++;
								}
							}
							
							echo json_encode([
								"status"    => "success",
								"message"   => "Item successfully updated to cart",
								"code"      => "CART_UPDATED_SUCCESS",
								"data"		=> $content
							]); 
						}
					}else{
						$c_key = F::UniqKey(UNIQUE . "CART_");
						
						$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"], "ca_status" => 1]);
			
						if(count($cax)){
							$cax = $cax[0];
						}else{
							$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"]]);
							
							if(count($cax)){
								$cax = $cax[0];
							}else{
								die(json_encode([
									"status"	=> "error",
									"code"		=> "NO_ADDRESS",
									"message"	=> "Please add your address to proceed adding cart."
								]));
							}
						}
						
						$comp = company::getBy(["c_id" => $i->i_company]);
			
						if(count($comp) > 0){
							$comp = $comp[0];
						}else{
							die(json_encode([
								"status"	=> "error",
								"code"		=> "COMPANY_NOT_FOUND",
								"message"	=> "Current company not found."
							]));
						}
						
						$i_cat = item_category::getBy(["ic_item" => $i->i_id]);
						if(count($i_cat) > 0){
							$i_cat = $i_cat[0];
							$catog = category::getBy(["c_id" => $i_cat->ic_category]);
							if(count($catog) > 0){
								$catog = $catog[0];
							}else{
								unset($catog);
							}
						}
						
						$s = Shipping::getRateEasyParcel(
							[
								"contact_name"	=> $comp->c_name,
								"company_name"	=> $comp->c_name,
								"street1"		=> $comp->c_address,
								"country"		=> $comp->c_country,
								"postal_code"	=> $comp->c_postalCode,
								"city"			=> $comp->c_city,
								"phone"			=> $comp->c_phone,
								"street2"		=> null,
								"street3"		=> null,
								"state"			=> $comp->c_state,
								"email"			=> $comp->c_email,
								"fax"			=> $comp->c_fax
							],
							[
								"contact_name"	=> $cax->ca_name,
								"phone"			=> $cax->ca_phone,
								"email"			=> $cax->ca_email,
								"street1"		=> $cax->ca_address,
								"city"			=> $cax->ca_city,
								"postal_code"	=> $cax->ca_postal,
								"state"			=> $cax->ca_state,
								"country"		=> $cax->ca_country,
								"type"			=> "residential"
							],
							[
								"weight_value"		=> $i->i_weight * (empty(Input::post("quantity")) ? 0 : Input::post("quantity")),
								"width"				=> $i->i_width * (empty(Input::post("quantity")) ? 0 : Input::post("quantity")),
								"height"			=> $i->i_height,
								"length"			=> $i->i_length,
								"item_description"	=> !isset($catog) ? $catog[0]->c_name : "NIL",
								"quantity" 			=> Input::post("quantity"),
								// "amount"			=> "300",
								"sku" 				=> $i->i_sku
							]
						);
						
						if(count($s) > 0){
							$ss = $s[0];
						}else{
							die(json_encode([
								"status"	=> "error", 
								"code"		=> "NO_SHIPPING_AVAILABLE",
								"message"	=> "No shipping available for this time."
							]));
						}
						
						$gtotal = input::POST("quantity") * $t_price;
						
						$overall = $gtotal + $ss->price;
					
						if($overall <= 15){
							$commission_rate = 8;
							$commission_value = $overall * 8 / 100;
						}elseif($overall > 100){
							$commission_rate = 5;
							$commission_value = $overall * 5 / 100;
						}else{
							$commission_rate = 7;
							$commission_value = $overall * 7 / 100;
						}
						
						$data = [
							"c_item" 	 			=> $i->i_id,
							"c_price"	 			=> $t_price,
							"c_company"	 			=> $i->i_company,
							"c_gtotal"	 			=> $gtotal,
							"c_quantity" 			=> input::POST("quantity"),
							"c_date" 	 			=> F::GetDate(),
							"c_time" 	 			=> F::GetTime(),
							"c_customer" 			=> $_SESSION['customer_id'],
							"c_key"		 			=> $c_key,
							"c_shipping_cost" 		=> $ss->price, 
							"c_shipping_name" 		=> $ss->service_name, 
							"c_shipping_id" 		=> $ss->rate_id, 
							"c_shipping_deliver" 	=> $ss->delivery,
							"c_commission" 			=> $commission_rate,
							"c_commission_value" 	=> number_format($commission_value, 2)
						];
						
						$s_in = carts::insertInto($data);
						
						if($s_in){
							$x = carts::getBy(["c_key" => $c_key]);
							if(count($x)> 0){
								$x = $x[0];
								
								foreach($list->values as $key => $val){
									
									if(!empty($val)){
										// $iop_price = DB::conn()->q("SELECT * FORM item_option_value WHERE iov_option = $key AND iov_value = $val")->results();
										$iop_price = item_option_value::getBy(["iov_option" => $key, "iov_value" => $val]);
										if(count($iop_price) > 0){
											$iop_price = $iop_price[0];
											if($iop_price->iov_price > 0){
												$data2 = [
													"cd_cart" 	 => $x->c_id,
													"cd_item" 	 => $i->i_id,
													"cd_io"	 	 => $key,
													"cd_iov"  	 => $val,
													"cd_price"   => $iop_price->iov_price
												];
											}else{
												$data2 = [
													"cd_cart" 	 => $x->c_id,
													"cd_item" 	 => $i->i_id,
													"cd_io"	 	 => $key,
													"cd_iov"  	 => $val,
													"cd_price"   => 0
												];
											}
											cart_detail::insertInto($data2);
										}
									}
								}
								
								foreach(carts::getBy(["c_customer" => $_SESSION["customer_id"]]) as $cart){
									$p = $cart->c_price;
									$q = $cart->c_quantity;
									
									foreach(cart_detail::getBy(["cd_cart" => $cart->c_id]) as $cd){
										$p += $cd->cd_price;
									}
									
									$total = ($p * $q); //+ $cart->c_shipping_cost;
									
									$check_total = $total + $cart->c_shipping_cost;
									
									if($check_total <= 15){
										$new_commission_rate 	= 8;
										$new_commission_value 	= $check_total * 8 / 100;
									}elseif($overall > 100){
										$new_commission_rate 	= 5;
										$new_commission_value 	= $check_total * 5 / 100;
									}else{
										$new_commission_rate 	= 7;
										$new_commission_value 	= $check_total * 7 / 100;
									}
									
									$data_new = [
										"c_gtotal" 				=> $total,
										"c_commission" 			=> $new_commission_rate,
										"c_commission_value" 	=> number_format($new_commission_value, 2),
										"c_shipping_cost" 		=> $ss->price, 
										"c_shipping_name" 		=> $ss->service_name, 
										"c_shipping_id" 		=> $ss->rate_id, 
										"c_shipping_deliver" 	=> $ss->delivery
									];
									
									carts::updateBy(["c_key" => $c_key], $data_new);
								}
								
								$customer = $_SESSION['customer_id'];
								$cart = carts::getBy(["c_customer" => $customer], ["limit" => 5]);
								if(count($cart) > 0){
									$content = "";
									$cartno = 0;
									foreach ($cart as $xy) {
										$pic = item_picture::getBy(["ip_item" => $xy->c_item]);
										$item = items::getBy(["i_id" => $xy->c_item]);
										if(count($item) > 0){
											$item = $item[0];
											$tx = number_format(($xy->c_gtotal + $xy->c_shipping_cost), 2);
											
											$content .= '
											<div class="dropdown-product-item cart-item-' . $cartno .'">
												<span class="dropdown-product-remove remove-cart" data-row="'. $xy->c_id .'" data-no="'. $cartno .'"><i class="icon-cross"></i></span>
												<a class="dropdown-product-thumb" href="'. PORTAL_PUBLIC .'categories/view_item/'. $i->i_key .'">
													<img src="'. PORTAL_BUSINESS .'assets/medias/iecommerce/img/shop/products/'. ((count($pic) > 0) ? $pic[0]->ip_file : "") .'" alt="Product">
												</a>
												<div class="dropdown-product-info">
													<a class="dropdown-product-title" href="'. PORTAL_PUBLIC .'categories/view_item/'. $i->i_key .'">'. F::trimWord($i->i_name, 24) .'</a>
													<span class="dropdown-product-details">(x'.$xy->c_quantity .') = '. Currency::getSign() . " " . $tx .'<br />
													
											 ';
															$cart_d = cart_detail::getBy(["cd_cart" => $xy->c_id]);
															if(count($cart_d) > 0){
																$kotak = [];
																foreach ($cart_d as $yyy){
																	$kotak[] = $yyy->cd_iov;
																}
																$content .= implode(', ', $kotak);
															}
														
											   $content .= '
											   </span>
												</div>
											</div>';
	
										}
										$cartno++;
									}
								}
								
								echo json_encode([
									"status"	=> "success",
									"code"		=> "CART_ADDED_SUCCESS",
									"message"	=> "Cart has been added successfully.",
									"data"		=> $content
								]);
							}
						}
					}
				}else{
					echo json_encode([
						"status"	=> "error",
						"code"		=> "OPTION_MISSING",
						"message"	=> "Please select " . implode(",", $missing) ." in the item option."
					]);
				}
			}else{
				//no option
				$c = carts::getBy(["c_item" => $i->i_id, "c_customer" => $_SESSION["customer_id"]]);
				
				if(count($c) > 0){
					$exists = true;
					$cart_id = $c[0]->c_id;	
					$quantity = $c[0]->c_quantity;	
				}
				
				if($exists){
					
					$q = $quantity + input::POST("quantity");
					
					$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"], "ca_status" => 1]);
			
					if(count($cax)){
						$cax = $cax[0];
					}else{
						$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"]]);
						
						if(count($cax)){
							$cax = $cax[0];
						}else{
							die(json_encode([
								"status"	=> "error",
								"code"		=> "NO_ADDRESS",
								"message"	=> "Please add your address to proceed adding cart."
							]));
						}
					}
					
					$comp = company::getBy(["c_id" => $i->i_company]);
		
					if(count($comp) > 0){
						$comp = $comp[0];
					}else{
						die(json_encode([
							"status"	=> "error",
							"code"		=> "COMPANY_NOT_FOUND",
							"message"	=> "Current company not found."
						]));
					}
					
					$i_cat = item_category::getBy(["ic_item" => $i->i_id]);
					if(count($i_cat) > 0){
						$i_cat = $i_cat[0];
						$catog = category::getBy(["c_id" => $i_cat->ic_category]);
						if(count($catog) > 0){
							$catog = $catog[0];
						}else{
							unset($catog);
						}
					}
					
					$s = Shipping::getRateEasyParcel(
						[
							"contact_name"	=> $comp->c_name,
							"company_name"	=> $comp->c_name,
							"street1"		=> $comp->c_address,
							"country"		=> $comp->c_country,
							"postal_code"	=> $comp->c_postalCode,
							"city"			=> $comp->c_city,
							"phone"			=> $comp->c_phone,
							"street2"		=> null,
							"street3"		=> null,
							"state"			=> $comp->c_state,
							"email"			=> $comp->c_email,
							"fax"			=> $comp->c_fax
						],
						[
							"contact_name"	=> $cax->ca_name,
							"phone"			=> $cax->ca_phone,
							"email"			=> $cax->ca_email,
							"street1"		=> $cax->ca_address,
							"city"			=> $cax->ca_city,
							"postal_code"	=> $cax->ca_postal,
							"state"			=> $cax->ca_state,
							"country"		=> $cax->ca_country,
							"type"			=> "residential"
						],
						[
							"weight_value"		=> $i->i_weight * $q,
							"width"				=> $i->i_width * $q,
							"height"			=> $i->i_height,
							"length"			=> $i->i_length,
							"item_description"	=> !isset($catog) ? $catog[0]->c_name : "NIL",
							"quantity" 			=> Input::post("quantity"),
							// "amount"			=> "300",
							"sku" 				=> $i->i_sku
						]
					);
					
					if(count($s) > 0){
						$ss = $s[0];
					}else{
						die(json_encode([
							"status"	=> "error", 
							"code"		=> "NO_SHIPPING_AVAILABLE",
							"message"	=> "No shipping available for this time."
						]));
					}
					
					$gtotal = $q * $t_price;
					
					$overall = $gtotal + $ss->price;
					
					if($overall <= 15){
						$commission_rate = 8;
						$commission_value = $overall * 8 / 100;
					}elseif($overall > 100){
						$commission_rate = 5;
						$commission_value = $overall * 5 / 100;
					}else{
						$commission_rate = 7;
						$commission_value = $overall * 7 / 100;
					}
					
					$data = [
						"c_quantity" 			=> $q, 
						"c_gtotal" 				=> $gtotal,
						"c_shipping_cost" 		=> $ss->price, 
						"c_shipping_name" 		=> $ss->service_name, 
						"c_shipping_id" 		=> $ss->rate_id, 
						"c_shipping_deliver" 	=> $ss->delivery,
						"c_commission" 			=> $commission_rate,
						"c_commission_value" 	=> number_format($commission_value, 2)
					];
					
					$s_up = carts::updateBy(["c_id" => $cart_id], $data);
					
					foreach(carts::getBy(["c_customer" => $_SESSION["customer_id"]]) as $cart){
						$p = $cart->c_price;
						$q = $cart->c_quantity;
						
						foreach(cart_detail::getBy(["cd_cart" => $cart->c_id]) as $cd){
							$p += $cd->cd_price;
						}
						
						$total = ($p * $q); //+ $cart->c_shipping_cost;
						
						carts::updateBy(["c_id" => $cart->c_id], ["c_gtotal" => $total]);
					}
					
					if($s_up){
						
						$customer = $_SESSION['customer_id'];
						$cart = carts::getBy(["c_customer" => $customer], ["limit" => 5]);
						if(count($cart) > 0){
							$content = "";
							$cartno = 0;
							foreach ($cart as $xy) {
								$pic = item_picture::getBy(["ip_item" => $xy->c_item]);
								$item = items::getBy(["i_id" => $xy->c_item]);
								if(count($item) > 0){
									$item = $item[0];
									$content .= '
									<div class="dropdown-product-item cart-item-' . $cartno .'">
										<span class="dropdown-product-remove remove-cart" data-row="'. $xy->c_id .'" data-no="'. $cartno .'"><i class="icon-cross"></i></span>
										<a class="dropdown-product-thumb" href="'. PORTAL_PUBLIC .'categories/view_item/'. $i->i_key .'">
											<img src="'. PORTAL_BUSINESS .'assets/medias/iecommerce/img/shop/products/'. ((count($pic) > 0) ? $pic[0]->ip_file : "") .'" alt="Product">
										</a>
										<div class="dropdown-product-info">
											<a class="dropdown-product-title" href="'. PORTAL_PUBLIC .'categories/view_item/'. $i->i_key .'">'. F::trimWord($i->i_name, 24) .'</a>
											<span class="dropdown-product-details">(x'.$xy->c_quantity .') = '. Currency::getSign() . " " . number_format($xy->c_gtotal + $xy->c_shipping_cost, 2)
											;
													$cart_d = cart_detail::getBy(["cd_cart" => $xy->c_id]);
													if(count($cart_d) > 0){
														$kotak = [];
														foreach ($cart_d as $yyy){
															$kotak[] = $yyy->cd_iov;
														}
														$content .= implode(', ', $kotak);
													}
													
									   $content .= '
									   </span>
										</div>
									</div>';

								}
								$cartno++;
							}
						}
						
						echo json_encode([
							"status"    => "success",
							"message"   => "Item successfully update to cart",
							"code"      => "CART_UPDATED_SUCCESS",
							"data"		=> $content
						]); 
						
					}else{
						
					}
					
				}else{
					$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"], "ca_status" => 1]);
			
					if(count($cax)){
						$cax = $cax[0];
					}else{
						$cax = customer_address::getBy(["ca_customer" => $_SESSION["customer_id"]]);
						
						if(count($cax)){
							$cax = $cax[0];
						}else{
							die(json_encode([
								"status"	=> "error",
								"code"		=> "NO_ADDRESS",
								"message"	=> "Please add your address to proceed adding cart."
							]));
						}
					}
					
					$comp = company::getBy(["c_id" => $i->i_company]);
		
					if(count($comp) > 0){
						$comp = $comp[0];
					}else{
						die(json_encode([
							"status"	=> "error",
							"code"		=> "COMPANY_NOT_FOUND",
							"message"	=> "Current company not found."
						]));
					}
					
					$i_cat = item_category::getBy(["ic_item" => $i->i_id]);
					if(count($i_cat) > 0){
						$i_cat = $i_cat[0];
						$catog = category::getBy(["c_id" => $i_cat->ic_category]);
						if(count($catog) > 0){
							$catog = $catog[0];
						}else{
							unset($catog);
						}
					}
					
					$s = Shipping::getRateEasyParcel(
						[
							"contact_name"	=> $comp->c_name,
							"company_name"	=> $comp->c_name,
							"street1"		=> $comp->c_address,
							"country"		=> $comp->c_country,
							"postal_code"	=> $comp->c_postalCode,
							"city"			=> $comp->c_city,
							"phone"			=> $comp->c_phone,
							"street2"		=> null,
							"street3"		=> null,
							"state"			=> $comp->c_state,
							"email"			=> $comp->c_email,
							"fax"			=> $comp->c_fax
						],
						[
							"contact_name"	=> $cax->ca_name,
							"phone"			=> $cax->ca_phone,
							"email"			=> $cax->ca_email,
							"street1"		=> $cax->ca_address,
							"city"			=> $cax->ca_city,
							"postal_code"	=> $cax->ca_postal,
							"state"			=> $cax->ca_state,
							"country"		=> $cax->ca_country,
							"type"			=> "residential"
						],
						[
							"weight_value"		=> $i->i_weight * (empty(Input::post("quantity")) ? 0 : Input::post("quantity")),
							"width"				=> $i->i_width * (empty(Input::post("quantity")) ? 0 : Input::post("quantity")),
							"height"			=> $i->i_height,
							"length"			=> $i->i_length,
							"item_description"	=> !isset($catog) ? $catog[0]->c_name : "NIL",
							"quantity" 			=> Input::post("quantity"),
							// "amount"			=> "300",
							"sku" 				=> $i->i_sku
						]
					);
					
					if(count($s) > 0){
						$ss = $s[0];
					}else{
						die(json_encode([
							"status"	=> "error", 
							"code"		=> "NO_SHIPPING_AVAILABLE",
							"message"	=> "No shipping available for this time."
						]));
					}
					
					$key = F::UniqKey(UNIQUE . "CART_");
					
					
					$gtotal = input::POST("quantity") * $t_price;
					$overall = $gtotal + $ss->price;
					
					if($overall <= 15){
						$commission_rate = 8;
						$commission_value = $overall * 8 / 100;
					}elseif($overall > 100){
						$commission_rate = 5;
						$commission_value = $overall * 5 / 100;
					}else{
						$commission_rate = 7;
						$commission_value = $overall * 7 / 100;
					}
						
					$data = [
						"c_item" 	 			=> $i->i_id,
						"c_price"	 			=> $t_price,
						"c_company"	 			=> $i->i_company,
						"c_gtotal" 	 			=> $gtotal,
						"c_quantity"			=> input::POST("quantity"),
						"c_date" 	 			=> F::GetDate(),
						"c_time" 	 			=> F::GetTime(),
						"c_customer" 			=> $_SESSION['customer_id'],
						"c_key"		 			=> $key,
						"c_shipping_cost" 		=> $ss->price, 
						"c_shipping_name" 		=> $ss->service_name, 
						"c_shipping_id" 		=> $ss->rate_id, 
						"c_shipping_deliver" 	=> $ss->delivery,
						"c_commission" 			=> $commission_rate,
						"c_commission_value" 	=> number_format($commission_value, 2)
						
					];
					
					$s_in = carts::insertInto($data);
					
					foreach(carts::getBy(["c_customer" => $_SESSION["customer_id"]]) as $cart){
						$p = $cart->c_price;
						$q = $cart->c_quantity;
						
						foreach(cart_detail::getBy(["cd_cart" => $cart->c_id]) as $cd){
							$p += $cd->cd_price;
						}
						
						$total = ($p * $q); //+ $cart->c_shipping_cost;
						
						carts::updateBy(["c_id" => $cart->c_id], ["c_gtotal" => $total]);
					}
					
					if($s_in){
						
						$customer = $_SESSION['customer_id'];
						$cart = carts::getBy(["c_customer" => $customer], ["limit" => 5]);
						
						if(count($cart) > 0){
							$content = "";
							$cartno = 0;
							foreach ($cart as $xy) {
								$pic = item_picture::getBy(["ip_item" => $xy->c_item]);
								$item = items::getBy(["i_id" => $xy->c_item]);
								if(count($item) > 0){
									$item = $item[0];
									$content .= '
									<div class="dropdown-product-item cart-item-' . $cartno .'">
										<span class="dropdown-product-remove remove-cart" data-row="'. $xy->c_id .'" data-no="'. $cartno .'"><i class="icon-cross"></i></span>
										<a class="dropdown-product-thumb" href="'. PORTAL_PUBLIC .'categories/view_item/'. $item->i_id .'">
											<img src="'. PORTAL_BUSINESS .'assets/medias/iecommerce/img/shop/products/'. ((count($pic) > 0) ? $pic[0]->ip_file : "") .'" alt="Product">
										</a>
										<div class="dropdown-product-info">
											<a class="dropdown-product-title" href="'. PORTAL_PUBLIC .'categories/view_item/'. $item->i_id .'">'. F::trimWord($item->i_name, 24) .'</a>
											<span class="dropdown-product-details">(x'.$xy->c_quantity .') = '. Currency::getSign() . ' ' . number_format($xy->c_gtotal + $xy->c_shipping_cost, 2)
									;
									$cart_d = cart_detail::getBy(["cd_cart" => $xy->c_id]);
									if(count($cart_d) > 0){
										$kotak = [];
										foreach ($cart_d as $yyy){
											$kotak[] = $yyy->cd_iov;
										}
										$content .= implode(', ', $kotak);
									}
													
								   $content .= '
									   </span>
										</div>
									</div>';

								}
								$cartno++;
							}
						}
					
						echo json_encode([
							"status"    => "success",
							"message"   => "Item successfully added to cart",
							"code"      => "CART_ADDED_SUCCESS",
							"data"		=> $content
						]); 
						
					}else{
						
					}
				}
			}
		}
    break;
    
    case F::Encrypt(Input::post("akey") . "removeCart"):
        
	    $cart_id = input::POST("cart_id");
	    $customer= $_SESSION['customer_id'];
		
		$check = carts::getBy(["c_id" => $cart_id]);
		
	    if(count($check) > 0){
	        $check = $check[0];
			$cid = $check->c_id;
			$x = carts::deleteBy(["c_id"=> $cid]);
			
			if($x){
				cart_detail::deleteBy(["cd_cart"=> $cid]);
			}
			
			echo json_encode([
	            "status"    => "success",
	            "message"   => "Item Removed",
	            "code"      => "CART_REMOVED"
	        ]); 
			
	    }else{
	        echo json_encode([
	            "status"    => "error",
	            "message"   => "Unable to remove from cart.",
	            "code"      => "CART_NOT_REMOVED"
	        ]); 
	    }
    
    break;
	
	case "removeAllCart":
        
	    $customer= $_SESSION['customer_id'];
		
		$x = carts::getBy(["c_customer"=> $customer]);
		
		foreach ($x as $y){
			$c_id = $y->c_id;
			
			$a = cart_detail::deleteBy(["cd_cart" => $c_id]);
			
			if($a){
				 carts::deleteBy(
					["c_customer"=> $customer]
				);
			}
		}
		echo json_encode([
            "status"    => "success",
            "message"   => "Item Removed",
            "code"      => "DATA_REMOVED",
            "data"		=> $customer
        ]);
		
	   
    
    break;
	
	case  F::Encrypt(Input::post("akey") . "totalCart"):
        
			$customer = $_SESSION['customer_id'];
			$x = carts::getBy(["c_customer" => $customer]);
			
			$gtotal = 0;
			$s_total = 0;
			$s_quantity = 0;
			foreach ($x as $k){
				$quantity = $k->c_quantity;
				$price = $k->c_price;
				$shipping_cost = $k->c_shipping_cost;
				$total_all = $shipping_cost + $k->c_gtotal;
				
				$s_quantity += $quantity;
				$s_total += $total_all;
			}
			
			echo json_encode([
	            "status"    => "success",
	            "message"   => "Data Loaded",
	            "code"      => "DATA_LOADED",
	            "data"		=> $s_total,
	            "quantity"	=> $s_quantity
	            
	        ]);			
    break;
	
	case  F::Encrypt(Input::post("akey") . "quantity"):
        
			$customer = $_SESSION['customer_id'];
			$cart = input::POST("cart_id");
			$quan = input::POST("quantity");
			$check = carts::getBy(["c_id" => $cart]);
			
			if(count($check) > 0){
				$check = $check[0];
				$price = $check->c_gtotal / $check->c_quantity;
				$tot = $price * $quan;
				$company = $check->c_company;
				carts::updateBy(
					["c_id" => $cart], 
					[
						"c_quantity" => $quan,
						"c_gtotal" => $tot
					]
				);
				$sumquan = DB::conn()->query("SELECT SUM(c_quantity) AS totquan FROM carts WHERE c_customer = ? AND c_company = ?", ["c_customer" => $customer, "c_company" => $company])->results();
				if(count($sumquan) > 0){
					$sumquan = $sumquan[0];
					$sub_comp = $price * $sumquan->totquan;
					
					echo json_encode([
			            "status"    => "success",
			            "message"   => "Data Loaded",
			            "code"      => "DATA_LOADED",
			            "stotal"	=> number_format($tot, 2),
			            "sub_com_total"	=> number_format($sub_comp, 2),
			            "sumquan"	=> $sumquan->totquan
			        ]);
					
				}
				
			}
			
    
    break;
	
	case  "listCart":
        
			$customer = $_SESSION['customer_id'];
			$check = carts::getBy(["c_customer" => $customer]);
			if($check > 0){
				$check = $check[0];
				$pic = item_picture::getBy(["ip_item" => $check->c_item]);
			}
				echo json_encode([
		            "status"    => "success",
		            "message"   => "Data Loaded",
		            "code"      => "DATA_LOADED",
		            "data"		=> $check,
		            "picture"	=> $pic
		        ]);
			
    
    break;
	
	case F::Encrypt(Input::post("akey") . "selectCart"):
		
		$bs = DB::Conn()->query("SELECT DISTINCT c_company FROM carts WHERE c_customer = ?", ["c_customer" => $_SESSION["customer_id"]])->results();
		$ntotal = 0;
		
		foreach($bs as $b){
			$c = company::getBy(["c_id" => $b->c_company]);
			
			if(count($c) > 0){
				$c = $c[0];
				$cis = carts::getBy(["c_company" => $c->c_id, "c_customer" => $_SESSION["customer_id"]]);
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
							if($ips->ip_type){
								$pt = $pt - ($pt * $ips->ip_value / 100);
							}else{
								$pt = $pt - $ips->ip_value;
							}
						}
						$i_op = cart_detail::getBy(["cd_cart" => $ci->c_id]);
						if($i_op > 0){
							$ori_price = 0;
							foreach($i_op as $iop){
								$ioc_price = $iop->cd_price;
								
								$ori_price += $ioc_price;
							}
							$pt = ($pt + $ori_price) * $ci->c_quantity;
						}else{
							$pt = $pt * $ci->c_quantity;
						}
						
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
				$ntotal += $ttemp;
			}
		}
		
		echo json_encode([
            "status"    => "success",
            "message"   => "Price loaded",
            "code"      => "CART_PRICE_LOADED",
            "data"		=> Currency::getSign() . " " . number_format(isset($ntotal) ? $ntotal : 0, 2)
        ]); 
    break;
	
	case "list_shipping":
		$c_key = url::get(1);
		
		$cart = carts::getBy(["c_key" => $c_key, "c_customer" => $_SESSION["customer_id"]]);
		
		if(count($cart)){
			$cart = $cart[0];
			
			Turbo::app("public")->Classes("Shipping");

			$y = items::getBy(["i_id" => $cart->c_item]);

			if(count($y) > 0){
				$y = $y[0];
				$xx = $y->i_id;
				$comp = company::getBy(["c_id" => $y->i_company]);
				
				if(count($comp) > 0){
					$comp = $comp[0];
					$cl = clients::getBy(["cl_id" => $y->i_client]);
					
					if(count($cl) > 0){
						$cl = $cl[0];
						$i_cat = item_category::getBy(["ic_item" => $y->i_id]);
						if(count($i_cat) > 0){
							$i_cat = $i_cat[0];
							$catog = category::getBy(["c_id" => $i_cat->ic_category]);
							if(count($catog) > 0){
								$catog = $catog[0];
							}else{
								unset($catog);
							}
						}
						
						$cust_add = customer_address::getBy(["ca_customer" => $_SESSION['customer_id'], "ca_status" => 1]);
												
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
						}else{
							die(json_encode([
								"status"	=> "error",
								"code"		=> "ADDRESS_NOT_FOUND",
								"message"	=> "Please select/create your address to proceed",
								"data"		=> [
									"address"	=> PORTAL_PUBLIC . "customer/account/address"
								]
							]));	
						}
						
						$s = Shipping::getRateEasyParcel(
							[
								"contact_name"	=> $cl->cl_name,
								"company_name"	=> $comp->c_name,
								"street1"		=> $comp->c_address,
								"country"		=> $comp->c_country,
								"postal_code"	=> $comp->c_postalCode,
								"city"			=> $comp->c_city,
								"phone"			=> $comp->c_phone,
								"street2"		=> null,
								"street3"		=> null,
								"state"			=> $comp->c_state,
								"email"			=> $comp->c_email,
								"fax"			=> $comp->c_fax
							],
							$shipping_add,
							[
								"weight_value"		=> $y->i_weight,
								"width"				=> $y->i_width,
								"height"			=> $y->i_height,
								"length"			=> $y->i_length,
								"item_description"	=> !isset($catog) ? $catog[0]->c_name : "NIL",
								"quantity" 			=> "1",
								// "amount"			=> "300",
								"sku" 				=> $y->i_sku
							]
						);
						
						if(count($s) > 0){
							echo json_encode([
								"status"	=> "success",
								"code"		=> "SHIPPING_AVAILABLE_LIST",
								"message"	=> "List of available shipping.",
								"data"		=> [
									"list"	=> $s,
									"pick"	=> [
										//"full"			=> json_decode(base64_decode($cart->c_shipping))[0],
										"service_name"	=> $cart->c_shipping_name,
										"price"			=> $cart->c_shipping_cost,
										"delivery"		=> $cart->c_shipping_deliver,
										"rate_id"		=> $cart->c_shipping_id
									]
								]
							]);
						}else{
							echo json_encode([
								"status"	=> "error", 
								"code"		=> "NO_SHIPPING_AVAILABLE",
								"message"	=> "No shipping available for this time."
							]);
						}
					}else{
						echo json_encode([
							"status"	=> "error",
							"code"		=> "CLIENT_NOT_FOUND",
							"message"	=> "Client information not found."
						]);
					}
				}else{
					echo json_encode([
						"status"	=> "error",
						"code"		=> "COMPNAY_NOT_FOUND",
						"message"	=> "Seller company information not found."
					]);
				}
			}else{
				echo json_encode([
					"status"	=> "error",
					"code"		=> "ITEM_NOT_FOUND",
					"message"	=> "Item information not found."
				]);
			}
		}else{
			echo json_encode([
				"status"	=> "error",
				"code"		=> "NO_CART_FOUND",
				"message"	=> "Requested data from current cart is not exist."
			]);
		}
	break;
	
	case "select_shipping":
		$ss = json_decode(base64_decode(Input::post("shipping")));
		
		if(isset($ss->rate_id)){
			$c_key = url::get(1);
		
			$cart = carts::getBy(["c_key" => $c_key, "c_customer" => $_SESSION["customer_id"]]);
			
			if(count($cart)){
				$cart = $cart[0];
				
				carts::updateBy(["c_id" 	=> $cart->c_id], [
					"c_shipping_id"			=> $ss->rate_id,
					"c_shipping_cost"		=> $ss->price,
					"c_shipping_name"		=> $ss->service_name,
					"c_shipping_deliver"	=> $ss->delivery
				]);
				
				echo json_encode([
					"status"	=> "success",
					"code"		=> "SHIPPING_INFORMATION_UPDATED",
					"message"	=> "Shipping information has been updated successfully.",
					"data"		=> [
						"total"		=> $cart->c_quantity * $ss->price
					]
				]);
			}else{
				echo json_encode([
					"status"	=> "error",
					"code"		=> "NO_CART_FOUND",
					"message"	=> "Requested data from current cart is not exist."
				]);
			}
		}else{
			echo json_encode([
				"status"	=> "error",
				"code"		=> "SHIPINNG_INFORMATION_NOT_FOUND",
				"message"	=> "Fail getting shipping information."
			]);
		}
	break;
}
?>