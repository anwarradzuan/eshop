<?php

switch(Input::post("action")){
    case F::Encrypt(Input::post("_token") . "remove-picture"):
        users::updateBy(["user_id" => $_SESSION["user_id"]], ["user_picture" => "default.png"]);
        
        echo json_encode([
            "status"    => "success",
            "code"      => "PROFILE_IMAGE_REMOVED",
            "message"   => "Profile image has been successfully deleted."
        ]);
    break;
    
    
}