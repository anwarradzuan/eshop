<?php
switch (input::post('type')){
		
	case "add";
		if(medias::insertInto(
			[
			"m_name"		=> input::POST('name'),
			"m_file"		=> input::POST('file'),
			"m_date"    	=> F::GetDate(),
			"m_time"		=> F::GetTime(),
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
	
	case "edit";						//where	//new data
		$p = medias::updateBy(["m_id"=>url::get(3)],[ "m_name" => input::POST('name'), "m_file" => input::POST('file'),"m_date" => F::GetDate(),"m_time" => F::GetTime() ]);
	
		if($p){
		new Alert("success", "Edited");
		}else{
		new Alert("Error", "Error");
		}
	break;	
	
	case "delete":
		medias::deleteBy(
		["m_id"=> url::get(3)]	);
	
		new Alert("success", "Deleted");
	break;
}
?>