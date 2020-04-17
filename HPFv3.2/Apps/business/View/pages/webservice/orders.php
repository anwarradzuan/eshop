<?php
switch (input::POST('action')){

    case F::Encrypt(Input::post("_token") . "listOrder"):
        
        $id = implode(",", Input::post("id"));
        $sid = is_array(Input::post("sid")) > 0 ? implode(",", Input::post("sid")) : Input::post("sid");
        $limit = Input::post("limit_id");
        $from = Input::post("from_id");
        $to = Input::post("to_id");
        
        $from_s = strtotime($from);
        $to_s = strtotime($to);
        
        if(!empty($limit)){
            $limit = "LIMIT " . $limit;
        }else{
            $limit = "";
        }
	    
	    $x = DB::conn()->q("SELECT * FROM `orders` WHERE `o_item` IN ($id) AND `o_status` IN ($sid) AND (`o_time` BETWEEN $from_s AND $to_s) $limit") -> results();
	    
	    if($x > 0){
	        $xdata = [];
	        
	        foreach($x as $rx){
	            $rx->o_start = gmdate("d-M-Y", $rx->o_start);
	            $rx->o_end = gmdate("d-M-Y", $rx->o_end);
	            $rx->o_total = number_format($rx->o_total);
	           
	            $name = items::getBy(['i_id' => $rx->o_item]);
	            if(count($name) > 0){
	                $name = $name[0];
	                $rx->o_item = $name->i_name;
	            }else{
	                echo "null";
	            }
	            
	            $company = clients::getBy(['cl_login' => $rx->o_client]);
	            if(count($company) > 0){
	                $company = $company[0];
	                $rx->o_client = $company->cl_company;
	            }else{
	                echo "null";
	            }
	            
	            $status = Setting::getByKey("orderStatus", $rx->o_status);
	            if(count($status) > 0){
	                //$status = $status[0];
	                $rx->o_status = $status;
	            }else{
	                echo "null";
	            }
	            
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