<?php

switch (input::POST('action')){
	
	case F::Encrypt(Input::post("akey") . "updateProfile"):
		
        
        $list = JSON_decode(base64_decode(input::POST('data')));
        $c_id = $_SESSION['customer_id'];
		$cust = customers::getBy(["c_id" => $c_id]);
        
        if(count($cust) > 0){
            $cust = $cust[0];
            $newpass =  $list->npass;
			$conpass =  $list->cpass;
			
			if(!empty($newpass) AND !empty($conpass)){
				
				if($newpass == $conpass){
					
					
					customers::updateBy(
						["c_id" => $cust->c_id], 
						[
							"c_name"	        => $list->cname,
							"c_phone"           => $list->cphone,
							"c_password"	    => F::Encrypt($conpass)
						]
					);
					
					echo json_encode([
						"status"    => "success",
						"message"   => "Data saved.",
						"code"      => "DATA_SAVED"
					]);
					
				}else{
					
					echo json_encode([
						"status"    => "error",
						"message"   => "Password Not Match.",
						"code"      => "DATA_NOT_SAVE"
					]);
					
				}
				
			}else{
				customers::updateBy(
					["c_id" => $cust->c_id], 
					[
						"c_name"	        => $list->cname,
						"c_phone"           => $list->cphone
					]
				);
				
				echo json_encode([
					"status"    => "success",
					"message"   => "Data saved.",
					"code"      => "DATA_SAVED"
				 ]);
			}
        }else{
			echo json_encode([
                "status"    => "error",
                "message"   => "Data not saved.",
                "code"      => "DATA_NOT_SAVED",
                "data"      => null
            ]); 
		}
    break;
	
	case F::Encrypt(Input::post("akey") . "addAddress"):
		$bool = true;
		foreach($_POST as $key => $value){
			if($_POST[$key] == ""){
				$bool = false;
			}
		}
		
		if(!$bool){
			echo json_encode([
				"status"    => "error",
				"message"   => "Please fill in all the information.",
				"code"      => "FIELD_EMPTY"
			 ]);
		}else{
			$customer = $_SESSION['customer_id'];
		
			$check = customer_address::getBy(["ca_customer" => input::POST('ca_address')]);
			
			if(count($check) > 0){
				
				echo json_encode([
					"status"    => "error",
					"message"   => "That address already exist in your account.",
					"code"      => "ADDRESS_EXIST"
				 ]);
				 
			}else{
				
				$data = [
					"ca_name" 		=> input::POST('ca_name'),
					"ca_address" 	=> input::POST('ca_address'),
					"ca_country" 	=> input::POST('ca_country'),
					"ca_state" 		=> input::POST('ca_state'),
					"ca_city" 		=> input::POST('ca_city'),
					"ca_postal" 	=> input::POST('ca_postal'),
					"ca_phone" 		=> input::POST('ca_phone'),
					"ca_email" 		=> input::POST('ca_email'),
					"ca_customer" 	=> $customer,
					"ca_date" 		=> F::GetDate(),
					"ca_time" 		=> F::GetTime()
				];
				
				customer_address::insertInto($data);
				
				echo json_encode([
					"status"    => "success",
					"message"   => "Address saved successfully.",
					"code"      => "ADDRESS_SUCCESS_SAVED"
				 ]);
			}
		}
		
    break;
	
	case F::Encrypt(Input::post("akey") . "setDefault"):
			
		$customer = $_SESSION['customer_id'];
		$id = input::POST('ca_id');
		$check = customer_address::getBy(["ca_id" => $id]);
		
		if(count($check) > 0){
			$check = $check[0];
			
			$done = customer_address::updateBy(["ca_id" => $id], ["ca_status" => 1]);
			if($done){
				$x = DB::conn()->q("SELECT * FROM customer_address WHERE ca_customer = '$customer' AND ca_id != '$id'")->results();
				if(count($x) > 0){
					foreach ($x as $b) {
						$h = $b->ca_id;
						customer_address::updateBy(["ca_id" => $h], ["ca_status" => 0]);
					}
					
					echo json_encode([
						"status"    => "success",
						"message"   => "Address set as default",
						"code"      => "ADDRESS_SUCCESS_SAVED"
					]);	
				}
			}
			
		}else{
			
			echo json_encode([
				"status"    => "error",
				"message"   => "Address Not Found.",
				"code"      => "ADDRESS_NOT_FOUND"
			 ]);
			
		}
		
    break;
	
	case F::Encrypt(Input::post("akey") . "updateAddress"):
			
		$customer = $_SESSION['customer_id'];
		
		$check = customer_address::getBy(["ca_customer" => $customer, "ca_id" => input::POST('ca_id')]);
		
		if(count($check) > 0){
			
			$data = [
				"ca_name" 		=> input::POST('ca_name'),
				"ca_address" 	=> input::POST('ca_address'),
				"ca_country" 	=> input::POST('ca_country'),
				"ca_state" 		=> input::POST('ca_state'),
				"ca_city" 		=> input::POST('ca_city'),
				"ca_postal" 	=> input::POST('ca_postal'),
				"ca_phone" 		=> input::POST('ca_phone'),
				"ca_email" 		=> input::POST('ca_email'),
				"ca_date" 		=> F::GetDate(),
				"ca_time" 		=> F::GetTime()
			];
			
			customer_address::updateBy(["ca_id" => input::POST('ca_id')], $data);
			
			echo json_encode([
				"status"    => "success",
				"message"   => "Address saved successfully.",
				"code"      => "ADDRESS_SUCCESS_SAVED"
			 ]);
			 
		}else{
			
			echo json_encode([
				"status"    => "error",
				"message"   => "Address Not Found.",
				"code"      => "ADDRESS_NOT_FOUND"
			 ]);
			
		}
		
    break;
	
	case F::Encrypt(Input::post("akey") . "deleteAddress"):
			
		$customer = $_SESSION['customer_id'];
		
		$check = customer_address::getBy(["ca_customer" => $customer, "ca_id" => input::POST('ca_id')]);
		
		if(count($check) > 0){
			
			customer_address::deleteBy(["ca_id" => input::POST('ca_id')]);
			
			echo json_encode([
				"status"    => "success",
				"message"   => "Address successfully removed.",
				"code"      => "ADDRESS_SUCCESS_SAVED"
			 ]);
			 
		}else{
			
			echo json_encode([
				"status"    => "error",
				"message"   => "Address Not Found.",
				"code"      => "ADDRESS_NOT_FOUND"
			 ]);
			
		}
		
    break;
	
	case F::Encrypt(Input::post("akey") . "checkAddress"):
		
		$cust = $_SESSION['customer_id'];
		
		$check = customer_address::getBy(["ca_customer" => $cust, "ca_status" => 1]);
		if(count($check) > 0){
			echo json_encode([
				"status"    => "success",
				"message"   => "Address default found.",
				"code"      => "ADDRESS_DEFAULT_FOUND"
			]);
		}else{
			echo json_encode([
				"status"    => "error",
				"message"   => "Plaese select your shipping address.",
				"code"      => "NO_DEFAULT_ADDRESS_FOUND"
			]);
		}
		
		
	break;
	case F::Encrypt(Input::post("akey") . "cancelOrder"):
		
		$customer = $_SESSION['customer_id'];
		
		$check = order_item::getBy(["oi_customer" => $customer, "oi_id" => input::POST('order_id')]);
		
		if(count($check) > 0){
			$check = $check[0];
			
			$data =[
				"oc_order_item" => input::POST('order_id'),
				"oc_message" 	=> input::post('order_reason'),
				"oc_status"		=> 0,
				"oc_customer"	=> $_SESSION['customer_id'],
				"oc_date"		=> F::GetDate(),
				"oc_time"		=> F::GetTime()
			];
			$xx = order_cancel::insertInto($data);
			
			if($xx){
				$company = company::getBy(["c_id" => $check->oi_company]);
				if(count($company) > 0){
					$company = $company[0];
					$comp_email = $company->c_email;
					$comp_name = $company->c_name;
				}
				
				$customer = customers::getBy(["c_id" => $customer]);
				if(count($customer) > 0){
					$customer = $customer[0];
					$c_name = $customer->c_login;
					$c_email = $customer->c_email;
				}
				
				$ev = new Email();
				$ev->setTemplateNew("vendor-customer-req-cancel", [
					"{ORDER_NUMBER}"	=> $check->oi_key,
					"{COMPANY}"			=> $comp_name,
					"{ITEM_NAME}"		=> $check->oi_item_name,
					"{LOGIN}"			=> PORTAL_BUSINESS,
					"{DATE}"			=> F::GetDate(),
					"{TABLE_ITEM}"		=> call_user_func(function() use ($check){
						$html2 = '
							<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:500px;">
								<thead style="background-color: #c4c4c4;">
									<tr>
										<td style="text-align: center">Item</td>
										<td style="text-align: center">Price ('. Currency::getSign() .')</td>
										<td style="text-align: center">Quantity</td>
										<td style="text-align: center">Shipping Cost</td>
										<td style="text-align: right">Total ('. Currency::getSign() .')</td>
									</tr>
								<thead>
								
								<tbody>
									<tr>
										<td style="text-align: center">'. $check->oi_item_name .'</td>
										<td style="text-align: center">'. number_format($check->oi_price, 2).'</td>
										<td style="text-align: center">'. $check->oi_quantity .'</td>
										<td style="text-align: center">'. number_format($check->oi_shipping_cost, 2).'</td>
										<td style="text-align: right">'. number_format($check->oi_gtotal + $check->oi_shipping_cost + $check->oi_commission_value, 2) .'</td>
									</tr>
								</tbody>
							</table>
							';
						return $html2;
					})
				]);
				$ev->addAddress($comp_email, $comp_name);
				$ev->Subject = "Intelligent Ecommerce - Order Cancellation Request from Customer";
				$ev->send();
				
				$ev = new Email();
				$ev->setTemplateNew("customer-req-cancel", [
					"{CUST_NAME}"		=> $c_name,
					"{CUST_EMAIL}"		=> $c_email,
					"{ORDER_NO}"		=> $check->oi_key,
					"{COMPANY}"			=> $comp_name,
					"{ITEM_NAME}"		=> $check->oi_item_name,
					"{LOGIN_CUST}"		=> PORTAL_PUBLIC,
					"{DATE}"			=> F::GetDate(),
					"{TABLE_ITEM}"		=> call_user_func(function() use ($check){
						$html3 = '
							<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:500px;">
								<thead style="background-color: #c4c4c4;">
									<tr>
										<td style="text-align: center">Item</td>
										<td style="text-align: center">Price ('. Currency::getSign() .')</td>
										<td style="text-align: center">Quantity</td>
										<td style="text-align: center">Shipping Cost</td>
										<td style="text-align: right">Total ('. Currency::getSign() .')</td>
									</tr>
								<thead>
								
								<tbody>
									<tr>
										<td style="text-align: center">'. $check->oi_item_name .'</td>
										<td style="text-align: center">'. number_format($check->oi_price, 2).'</td>
										<td style="text-align: center">'. $check->oi_quantity .'</td>
										<td style="text-align: center">'. number_format($check->oi_shipping_cost, 2).'</td>
										<td style="text-align: right">'. number_format($check->oi_gtotal + $check->oi_shipping_cost + $check->oi_commission_value, 2) .'</td>
									</tr>
								</tbody>
							</table>
							';
						return $html3;
					})
				]);
				$ev->addAddress($c_email, $c_name);
				$ev->Subject = "Intelligent Ecommerce - Order Cancellation Request";
				$ev->send();
				
				echo json_encode([
					"status"    => "success",
					"message"   => "Order have been cancel. We will inform the vendor about your cancelation.",
					"code"      => "ORDER_CANCEL_SUCCESS"
				 ]);
				
			}else{
				echo json_encode([
					"status"    => "error",
					"message"   => "Data not saved.",
					"code"      => "DATA_NOT_SAVED"
				 ]);
			}
			 
		}else{
			
			echo json_encode([
				"status"    => "error",
				"message"   => "Order Not Found.",
				"code"      => "ORDER_NOT_FOUND"
			 ]);
			
		}
		
    break;
}
?>
