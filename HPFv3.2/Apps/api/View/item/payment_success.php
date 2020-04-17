<?php
$pro_no = Input::POST("pro");
$total = Input::POST("total");
$commission = Input::POST("commission");
$objpay = json_decode(F::Decode64(Input::POST("list")));
$customer = $_SESSION["customer_id"];
$res = [];


$cust = customers::getBy(["c_id" => $customer]);

if(count($cust) > 0){
	$cust = $cust[0];
	
	if(is_null($objpay)){
		echo json_encode([
			"status"    => "error",
			"message"   => "Payment fail. Paypal response error. Please try again.",
			"code"      => "PAYPAL_RESPONSE_ERROR"
		]); 
	}else{
		$state = strtoupper($objpay->status);
		
		if($state == strtoupper("completed")){
			$okey = F::UniqKey("ORDER_");
			
			$order_insert = orders::insertInto([
				"o_gtotal"	 		=> $total,
				"o_customer" 		=> $customer,
				"o_no"		 		=> $pro_no,
				"o_status"	 		=> $state,
				"o_commission_value"=> $commission,
				"o_date" 	 		=> F::GetDate(),
				"o_time" 	  		=> F::GetTime(),					
				"o_transaction_id"	=> $objpay->id,
				"o_payment_id"		=> $objpay->purchase_units[0]->payments->captures[0]->id,
				"o_pinvoice_id"		=> $objpay->purchase_units[0]->payments->captures[0]->invoice_id,
				"o_ppayment_state"	=> $objpay->purchase_units[0]->payments->captures[0]->status,
				"o_paypal_obj"		=> json_encode($objpay),
				"o_key"	 	 		=> $okey
			]);
			
			$o = orders::getBy(["o_key" => $okey]);
					
			if(count($o) > 0){
				$o = $o[0];
				$shipping_address = customer_address::getBy(["ca_customer" => $customer, "ca_status" => 1]);
				
				if(count($shipping_address) > 0){
					$skey = F::UniqKey("SHIPPING_");
					
					$shipping_address = $shipping_address[0];
					
					$shippping_data = [
						"os_order"	 	=> $o->o_id,
						"os_customer" 	=> $customer,
						"os_name" 		=> $shipping_address->ca_name,
						"os_email" 		=> $shipping_address->ca_email,
						"os_phone" 		=> $shipping_address->ca_phone,
						"os_address" 	=> $shipping_address->ca_address,
						"os_postal" 	=> $shipping_address->ca_postal,
						"os_city" 		=> $shipping_address->ca_city,
						"os_country" 	=> $shipping_address->ca_country,
						"os_state"		=> $shipping_address->ca_state,
						"os_key"		=> $skey
						
					];
					order_shipping::insertInto($shippping_data);
					
					$check_shipping = order_shipping::getBy(["os_key" => $skey]);
					
					if(count($check_shipping) > 0){
						$check_shipping = $check_shipping[0];
						
						$carts = carts::getBy(["c_customer" => $customer]);
						if(count($carts) > 0){
							foreach($carts as $cart){
								$item_xx = items::GetBy(["i_id" => $cart->c_item]);
								if(count($item_xx) > 0){
									$item_xx = $item_xx[0];
									$item_name_order = $item_xx->i_name;
								}
								$order_item_key = F::UniqKey("ORDER_ITEM_");
								
								$cart_data = [
									"oi_order"	 			=> $o->o_id,
									"oi_shipping" 			=> $check_shipping->os_id,
									"oi_item"	 			=> $cart->c_item,
									"oi_item_name"	 		=> $item_name_order,
									"oi_customer" 			=> $customer,
									"oi_price" 	 			=> $cart->c_price,
									"oi_quantity" 			=> $cart->c_quantity,
									"oi_gtotal" 			=> $cart->c_gtotal,
									"oi_company" 			=> $cart->c_company,
									"oi_cart_key" 			=> $cart->c_key,
									"oi_shipping_status" 	=> 0,
									"oi_date"				=> F::GetDate(),
									"oi_time"	 			=> F::GetTime(),
									"oi_key"				=> $order_item_key,
									"oi_shipping_duration" 	=> $cart->c_shipping_deliver,
									"oi_shipping_cost"		=> $cart->c_shipping_cost,
									"oi_shipping_id"		=> $cart->c_shipping_id,
									"oi_shipping_name"		=> $cart->c_shipping_name,
									"oi_commission"			=> $cart->c_commission,
									"oi_commission_value"	=> $cart->c_commission_value
								];
							
								order_item::insertInto($cart_data);
								$check_oi = order_item::getBy(["oi_key" => $order_item_key]);
								
								if(count($check_oi) > 0){
									$check_oi = $check_oi[0];
									
									$cd_check = cart_detail::getBy(["cd_cart" => $cart->c_id]);
									
									if(count($cd_check) > 0){
										
										foreach ($cd_check as $cd) {
												
											$item_option_xx = item_option::getBy(["io_id" => $cd->cd_io]);
											
											if(count($item_option_xx) > 0){
												$item_option_xx = $item_option_xx[0];
												$item_option_name = $item_option_xx->io_name;
											}
											
											$cd_data = [
												"od_order_item"	=> $check_oi->oi_id,
												"od_item" 		=> $cd->cd_item,
												"od_io"			=> $cd->cd_io,
												"od_iov"	 	=> $cd->cd_iov,
												"od_io_name"	=> $item_option_name,
												"od_price"	 	=> $cd->cd_price
											];
											
											order_detail::insertInto($cd_data);
											cart_detail::deleteBy(["cd_id" => $cd->cd_id]);
										}
									}
									
									$tc = company::GetBy(["c_id" => $cart->c_company]);
								
									if(count($tc)){
										$tc = $tc[0];
										
										$e = new Email();
										$e->setTemplate("vendor-received-order", [
											"{COMPANY_NAME}"	=> $tc->c_name,
											"{ORDER_NUMBER}"	=> $order_item_key,
											"{VENDOR_LOGIN}"	=> PORTAL_BUSINESS,
											"{DATE}"			=> F::GetDate(),
											"{TABLE_ITEM}"		=> call_user_func(function() use ($check_oi){
												$html = '
													<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:500px;">
														<thead style="background-color: #262d3a; color: white">
															<tr>
																<td style="text-align: center">Item</td>
																<td style="text-align: center">Price ('. Currency::getSign() .')</td>
																<td style="text-align: center">Quantity</td>
																<td style="text-align: center">Shipping Cost</td>
																<td style="text-align: center">Charges Fee</td>
																<td style="text-align: center">Total ('. Currency::getSign() .')</td>
															</tr>
														<thead>
														
														<tbody>
													';
													
													$item_o = items::getBy(["i_id" => $check_oi->oi_item]);
													if(count($item_o) > 0){
														$item_o = $item_o[0];
														
														$iop = "";
														$od = order_detail::getBy(["od_order_item" => $check_oi->oi_id]);
														if(count($od) > 0){
															$n = 0;
															foreach ($od as $option){
																if($n > 0){
																	$iop .= " | ";
																}
																$iop .= $option->od_io_name . ": " . $option->od_iov;
																$n++;
															}
														}else{
															$iop = "No option";
														}
														$html .= '
															<tr>
																<td style="text-align: center">'.$item_o->i_name.'<br />('. $iop .')</td>
																<td style="text-align: center">'. number_format($check_oi->oi_gtotal / $check_oi->oi_quantity, 2).'</td>
																<td style="text-align: center">'. $check_oi->oi_quantity .'</td>
																<td style="text-align: center">'. number_format($check_oi->oi_shipping_cost, 2) .'</td>
																<td style="text-align: center">'. $check_oi->oi_commission .'%</td>
																<td style="text-align: center">'. number_format($check_oi->oi_gtotal + $check_oi->oi_shipping_cost + $check_oi->oi_commission_value , 2) .'</td>
															</tr>
														';
													}
													
													$html .= '
														</tbody>
													</table>
													';
												return $html;
											})
										]);
										$e->addAddress($tc->c_email);
										$e->Subject = "Intelligent Ecommerce - Order paid by customer";
										$e->send();
									}
								}
								carts::deleteBy(["c_id" => $cart->c_id]);
							}

							//Send email to customer
							$mail = new Email(true);  
							$mail->setTemplate("customer-paid-order", [
									"{USERNAME}"		=> $shipping_address->ca_name,
									"{RCPT_EMAIL}"		=> $shipping_address->ca_email,
									"{ORDER_NO}"		=> $pro_no,
									"{DATE}"			=> F::GetDate(),
									"{TABLE_ITEM}"		=> call_user_func(function() use ($customer ,$total, $commission){
										$html2 = '
										<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:500px;">
											<thead style="background-color: #262d3a; color: white">
												<tr>
													<td style="text-align: center">Item</td>
													<td style="text-align: center">Price ('. Currency::getSign() .')</td>
													<td style="text-align: center">Quantity</td>
													<td style="text-align: center">Total ('. Currency::getSign() .')</td>
												</tr>
											<thead>
											
											<tbody>
										';
										
										foreach($order_item_cust = order_item::getBy(["oi_customer" => $customer]) as $cd_oi){
											$item_name = items::getBy(["i_id" => $cd_oi->oi_item]);
											if(count($item_name) > 0){
												$item_name = $item_name[0];
												$item_n = $item_name->i_name;
											}
											
											$iop = "";
											$od = order_detail::getBy(["od_order_item" => $cd_oi->oi_id]);
											if(count($od) > 0){
												$n = 0;
												foreach ($od as $option){
													if($n > 0){
														$iop .= " | ";
													}
													$iop .= $option->od_io_name . ": " . $option->od_iov;
													$n++;
												}
											}else{
												$iop = "No option";
											}
											
											$html2 .= '
												<tr>
													<td style="text-align: center">'. $item_n .' <br />('. $iop .')</td>
													<td style="text-align: center">'. number_format($cd_oi->oi_gtotal / $cd_oi->oi_quantity, 2) .'</td>
													<td style="text-align: center">'. $cd_oi->oi_quantity .'</td>
													<td style="text-align: center">'. number_format($cd_oi->oi_gtotal + $cd_oi->oi_shipping_cost + $cd_oi->oi_commission_value, 2) .'</td>
												</tr>
											';
										}
										
										$html2 .= '
												<tr style="background-color: #c4c4c4; text-align: center;">
													<td colspan="3">Amount</td>
													<td><b>'. number_format($total, 2) .'</b></td>
												</tr>
											</tbody>
										</table>
										';
										return $html2;
									})
							]);
							$mail->addAddress($_SESSION['customer_email']);
							$mail->Subject = "Intelligent Ecommerce - Order paid";
							$mail->send();

							echo json_encode([
								"status"    => "success",
								"message"   => "Order Item Recorded.",
								"code"      => "ORDER_RECORDED"
							]);
						}else{
							echo json_encode([
								"status"    => "error",
								"message"   => "Cart information not found.",
								"code"      => "CART_NOT_FOUND"
							]);
						}
					}else{
						echo json_encode([
							"status"    => "error",
							"message"   => "Shipping information not found after insert.",
							"code"      => "SHIPPING_NOT_FOUND_AFTER_INSERT"
						]);
					}
				}else{
					echo json_encode([
						"status"    => "error",
						"message"   => "Shipping information not found.",
						"code"      => "SHIPPING_NOT_FOUND"
					]);
				}
			}else{
				echo json_encode([
					"status"    => "error",
					"message"   => "Order information not found.",
					"code"      => "ORDER_NOT_FOUND"
				]);
			}
		}else{
			echo json_encode([
				"status"    => "error",
				"message"   => "Payment fail. Paypal payment state not completed.",
				"code"      => "PAYMENT_PAYPAL_FAIL_NOT_ACCEPTED"
			]); 
		}
	}
}else{
	echo json_encode([
		"status"    => "error",
		"message"   => "Customer information not found.",
		"code"      => "CUSTOMER_INFORMATION_NOT_FOUND_IN_DATABASE"
	]); 
}

?>