<?php
switch (input::POST('action')){
    
    case F::Encrypt(Input::post("_token") . "getPriceById"):
        $x = explode(",", Input::post("price_id"));
        
        if(count($x) < 2){
            $p = item_price::getBy(['ip_id' => $x[0]]);
            
            if(count($p) > 0){
                $p = $p[0];
                
                echo json_encode([
                    "status"    => "success",
                    "message"   => "Data price loaded.",
                    "code"      => "PRICE_DATA_FOUND",
                    "data"      => $p
                ]); 
            }else{
                echo json_encode([
                    "status"    => "error",
                    "message"   => "Data not price loaded.",
                    "code"      => "PRICE_DATA_NOT_FOUND"
                ]); 
            }
        }else{
            $d_id = $x[1];
            
            $d = domains::getBy(["d_id" => $d_id]);
            
            if(count($d) > 0){
                $d = $d[0];
                
                $price = domain_price::getBy(["dp_domain" => $d->d_extension]);
                
                if(count($price) > 0){
                    $p = $price[0];
                    
                    echo json_encode([
                        "status"    => "success",
                        "message"   => "Domain price loaded.",
                        "code"      => "DOMAIN_PRICE_LOADED",
                        "data"      => [
                            
                                "ip_amount"     => $p->dp_register,
                                "ip_period"     => 1
                        ]
                    ]); 
                    
                }else{
                    echo json_encode([
                        "status"    => "error",
                        "message"   => "Domain price not found",
                        "code"      => "DOMAIN_PRICE_DATA_NOT_FOUND"
                    ]); 
                }
            }else{
                echo json_encode([
                    "status"    => "error",
                    "message"   => "Domain not found",
                    "code"      => "DOMAIN_DATA_NOT_FOUND"
                ]); 
            }
        }
    break;
}
?>