<?php




switch (input::POST('action')) {
	case F::Encrypt(Input::POST('akey') . "updateProfile"):
		if(clients::updateBy(
		    ["cl_id"  => $_SESSION["cl_id"]],
		    [
		        "cl_name"     => Input::post("name"),
		        "cl_email"    => Input::post("email"),
		        "cl_login"    => Input::post("username"),
		        "cl_phone"    => Input::post("phone")
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
		        "message"   => "Fail updating user information. Please try again on contact IT support team."
		    ]);
		}
				
break;
	
}