<?php

switch(Input::post("action")){
	
	case "registermember":
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
				
				$client = clients::getBy(["cl_email" => Input::post("cl_email")]);
		
				if(count($client) > 0){
					new Alert("error", "Your Email already exist in our database");
				}else{
					
					$client2 = clients::getBy(["cl_login" => Input::post("username")]);
					
					if(count($client2) > 0){
						new Alert("error", "Username have been taken. Please create different username");
					}else{
						
						$company = company::getBy(["c_email" => Input::post("comp_email")]);
						
						if(count($company) > 0){
							new Alert("error", "Your company Email already exist in our database");
						}else{
							
							$ckey = F::UniqKey("COMPANY_");
								
							$data_company = [
								"c_name"		=> Input::post("comp_name"),
								"c_reg"			=> Input::post("comp_regno"),
								"c_phone"		=> Input::post("comp_telephone"),
								"c_commission"	=> 10,
								"c_email"		=> Input::post("comp_email"),
								"c_status"		=> 1,
								"c_key"			=> $ckey,
								"c_date"		=> F::GetDatE(),
								"c_time"		=> F::GetTime()
							];
							
							$a = company::InsertInto($data_company);
							
							if($a){
								$comp = company::getBy(["c_key" => $ckey]);
								
								if(count($comp) > 0){
									$comp = $comp[0];
									$key = F::UniqKey("CLIENT_");
						
									$data_client = [
										"cl_name"		=> Input::post("cl_name"),
										"cl_company"	=> $comp->c_id,
										"cl_phone"		=> Input::post("cl_telephone"),
										"cl_email"		=> Input::post("cl_email"),
										"cl_login"		=> Input::post("username"),
										"cl_password"	=> F::Encrypt(Input::post("cl_password")),
										"cl_date"		=> F::GetDatE(),
										"cl_time"		=> F::GetTime(),
										"cl_key"		=> $key
									];
									
									clients::InsertInto($data_client);
									
									$e = new Email();
									$e->setTemplate("vendor-register", [
										"{USERNAME}"		=> Input::post("username"),
										"{COMPANY}"			=> Input::post("comp_name"),
										"{REG}"				=> Input::post("comp_regno"),
										"{LOGIN}"			=> PORTAL_BUSINESS,
										"{DATE}"			=> F::GetDate()
									]);
									$e->addAddress(Input::post("cl_email"));
									$e->Subject = "Intelligent Ecommerce - Registration Complete";
									$e->send();	
									
									new Alert("success", "You have successfully registered to our system. Please login to access the system");
									?>
										<script>
											setTimeout(function(){
												window.location = "<?= PORTAL_BUSINESS ?>";
											}, 2000);
										</script>
									<?php
									
								}else{
									new Alert("error", "Company not found");
								}
								
							}else{
								new Alert("error", "Data not saved.");
							}
						}
					}
				}
			}else{
				new Alert("error", "Please complete the reCAPTCHA task");
			}
			
		}else{
			new Alert("error","Please check the reCAPTCHA box");
		}
	break;
	
}