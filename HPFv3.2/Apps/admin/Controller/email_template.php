<?php
// require_once(dirname(dirname(dirname(__DIR__)))."/Misc/404.php");
$type = Input::post("action");

switch($type){
	case "add":
		if(!empty(Input::post("title")) AND !empty(Input::post("content"))){
			$key = F::UniqKey("EMAIL_");
			$data = array(
				"e_title"		=> Input::post("title"),
				"e_code"		=> Input::post("code"),
				"e_ccmail"		=> Input::post("ccmail"),
				"e_content"		=> Input::post("content", 0),
				"e_user"		=> $_SESSION["user_login"],
				"e_time"		=> F::GetTime(),
				"e_date"		=> F::GetDate(),
				"e_key"			=> $key
			);
				
			$i = email_template::insertInto($data);
			
			$f = email_template::getBy(["e_key" => $key]);
			if(count($f) > 0){
				$f = $f[0];
					
				$xx = ccmail::insertInto([
						"cc_code"	=> $f->e_id,
						"cc_email"	=> $f->e_ccmail,
						"cc_user"	=> $_SESSION["user_login"]
					]
				);
			}
			if($i){
				new Alert("success", "Email Template added successfully.");
			}else{
				new Alert("erorr", "Fail adding template, please contact system technical.");
			}
		}else {
			new Alert("error", "Please fill in all the information");
		}
	break;
	
	case "edit":
		$email = email_template::getBy(["e_id" => url::get(2)]);
	
		if(count($email) > 0){
			$email = $email[0];
			
			if(!empty(Input::post("title")) AND !empty(Input::post("content"))){
			$data = array(
				"e_title"		=> Input::post("title"),
				"e_ccmail"		=> Input::post("ccmail"),
				"e_code"		=> Input::post("code"),
				"e_content"		=> Input::post("content", 0),
				"e_user"		=> $_SESSION["user_login"],
				"e_time"		=> F::GetTime(),
				"e_date"		=> F::GetDate()
			);
			
			$i = email_template::updateBy(["e_id" => url::get(2)], $data);
			
			$f = ccmail::updateBy(["cc_code" => url::get(2)], [
							"cc_email"	=> Input::post("ccmail"),
							"cc_user"	=> $_SESSION["user_login"]
					]);
			if($i){
				new Alert("success", "Email Template edited successfully.");
			}else{
				new Alert("erorr", "Fail editing template, please contact system technical.");
			}
		}else {
			new Alert("error", "No template found.");
		}
	}	
	break;
	
	case "delete":
		$id = url::get(2);
		$email = email_template::getBy(["e_id" => $id]);
		
		if(count($email) > 0){
			$email = $email[0];
			
			$d = email_template::deleteBy(["e_id" => $email->e_id]);
			if($d){
				ccmail::deleteBy(["cc_code" => $email->e_id]);
				new Alert("success", "Email template deleted successfully.");
			?>
				<script>
					window.location = "<?= PORTAL ?>email-templates";
				</script>
			<?php
			}else{
				new Alert("error", "Fail deleting template. Please contact system technical.");
			}
		}else{
			new Alert("error", "No template found.");
		}
	break;
}
?>
