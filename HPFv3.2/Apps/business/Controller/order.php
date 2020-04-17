<?php

switch(Input::post("action")){
	case "cancellation":
		$o = order_item::getBy(["oi_key" => url::Get(3), "oi_company" => $_SESSION["cl_company"]]);
		
		if(count($o) > 0){
			$o = $o[0];
			
			if(input::post("refund") == "no"){
				order_cancel::insertInto([
					"oc_order_item"	=> $o->oi_id,
					"oc_date"		=> F::GetDatE(),
					"oc_time"		=> F::GetTime(),
					"oc_message"	=> empty(Input::post("message")) ? "Sorry, we cannot refund this order. You will recieve your item soon." : Input::post("message"),
					"oc_company"	=> $_SESSION["cl_company"],
					"oc_customer"	=> $o->oi_customer,
					"oc_status"		=> 2
				]);
				
				$customer = customers::getBy(["c_id" => $o->oi_customer]);
				if(count($customer) > 0){
					$customer = $customer[0];
					$c_name = $customer->c_name;
					$c_email = $customer->c_email;
				}
				
				$e = new Email();
				$e->setTemplateNew("not-approved-cancel-order", [
					"{ORDER_NO}"		=> $o->oi_key,
					"{USERNAME}"		=> $c_name,
					"{LOGIN_CUST}"		=> PORTAL_PUBLIC."login",
					"{DATE}"			=> F::GetDate(),
					"{TABLE_ITEM}"		=> call_user_func(function() use ($o){
						$html = '
							<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:500px;">
								<thead style="background-color: #262d3a; color: white">
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
										<td style="text-align: center">'. $o->oi_item_name .'</td>
										<td style="text-align: center">'. number_format($o->oi_price, 2).'</td>
										<td style="text-align: center">'. $o->oi_quantity .'</td>
										<td style="text-align: center">'. number_format($o->oi_shipping_cost, 2).'</td>
										<td style="text-align: right">'. number_format($o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value, 2) .'</td>
									</tr>
								</tbody>
							</table>
							';
						return $html;
					})
				]);
				$e->addAddress($c_email);
				$e->Subject = "Intelligent Ecommerce - Order Canceled";
				$e->send();
			}else{
				order_cancel::insertInto([
					"oc_order_item"	=> $o->oi_id,
					"oc_date"		=> F::GetDatE(),
					"oc_time"		=> F::GetTime(),
					"oc_message"	=> empty(Input::post("message")) ? "We accept your cancellation request. Sorry for any conveniences. You will be refund soon." : Input::post("message"),
					"oc_company"	=> $_SESSION["cl_company"],
					"oc_status"		=> 1
				]);
				
				order_refund::insertInto([
					"or_order_item"	=> $o->oi_id,
					"or_date"		=> F::GetDatE(),
					"or_time"		=> F::GetTime(),
					"or_details"	=> "Hi! Please refund for " . $o->oi_key
				]);
				
				order_item::updateBy(["oi_id" => $o->oi_id], [
					"oi_cancel"		=> 1
				]);
				
				$customer = customers::getBy(["c_id" => $o->oi_customer]);
				if(count($customer) > 0){
					$customer = $customer[0];
					$c_name = $customer->c_name;
					$c_email = $customer->c_email;
				}
				
				$e = new Email();
				$e->setTemplateNew("customer-cancel-order", [
					"{ORDER_NO}"		=> $o->oi_key,
					"{USERNAME}"		=> $c_name,
					"{LOGIN_CUST}"		=> PORTAL_PUBLIC."login",
					"{DATE}"			=> F::GetDate(),
					"{TABLE_ITEM}"		=> call_user_func(function() use ($o){
						$html = '
							<table align="center" border="1" cellpadding="0" cellspacing="0" style="height:80px; width:500px;">
								<thead style="background-color: #262d3a; color: white">
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
										<td style="text-align: center">'. $o->oi_item_name .'</td>
										<td style="text-align: center">'. number_format($o->oi_price, 2).'</td>
										<td style="text-align: center">'. $o->oi_quantity .'</td>
										<td style="text-align: center">'. number_format($o->oi_shipping_cost, 2).'</td>
										<td style="text-align: right">'. number_format($o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value, 2) .'</td>
									</tr>
								</tbody>
							</table>
							';
						return $html;
					})
				]);
				$e->addAddress($c_email);
				$e->Subject = "Intelligent Ecommerce - Order Canceled";
				$e->send();
				
			}
			
			new Alert("success", "Order updated succesfully");
		}else{
			new Alert("error", "Requested order to update not found in our database.");
		}
		
	break;
	
	
	case "update":
		
		switch (input::POST("o_status")) {
			case '1':
				
				$data = [
						"oi_tracking" 			=> input::POST("o_tracking"),
						"oi_shipping_status" 	=> input::POST("o_status"),
						"oi_update_date" 		=> F::GetTime(),
						"oi_client" 			=> $_SESSION['cl_id']
					];
					
				$a = order_item::updateBy(["oi_key" => url::get(3), "oi_company" => $_SESSION["cl_company"]], $data);
				if($a){
					$o = order_item::getBy(["oi_key" => url::Get(3), "oi_company" => $_SESSION["cl_company"]]);
		
					if(count($o) > 0){
						$o = $o[0];
						
						order_claim::insertInto([
							"oc_date"		=> F::GetDate(),
							"oc_time"		=> F::GetTime(),
							"oc_order_item"	=> $o->oi_id,
							"oc_detail"		=> "Hi admin! Please release payment for this order soon. Thank you."
						]);
					}
					
					new Alert("success", "Order Update");
				}else{
				 	new Alert("error", "Cant Update Order. Please Try Again");
				}
				
			break;
			
			case '2':
				
				$data = [ 
			
						"oi_tracking" 			=> input::POST("o_tracking"),
						"oi_shipping_status" 	=> input::POST("o_status"),
						"oi_update_date" 		=> F::GetTime(),
						"oi_client" 			=> $_SESSION['cl_id']
					];
					
				$a = order_item::updateBy(["oi_key" => url::get(3)], $data);
				if($a){
					new Alert("success", "Order Update");
				}else{
				 	new Alert("error", "Cant Update Order. Please Try Again");
				}
				
			break;
			
			case '4':
				
				$data = [ 
					"oi_tracking" 			=> input::POST("o_tracking"),
					"oi_shipping_status" 	=> input::POST("o_status"),
					"oi_reason" 			=> input::POST("reason"),
					"oi_cancel_by" 			=> "COMPANY",
					"oi_update_date" 		=> F::GetTime(),
					"oi_client" 			=> $_SESSION['cl_id']
				];
				
				$a = order_item::updateBy(["oi_key" => url::get(3)], $data);
				if($a){
					// new Alert("success", "Order Update");
					?>
					<script>
						window.location = "<?= PORTAL_BUSINESS ?>orders/all-orders/view/<?= url::get(3) ?>";
					</script>
					<?php
				}else{
				 	new Alert("error", "Cant Update Order. Please Try Again");
				}
				
			break;
		}
		
	break;
	
}