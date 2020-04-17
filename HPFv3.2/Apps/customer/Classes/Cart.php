<?php


class Cart extends carts{
	public static function listByCompany(){
		$data = [];
		
		foreach(DB::conn()->query("SELECT DISTINCT c_company as cid FROM carts WHERE c_customer = " . $_SESSION["customer_id"])->results() as $cid){
			$datax = (object)[];
			$co = company::getBy(["c_id" => $cid->cid]);
						
			if(count($co)){
				$co = $co[0];
				
				$datax = $co;
				
				foreach(self::getBy(["c_customer" => $_SESSION["customer_id"], "c_company" => $co->c_id]) as $c){
					$i = items::getBy(["i_id" => $c->c_item]);
					
					if(count($i)){
						$i = $i[0];
						$i->cart = $c;
						$i->options = self::getOptionsByCart($c->c_id);
						$i->promotions = self::getPromotionByItem($i->i_id);
						
						@$datax->items[] = $i;
					}
				}				
			}
			
			$data[] = $datax;
		}
		
		return $data;
	}
	
	public static function listAll(){
		$data = [];
		
		foreach(DB::conn()->query("SELECT DISTINCT c_company as cid FROM carts WHERE c_customer = " . $_SESSION["customer_id"])->results() as $cid){
			$co = company::getBy(["c_id" => $cid->cid]);
						
			if(count($co)){
				$co = $co[0];
				
				foreach(self::getBy(["c_customer" => $_SESSION["customer_id"], "c_company" => $co->c_id]) as $c){
					$i = items::getBy(["i_id" => $c->c_item]);
					
					if(count($i)){
						$i = $i[0];
						$i->cart = $c;
						$i->options = self::getOptionsByCart($c->c_id);
						$i->promotions = self::getPromotionByItem($i->i_id);
						
						if(!$co->c_status){
							$i->i_status = 0;
						}
						
						$data[] = $i;
					}
				}				
			}
		}
		
		return $data;
	}
	
	public static function allTotal(){
		$total = 0;
		
		foreach(self::listAll() as $ci){
			$option_total = 0;
			
			foreach($ci->options as $option){
				$option_total += $option->cd_price;
			}
			
			$promotio_total = 0;
			
			foreach($ci->promotions as $p){
				if($p->ip_type == 1){
					$promotio_total += ($p->ip_value / 100 * $ci->i_price);
				}else{
					$promotio_total += ($p->ip_value);
				}
				
			}
			
			$temp = $ci->i_price * $ci->cart->c_quantity;
			$total += $temp + $ci->cart->c_shipping_cost + $option_total - $promotio_total;
		}
		
		return $total;
	}
	
	public static function activeTotal(){
		$total = 0;
		
		foreach(self::listAll() as $ci){
			if($ci->i_status){
				$option_total = 0;
				
				foreach($ci->options as $option){
					$option_total += $option->cd_price;
				}
				
				$promotio_total = 0;
				
				foreach($ci->promotions as $p){
					if($p->ip_type == 1){
						$promotio_total += ($p->ip_value / 100 * $ci->i_price);
					}else{
						$promotio_total += ($p->ip_value);
					}
					
				}
				
				$temp = $ci->i_price * $ci->cart->c_quantity;
				$total += $temp + $ci->cart->c_shipping_cost + $option_total - $promotio_total;
			}
		}
		
		return $total;
	}
	
	public static function activeSubTotal(){
		$total = 0;
		
		foreach(self::listAll() as $ci){
			if($ci->i_status){
				$option_total = 0;
				
				foreach($ci->options as $option){
					$option_total += $option->cd_price;
				}
				
				$promotio_total = 0;
				
				foreach($ci->promotions as $p){
					if($p->ip_type == 1){
						$promotio_total += ($p->ip_value / 100 * $ci->i_price);
					}else{
						$promotio_total += ($p->ip_value);
					}
					
				}
				
				$temp = $ci->i_price * $ci->cart->c_quantity;
				$total += $temp  + $option_total - $promotio_total;
			}
		}
		
		return $total;
	}
	
	public static function shippingSub(){
		$total = 0;
		
		foreach(self::listAll() as $ci){
			if($ci->i_status){
				$total += $ci->cart->c_shipping_cost;
			}
		}
		
		return $total;
	}
	
	public static function customerCart(){
		
		$data = [];
		$cust = carts::getBy(["c_customer" => $_SESSION['customer_id']]);
		
		foreach($cust as $c){
			$data[] = $c;
			
		}
		
		return $data;
	}
	
	public static function getOptionsByCart($cartid){
		return cart_detail::getBy(["cd_cart" => $cartid]);
	}
	
	public static function getPromotionByItem($itemid){
		return item_promotion::getBy(["ip_item" => $itemid]);
	}
}
