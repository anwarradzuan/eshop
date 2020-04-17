<?php
switch (input::post('type')){
		
	case "add";
	
	case "add";
		if(infos::insertInto(
			[
			"i_name"				=> input::POST('name'),
			"i_portal"				=> input::POST('portal'),
			"i_status"				=> input::POST('status'),
			"i_title"				=> input::POST('title'),
			"i_author"				=> input::POST('author'),
			"i_url"					=> input::POST('url'),
			"i_keyword"				=> input::POST('keyword'),
			"i_regno"				=> input::POST('regNo'),
			"i_address"				=> input::POST('address'),
			"i_email"				=> input::POST('email'),
			"i_phone"				=> input::POST('phone'),
			"i_invoiceLogo"			=> input::POST('logo'),
			"i_description"			=> input::POST('description'),
			"i_date"    			=> F::GetDate(),
			"i_time"				=> F::GetTime(),
			"i_user"    			=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	 break;

		
	case "edit";
		infos::updateBy(
			["i_id" => url::get(4)], 
			[
				"i_name"	        	=> input::POST('name'),
				"i_portal"				=> input::POST('portal'),
				"i_status"	        	=> input::POST('status'),
				"i_title"				=> input::POST('title'),
				"i_author"				=> input::POST('author'),
				"i_url"					=> input::POST('url'),
				"i_keyword"				=> input::POST('keyword'),
				"i_regno"				=> input::POST('regNo'),
				"i_address"				=> input::POST('address'),
				"i_email"				=> input::POST('email'),
				"i_phone"				=> input::POST('phone'),
				"i_invoiceLogo"			=> input::POST('logo'),
				"i_description"			=> input::POST('description'),
				"i_date"    			=> F::GetDate(),
				"i_time"				=> F::GetTime(),
				"i_user"    			=> $_SESSION ['user_login']
			]
		);
		new Alert("success", "Data Saved");
	break;	
	
	case "delete":
		infos::deleteBy(
		["i_id"=> url::get(4)]	);
	
		new Alert("success", "Deleted");

	break;
}
?>