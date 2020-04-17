<?php
switch (input::post('type')){
		
	case "edit";
										//where	//new data
		$p = widgets::updateBy(["w_id"=>url::get(3)],["w_status"     => input::POST('status'), 
														"w_content"		=> input::POST('content'),
														"w_date"    	=> F::GetDate(),
														"w_time"		=> F::GetTime(),
														"w_user"    	=> $_SESSION ['user_login']
														]
														);
		if($p){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}
																		
	break;	
	
	case "delete":
		widgets::deleteBy(
		["w_id"=> url::get(3)]);
	
		new Alert("success", "Deleted");
	break;
	
}
?>