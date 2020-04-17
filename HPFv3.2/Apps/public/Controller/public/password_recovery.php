<?php

if(!empty(Input::POST("email")) AND !empty(Input::POST("password")) AND !empty(Input::POST("key"))){
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
						
						new Alert("success_toast", "Password has been updated successfully. Please login");
						?>
						<script>
							setTimeout(function(){
					           window.location.href = '<?= PORTAL_PUBLIC ?>' + "login";
					        }, 1000);
						</script>
						<?php
						
					}else{
						new Alert("error_toast", "Customer information not found.");
					}
				break;
				
				case "2":
					$c = clients::getBy(array("cl_id" => $key->pr_user, "cl_email" => Input::POST("email")));
					
					if(count($c) > 0){
						$c = $c[0];
						
						$password = F::Encrypt(Input::POST("password"));
						
						clients::updateBy(array("cl_id" => $c->cl_id), array("cl_password" => $password));
						password_recovery::updateBy(array("pr_id" => $key->pr_id), array("pr_status" => 1));
						password_recovery_detail::insertInto(array(
								"pd_password_recovery"	=> $key->pr_id,
								"pd_ip"					=> $_SERVER["REMOTE_ADDR"],
								"pd_date"				=> F::GetDate(),
								"pd_time"				=> F::GetTime(),
								"pd_status"				=> 1,
								"pd_raw"				=> json_encode($_POST)
							)
						);
						
						new Alert("success_toast", "Password has been updated successfully.", "Recovery email has been sent to your email. If not in your inbox, please check in your spam box.", "border-radius: 10px; font-weight: bold; position:absolute; top: 10%; z-index: 5000; background-color: rgba(92, 210, 86, 0.9); left: 50%; transform: translate(-50%) ", "text-center col-md-6");
					?>
						<script>
							setTimeout(function(){
					           window.location.href = '<?= PORTAL_BUSINESS ?>';
					        }, 1000);
						</script>
						
					<?php
					}else{
						new Alert("error_toast", "Email not found.");
					}
				break;
			}
		}else{
			new Alert("error_toast", "Requested URL has expired. Please request new URL.", "border-radius: 10px; font-weight: bold; position:absolute; top: 10%; z-index: 5000; background-color: rgba(200, 95, 95, 0.9); left: 50%; transform: translate(-50%) ", "text-center col-md-6");
			echo "<a class='btn btn-danger btn-sm'	href='" . PORTAL . "'><span class='fa fa-arrow-left'></span> Got To Home</a>";
		}
	}else{
		new Alert("error_toast", "Sorry, requested URL not found in our database. Please make sure you are using a correct URL to access this page.", "border-radius: 10px; font-weight: bold; position:absolute; top: 10%; z-index: 5000; background-color: rgba(200, 95, 95, 0.9); left: 50%; transform: translate(-50%) ", "text-center col-md-6");
	}
}else{
	new Alert("error_toast", "Please fill all fields below.", "border-radius: 10px; font-weight: bold; position:absolute; top: 10%; z-index: 5000; background-color: rgba(200, 95, 95, 0.9); left: 50%; transform: translate(-50%) ", "text-center col-md-6");
}