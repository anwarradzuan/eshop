<?php
switch (input::POST('action')){
    case  F::Encrypt(Input::post("akey") . "addCart"):
			$list = JSON_decode(base64_decode(input::POST('data')));
			
        	$customer= $_SESSION['customer_id'];
			$i = items::getBy(['i_key' => input::POST("item")]);
			// $i_pic = item_picture::getBy(["ip_item" => input::POST("item"), "ip_order" => 1]);
			// if(count($i_pic) > 0){
				// $i_pic = $i_pic[0];
				// $pic = $i_pic->ip_file;
			// }
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
							
							if(count($pick_c) > 0){
								$pick_c =$pick_c[0];
								$quantity1 = $pick_c->c_quantity + input::POST("quantity");
								$gtotal = $quantity1 * $t_price;
								carts::updateBy(["c_id" => $cart_id],["c_quantity" => $quantity1, "c_gtotal" => $gtotal]);	
								
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
				                                    <span class="dropdown-product-details">('.$xy->c_quantity .' x '. Currency::getSign() . ' ' . number_format($t_price, 2) .')
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
							$gtotal = input::POST("quantity") * $t_price;
							$data = [
								"c_item" 	 => $i->i_id,
								"c_price"	 => $t_price,
								"c_company"	 => $i->i_company,
								"c_gtotal"	 => $gtotal,
								"c_quantity" => input::POST("quantity"),
								"c_date" 	 => F::GetDate(),
								"c_time" 	 => F::GetTime(),
								"c_customer" => $_SESSION['customer_id'],
								"c_key"		 => $c_key
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
					                                    <span class="dropdown-product-details">('.$xy->c_quantity .' x '. Currency::getSign() . " " . number_format($t_price, 2) .')
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
						$gtotal = $q * $t_price;
						
						$s_up = carts::updateBy(["c_id" => $cart_id],["c_quantity" => $q, "c_gtotal" => $gtotal]);
						
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
			                                    <span class="dropdown-product-details">('.$xy->c_quantity .' x '. Currency::getSign() . " " . number_format($t_price, 2) .')
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
					            "message"   => "Item successfully update to cart",
					            "code"      => "CART_UPDATED_SUCCESS",
					            "data"		=> $content
					        ]); 
							
						}else{
							
						}
						
					}else{
						$key = F::UniqKey(UNIQUE . "CART_");
						
						$gtotal = input::POST("quantity") * $t_price;
							
						$data = [
							"c_item" 	 => $i->i_id,
							"c_price"	 => $t_price,
							"c_company"	 => $i->i_company,
							"c_gtotal" 	 => $gtotal,
							"c_quantity" => input::POST("quantity"),
							"c_date" 	 => F::GetDate(),
							"c_time" 	 => F::GetTime(),
							"c_customer" => $_SESSION['customer_id'],
							"c_key"		 => $key
						];
						
						$s_in = carts::insertInto($data);
						
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
			                                    <span class="dropdown-product-details">('.$xy->c_quantity .' x '. Currency::getSign() . ' ' . number_format($t_price, 2) .')
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
				
				$s_quantity += $quantity;
				$s_total += ($quantity * $price);
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
				$price = $check->c_price;
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
        
	    $c_key = input::POST("cart_key");
		$total = 0;
		$carts = carts::getBy(["c_customer" => $_SESSION["customer_id"]]);
		
		if(!empty($c_key)){
			$c_key = explode(",", $c_key);
			foreach($carts as $cart){
				if(!in_array($cart->c_key, $c_key)){
					$total += ($cart->c_price * $cart->c_quantity);
				}
			}
			
			echo json_encode([
	            "status"    => "success",
	            "message"   => "Price loaded",
	            "code"      => "CART_PRICE_LOADED",
	            "data"		=> Currency::getSign() . " " . number_format($total, 2)
	        ]); 
			
		}else{
			foreach($carts as $cart){
				$total += ($cart->c_price * $cart->c_quantity);
			}
			
			echo json_encode([
	            "status"    => "success",
	            "message"   => "Price loaded",
	            "code"      => "CART_PRICE_LOADED",
	            "data"		=> Currency::getSign() . " " . number_format($total, 2)
	        ]); 
		}
		
    break;
}
?>