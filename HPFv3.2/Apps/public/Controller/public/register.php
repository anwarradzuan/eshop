<?php
	switch (input::post("action")) {
		
		case 'register':
			
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
				
					$npass = Input::post("n_pass");
					$cpass = Input::post("c_pass");
				
					if($npass == $cpass){
						
						$check = customers::getBy(["c_email" => Input::post("c_email")]);
						
						if(count($check)>0){
							
							new Alert("error_toast", "Your email have been registered in our systems. Please try another email account.");
							
						}else{
							$data = [
									"c_name" 	 => Input::post("c_name"),
									"c_email"	 => Input::post("c_email"),
									"c_login"	 => Input::post("c_login"),
									"c_password" => F::Encrypt($cpass),
									"c_date" 	 => F::GetDate(),
									"c_time" 	 => F::GetTime()
							];
				        
							if(customers::insertInto($data)){
								
								new Alert("success_toast", "Your have register to our store. Please login.");
								
								$mail = new Email(true);  
								$mail->setTemplate("customer-registered", [
										"{USERNAME}"	=> Input::post("c_name"),
										"{RCPT_EMAIL}"	=> Input::post("c_email"),
										"{RESET_URL}"	=> PORTAL_PUBLIC . "login"
									]
								);
								$mail->addAddress(Input::post("c_email"), Input::post("c_name"));
								$mail->Subject = "Intelligent Ecommerce - Registered";
								$mail->send();
							
							}else{
								new Alert("error_toast", "Internal system error while storing your information. Please contact our system administration.");
							}
						}
					}else{
						new Alert("error_toast", "Password did not match");
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