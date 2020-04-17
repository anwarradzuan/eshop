<?php
switch (input::POST('action')){

    case F::Encrypt(Input::post("_token") . "createInvoice"):
        
        $list = JSON_decode(base64_decode(input::POST('data')));
        
        $data = [
            "i_template"	        => $list->template,
            "i_letterhead"	        => $list->letterhead,
            "i_no"	                => $list->proforma,
            "i_no"	                => $list->proforma,
			"i_date"                => $list->invoice_date,
			"i_ref"	                => $list->reference,
			"i_status"	            => 0,
			"i_client"	            => $list->client,
			"i_total"	            => $list->stotal,
			"i_gtotal"              => $list->total,
			"i_ispartial"           => $list->allow_partial,
			"i_ref"	                => $list->reference,
			"i_status"	            => 0,
			"i_client"	            => $list->client,
			"i_footer_text"         => $list->footer_des,
			"i_ntr"                 => $list->ntr,
			"i_tac"                 => $list->tac,
			"i_discount"            => $list->discount_total,
			"i_discount_name"       => $list->discount_name,
			"i_tax"                 => $list->inclusive_tax,
			"i_bcc"                 => implode(",", $list->bcc),
			"i_notification"        => implode(",", $list->notification),
			"i_notificationDue"     => implode(",", $list->before),
			"i_month"               => F::GetDate(),
			"i_year"                => date('Y'),
			"i_user"                => $_SESSION ['user_login']
        ];
        
        invoices::insertInto($data);
        
        $inv = invoices::getBy(["i_no" => $list->proforma]);
        
        if(count($inv) > 0){
            $inv = $inv[0];
            
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
                            $key = F::UniqKey("ORDER_");
                            orders::insertInto([
                                "o_client"          => $list->client,
                                "o_item"            => $price->ip_item,
                                "o_doc"             => $list->proforma,
                                "o_date"            => F::GetDate(),
                                "o_time"            => F::GetTime(),
                                "o_price"           => $price->ip_id,
                                "o_invoice"         => $inv->i_id,
                                "o_quantityType"    => $i->item_type,
                                "o_key"             => $key
                            ]);
                            
                            $o = orders::getBy(["o_key" => $key]);
                            
                            if(count($o) > 0){
                                $o = $o[0];
                                $iokey = F::UniqKey("INVOICE_ORDER_");
                                invoice_order::insertInto([
                                    "io_order"      => $o->o_id,
                                    "io_invoice"    => $inv->i_id,
                                    "io_amount"     => $i->price,
                                    "io_total"      => $i->amount,
                                    "io_period"     => $i->quantity,
                                    "io_detail"     => $i->description,
                                    "io_tax"        => implode(",", $i->tax),
                                    "io_tax_amount" => $i->tax_amount,
                                    "io_date"       => F::GetDate(),
                                    "io_time"       => F::GetTime(),
                                    "io_user"       => $_SESSION ['user_login'],
                                    "io_key"        => $iokey//
                                ]);
                                
                                $amount = $i->amount - $i->tax_amount;
                                
                                $io = invoice_order::getBy(["io_key" => $iokey]);
                                
                                if(count($io) > 0){
                                    $io = $io[0];
                                    
                                    foreach($i->tax as $tax_id){
                                        $tax = taxes::getBy(["t_id" => $tax_id]);
                                        
                                        if(count($tax) > 0){
                                            $tax = $tax[0];
                                            
                                            $ta = $tax->t_rate / 100 * $amount;
                                            
                                            order_tax::insertInto([
                                                "ot_orderItem"      => $io->io_id,
                                                "ot_name"           => $tax->t_name,
                                                "ot_rate"           => $tax->t_rate,
                                                "ot_order"          => $o->o_id,
                                                "ot_invoice"        => $inv->i_id,
                                                "ot_value"          => $ta
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        //validation if not empty price & year
                        if(!empty($price) && !empty($i->quantity)){
                            
                            $key = F::UniqKey("ORDER_");
                            orders::insertInto([
                                "o_client"          => $list->client,
                                "o_item"            => 0,
                                "o_doc"             => $list->proforma,
                                "o_date"            => F::GetDate(),
                                "o_time"            => F::GetTime(),
                                "o_price"           => 0,
                                "o_invoice"         => $inv->i_id,
                                "o_quantityType"    => $i->item_type,
                                "o_key"             => $key
                            ]);
                            
                            $o = orders::getBy(["o_key" => $key]);
                            
                            if(count($o) > 0){
                                $o = $o[0];
                                $iokey = F::UniqKey("INVOICE_ORDER_");
                                invoice_order::insertInto([
                                    "io_order"      => $o->o_id,
                                    "io_invoice"    => $inv->i_id,
                                    "io_amount"     => $i->price,
                                    "io_total"      => $i->amount,
                                    "io_period"     => $i->quantity,
                                    "io_detail"     => $i->description,
                                    "io_tax"        => implode(",", $i->tax),
                                    "io_tax_amount" => $i->tax_amount,
                                    "io_date"       => F::GetDate(),
                                    "io_time"       => F::GetTime(),
                                    "io_user"       => $_SESSION ['user_login'],
                                    "io_key"        => $iokey//
                                ]);
                                
                                $amount = $i->amount - $i->tax_amount;
                                
                                $io = invoice_order::getBy(["io_key" => $iokey]);
                                
                                if(count($io) > 0){
                                    $io = $io[0];
                                    
                                    foreach($i->tax as $tax_id){
                                        $tax = taxes::getBy(["t_id" => $tax_id]);
                                        
                                        if(count($tax) > 0){
                                            $tax = $tax[0];
                                            
                                            $ta = $tax->t_rate / 100 * $amount;
                                            
                                            order_tax::insertInto([
                                                "ot_orderItem"      => $io->io_id,
                                                "ot_name"           => $tax->t_name,
                                                "ot_rate"           => $tax->t_rate,
                                                "ot_order"          => $o->o_id,
                                                "ot_invoice"        => $inv->i_id,
                                                "ot_value"          => $ta
                                            ]);
                                        }
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
                        $dp = domain_price::getBy(["dp_domain" => $d->d_extension]);
                        $key = F::UniqKey("ORDER_");
                        
                        orders::insertInto([
                            "o_client"      => $list->client,
                            "o_item"        => 0,
                            //"o_amount"      => $i->price,
                            "o_doc"         => $list->proforma,
                            "o_date"        => F::GetDate(),
                            "o_time"        => F::GetTime(),
                            "o_price"       => (count($dp) > 0 ? $dp[0]->dp_id : 0),
                            "o_invoice"     => $inv->i_id,
                            //"o_detail"      => $i->description,
                            //"o_total"       => $i->amount,
                            "o_period"      => $i->quantity,
                            "o_quantityType"=> $i->item_type,
                            "o_domain"      => $d->d_id,
                            "o_extension"   => $d->d_extension,
                            "o_tax"         => $i->tax_amount,
                            "o_taxes"       => implode(",", $i->tax),
                            "o_key"         => $key
                        ]);
                        
                        $o = orders::getBy(["o_key" => $key]);
                            
                        if(count($o) > 0){
                            $o = $o[0];
                            $iokey = F::UniqKey("INVOICE_ORDER_");
                            invoice_order::insertInto([
                                "io_order"      => $o->o_id,
                                "io_invoice"    => $inv->i_id,
                                "io_amount"     => $i->price,
                                "io_total"      => $i->amount,
                                "io_period"     => $i->quantity,
                                "io_detail"     => $i->description,
                                "io_tax"        => implode(",", $i->tax),
                                "io_tax_amount" => $i->tax_amount,
                                "io_date"       => F::GetDate(),
                                "io_time"       => F::GetTime(),
                                "io_user"       => $_SESSION ['user_login'],
                                "io_key"        => $iokey//
                            ]);
                            
                            $amount = $i->amount - $i->tax_amount;
                            
                            $io = invoice_order::getBy(["io_key" => $iokey]);
                            
                            if(count($io) > 0){
                                $io = $io[0];
                                
                                foreach($i->tax as $tax_id){
                                    $tax = taxes::getBy(["t_id" => $tax_id]);
                                    
                                    if(count($tax) > 0){
                                        $tax = $tax[0];
                                        
                                        $ta = $tax->t_rate / 100 * $amount;
                                        
                                        order_tax::insertInto([
                                            "ot_orderItem"      => $io->io_id,
                                            "ot_name"           => $tax->t_name,
                                            "ot_rate"           => $tax->t_rate,
                                            "ot_order"          => $o->o_id,
                                            "ot_invoice"        => $inv->i_id,
                                            "ot_value"          => $ta
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
                //*/
            }
            
            echo json_encode([
                "status"    => "success",
                "message"   => "Data save as draft.",
                "code"      => "DATA_SAVED",
                "data"      => $inv->i_id
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
    
    case F::Encrypt(Input::post("_token") . "updateInvoice"):
        
        $list = JSON_decode(base64_decode(input::POST('data')));
        
        $inv = invoices::getBy(["i_id" => input::POST('id')]);
        
        if(count($inv) > 0){
            $inv = $inv[0];
            
            invoices::updateBy(
    			["i_id" => $inv->i_id], 
    			[
    			    "i_template"	        => $list->template,
                    "i_letterhead"	        => $list->letterhead,
        			"i_date"                => $list->invoice_date,
        			"i_ref"	                => $list->reference,
        			"i_status"	            => 0,
        			"i_client"	            => $list->client,
        			"i_total"	            => $list->stotal,
        			"i_gtotal"              => $list->total,
        			"i_ispartial"           => $list->allow_partial,
        			"i_ref"	                => $list->reference,
        			"i_status"	            => 0,
        			"i_client"	            => $list->client,
        			"i_footer_text"         => $list->footer_des,
        			"i_ntr"                 => $list->ntr,
        			"i_tac"                 => $list->tac,
        			"i_discount"            => $list->discount_total,
        			"i_discount_name"       => $list->discount_name,
        			"i_tax"                 => $list->inclusive_tax,
        			"i_bcc"                 => implode(",", $list->bcc),
        			"i_notification"        => implode(",", $list->notification),
        			"i_notificationDue"     => implode(",", $list->before),
        			"i_month"               => F::GetDate(),
        			"i_year"                => date('Y'),
        			"i_disabled"            => $list->inv_disabled,
        			"i_user"                => $_SESSION ['user_login']
    			]
    		);
    		
    		if(isset($list->deleteRow)){
    		    orders::deleteBy(["o_id" => $list->deleteRow]);
    		    invoice_order::deleteBy(["io_order" => $list->deleteRow]);
    		    order_tax::deleteBy(["ot_order" => $list->deleteRow]);
    		}
    		
    		foreach($list->items as $i){
                    if(!isset($i->domain)){
                        //Normal Item Price
                        $price = item_price::getBy(["ip_id" => $i->item_price]);
                        ///*
                        if($i->order_id != 0 ){
                            if(count($price) > 0){
                                $price = $price[0];
                                
                                $item = items::getBy(["i_id" => $price->ip_item]);
                                
                                if(count($item) > 0){
                                    $item = $item[0];
                                    
                                    orders::updateBy(
                                        ["o_id" => $i->order_id],
                                        [
                                            "o_client"          => $list->client,
                                            "o_item"            => $price->ip_item,
                                            //"o_amount"          => $i->price,
                                            "o_doc"             => $list->proforma,
                                            "o_date"            => F::GetDate(),
                                            "o_time"            => F::GetTime(),
                                            "o_price"           => $price->ip_id,
                                            "o_invoice"         => $inv->i_id,
                                            //"o_detail"          => $i->description,
                                            //"o_total"           => $i->amount,
                                            "o_quantityType"    => $i->item_type,
                                            //"o_taxes"           => implode(",", $i->tax),
                                            //"o_period"          => $i->quantity
                                        ]
                                    );
                                    
                                    $o = invoice_order::getBy(["io_id" => $i->inv_order_id]);
                                    
                                    if(count($o) > 0){
                                        $o = $o[0];
                                        $iokey = F::UniqKey("INVOICE_ORDER_");
                                        invoice_order::updateBy(
                                            ["io_id" => $o->io_id], 
                                            [
                                                //"io_order"      => $o->o_id,
                                                //"io_invoice"    => $inv->i_id,
                                                "io_amount"     => $i->price,
                                                "io_tax"        => empty($i->tax) ? "" : implode(",", $i->tax),
                                                "io_total"      => $i->amount,
                                                //"io_start"      => $o->o_start,
                                                //"io_expired"    => $o->o_end,
                                                "io_period"     => $i->quantity,
                                                "io_detail"     => $i->description,
                                                "io_date"       => F::GetDate(),
                                                "io_time"       => F::GetTime(),
                                                "io_user"       => $_SESSION ['user_login'],
                                                "io_key"        => $iokey,//
                                                "io_tax_amount" => $i->tax_amount
                                            ]  
                                        );
                                        
                                        $amount = $i->amount - $i->tax_amount;
                                
                                        $io = invoice_order::getBy(["io_key" => $iokey]);
                                        
                                        if(count($io) > 0){
                                            $io = $io[0];
                                            order_tax::deleteBy(["ot_orderItem" => $io->io_id]);
                                            
                                            foreach($i->tax as $tax_id){
                                                $tax = taxes::getBy(["t_id" => $tax_id]);
                                                
                                                if(count($tax) > 0){
                                                    $tax = $tax[0];
                                                    $ta = $tax->t_rate / 100 * $amount;
                                                    
                                                    order_tax::insertInto(
                                                        [
                                                            "ot_orderItem"      => $io->io_id,
                                                            "ot_name"           => $tax->t_name,
                                                            "ot_rate"           => $tax->t_rate,
                                                            "ot_order"          => $o->io_order,
                                                            "ot_invoice"        => $inv->i_id,
                                                            "ot_value"          => $ta
                                                        ]
                                                    );
                                                }
                                            }
                                        }
                                    }
                                }
                            }else{
                                //validation if not empty price & year
                                if(!empty($price) && !empty($i->quantity)){
                                    
                                    orders::updateBy(
                                        ["o_id" => $i->order_id],
                                        [
                                            "o_client"          => $list->client,
                                            "o_item"            => 0,
                                            //"o_amount"          => $i->price,
                                            "o_doc"             => $list->proforma,
                                            "o_date"            => F::GetDate(),
                                            "o_time"            => F::GetTime(),
                                            "o_price"           => 0,
                                            "o_invoice"         => $inv->i_id,
                                            //"o_detail"          => $i->description,
                                            //"o_total"           => $i->amount,
                                            "o_quantityType"    => $i->item_type,
                                            //"o_taxes"           => implode(",", $i->tax),
                                            //"o_period"          => $i->quantity
                                        ]
                                    );
                                    
                                    $o = invoice_order::getBy(["io_id" => $i->inv_order_id]);
                                    
                                    if(count($o) > 0){
                                        $o = $o[0];
                                        $iokey = F::UniqKey("INVOICE_ORDER_");
                                        invoice_order::updateBy(
                                            ["io_id" => $o->io_id], 
                                            [
                                                //"io_order"      => $o->o_id,
                                                //"io_invoice"    => $inv->i_id,
                                                "io_amount"     => $i->price,
                                                "io_tax"        => empty($i->tax) ? "" : implode(",", $i->tax),
                                                "io_total"      => $i->amount,
                                                //"io_start"      => $o->o_start,
                                                //"io_expired"    => $o->o_end,
                                                "io_period"     => $i->quantity,
                                                "io_detail"     => $i->description,
                                                "io_date"       => F::GetDate(),
                                                "io_time"       => F::GetTime(),
                                                "io_user"       => $_SESSION ['user_login'],
                                                "io_key"        => $iokey,//
                                                "io_tax_amount" => $i->tax_amount
                                            ]
                                        );
                                        
                                        $amount = $i->amount - $i->tax_amount;
                                
                                        $io = invoice_order::getBy(["io_key" => $iokey]);
                                        
                                        if(count($io) > 0){
                                            $io = $io[0];
                                            
                                            order_tax::deleteBy(["ot_orderItem" => $io->io_id]);
                                            
                                            foreach($i->tax as $tax_id){
                                                $tax = taxes::getBy(["t_id" => $tax_id]);
                                                
                                                if(count($tax) > 0){
                                                    $tax = $tax[0];
                                                    
                                                    $ta = $tax->t_rate / 100 * $amount;
                                                    
                                                    order_tax::insertInto(
                                                        [
                                                            "ot_orderItem"      => $io->io_id,
                                                            "ot_name"           => $tax->t_name,
                                                            "ot_rate"           => $tax->t_rate,
                                                            "ot_order"          => $o->io_order,
                                                            "ot_invoice"        => $inv->i_id,
                                                            "ot_value"          => $ta
                                                        ]
                                                    );
                                                }
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
                                    $key = F::UniqKey("ORDER_");
                                    
                                    orders::insertInto([
                                        "o_client"          => $list->client,
                                        "o_item"            => $price->ip_item,
                                        //"o_amount"          => $i->price,
                                        "o_doc"             => $list->proforma,
                                        "o_date"            => F::GetDate(),
                                        "o_time"            => F::GetTime(),
                                        "o_price"           => $price->ip_id,
                                        "o_invoice"         => $inv->i_id,
                                        //"o_detail"          => $i->description,
                                        //"o_total"           => $i->amount,
                                        "o_quantityType"    => $i->item_type,
                                        //"o_taxes"           => implode(",", $i->tax),
                                        //"o_period"          => $i->quantity,
                                        "o_key"             => $key
                                    ]);
                                    
                                    $o = orders::getBy(["o_key" => $key]);
                                    
                                    if(count($o) > 0){
                                        $o = $o[0];
                                        $iokey = F::UniqKey("INVOICE_ORDER_");
                                        invoice_order::insertInto([
                                            "io_order"      => $o->o_id,
                                            "io_invoice"    => $inv->i_id,
                                            "io_amount"     => $i->price,
                                            "io_total"      => $i->amount,
                                            "io_period"     => $i->quantity,
                                            "io_detail"     => $i->description,
                                            "io_tax"        => implode(",", $i->tax),
                                            "io_tax_amount" => $i->tax_amount,
                                            "io_date"       => F::GetDate(),
                                            "io_time"       => F::GetTime(),
                                            "io_user"       => $_SESSION ['user_login'],
                                            "io_key"        => $iokey//
                                        ]);
                                        
                                        $amount = $i->amount - $i->tax_amount;
                                        
                                        $io = invoice_order::getBy(["io_key" => $iokey]);
                                        
                                        if(count($io) > 0){
                                            $io = $io[0];
                                            
                                            foreach($i->tax as $tax_id){
                                                $tax = taxes::getBy(["t_id" => $tax_id]);
                                                
                                                if(count($tax) > 0){
                                                    $tax = $tax[0];
                                                    
                                                    $ta = $tax->t_rate / 100 * $amount;
                                                    
                                                    order_tax::insertInto([
                                                        "ot_orderItem"      => $io->io_id,
                                                        "ot_name"           => $tax->t_name,
                                                        "ot_rate"           => $tax->t_rate,
                                                        "ot_order"          => $io->io_order,
                                                        "ot_invoice"        => $inv->i_id,
                                                        "ot_value"          => $ta
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }else{
                                //validation if not empty price & year
                                if(!empty($price) && !empty($i->quantity)){
                                    $key = F::UniqKey("ORDER_");
                                    
                                    orders::insertInto([
                                        "o_client"          => $list->client,
                                        "o_item"            => 0,
                                        //"o_amount"          => $i->price,
                                        "o_doc"             => $list->proforma,
                                        "o_date"            => F::GetDate(),
                                        "o_time"            => F::GetTime(),
                                        "o_price"           => 0,
                                        "o_invoice"         => $inv->i_id,
                                        //"o_detail"          => $i->description,
                                        //"o_total"           => $i->amount,
                                        "o_quantityType"    => $i->item_type,
                                        //"o_taxes"           => implode(",", $i->tax),
                                        //"o_period"          => $i->quantity,
                                        "o_key"             => $key
                                    ]);
                                    
                                    $o = orders::getBy(["o_key" => $key]);
                                    
                                    if(count($o) > 0){
                                        $o = $o[0];
                                        $iokey = F::UniqKey("INVOICE_ORDER_");
                                        invoice_order::insertInto([
                                            "io_order"      => $o->o_id,
                                            "io_invoice"    => $inv->i_id,
                                            "io_amount"     => $i->price,
                                            "io_total"      => $i->amount,
                                            "io_period"     => $i->quantity,
                                            "io_detail"     => $i->description,
                                            "io_tax"        => implode(",", $i->tax),
                                            "io_tax_amount" => $i->tax_amount,
                                            "io_date"       => F::GetDate(),
                                            "io_time"       => F::GetTime(),
                                            "io_user"       => $_SESSION ['user_login'],
                                            "io_key"        => $iokey//
                                        ]);
                                        
                                        $amount = $i->amount - $i->tax_amount;
                                        
                                        $io = invoice_order::getBy(["io_key" => $iokey]);
                                        
                                        if(count($io) > 0){
                                            $io = $io[0];
                                            
                                            foreach($i->tax as $tax_id){
                                                $tax = taxes::getBy(["t_id" => $tax_id]);
                                                
                                                if(count($tax) > 0){
                                                    $tax = $tax[0];
                                                    
                                                    $ta = $tax->t_rate / 100 * $amount;
                                                    
                                                    order_tax::insertInto([
                                                        "ot_orderItem"      => $io->io_id,
                                                        "ot_name"           => $tax->t_name,
                                                        "ot_rate"           => $tax->t_rate,
                                                        "ot_order"          => $o->io_order,
                                                        "ot_invoice"        => $inv->i_id,
                                                        "ot_value"          => $ta
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        if($i->order_id != 0 ){
                            $d = domains::getBy(["d_id" => $i->domain_id]);
                            
                            if(count($d) > 0){
                                $d = $d[0];
                                $dp = domain_price::getBy(["dp_domain" => $d->d_extension]);
                                
                                orders::updateBy(
                                    ["o_id" => $i->order_id],
                                    [
                                        "o_client"      => $list->client,
                                        "o_item"        => 0,
                                        //"o_amount"      => $i->price,
                                        "o_doc"         => $list->proforma,
                                        "o_date"        => F::GetDate(),
                                        "o_time"        => F::GetTime(),
                                        "o_price"       => (count($dp) > 0 ? $dp[0]->dp_id : 0),
                                        "o_invoice"     => $inv->i_id,
                                        //"o_detail"      => $i->description,
                                        //"o_total"       => $i->amount,
                                        //"o_period"      => $i->quantity,
                                        "o_domain"      => $d->d_id,
                                        "o_quantityType"=> $i->item_type,
                                        //"o_taxes"       => implode(",", $i->tax),
                                        "o_extension"   => $d->d_extension
                                    ]
                                );
                                
                                $o = invoice_order::getBy(["io_id" => $i->inv_order_id]);
                                    
                                if(count($o) > 0){
                                    $o = $o[0];
                                    $iokey = F::UniqKey("INVOICE_ORDER_");
                                    invoice_order::updateBy(
                                        ["io_id" => $o->io_id], 
                                        [
                                            //"io_order"      => $o->o_id,
                                            //"io_invoice"    => $inv->i_id,
                                            "io_amount"     => $i->price,
                                            "io_tax"        => empty($i->tax) ? "" : implode(",", $i->tax),
                                            "io_total"      => $i->amount,
                                            //"io_start"      => $o->o_start,
                                            //"io_expired"    => $o->o_end,
                                            "io_period"     => $i->quantity,
                                            "io_detail"     => $i->description,
                                            "io_date"       => F::GetDate(),
                                            "io_time"       => F::GetTime(),
                                            "io_user"       => $_SESSION ['user_login'],
                                            "io_key"        => $iokey,//
                                            "io_tax_amount" => $i->tax_amount
                                        ]
                                    );
                                    
                                    $amount = $i->amount - $i->tax_amount;
                                    $io = invoice_order::getBy(["io_key" => $iokey]);
                                    
                                    if(count($io) > 0){
                                        $io = $io[0];
                                        order_tax::deleteBy(["ot_orderItem" => $io->io_id]);
                                        
                                        foreach($i->tax as $tax_id){
                                            $tax = taxes::getBy(["t_id" => $tax_id]);
                                            
                                            if(count($tax) > 0){
                                                $tax = $tax[0];
                                                $ta = $tax->t_rate / 100 * $amount;
                                                
                                                order_tax::insertInto(
                                                    [
                                                        "ot_orderItem"      => $io->io_id,
                                                        "ot_name"           => $tax->t_name,
                                                        "ot_rate"           => $tax->t_rate,
                                                        "ot_order"          => $o->io_order,
                                                        "ot_invoice"        => $inv->i_id,
                                                        "ot_value"          => $ta
                                                    ]
                                                );
                                            }
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
                                $key = F::UniqKey("ORDER_");
                                
                                orders::insertInto([
                                    "o_client"      => $list->client,
                                    "o_item"        => 0,
                                    //"o_amount"      => $i->price,
                                    "o_doc"         => $list->proforma,
                                    "o_date"        => F::GetDate(),
                                    "o_time"        => F::GetTime(),
                                    "o_price"       => (count($dp) > 0 ? $dp[0]->dp_id : 0),
                                    "o_invoice"     => $inv->i_id,
                                    //"o_detail"      => $i->description,
                                    //"o_total"       => $i->amount,
                                    //"o_period"      => $i->quantity,
                                    "o_domain"      => $d->d_id,
                                    //"o_taxes"       => implode(",", $i->tax),
                                    "o_extension"   => $d->d_extension,
                                    "o_quantityType"=> $i->item_type,
                                    "o_key"         => $key
                                ]);
   
                                $o = orders::getBy(["o_key" => $key]);
                                
                                if(count($o) > 0){
                                    $o = $o[0];
                                    $iokey = F::UniqKey("INVOICE_ORDER_");
                                    invoice_order::insertInto([
                                        "io_order"      => $o->o_id,
                                        "io_invoice"    => $inv->i_id,
                                        "io_amount"     => $i->price,
                                        "io_total"      => $i->amount,
                                        "io_period"     => $i->quantity,
                                        "io_detail"     => $i->description,
                                        "io_tax"        => implode(",", $i->tax),
                                        "io_tax_amount" => $i->tax_amount,
                                        "io_date"       => F::GetDate(),
                                        "io_time"       => F::GetTime(),
                                        "io_user"       => $_SESSION ['user_login'],
                                        "io_key"        => $iokey//
                                    ]);
                                    
                                    $amount = $i->amount - $i->tax_amount;
                                    
                                    $io = invoice_order::getBy(["io_key" => $iokey]);
                                    
                                    if(count($io) > 0){
                                        $io = $io[0];
                                        
                                        foreach($i->tax as $tax_id){
                                            $tax = taxes::getBy(["t_id" => $tax_id]);
                                            
                                            if(count($tax) > 0){
                                                $tax = $tax[0];
                                                
                                                $ta = $tax->t_rate / 100 * $amount;
                                                
                                                order_tax::insertInto([
                                                    "ot_orderItem"      => $io->io_id,
                                                    "ot_name"           => $tax->t_name,
                                                    "ot_rate"           => $tax->t_rate,
                                                    "ot_order"          => $o->io_order,
                                                    "ot_invoice"        => $inv->i_id,
                                                    "ot_value"          => $ta
                                                ]);
                                            }
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
                "data"      => $inv->i_id
            ]); 
            
        }else{
            echo json_encode([
                "status"    => "error",
                "message"   => "Invoice not found.",
                "code"      => "DATA_SAVED",
                "data"      => null
            ]); 
        }
        
    break;
}
?>