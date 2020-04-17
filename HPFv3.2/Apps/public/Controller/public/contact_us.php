<?php
$type = Input::POST("action");

switch($type){
	case "send":
		if(isset($_POST["g-recaptcha-response"])){
			$response = $_POST["g-recaptcha-response"];
			$secret = "6LfwVcoUAAAAAPiXA-6Jr6Zv3saRfrIqE0G5123A";
			$remoteip = $_SERVER["REMOTE_ADDR"];
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=" . $secret . "&response=" . $response . "&remoteip=" . $remoteip);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$res = curl_exec ($ch);
			curl_close ($ch);
			
			$obj = json_decode($res);
			
			if($obj->success){
				
				$s = infos::getBy(["i_status" => 1]);
				if(count($s) > 0){
					$s = $s[0];
					
					$to = $s->i_contact_email; //To recipients 
					$email_subject = "Intelligent Ecommerce Contact Us- " . Input::POST("subject");
					$email_body = Input::POST("message");
					
					$headers = "From: ". Input::POST("email") ."\r\n";
					$headers .= "MIME-Version: 1.0\r\n"; #Define MIME Version
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; #Set content type
					$headers .= "Bcc: ".$s->i_bcc."\r\n"; #Your BCC Mail List
					//$headers = "Reply-To: $visitor_email \r\n";
					//Send the email!
					$a = mail($to,$email_subject,$email_body,$headers);
					
					if($a){
						new Alert("success_toast", "Message sent!", "" , "alert1 success");
					}else{
						new Alert("error_toast", "Sorry, your message not sent", "" , "alert1 error");
					}
				}
				
			}else{
				new Alert("error_toast", "Please complete the reCAPTCHA task");
			}
		}else{
			new Alert("error_toast","Please complete the reCAPTCHA box");
		}
	break;
}

?>