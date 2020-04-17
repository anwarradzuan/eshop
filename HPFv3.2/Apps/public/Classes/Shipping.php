<?php

class Shipping{
	public static function getRatePostmen($from, $to, $item){
		
		$item_data = (object)[
			"async"				=> false,
			"shipper_accounts"	=> [
				// (object)["id"	=> "8bc5966d-d252-49d1-b607-c14fe739ddfd"],
				(object)["id"	=> "3fad06c4-b325-45e9-b635-a1dc7fafd102"],
				(object)["id"	=> "0fe56e4f-2c61-4088-8fbf-e9614e4f6d0e"],
				(object)["id"	=> "6f43fe77-b056-45c3-bce4-9fec4040da0c"],
				(object)["id"	=> "a2b8a970-6fe5-4491-b9e2-8e3a6d17cd08"]
			],
			"is_document"	=> isset($item["document"]) ? $item["document"] : false,
			"shipment"		=> (object)[
				"ship_from"	=> (object)[
					"contact_name"	=> $from["contact_name"],
					"company_name"	=> $from["company_name"],
					"street1"		=> $from["street1"],
					"country"		=> $from["country"],
					"type"			=> "business",
					"postal_code"	=> $from["postal_code"],
					"city"			=> $from["city"],
					"phone"			=> $from["phone"],
					"street2"		=> isset($from["street2"]) ? $from["street2"] : null,
					"tax_id"		=> isset($from["tax_id"]) ? $from["tax_id"] : null,
					"street3"		=> isset($from["street3"]) ? $from["street3"] : null,
					"state"			=> $from["state"],
					"email"			=> $from["email"],
					"fax"			=> $from["fax"]
				],
				"ship_to"	=> (object)[
					"contact_name"	=> $to["contact_name"],
				    "phone"			=> $to["phone"],
				    "email"			=> $to["email"],
				    "street1"		=> $to["street1"],
				    "city"			=> $to["city"],
				    "postal_code"	=> $to["postal_code"],
				    "state"			=> $to["state"],
				    "country"		=> $to["country"],
			     	"type"			=> isset($to["type"]) ? $to["type"] : "residential"
				],
				"parcels"	=> [
					(object)[
						"description" 	=> isset($item["item_description"]) ? $item["item_description"] : null,
				        "box_type" 		=> "custom",
				        "weight" 		=> (object)[
				        	"value" => $item["weight_value"],
				          	"unit"  => "kg"
				        ],
				        "dimension" =>  (object)[
					          "width" 	=> (double)$item["width"],
					          "height" 	=> (double)$item["height"],
					          "depth" 	=> (double)$item["length"],
					          "unit" 	=> "cm"
					        ],
				        "items" => [
				          	(object)[
				            "description" 		=> $item["item_description"],
				            "origin_country" 	=> isset($from["country"]) ? $from["country"] : null,
				            "quantity" 			=> (int)$item["quantity"],
				            "price" 			=> (object)[
									            	"amount" 	=>  (double)$item["amount"],
									              	"currency" 	=>  "USD"
									            ],
				            "weight"			=> (object)[
									              "value" 	=> (double)$item["weight_value"],
									              "unit"	=> "kg"
									            ],
				            "sku" 				=> $item["sku"]
				            ]
				        ]
					]
				]
			]
		];
		
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL 			=> "https://sandbox-api.postmen.com/v3/rates",
			CURLOPT_RETURNTRANSFER 	=> true,
			CURLOPT_ENCODING 		=> "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($item_data),
			CURLOPT_HTTPHEADER => [
				"Content-Type: application/json",
				"postmen-api-key: 3814def8-e990-4ea7-bf54-60112f2d93b7" //testing
				//"postmen-api-key: efc74ee5-4f0c-4ea9-8822-063294f0ea49" //production
				
			],
		]);
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		$obj = json_decode($response);
		
		if(isset($obj->data->rates)){
			return $obj->data->rates;
		}else{
			return false;
		}
	}

	public static function getRateEasyParcel($from, $to, $item){
		
		$domain = "http://connect.easyparcel.my/?ac=";
		// $domain = "http://connect.easyparcel.my/?ac=";

		$action = "MPRateCheckingBulk";
		$postparam = [
			// 'authentication'	=> 'lhh4Dbr4c1', //live old
			// 'authentication'	=> 'mMW5pt1h1U', //live
			'authentication'	=> 'mMW5pt1h1U', //demo
			'api'				=> 'EP-L1Nr9CoJp',
			'bulk'				=> [
				[
					'pick_code'		=> $from['postal_code'],
					'pick_state'	=> $from['state'],
					'pick_country'	=> $from['country'],
					'send_code'		=> $to['postal_code'],
					'send_state'	=> $to['state'],
					'send_country'	=> $to['country'],
					'weight'		=> $item['weight_value'] * (!empty($item["quantity"]) ? $item["quantity"] : 1),
					'width'			=> $item['width'] * (!empty($item["quantity"]) ? $item["quantity"] : 1),
					'length'		=> $item['length'],
					'height'		=> $item['height'] ,
					'date_coll'		=> '2017-11-10',
				]
			],
		];
		
		$url = $domain.$action;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postparam));
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				
		ob_start(); 
		$return = curl_exec($ch);
		ob_end_clean();
		curl_close($ch);
		
		$json = json_decode($return);
		
		if(isset($json->result[0]->rates)){
			return $json->result[0]->rates;
		}else{
			return false;
		}
	}
	
}






