<?php
	$type = Input::post("action");
	
	switch($type){
		case "request_reset":
			$email = Input::post("email");
			$user = users::getBy(["user_email" => $email]);
			
			if(count($user) > 0){
				$user = $user[0];
				$now = F::GetTime();
				$rec = DB::conn()->query("SELECT * FROM password_recovery WHERE pr_user = ? AND pr_expired > {$now} AND pr_type = 0", ["pr_user" => $user->user_id])->results();
				
				if(count($rec) > 0){
					$rec = $rec[0];
					$sent = "";
				}else{
					$key = hash("sha256", F::UniqKey()) . "-" . hash("sha256", $user->user_password);
					$data = [
						"pr_date"		=> F::GetDate(),
						"pr_time"		=> F::GetTime(),
						"pr_key"		=> $key,
						"pr_user"		=> $user->user_id,
						"pr_type"		=> 3,
						"pr_expired"	=> (F::GetTime() + (60 * 60 * 24 * 7))
					];
					$i = password_recovery::insertInto($data);
					$new = password_recovery::getBy(["pr_key" => $key]);
					
					if(count($new) > 0){
						$new = $new[0];
						$sent = "";
					}else{
						new Alert("error", "Sorry, we failed to send your password renewal link.");
					}
				}
				if(isset($sent)){
					$mail = new Email(true);  
					$mail->setTemplateNew("admin-forgot-password", [
							"{USERNAME}"	=> $user->user_name,
							"{RCPT_EMAIL}"	=> $user->user_email,
							"{RESET_URL}"	=> PORTAL_ADMIN . "password_recovery/" . $new->pr_key
						]
					);
					$mail->addAddress($user->user_email, $user->user_name);
					$mail->Subject = "Intelligent Ecommerce - Admin Password Recovery";
					$mail->send();
					
					new Alert("success", "We have sent the reset link to your email.");
				}
				
			}else{
				new Alert("error", "Sorry, we could not find registered account on this email");
			}
		break;
			
	}
?>