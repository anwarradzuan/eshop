<?php
switch (input::post('type')){
		
	case "add";
		if(sections::insertInto(
			[
			"s_name"		=> input::POST('name'),
			"s_alias"		=> input::POST('alias', false),
			"s_order"		=> input::POST('order'),
			"s_status"		=> input::POST('status', false),
			"s_ismenu"		=> input::POST('is menu'),
			"s_page"		=> input::POST('page'),
			"s_content"		=> input::POST('content'),
			"s_date"    	=> F::GetDate(),
			"s_time"		=> F::GetTime(),
			"s_user"    	=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
	
	case "edit";							//where	//new data
		$p = sections::updateBy(["s_id"=>url::get(3)], ["s_name" => input::POST('name'), 
															"s_alias"		=> input::POST('alias'),
															"s_order"		 => input::POST('order'),
															"s_status"		=> input::POST('status'),
															"s_ismenu"		=> input::POST('ismenu'),
															"s_page"		=> input::POST('page'),
															"s_content"		=> input::POST('content'),
															"s_date"    	=> F::GetDate(),
															"s_time"		=> F::GetTime(),
															"s_user"    	=> $_SESSION ['user_login']
															]
															);
		
		if($p){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}																
	break;	
	
	case "delete":
		sections::deleteBy(
		["s_id"=> url::get(3)]	);
	
		new Alert("success", "Deleted");
	break;
}
?>