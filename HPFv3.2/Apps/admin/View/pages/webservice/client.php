<?php


switch(Input::post("action")){
    case F::Encrypt(Input::post("_token") . "getByLogin"):
        
        $login = Input::post("client");
        
        $cl = clients::getBy(["cl_login" => $login]);
        
        if(count($cl) > 0){
            $cl = $cl[0];
            
            echo json_encode([
                "status"    => "success",
                "code"      => "CLIENT_INFORMATION_FOUND",
                "message"   => "Client information loaded.",
                "data"      => $cl
            ]);
        }else{
            echo json_encode([
                "status"    => "error",
                "code"      => "CLIENT_NOT_FOUND",
                "message"   => "Client information not found in our database.",
                "data"      => null
            ]);
        }
        
    break;
}