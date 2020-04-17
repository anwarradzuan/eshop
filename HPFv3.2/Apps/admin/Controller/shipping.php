<?php
$type = Input::post("action");

switch($type){
	case "add":
		$data = [
			"s_name"		=> input::POST('s_name'),
			"s_value"		=> input::POST('s_value'),
			"s_status"		=> input::POST('s_status'),
			"s_weight"		=> input::POST('s_weight'),
			"s_from"		=> input::POST('s_from'),
			"s_to"			=> input::POST('s_to'),
			"s_description"	=> input::POST('s_description'),
			"s_date"		=> F::GetDate(),
			"s_time"		=> F::GetTime(),
			"s_user"		=> $_SESSION['user_login']
		];
		
		$d = shippings::InsertInto($data);
		
		if($d){
			new Alert("success", "Shipping information saved.");
		}else{
			new Alert("error", "Shipping could not saved. Please try again");
		}
	break;
	
	case "edit":
		$id = url::get(2);
		$check = shippings::getBy(["s_id" => $id]);
	
		if(count($check) > 0){
			
			$data = [
				"s_name"		=> input::POST('s_name'),
				"s_value"		=> input::POST('s_value'),
				"s_status"		=> input::POST('s_status'),
				"s_weight"		=> input::POST('s_weight'),
				"s_from"		=> input::POST('s_from'),
				"s_to"			=> input::POST('s_to'),
				"s_description"	=> input::POST('s_description'),
				"s_date"		=> F::GetDate(),
				"s_time"		=> F::GetTime(),
				"s_user"		=> $_SESSION['user_login']
			];
			
			shippings::updateBy(["s_id" => $id], $data);
			
			new Alert("success", "Shipping information updated");
		}else{
			new Alert("error", "Shipping information could not update. Please try again.");
		}	
	break;
	
	case "delete":
		$id = url::get(2);
		$check = shippings::getBy(["s_id" => $id]);
		
		if(count($check) > 0){
			
			shippings::deleteBy(["s_id" => $id]);
			
			new Alert("success", "Shipping information removed");
			
		}else{
			new Alert("error", "Shipping information could be not deleted, Please try again.");
		}
	break;
}
?>
