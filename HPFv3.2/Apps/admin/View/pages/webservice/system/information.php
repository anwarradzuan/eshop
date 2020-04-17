<?php

switch(Input::post("action")){
    case F::Encrypt(Input::post("_token") . "getById"):
        $c = infos::getBy(["i_id" => Input::post("company")]);
        
        if(count($c) > 0){
            $c = $c[0];
            
            echo json_encode([
                "status"    => "success",
                "code"      => "INFORMATION_FOUND",
                "message"   => "Information successfully loaded.",
                "data"      => $c
            ]); 
        }else{
            echo json_encode([
                "status"    => "error",
                "code"      => "INFORMATION_NOT_FOUND",
                "message"   => "No information found."
            ]);
        }
    break;
}