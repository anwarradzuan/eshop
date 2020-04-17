<?php
switch (input::POST('action')){

    case F::Encrypt(Input::post("_token") . "listSale"):
        
        $from = Input::post("from_id");
        $to = Input::post("to_id");
        $doc = Input::post("doc_id");
        
        $from_s = strtotime($from);
        $to_s = strtotime($to);
        
        if($doc > 0){
            $doc = "";
        }else{
            $doc = "AND i_sub = 0";
        }
        
	    
	    $x = DB::conn()->q("SELECT * FROM `invoices` WHERE (`i_time` BETWEEN $from_s AND $to_s) $doc") -> results();
	    
	    if($x > 0){
	        $xdata = [];
	        
	        foreach($x as $rx){
	            $rx->gtotal = number_format($rx->i_gtotal);
	            
	            $order = orders::getBy(['o_invoice' => $rx->i_id]);
	            foreach($order as $o){
	                $t = $o->o_item;
	                $item = items::getBy(['i_id' => $t]);
	                
	                if(count($item) > 0){
	                    $item = $item[0];
	                }else{
	                    $item = null;
	                }
	                $o->item = $item;
	                $rx->orders[] = $o;
	            }
	            
	            if($rx->i_status > 0){
	                $status = "Yes";
	            }else{
	                $status = "No";
	            }
	            $rx->pstatus = $status;
	            
	            $paid = 0;
    			if($rx->i_ispartial > 0){
    				$p = DB::conn()->query("SELECT SUM(i_gtotal) as total FROM invoices WHERE i_sub = ? AND i_no = ?", array("i_sub" => $rx->i_id, "i_no" => $rx->i_no)) -> results();
    				$paid = $p[0]->total;
    			}else{
    				if($rx->i_status > 0){
    					$paid = $rx->i_gtotal;
    				}else{
    					$paid = 0;
    				}
    			}
    			$rx->ptotal = number_format($paid);
    			
    			$rx->total =  number_format($rx->i_gtotal - $paid);
	            
	            $xdata[] = $rx;
	        }
	        echo json_encode([
                "status"    => "success",
                "message"   => "Data loaded.",
                "code"      => "DATA_FOUND",
                "data"      => $xdata
            ]); 
	    }else{
	        echo json_encode([
                "status"    => "error",
                "message"   => "Data not loaded.",
                "code"      => "DATA_NOT_FOUND"
            ]); 
	    }
	    
	break;
}
?>