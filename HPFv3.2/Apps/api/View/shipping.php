<?php
Turbo::app("public")->Classes("Shipping");

$y = items::getBy(["i_key" => input::post("item")]);


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
				[
					"contact_name"	=> Input::post("contact_name"),
					"phone"			=> Input::post("phone"),
					"email"			=> Input::post("email"),
					"street1"		=> Input::post("street1"),
					"city"			=> Input::post("city"),
					"postal_code"	=> Input::post("postal_code"),
					"state"			=> Input::post("state"),
					"country"		=> Input::post("country"),
					"type"			=> Input::post("type")
				],
				[
					"weight_value"		=> $y->i_weight,
					"width"				=> $y->i_width,
					"height"			=> $y->i_height,
					"length"			=> $y->i_length,
					"item_description"	=> !isset($catog) ? $catog[0]->c_name : "NIL",
					"quantity" 			=> Input::post("quantity"),
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
							"full"			=> $s[0],
							"service_name"	=> $s[0]->service_name,
							"price"			=> $s[0]->price,
							"delivery"		=> $s[0]->delivery,
							"rate_id"		=> $s[0]->rate_id
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