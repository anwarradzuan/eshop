<?php
switch (input::post('type')){
		
	case "add";
		if(quotation_footer_text::insertInto(
			[
			"q_description"	=> input::POST('name'),
			"q_ntr"			=> input::POST('note'),
			"q_tac"			=> input::POST('tac'),
			"q_date"    	=> F::GetDate(),
			"q_time"		=> F::GetTime(),
			"q_user"    	=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
	
	case "edit";						//where	//new data
		$o = quotation_footer_text::updateBy(["q_id"=>url::get(5)], ["q_description" => input::POST('name'), 
																		"q_ntr"			=> input::POST('note'),
																		"q_tac" 		=> input::POST('tac'),
																		"q_date"    	=> F::GetDate(),
																		"q_time"		=> F::GetTime(),
																		"q_user"    	=> $_SESSION ['user_login']
																		]);
		if($o){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}
																		
	break;	
	
	case "delete":
		quotation_footer_text::deleteBy(
		["q_id"=> input::get('id')]	);
	
		new Alert("success", "Deleted");
	break;
}
?>