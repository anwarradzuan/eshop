<?php
$y = items::getBy(["i_key" => input::post("item")]);


if(count($y) > 0){
	$y = $y[0];
	
	$x = DB::conn()->query("SELECT * FROM item_option_value WHERE iov_value = ? AND iov_option IN (SELECT io_id FROM item_option WHERE io_item = ?)", 
		[
			"iov_value"		=> Input::post("option"),
			"io_item"		=> $y->i_id
		]
	)->results();
	
	if(count($x) > 0){
		$x = $x[0];
		
		echo json_encode([
			"status"	=> "success",
			"code"		=> "OPTION_FOUND",
			"message"	=> "Item option information found.",
			"data"		=> $x
		]);
	}else{
		echo json_encode([
			"status"	=> "error",
			"code"		=> "OPTION_NOT_FOUND",
			"message"	=> "Item option information not found."
		]);
	}
}else{
	echo json_encode([
		"status"	=> "error",
		"code"		=> "ITEM_NOT_FOUND",
		"message"	=> "Item information not found."
	]);
}