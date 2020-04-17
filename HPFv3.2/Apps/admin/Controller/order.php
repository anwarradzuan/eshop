<?php

switch(Input::post("action")){
	
	case "update":
		
		if(input::POST("o_status") == 4){
			$data = [ 
			
				"oi_tracking" 			=> input::POST("o_tracking"),
				"oi_shipping_status" 	=> input::POST("o_status"),
				"oi_user" 				=> $_SESSION['user_id'],
				"oi_reason" 			=> input::POST("reason"),
				"oi_cancel_by" 			=> "ADMIN"
			];
		}else{
			$data = [ 
			
				"oi_tracking" 			=> input::POST("o_tracking"),
				"oi_shipping_status" 	=> input::POST("o_status"),
				"oi_user" 				=> $_SESSION ['user_id']
			];
			
		}
		
		$a = order_item::updateBy(["oi_key" => url::get(3)], $data);
		 if($a){
		 	new Alert("success", "Order Update");
		 }else{
		 	new Alert("error", "Cant Update Order. Please Try Again");
		 }
	break;
	
	case "claim":
		 
		order_claim::insertInto([
			"oc_date"		=> F::GetDate(),
			"oc_time"		=> F::GetTIme(),
			"oc_order_item"	=> Input::post("order_item"),
			"oc_user"		=> $_SESSION["user_id"],
			"oc_amount"		=> Input::post("amount"),
			"oc_detail"		=> Input::post("detail"),
			"oc_status"		=> Input::post("status")
		]);
		
		$order_item = order_item::getBy(["oi_id" => Input::post("order_item")]);
		
		if(count($order_item) > 0){
			$order_item = $order_item[0];
			$oi_company = $order_item->oi_company;
			$o_id = $order_item->oi_key;
		}
		
		$company = company::getBy(["c_id" => $oi_company]);
		
		if(count($company) > 0){
			$company = $company[0];
			$comp_name = $company->c_name;
			$comp_email = $company->c_email;
		}
		
		$e = new Email();
		$e->setTemplateNew("vendor-claim-paid", [
			"{ORDER_NUMBER}"	=> $o_id,
			"{COMPANY}"			=> $comp_name,
			"{AMOUNT}"			=> Currency::GetSign() . number_format(Input::post("amount"), 2),
			"{LOGIN}"			=> PORTAL_BUSINESS,
			"{DATE}"			=> F::GetDate(),
			"{TABLE_ITEM}"		=> call_user_func(function() use ($order_item){
				$html = '
					<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:90%;">
						<thead style="background-color: #262d3a; color: white">
							<tr>
								<td style="text-align: center">Item</td>
								<td style="text-align: center">Price ('. Currency::getSign() .')</td>
								<td style="text-align: center">Quantity</td>
								<td style="text-align: center">Shipping Cost</td>
								<td style="text-align: center">Total ('. Currency::getSign() .')</td>
							</tr>
						<thead>
						
						<tbody>
							<tr>
								<td style="text-align: center">'. $order_item->oi_item_name .'</td>
								<td style="text-align: center">'. number_format($order_item->oi_price, 2).'</td>
								<td style="text-align: center">'. $order_item->oi_quantity .'</td>
								<td style="text-align: center">'. number_format($order_item->oi_shipping_cost, 2).'</td>
								<td style="text-align: center">'. number_format($order_item->oi_gtotal + $order_item->oi_shipping_cost + $order_item->oi_commission_value, 2) .'</td>
							</tr>
						</tbody>
					</table>
					';
				return $html;
			})
		]);
		$e->addAddress($comp_email);
		$e->Subject = "Intelligent Ecommerce - Claim Paid";
		$e->send();
		
		new Alert("success", "Claim information updated successfully.");
	break;
	
	case "refund":
		
		order_refund::insertInto([
			"or_date"		=> F::GetDate(),
			"or_time"		=> F::getTime(),
			"or_details"	=> Input::post("refund_data"),
			"or_status"		=> Input::post("status"),
			"or_amount"		=> Input::post("amount"),
			"or_bank"		=> Input::post("bank"),
			"or_acc"		=> Input::post("acc"),
			"or_user"		=> $_SESSION["user_id"],
			"or_order_item"	=> Input::post("order_item")
		]);
		
		$order_item = order_item::getBy(["oi_id" => Input::post("order_item")]);
		
		if(count($order_item) > 0){
			$order_item = $order_item[0];
			$oi_customer = $order_item->oi_customer;
			$o_id = $order_item->oi_key;
		}
		
		$cust = customers::getBy(["c_id" => $oi_customer]);
		
		if(count($cust) > 0){
			$cust = $cust[0];
			$cust_name = $cust->c_login;
			$cust_email = $cust->c_email;
		}
		
		$e = new Email();
		$e->setTemplateNew("customer-refund-paid", [
			"{ORDER_NO}"		=> $o_id,
			"{USERNAME}"		=> $cust_name,
			"{AMOUNT}"			=> Currency::GetSign() . number_format(Input::post("amount"), 2),
			"{LOGIN}"			=> PORTAL_PUBLIC,
			"{DATE}"			=> F::GetDate(),
			"{PAYPAL_FIX}"		=> Currency::GetSign() . number_format(Input::post("paypal_fix"), 2),
			"{TABLE_ITEM}"		=> call_user_func(function() use ($order_item){
				$html = '
					<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:90%;">
						<thead style="background-color: #262d3a; color: white">
							<tr>
								<td style="text-align: center">Item</td>
								<td style="text-align: center">Price ('. Currency::getSign() .')</td>
								<td style="text-align: center">Quantity</td>
								<td style="text-align: center">Shipping Cost</td>
								<td style="text-align: center">Total ('. Currency::getSign() .')</td>
							</tr>
						<thead>
						
						<tbody>
							<tr>
								<td style="text-align: center">'. $order_item->oi_item_name .'</td>
								<td style="text-align: center">'. number_format($order_item->oi_price, 2).'</td>
								<td style="text-align: center">'. $order_item->oi_quantity .'</td>
								<td style="text-align: center">'. number_format($order_item->oi_shipping_cost, 2).'</td>
								<td style="text-align: center">'. number_format($order_item->oi_gtotal + $order_item->oi_shipping_cost + $order_item->oi_commission_value, 2) .'</td>
							</tr>
						</tbody>
					</table>
					';
				return $html;
			})
		]);
		$e->addAddress($cust_email, $cust_name);
		$e->Subject = "Intelligent Ecommerce - Refund Paid";
		$e->send();
		
		new Alert("success", "Refund information has been updated.");
	break;
	
}