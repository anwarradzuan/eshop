<?php
$type = Input::POST("action");

switch($type){
	case "send":
			$s = motto::getBy(["motto_status" => 1]);
			if(count($s) > 0){
				$s = $s[0];
				
				$to = $s->motto_email;
				$message = Input::POST("message");
				$subject = Input::POST("subject"); 
				$headers = Input::POST("email");
		
		
			$a = mail($to,$subject,$message,$headers);
			}
			
		if($a){
			new Alert("success_toast", "Message sent!");
		}else{
			new Alert("error_toast", "Sorry, your message not sent");
		}
		
	break;
}

?>