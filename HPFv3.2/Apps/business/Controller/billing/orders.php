<?php
switch (input::post('type')){
	
	case "edit":
	    
	    
		orders::updateBy(
			["o_id" => input::get('id')], 
			[
				"o_status"	=> input::POST('status'),
				"o_start"	=> strtotime(input::POST('start')),
				"o_end"     => strtotime(input::POST('end'))
			]
		);
		new Alert("success", "Data Saved");
	
	break;
}
?>