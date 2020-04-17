<?php
switch (input::POST('action')) {
	case F::Encrypt(Input::POST('akey') . "updateProfile"):
		if(users::updateBy(
			["user_id"  => $_SESSION["user_id"]],
		    [
		        "user_name"     => Input::post("name"),
		        "user_email"    => Input::post("email"),
		        "user_login"    => Input::post("username"),
		        "user_phone"    => Input::post("phone")
		    ]
		)){
		    echo json_encode([
		        "status"    => "success",
		        "code"      => "PROFILE_UPDATED",
		        "message"   => "User profile information has been updated successfully."
		    ]);
		}else{
		    echo json_encode([
		        "status"    => "error",
		        "code"      => "PROFILE_NOT_UPDATED",
		        "message"   => "Fail updating user information. Please try again or contact IT support team."
		    ]);
		}
				
break;
	
}