<?php
switch (input::post('type')){
		
	case "add":
		$i = items::getBy(["i_id" => Input::post("ir_item")]);
		if(count($i) > 0){
			$i = $i[0];
			
			$data = [
			    "ir_customer"	        => $_SESSION['customer_id'],
				"ir_item"	        => Input::post("ir_item"),
				"ir_subject"		=> Input::post("ir_subject"),
				"ir_review"			=> Input::post("ir_review"),
				"ir_rating"			=> Input::post("ir_rating"),
				"ir_company"		=> $i->i_company,
	 			"ir_date"			=> F::GetDate(),
	 			"ir_time"			=> F::GetTime()
			];
		
			$a = item_review::insertInto($data);
			
			if($a){
			    new Alert("success_toast", "Data Saved");
    		}else{
    			new Alert("error_toast", "Fail to saved data.");
    		}
		}
		
	break;
}
?>