<?php

    switch(Input::POST("action")){
			
		case  F::Encrypt(Input::post("akey") . "addWish"):
			
			$item = Input::post("item");
			$customer = $_SESSION['customer_id'];
			
			$x = wishlist::getBy(["w_item" => $item, "w_customer" => $customer]);
			
			if(count($x) > 0){
				$x = $x[0];
					
				wishlist::deleteBy(["w_id"=> $x->w_id]);
				
				echo json_encode([
	                "status"    => "success_remove",
	                "code"      => "DATA_REMOVED",
	                "message"   => "Product removed from your wishlist!"
	            ]);
				
			}else{
				
				$data = [
						"w_item" 	 => $item,
						"w_customer" => $customer,
						"w_date" 	 => F::GetDate(),
						"w_time" 	 => F::GetTime()
				];
	        
				wishlist::insertInto($data);
				
				echo json_encode([
	                "status"    => "success",
	                "code"      => "DATA_SAVED",
	                "message"   => "Product added to your wishlist!"
	            ]);
            
			}
			
        break;
		
		case  F::Encrypt(Input::post("akey") . "deleteWish"):
			
			
			$item = Input::post("item");
			$customer = $_SESSION['customer_id'];
			
			$x = wishlist::getBy(["w_item" => $item, "w_customer" => $customer]);
			
			if(count($x) > 0){
				$x = $x[0];
					
				wishlist::deleteBy(
					["w_id"=> $x->w_id]
				);
				
				echo json_encode([
	                "status"    => "success",
	                "code"      => "DATA_REMOVED",
	                "message"   => "Product removed from your wishlist!",
	                "data"		=> $item
	            ]);
					
			}
			
        break;
        
		case  F::Encrypt(Input::post("akey") . "deleteAllWish"):
			
			$customer = $_SESSION['customer_id'];
					
			wishlist::deleteBy(
				["w_customer"=> $customer]
			);
			
			echo json_encode([
                "status"    => "success",
                "code"      => "DATA_REMOVED",
                "message"   => "Product removed from your wishlist!",
                "data"		=> $customer
            ]);
					
			
        break;
    }

