<?php
	if(!isset($_SESSION['customer_id'])){
		$cust = "";
	}else{
		$cust = $_SESSION['customer_id'];
	}
	
    switch(Input::post("action")){
			
		case  F::Encrypt(Input::post("akey") . "sorting"):
			
			if(Input::post("id_sort") == "lth"){
				
				$xdata = [];
				
				foreach(items::getBy(["i_status" => 1],["order" => "i_price ASC"]) as $list){
					
					$ikey = $list->i_key;
					$picture = item_picture::getBy(["ip_item" => $list->i_id], ["order" => "ip_order ASC"]);
					
					if(count($picture) > 0){
						$picture = $picture[0];
					}else{
						$picture = null;
					}
					
					$w = wishlist::getBy(["w_item" => $ikey, "w_customer" => $cust]); 
					if(count($w) > 0){
						$red = "red";
					}else{
						$red = "";
					}
					
					$list->picture = $picture;
					$list->i_name = F::trimWord($list->i_name, 24);
					$list->i_price = number_format(($list->i_price), 2);
					$list->red = $red;
					
					$xdata[] = $list;
					
					// $content = "";
					
					// $content = '
					// <!-- Product-->
		            // <div class="grid-item">
		                // <div class="product-card">
		                    // <a class="product-thumb" href="'. PORTAL_PUBLIC .'categories/view_item/'. $list->i_key .'">
		                        // <img src="'. PORTAL_BUSINESS .'assets/medias/iecommerce/img/shop/products/'. $picture->ip_file .'" alt="Product">
		                    // </a>
		                    // <h3 class="product-title"><a href="'. PORTAL_PUBLIC .'categories/view_item/'. $list->i_key .'">'. F::trimWord($list->i_name, 24) .'</a></h3>
		                    // <h4 class="product-price">'. Currency::getSign() .''. $list->i_price .'</h4>
		                    // <div class="product-buttons">
		                        // <button class="btn btn-outline-secondary btn-sm whishlist-add" title="Whishlist" data-item="'. $list->i_key .'">
								 	// <span id="view_wish"><i class="icon-heart"></i></span>
								 // </button>
		                        // <a class="btn btn-outline-primary btn-sm add-cart" href="'. PORTAL_PUBLIC .'categories/view_item/'. $list->i_key .'">View Product</a>
		                    // </div>
		                // </div>
		            // </div>	
					// ';
				}
				
				echo json_encode([
	                "status"    => "success",
	                "code"      => "DATA_SAVED",
	                "message"   => "Data saved",
	                "data"		=> $xdata
	            ]);
					
			}else{
				
				$xdata = [];
			
	            foreach(items::getBy(["i_status" => 1],["order" => "i_price DESC"]) as $list){
	            	
	            	$ikey = $list->i_key;
					
					$picture = item_picture::getBy(["ip_item" => $list->i_id, "ip_order" => 1]);
					if(count($picture) > 0){
						$picture = $picture[0];
					}else{
						$picture = null;
					}
					
					$w = wishlist::getBy(["w_item" => $ikey, "w_customer" => $cust]); 
					if(count($w) > 0){
						$red = "red";
					}else{
						$red = "";
					}
					
					$list->picture = $picture;
					$list->i_name = F::trimWord($list->i_name, 24);
					$list->i_price = number_format(($list->i_price), 2);
					$list->red = $red;
					
					$xdata[] = $list;
				}
				
				echo json_encode([
	                "status"    => "success",
	                "code"      => "DATA_SAVED",
	                "message"   => "Data saved",
	                "data"		=> $xdata
	            ]);
			}
        break;
		
    }

