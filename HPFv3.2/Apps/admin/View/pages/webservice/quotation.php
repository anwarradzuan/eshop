<?php
switch (input::POST('action')){

    case F::Encrypt(Input::post("_token") . "createDraftQuotation"):
        
        $list = JSON_decode(base64_decode(input::POST('data')));
        
        $data = [
            "q_letterhead"          => $list->letterhead,
            "q_no"	                => $list->quotation_number,
			"q_date"                => $list->quotation_date,
			"q_ref"	                => $list->reference,
			"q_status"	            => 0,
			"q_client"	            => $list->client,
			"q_total"	            => $list->stotal,
			"q_gtotal"              => $list->total,
			"q_footer_text"         => $list->footer_des,
			"q_ntr"                 => $list->ntr,
			"q_tac"                 => $list->tac,
			"q_discount_name"       => $list->discount_name,
			"q_discount"            => $list->discount_total,
			"q_tax"                 => $list->inclusive_tax,
			"q_bcc"                 => implode(",", $list->bcc),
			"q_notification"        => $list->notification,
			"q_time"                => F::GetTime(),
			"q_user"                => $_SESSION ['user_login']
        ];
        
        quotations::insertInto($data);
        
        $quo = quotations::getBy(["q_no" => $list->quotation_number]);
        
        if(count($quo) > 0){
            $quo = $quo[0];
            
            foreach($list->items as $i){
                if(!isset($i->domain)){
                    //Normal Item Price
                    $price = item_price::getBy(["ip_id" => $i->item_price]);
                    ///*
                    if(count($price) > 0){
                        $price = $price[0];
                        
                        $item = items::getBy(["i_id" => $price->ip_item]);
                        
                        if(count($item) > 0){
                            $item = $item[0];
                            $ikey = F::UniqKey("QUOTATION_ITEM_");
                            quotation_item::insertInto([
                                "i_client"      => $list->client,
                                "i_item"        => $price->ip_item,
                                "i_total"       => $i->amount,
                                "i_doc"         => $list->quotation_number,
                                "i_price"       => $price->ip_price,
                                "i_priceid"     => $price->ip_id,
                                "i_quotation"   => $quo->q_id,
                                "i_detail"      => $i->description,
                                "i_period"      => $i->quantity,
                                "i_taxId"       => implode(",", $i->tax),
                                "i_date"        => F::GetDate(),
                                "i_time"        => F::GetTime(),
                                "i_user"        => $_SESSION ['user_login'],
                                "i_quantityType"=> $i->item_type,
                                "i_key"         => $ikey//
                            ]);
                            
                            $amount = $i->amount - $i->tax_amount;
                                
                            $qi = quotation_item::getBy(["i_key" => $ikey]);
                            
                            if(count($qi) > 0){
                                $qi = $qi[0];
                                
                                foreach($i->tax as $tax_id){
                                    $tax = taxes::getBy(["t_id" => $tax_id]);
                                    
                                    if(count($tax) > 0){
                                        $tax = $tax[0];
                                        
                                        $ta = $tax->t_rate / 100 * $amount;
                                        
                                        quotation_tax::insertInto([
                                            "q_quotationItem"   => $qi->i_id,
                                            "q_name"            => $tax->t_name,
                                            "q_rate"            => $tax->t_rate,
                                            "q_quotation"       => $quo->q_id,
                                            "q_value"           => $ta,
                                            "q_amount"          => $i->tax_amount
                                        ]);
                                    }
                                }
                            }
                        }
                    }else{
                        //validation if not empty price & year
                        if(!empty($price) && !empty($i->quantity)){
                            $ikey = F::UniqKey("QUOTATION_ITEM_");
                            quotation_item::insertInto([
                                "i_client"      => $list->client,
                                "i_item"        => 0,
                                "i_total"       => $i->amount,
                                "i_doc"         => $list->quotation_number,
                                "i_price"       => 0,
                                "i_quotation"   => $quo->q_id,
                                "i_detail"      => $i->description,
                                "i_period"      => $i->quantity,
                                "i_quantityType"=> $i->item_type,
                                "i_taxId"       => implode(",", $i->tax),
                                "i_date"        => F::GetDate(),
                                "i_time"        => F::GetTime(),
                                "i_user"        => $_SESSION ['user_login'],
                                "i_key"         => $ikey//
                            ]);
                            
                            $amount = $i->amount - $i->tax_amount;
                                
                            $qi = quotation_item::getBy(["i_key" => $ikey]);
                            
                            if(count($qi) > 0){
                                $qi = $qi[0];
                                
                                foreach($i->tax as $tax_id){
                                    $tax = taxes::getBy(["t_id" => $tax_id]);
                                    
                                    if(count($tax) > 0){
                                        $tax = $tax[0];
                                        
                                        $ta = $tax->t_rate / 100 * $amount;
                                        
                                        quotation_tax::insertInto([
                                            "q_quotationItem"   => $qi->i_id,
                                            "q_name"            => $tax->t_name,
                                            "q_rate"            => $tax->t_rate,
                                            "q_quotation"       => $quo->q_id,
                                            "q_value"           => $ta,
                                            "q_amount"          => $i->tax_amount
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }else{
                    //Domain Price
                    $d = domains::getBy(["d_id" => $i->domain_id]);
                    
                    if(count($d) > 0){
                        $d = $d[0];
                        $ikey = F::UniqKey("QUOTATION_ITEM_");
                        $dp = domain_price::getBy(["dp_domain" => $d->d_extension]);
                        
                        quotation_item::insertInto([
                            "i_client"      => $list->client,
                            "i_item"        => 0,
                            "i_total"       => $i->amount,
                            "i_doc"         => $list->quotation_number,
                            "i_price"       => $i->price,
                            "i_quotation"   => $quo->q_id,
                            "i_detail"      => $i->description,
                            "i_period"      => $i->quantity,
                            "i_isdomain"    => $d->d_id,
                            "i_extension"   => $d->d_extension,
                            "i_quantityType"=> $i->item_type,
                            "i_taxId"       => implode(",", $i->tax),
                            "i_date"        => F::GetDate(),
                            "i_time"        => F::GetTime(),
                            "i_user"        => $_SESSION ['user_login'],
                            "i_key"         => $ikey//
                        ]);
                        
                        $amount = $i->amount - $i->tax_amount;
                                
                        $qi = quotation_item::getBy(["i_key" => $ikey]);
                        
                        if(count($qi) > 0){
                            $qi = $qi[0];
                            
                            foreach($i->tax as $tax_id){
                                $tax = taxes::getBy(["t_id" => $tax_id]);
                                
                                if(count($tax) > 0){
                                    $tax = $tax[0];
                                    
                                    $ta = $tax->t_rate / 100 * $amount;
                                    
                                    quotation_tax::insertInto([
                                        "q_quotationItem"   => $qi->i_id,
                                        "q_name"            => $tax->t_name,
                                        "q_rate"            => $tax->t_rate,
                                        "q_quotation"       => $quo->q_id,
                                        "q_value"           => $ta,
                                        "q_amount"          => $i->tax_amount
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
            echo json_encode([
                "status"    => "success",
                "message"   => "Data save as draft.",
                "code"      => "DATA_SAVED",
                "data"      => $quo->q_id
            ]); 
		}else{
		   echo json_encode([
                "status"    => "error",
                "message"   => "Data not saved as draft.",
                "code"      => "DATA_SAVED",
                "data"      => null
            ]); 
		}
    break;
    
    case F::Encrypt(Input::post("_token") . "updateQuotation"):
        
        $list = JSON_decode(base64_decode(input::POST('data')));
        
        $quo = quotations::getBy(["q_id" => input::POST('id')]);
        
        if(count($quo) > 0){
            $quo = $quo[0];
            
            quotations::updateBy(
    			["q_id" => $quo->q_id], 
    			[
    			    "q_letterhead"          => $list->letterhead,
        			"q_date"                => $list->quotation_date,
        			"q_ref"	                => $list->reference,
        			"q_status"	            => 0,
        			"q_client"	            => $list->client,
        			"q_total"	            => $list->stotal,
        			"q_gtotal"              => $list->total,
        			"q_footer_text"         => $list->footer_des,
        			"q_ntr"                 => $list->ntr,
        			"q_tac"                 => $list->tac,
        			"q_discount_name"       => $list->discount_name,
        			"q_discount"            => $list->discount_total,
        			"q_tax"                 => $list->inclusive_tax,
        			"q_bcc"                 => implode(",", $list->bcc),
        			"q_notification"        => $list->notification,
        			"q_time"                => F::GetTime(),
        			"q_user"                => $_SESSION ['user_login']
    			]
    		);
    		if(isset($list->deleteRow)){
    		    quotation_item::deleteBy(["i_id" => $list->deleteRow]);
    		    quotation_tax::deleteBy(["q_quotationItem" => $list->deleteRow]);
    		}
    		foreach($list->items as $i){
                    if(!isset($i->domain)){
                        //Normal Item Price
                        $price = item_price::getBy(["ip_id" => $i->item_price]);
                        ///*
                        if($i->item_id != 0 ){
                            if(count($price) > 0){
                                $price = $price[0];
                                $item = items::getBy(["i_id" => $price->ip_item]);
                                
                                if(count($item) > 0){
                                    $item = $item[0];
                                    $ikey = F::UniqKey("QUOTATION_ITEM_");
                                    quotation_item::updateBy(
                                        ["i_id" => $i->item_id],
                                        [
                                            "i_client"      => $list->client,
                                            "i_item"        => $price->ip_item,
                                            "i_total"       => $i->amount,
                                            "i_price"       => $i->price,
                                            "i_priceid"     => $price->ip_id,
                                            "i_quotation"   => $quo->q_id,
                                            "i_detail"      => $i->description,
                                            "i_period"      => $i->quantity,
                                            "i_date"        => F::GetDate(),
                                            "i_time"        => F::GetTime(),
                                            "i_user"        => $_SESSION ['user_login'],
                                            "i_quantityType"=> $i->item_type,
                                            "i_taxId"       => implode(",", $i->tax),
                                            "i_key"         => $ikey//
                                        ]
                                    );
                                    
                                    $amount = $i->amount - $i->tax_amount;
                                
                                    $qi = quotation_item::getBy(["i_key" => $ikey]);
                                    
                                    if(count($qi) > 0){
                                        $qi = $qi[0];
                                        quotation_tax::deleteBy(["q_quotationItem" => $qi->i_id]);
                                        
                                        foreach($i->tax as $tax_id){
                                            $tax = taxes::getBy(["t_id" => $tax_id]);
                                            
                                            if(count($tax) > 0){
                                                $tax = $tax[0];
                                                $ta = $tax->t_rate / 100 * $amount;
                                                
                                                quotation_tax::insertInto([
                                                    "q_quotationItem"   => $qi->i_id,
                                                    "q_name"            => $tax->t_name,
                                                    "q_rate"            => $tax->t_rate,
                                                    "q_quotation"       => $quo->q_id,
                                                    "q_value"           => $ta,
                                                    "q_amount"          => $i->tax_amount
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }else{
                                //validation if not empty price & year
                                if(!empty($price) && !empty($i->quantity)){
                                    $ikey = F::UniqKey("QUOTATION_ITEM_");
                                    quotation_item::updateBy(
                                        ["i_id" => $i->item_id],
                                        [
                                            "i_client"      => $list->client,
                                            "i_item"        => 0,
                                            "i_total"       => $i->amount,
                                            "i_price"       => $i->price,
                                            "i_quotation"   => $quo->q_id,
                                            "i_detail"      => $i->description,
                                            "i_period"      => $i->quantity,
                                            "i_quantityType"=> $i->item_type,
                                            "i_date"        => F::GetDate(),
                                            "i_time"        => F::GetTime(),
                                            "i_taxId"       => implode(",", $i->tax),
                                            "i_user"        => $_SESSION ['user_login'],
                                            "i_key"         => $ikey//
                                        ]
                                    );
                                    
                                    $amount = $i->amount - $i->tax_amount;
                                
                                    $qi = quotation_item::getBy(["i_key" => $ikey]);
                                    
                                    if(count($qi) > 0){
                                        $qi = $qi[0];
                                        quotation_tax::deleteBy(["q_quotationItem" => $qi->i_id]);
                                        
                                        foreach($i->tax as $tax_id){
                                            $tax = taxes::getBy(["t_id" => $tax_id]);
                                            
                                            if(count($tax) > 0){
                                                $tax = $tax[0];
                                                $ta = $tax->t_rate / 100 * $amount;
                                                
                                                quotation_tax::insertInto([
                                                    "q_quotationItem"   => $qi->i_id,
                                                    "q_name"            => $tax->t_name,
                                                    "q_rate"            => $tax->t_rate,
                                                    "q_quotation"       => $quo->q_id,
                                                    "q_value"           => $ta,
                                                    "q_amount"          => $i->tax_amount
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }else{
                            //insert into
                            if(count($price) > 0){
                                $price = $price[0];
                                
                                $item = items::getBy(["i_id" => $price->ip_item]);
                                
                                if(count($item) > 0){
                                    $item = $item[0];
                                    $ikey = F::UniqKey("QUOTATION_ITEM_");
                                    quotation_item::insertInto([
                                        "i_client"      => $list->client,
                                        "i_item"        => $price->ip_item,
                                        "i_total"       => $i->amount,
                                        "i_price"       => $i->price,
                                        "i_priceid"     => $price->ip_id,
                                        "i_quotation"   => $quo->q_id,
                                        "i_detail"      => $i->description,
                                        "i_period"      => $i->quantity,
                                        "i_date"        => F::GetDate(),
                                        "i_time"        => F::GetTime(),
                                        "i_taxId"       => implode(",", $i->tax),
                                        "i_user"        => $_SESSION ['user_login'],
                                        "i_quantityType"=> $i->item_type,
                                        "i_key"         => $ikey//
                                    ]);
                                    
                                    $amount = $i->amount - $i->tax_amount;
                                
                                    $qi = quotation_item::getBy(["i_key" => $ikey]);
                                    
                                    if(count($qi) > 0){
                                        $qi = $qi[0];
                                        
                                        foreach($i->tax as $tax_id){
                                            $tax = taxes::getBy(["t_id" => $tax_id]);
                                            
                                            if(count($tax) > 0){
                                                $tax = $tax[0];
                                                
                                                $ta = $tax->t_rate / 100 * $amount;
                                                
                                                quotation_tax::insertInto([
                                                    "q_quotationItem"   => $qi->i_id,
                                                    "q_name"            => $tax->t_name,
                                                    "q_rate"            => $tax->t_rate,
                                                    "q_quotation"       => $quo->q_id,
                                                    "q_value"           => $ta,
                                                    "q_amount"          => $i->tax_amount
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }else{
                                //validation if not empty price & year
                                if(!empty($price) && !empty($i->quantity)){
                                    $ikey = F::UniqKey("QUOTATION_ITEM_");
                                    quotation_item::insertInto([
                                        "i_client"      => $list->client,
                                        "i_item"        => 0,
                                        "i_total"       => $i->amount,
                                        "i_price"       => $i->price,
                                        "i_quotation"   => $quo->q_id,
                                        "i_detail"      => $i->description,
                                        "i_period"      => $i->quantity,
                                        "i_quantityType"=> $i->item_type,
                                        "i_taxId"       => implode(",", $i->tax),
                                        "i_date"        => F::GetDate(),
                                        "i_time"        => F::GetTime(),
                                        "i_user"        => $_SESSION ['user_login']
                                    ]);
                                    
                                    $amount = $i->amount - $i->tax_amount;
                                
                                    $qi = quotation_item::getBy(["i_key" => $ikey]);
                                    
                                    if(count($qi) > 0){
                                        $qi = $qi[0];
                                        
                                        foreach($i->tax as $tax_id){
                                            $tax = taxes::getBy(["t_id" => $tax_id]);
                                            
                                            if(count($tax) > 0){
                                                $tax = $tax[0];
                                                
                                                $ta = $tax->t_rate / 100 * $amount;
                                                
                                                quotation_tax::insertInto([
                                                    "q_quotationItem"   => $qi->i_id,
                                                    "q_name"            => $tax->t_name,
                                                    "q_rate"            => $tax->t_rate,
                                                    "q_quotation"       => $quo->q_id,
                                                    "q_value"           => $ta,
                                                    "q_amount"          => $i->tax_amount
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        if($i->item_id != 0 ){
                            $d = domains::getBy(["d_id" => $i->domain_id]);
                            
                            if(count($d) > 0){
                                $d = $d[0];
                                $dp = domain_price::getBy(["dp_domain" => $d->d_extension]);
                                $ikey = F::UniqKey("QUOTATION_ITEM_");
                                quotation_item::updateBy(
                                    ["i_id" => $i->item_id],
                                    [
                                        "i_client"      => $list->client,
                                        "i_item"        => 0,
                                        "i_total"       => $i->amount,
                                        "i_price"       => $i->price,
                                        "i_quotation"   => $quo->q_id,
                                        "i_detail"      => $i->description,
                                        "i_period"      => $i->quantity,
                                        "i_isdomain"    => $d->d_id,
                                        "i_extension"   => $d->d_extension,
                                        "i_quantityType"=> $i->item_type,
                                        "i_taxId"       => implode(",", $i->tax),
                                        "i_date"        => F::GetDate(),
                                        "i_time"        => F::GetTime(),
                                        "i_user"        => $_SESSION ['user_login'],
                                        "i_key"         => $ikey//
                                    ]
                                );
                                
                                $amount = $i->amount - $i->tax_amount;
                                
                                $qi = quotation_item::getBy(["i_key" => $ikey]);
                                
                                if(count($qi) > 0){
                                    $qi = $qi[0];
                                    quotation_tax::deleteBy(["q_quotationItem" => $qi->i_id]);
                                    
                                    foreach($i->tax as $tax_id){
                                        $tax = taxes::getBy(["t_id" => $tax_id]);
                                        
                                        if(count($tax) > 0){
                                            $tax = $tax[0];
                                            $ta = $tax->t_rate / 100 * $amount;
                                            
                                            quotation_tax::insertInto([
                                                "q_quotationItem"   => $qi->i_id,
                                                "q_name"            => $tax->t_name,
                                                "q_rate"            => $tax->t_rate,
                                                "q_quotation"       => $quo->q_id,
                                                "q_value"           => $ta,
                                                "q_amount"          => $i->tax_amount
                                            ]);
                                        }
                                    }
                                }
                            }
                        }else{
                            //insert into
                            $d = domains::getBy(["d_id" => $i->domain_id]);
                    
                            if(count($d) > 0){
                                $d = $d[0];
                                $dp = domain_price::getBy(["dp_domain" => $d->d_extension]);
                                $ikey = F::UniqKey("QUOTATION_ITEM_");
                                quotation_item::insertInto([
                                    "i_client"      => $list->client,
                                    "i_item"        => 0,
                                    "i_total"       => $i->amount,
                                    "i_price"       => $i->price,
                                    "i_quotation"   => $quo->q_id,
                                    "i_detail"      => $i->description,
                                    "i_period"      => $i->quantity,
                                    "i_isdomain"    => $d->d_id,
                                    "i_extension"   => $d->d_extension,
                                    "i_quantityType"=> $i->item_type,
                                    "i_taxId"       => implode(",", $i->tax),
                                    "i_date"        => F::GetDate(),
                                    "i_time"        => F::GetTime(),
                                    "i_user"        => $_SESSION ['user_login'],
                                    "i_key"         => $ikey//
                                ]);
                                
                                $amount = $i->amount - $i->tax_amount;
                                
                                $qi = quotation_item::getBy(["i_key" => $ikey]);
                                
                                if(count($qi) > 0){
                                    $qi = $qi[0];
                                    
                                    foreach($i->tax as $tax_id){
                                        $tax = taxes::getBy(["t_id" => $tax_id]);
                                        
                                        if(count($tax) > 0){
                                            $tax = $tax[0];
                                            
                                            $ta = $tax->t_rate / 100 * $amount;
                                            
                                            quotation_tax::insertInto([
                                                "q_quotationItem"   => $qi->i_id,
                                                "q_name"            => $tax->t_name,
                                                "q_rate"            => $tax->t_rate,
                                                "q_quotation"       => $quo->q_id,
                                                "q_value"           => $ta,
                                                "q_amount"          => $i->tax_amount
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
    		
    		echo json_encode([
                "status"    => "success",
                "message"   => "Data updated.",
                "code"      => "DATA_SAVED",
                "data"      => $quo->q_id
            ]); 
            
        }else{
            echo json_encode([
                "status"    => "error",
                "message"   => "Quotation not found.",
                "code"      => "DATA_SAVED",
                "data"      => null
            ]); 
        }
        
    break;
}
?>