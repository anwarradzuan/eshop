<?php

if(!empty(Input::POST("email")) AND !empty(Input::POST("n_pass")) AND !empty(Input::POST("c_pass")) AND !empty(Input::POST("key"))){
	$keys = password_recovery::getBy(["pr_key" => Input::POST("key")]);
	
	if(count($keys) > 0){
		$key = $keys[0];
		
		if($key->pr_expired > F::GetTime() AND $key->pr_status == 0){
			
			switch($key->pr_type){
				case "1":
					$c = customers::getBy(["c_id" => $key->pr_user, "c_email" => Input::POST("email")]);
					
					if(count($c) > 0){
						$c = $c[0];
						
						$password = F::Encrypt(Input::POST("password"));
						
						customers::updateBy(["c_id" => $c->c_id], ["c_password" => $password]);
						password_recovery::updateBy(["pr_id" => $key->pr_id], ["pr_status" => 1]);
						password_recovery_detail::insertInto([
								"pd_password_recovery"	=> $key->pr_id,
								"pd_ip"					=> $_SERVER["REMOTE_ADDR"],
								"pd_date"				=> F::GetDate(),
								"pd_time"				=> F::GetTime(),
								"pd_status"				=> 1,
								"pd_raw"				=> json_encode($_POST)
							]
						);
						
						new Alert("success", "Password has been updated successfully. Please login");
						
					}else{
						new Alert("error", "Customer information not found.");
					}
				break;
				
				case "2":
					$c = clients::getBy(["cl_id" => $key->pr_user, "cl_email" => Input::POST("email")]);
					
					if(count($c) > 0){
						$c = $c[0];
						
						$password = F::Encrypt(Input::POST("password"));
						
						clients::updateBy(["cl_id" => $c->cl_id], ["cl_password" => $password]);
						password_recovery::updateBy(["pr_id" => $key->pr_id], ["pr_status" => 1]);
						password_recovery_detail::insertInto([
								"pd_password_recovery"	=> $key->pr_id,
								"pd_ip"					=> $_SERVER["REMOTE_ADDR"],
								"pd_date"				=> F::GetDate(),
								"pd_time"				=> F::GetTime(),
								"pd_status"				=> 1,
								"pd_raw"				=> json_encode($_POST)
							]
						);
						
						new Alert("success", "Password has been updated successfully.", "Recovery email has been sent to your email. If not in your inbox, please check in your spam box.");
					?>
						<script>
							window.location = "<?= PORTAL_BUSINESS ?>";
						</script>
					<?php
					}else{
						new Alert("error", "Your mail is not found in our database.");
					}
				break;
				
				case "3":
					$c = users::getBy(["user_id" => $key->pr_user, "user_email" => Input::POST("email")]);
					
					if(Input::POST("c_pass") == Input::POST("n_pass")){
						if(count($c) > 0){
							$c = $c[0];
							
							$password = F::Encrypt(Input::POST("c_pass"));
							
							users::updateBy(["user_id" => $c->user_id], ["user_password" => $password]);
							password_recovery::updateBy(["pr_id" => $key->pr_id], ["pr_status" => 1]);
							password_recovery_detail::insertInto([
									"pd_password_recovery"	=> $key->pr_id,
									"pd_ip"					=> $_SERVER["REMOTE_ADDR"],
									"pd_date"				=> F::GetDate(),
									"pd_time"				=> F::GetTime(),
									"pd_status"				=> 1,
									"pd_raw"				=> json_encode($_POST)
								]
							);
							
							new Alert("success", "Password has been updated successfully.", "Recovery email has been sent to your email. If not in your inbox, please check in your spam box.");
						?>
							<script>
								window.location = "<?= PORTAL_ADMIN ?>";
							</script>
						<?php
						}else{
							new Alert("error", "Your mail is not found in our database.");
						}
					}else{
						new Alert("error", "Confirm Password is not match with New Password");
					}
					
				break;
			}
			
		}else{
			new Alert("error", "Requested URL has expired. Please request new URL.");
			echo "<a class='btn btn-danger btn-sm'	href='" . PORTAL . "'><span class='fa fa-arrow-left'></span> Got To Home</a>";
		}
	}else{
		new Alert("error", "Sorry, requested URL not found in our database. Please make sure you are using a correct URL to access this page.");
	}
}else{
	new Alert("error", "Please fill all the information.");
}