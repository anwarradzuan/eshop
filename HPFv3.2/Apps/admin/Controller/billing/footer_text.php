<?php
switch (input::post('type')){
		
	case "add";
		if(invoice_footer_text::insertInto(
			[
			"i_description"	=> input::POST('name'),
			"i_ntr"	=> input::POST('note', false),
			"i_tac"	=> input::POST('tac', false),
			"i_date"    	=> F::GetDate(),
			"i_time"		=> F::GetTime(),
			"i_user"    	=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
	
	case "edit";						//where	//new data
		$o = invoice_footer_text::updateBy(["i_id"=>url::get(5)],["i_description" => input::POST('name'), 
																	"i_ntr" => input::POST('note'),
																	"i_tac" => input::POST('tac'),
																	"i_date"    	=> F::GetDate(),
																	"i_time"		=> F::GetTime(),
																	"i_user"    	=> $_SESSION ['user_login']
																	]
																	);
		
		if($o){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}
	break;	
	
	case "delete":
		invoice_footer_text::deleteBy(
		["i_id"=> input::get('id')]	);
	
		new Alert("success", "Deleted");
	break;
	
}
?>