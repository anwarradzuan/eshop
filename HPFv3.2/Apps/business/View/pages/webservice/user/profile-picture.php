<?php

switch(Input::post("action")){
    case F::Encrypt(Input::post("_token") . "remove-picture"):
        clients::updateBy(["cl_id" => $_SESSION["cl_id"]], ["cl_picture" => "default.png"]);
        
        echo json_encode([
            "status"    => "success",
            "code"      => "PROFILE_IMAGE_REMOVED",
            "message"   => "Profile image has been successfully deleted."
        ]);
    break;
    
    
}