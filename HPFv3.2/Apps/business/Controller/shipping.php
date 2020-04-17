<?php

switch(Input::get("action")){
	case "add":
		echo "hsdfds";
		
		// $data = [
			// "s_name" => Input::POST("s_name"),
			// "s_value" => Input::POST("s_value"),
			// "s_status" => Input::POST("s_status"),
			// "s_description" => Input::POST("s_description"),
			// "s_company" => $_SESSION['cl_company'],
			// "s_date" => F::GetDate(),
			// "s_time" => F::GetTime()
		// ];
// 		
		// $a = shipping::insertInto($data);
		// if($a){
			// new Alert("success", "Shipping information saved.");
		// }else{
			// new Alert("error", "Shipping information not saved");
		// }
	break;
	
	case "edit":
		$code = url::get("picker", $route, 4);
		if(file_exists(ASSET . "langs/" . $code . ".json")){
			$x = fopen(ASSET . "langs/" . $code . ".json", "r");
			$str = stream_get_contents($x);
			fclose($x);
			
			$o = fopen(ASSET . "langs/" . $code . ".json", "w+");
			
			$obj = json_decode($str);
			
			unset($obj->language_pack);
			
			@$obj->language_pack = (object)[
				"author"	=> Input::get("author"),
				"name"		=> Input::get("name"),
				"created"	=> Input::get("date")
			];
			
			fwrite($o, json_encode($obj));
			
			fclose($o);
			
			new Alert("success", "Language pack informatio uodated.");
		}else{
			new Alert("error", "Language pack code " . $code . " already exist.");
		}
	break;
	
	case "delete":
		$code = url::get("picker", $route, 4);
		if(file_exists(ASSET . "langs/" . $code . ".json")){
			unlink(ASSET . "langs/" . $code . ".json");
			
			new Alert("success", "Language pack informatio uodated.");
		}else{
			new Alert("error", "Language pack code " . $code . " already exist.");
		}
	break;
}