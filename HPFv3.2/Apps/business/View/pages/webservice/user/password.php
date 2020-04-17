<?php

if(true){
    $user = clients::getBy(["cl_id" => $_SESSION["cl_id"], "cl_password" => F::Encrypt(Input::post("old"))]);
	
	if(!empty(Input::post("old")) && !empty(Input::post("new1")) && !empty(Input::post("new2"))){
		if(count($user) > 0){
	        if(Input::post("new1") == Input::post("new2")){
	            clients::updateBy(["cl_id" => $_SESSION["cl_id"]], ["cl_password" => F::Encrypt(Input::post("new1"))]);
	            
	            echo json_encode([
	                "status"    => "success",
	                "message"   => "Your new password has been changed!",
	                "code"      => "NEW_PASSWORD_CHANGED"
	            ]);
	        }else{
	            echo json_encode([
	                "status"    => "error",
	                "message"   => "Your new password is not match.  Please insert a correct new password.",
	                "code"      => "NEW_PASSWORD_INCORRECT"
	            ]);
	        }
	    }else{
	        echo json_encode([
	            "status"    => "error",
	            "message"   => "Your password is not correct.  Please insert a correct old password.",
	            "code"      => "OLD_PASSWORD_INCORRECT"
	        ]);
	    }
	}else{
		echo json_encode([
	        "status"    => "error",
	        "code"      => "FIELD_IS_EMPTY",
	        "message"   => "Please fill in all the information."
	        
	    ]);
	}
    
    
}else{
    echo json_encode([
        "status"    => "error",
        "code"      => "OLD_PASSWORD_NOT_FOUND",
        "message"   => "Please insert old password for verification."
        
    ]);
}