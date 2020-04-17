<?php

switch(Input::post("type")){
    case "add":
        if(!empty(Input::post("amount"))){
            $gtotal = Input::post("amount");
            $taxes = input::post("taxes");
            $total_tax = 0;
            $amount = 0;
            
            if(is_array($taxes) > 0){
                foreach($taxes as $tax){
                    $t = taxes::getBy(["t_id" => $tax]);
                    
                    if(count($t) > 0){
                        $t = $t[0];
                        
                        if($t->t_rate > 0){
                            $rate = 1 + ($t->t_rate / 100);
                            
                            $total_tax = $total_tax +  ($gtotal / $rate);
                        }
                    }
                }
            }
            
            $amount = $gtotal - $total_tax;
            $date = strtotime(Input::post("date"));
            
            $i = invoices::getBy(["i_id" => url::get(4)]);
            
            if(count($i) > 0){
                $i = $i[0];
                
                if($i->i_gtotal == $gtotal){
                    $u = invoices::updateBy(
                        ["i_id" => $i->i_id],
                        [
                            "i_status"  => 1,
                            "i_trx"     => Input::post("doc"),
                            "i_detail"  => Input::post("description"),
                            "i_user"    => $_SESSION["user_login"]
                        ]
                    );
                }else{
                    $data = [
                        "i_date"        => gmdate("d-M-Y", $date),
                        "i_sub"         => $i->i_id,
                        "i_detail"      => Input::post("description"),
                        "i_no"          => $i->i_no,
                        "i_pno"         => Invoice::getInvoiceNumber($i->i_no),
                        "i_user"        => $_SESSION["user_login"],
                        "i_time"        => $date,
                        "i_method"      => 0,
                        "i_client"      => $i->i_client,
                        "i_trx"         => Input::post("doc"),
                        "i_ref"         => $i->i_ref,
                        "i_doc"         => "NIL",
                        "i_status"      => 1,
                        "i_total"       => $amount,
                        "i_gtotal"      => $gtotal,
                        "i_tax"         => $total_tax,
                        "i_month"       => F::GetDate(),
                        "i_year"        => date("Y"),
                        "i_footer_text" => $i->i_footer_text,
                        "i_ntr"         => $i->i_ntr,
                        "i_tac"         => $i->i_tac
                    ];
                    
                    $u = invoices::insertInto($data);
                    
                    invoices::updateBy(
                        ["i_id" => $i->i_id],
                        [
                            "i_ispartial"  => 1
                        ]
                    );
                }
                
                if($u){
                    $x = DB::conn()->query("SELECT SUM(i_gtotal) as total FROM invoices WHERE i_sub = ?", ["i_sub" => $i->i_id])->results();
                    
                    if(count($x) > 0){
                        $x = $x[0];
                        
                        if($x->total >= $i->i_gtotal){
                            invoices::updateBy(["i_id" => $i->i_id], ["i_status" => 1]);
                        }
                    }
                    
                    new Alert("success", "Payment history added successfully.");
                }else{
                    new Alert("error", "Fail adding payment history. Please try again or contact your IT Support team.");
                }
            }else{
                new Alert("error", "Invoice information not found.");
            }
        }else{
            new Alert("error", "Sorry, please insert amount for new payment record.");
        }
    break;
    
    case "edit":
        
    break;
    
    case "delete":
        
    break;
}