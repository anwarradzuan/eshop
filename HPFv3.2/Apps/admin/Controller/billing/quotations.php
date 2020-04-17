<?php
switch (input::post('type')){
	
	case "add":
			
			if(quotations::insertInto(['id'])){
			    new Alert("success", "Record Added");
			}else{
			    new Alert("error","Error");
			}
	break;

	case "edit":
		quotations::updateBy(
			["" => input::get('id')], 
			[]
		);
		new Alert("success", "Data Saved");
	
	break;
	
	case "delete":
		quotations::deleteBy(
		[""=> input::get('id')]
		);
		new Alert("success", "Record Deleted");
	break;
}
?>