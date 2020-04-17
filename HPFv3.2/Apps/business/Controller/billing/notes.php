<?php
switch (input::post('type')){
	
	case "add":
			
			if(notes::insertInto(
			[
				"n_order"   => input::POST('order'),
				"n_note"    => input::POST('note'),
				"n_date"    => F::GetDate(),
				"n_time"    => F::GetTime(),
				"n_user"    => $_SESSION ['user_id']
			]
			)){
			    new Alert("success", "Record Added");
			}else{
			    new Alert("error","Error");
			}
	break;
}
?>