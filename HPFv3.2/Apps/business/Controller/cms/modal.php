<?php
switch (input::post('type')){
		
	case "add";
		if(modals::insertInto(
			[
			"m_name"		=> input::POST('name'),
			"m_alias"		=> input::POST('alias', false),
			"m_status"		=> input::POST('status', false),
			"m_width"		=> input::POST('width'),
			"m_height"		=> input::POST('height'),
			"m_content"		=> input::POST('content'),
			"m_date"    	=> F::GetDate(),
			"m_time"		=> F::GetTime(),
			"m_user"    	=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
	
	case "edit";
										//where	//new data
		$p = modals::updateBy(["m_id"=>url::get(3)],["m_name" => input::POST('name'), 
																	"m_alias"		=> input::POST('alias'),
																	"m_status"		 => input::POST('status'),
																	"m_width"		=> input::POST('width'),
																	"m_height"		=> input::POST('height'),
																	"m_content"		=> input::POST('content'),
																	"m_date"    	=> F::GetDate(),
																	"m_time"		=> F::GetTime(),
																	"m_user"    	=> $_SESSION ['user_login']
																	]
																	);
		
		if($p){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}
																		
	break;	
	
	case "delete":
		modals::deleteBy(
		["m_id"=> url::get(3)]	);
	
		new Alert("success", "Deleted");
	break;
}
?>