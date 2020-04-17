<?php

switch(input::post("action")){
	case "add":
		if(!empty(Input::post("name")) && !empty(Input::post("price"))){
			$data = [
				"p_name"		=> Input::post("name"),
				"p_value"		=> Input::post("price"),
				"p_scheme"		=> Input::post("scheme"),
				"p_date"		=> F::getDate(),
				"p_time"		=> F::GetTime(),
				"p_user"		=> $_SESSION["user_login"],
				"p_description"	=> Input::post("description"),
				"p_content"		=> Input::post("content"),
				"p_status"		=> Input::post("status"),
				"p_limit"		=> Input::post("limit"),
				"p_users"		=> Input::post("users"),
				"p_key"			=> strtoupper(F::UniqKey("package"))
			];
			
			if(packages::insertInto($data)){
				new Alert("success", "Package information added successfully.");
			}else{
				new Alert("error", "Fail saving package information.");
			}
		}else{
			new Alert("error", "Name and price are required.");
		}
	break;
	
	case "edit":
		if(!empty(Input::post("name")) && !empty(Input::post("price"))){
			$data = [
				"p_name"		=> Input::post("name"),
				"p_value"		=> Input::post("price"),
				"p_scheme"		=> Input::post("scheme"),
				"p_date"		=> F::getDate(),
				"p_time"		=> F::GetTime(),
				"p_user"		=> $_SESSION["user_login"],
				"p_description"	=> Input::post("description"),
				"p_content"		=> Input::post("content"),
				"p_status"		=> Input::post("status"),
				"p_limit"		=> Input::post("limit"),
				"p_users"		=> Input::post("users")
			];
			
			if(packages::updateBy(["p_id" => url::get(3)], $data)){
				new Alert("success", "Package information added successfully.");
			}else{
				new Alert("error", "Fail saving package information.");
			}
		}else{
			new Alert("error", "Name and price are required.");
		}
	break;
	
	case "delete":
		if(packages::deleteBy(["p_id" => url::get(3)])){
			new Alert("success", "Package information deleted successfully.");
		}else{
			new Alert("error", "Fail saving package information.");
		}
	break;
}