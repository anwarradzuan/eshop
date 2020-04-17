<?php

switch(Input::get("type")){
	case "add":
		if(file_exists(ASSET."langs/" . Input::get("code") . ".json")){
			new Alert("error", "Language pack code " . Input::get("code") . " already exist.");
		}else{
			$x = fopen(ASSET . "langs/" . Input::get("code") . ".json", "w+");
			
			$obj = (object)[
				"language_pack"	=> [
					"author"	=> Input::get("author"),
					"name"		=> Input::get("name"),
					"created"	=> Input::get("date")
				]
			];
			
			fwrite($x, json_encode($obj));
			fclose($x);
		?>
			<script>
				window.location = "<?= PORTAL ?>admin/System/Language/Edit/<?= Input::get("code") ?>";
			</script>
		<?php
		}
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