<?php
switch (input::post('type')){
		
	case "login":
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
				$username = Input::post("username");
				$password = F::Encrypt(Input::post("password"));
		
				$cust = DB::conn()->q("SELECT * FROM  customers WHERE (c_login = '$username' OR c_email = '$username') AND c_password = '$password'")->results();
				//$cust = customers::getBy(["c_email" => $username, "c_password" => $password]);
				if(count($cust) > 0){
					$cust = $cust[0];
					
					@$_SESSION["customer_login"] = $cust->c_email;
					@$_SESSION["customer_id"] = $cust->c_id;
					@$_SESSION["customer_password"] = $cust->c_password;
					@$_SESSION["customer_email"] = $cust->c_email;
				?>
					<script>
						window.location = window.location;
					</script>
				<?php
				
				}else{
					new Alert("error_toast", "Your Username Invalid");
				}
				
			}else{
				new Alert("error_toast", "Please complete the reCAPTCHA task");
			}
			
		}else{
			new Alert("error_toast","Please complete the reCAPTCHA box");
		}
	break;
	
	case "login2":
		
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
				
				$username = Input::post("username");
				$password = F::Encrypt(Input::post("password"));
		
				$cust = DB::conn()->q("SELECT * FROM  customers WHERE (c_login = '$username' OR c_email = '$username') AND c_password = '$password'")->results();
				//$cust = customers::getBy(["c_email" => $username, "c_password" => $password]);
				if(count($cust) > 0){
					$cust = $cust[0];
					
					@$_SESSION["customer_login"] = $cust->c_email;
					@$_SESSION["customer_id"] = $cust->c_id;
					@$_SESSION["customer_password"] = $cust->c_password;
					@$_SESSION["customer_email"] = $cust->c_email;
				?>
					<script>
						window.location = "<?= PORTAL_CUSTOMER ?>account/profile";
					</script>
				<?php
				
				}else{
					new Alert("error_toast", "Your Username Invalid");
				}
				
			}else{
				new Alert("error_toast", "Please complete the reCAPTCHA task");
			}
			
		}else{
			new Alert("error_toast","Please check the reCAPTCHA box");
		}
		
	break;
}


?>