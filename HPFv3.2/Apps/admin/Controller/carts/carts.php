<?php
defined("HFA") or die();

switch(Input::post("type")){
    
    case "delete":
        $cart = carts::getBy(["c_key" => input::post("c_key"), "c_customer" => input::post("c_customer")]);
		if(count($cart) > 0){
			$a = carts::deleteBy(["c_id" => url::get(3)]);
			if($a){
				cart_detail::deleteBy(["cd_cart"=> url::get(3)]);
				new Alert("success","Data successfully removed from cart");
			}else{
				new Alert("error","Data cant be removed");
			}
		}else{
			new Alert("error", "Cart data not found");
		}
    break;
}