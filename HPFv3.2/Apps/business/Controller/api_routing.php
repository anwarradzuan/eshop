<?php

switch(Input::post("type")){
    case "add":
        $data = [
            "a_description"     => Input::post("description"),
            "a_url"             => Input::post("url"),
            "a_path"            => Input::post("path"),
            "a_status"          => Input::post("status"),
            "a_user"            => $_SESSION["user_id"],
            "a_date"            => F::GetDate(),
            "a_time"            => F::GetTime()
        ];
        
        if(a_apirouting::insertInto($data)){
            new Alert("success", "Routing information saved successfully.");
        }else{
            new Alert("error", "Fail saving routing information. Please try again or contact your IT support team.");
        }
    break;
    
    case "edit":
        $data = [
            "a_description"     => Input::post("description"),
            "a_url"             => Input::post("url"),
            "a_path"            => Input::post("path"),
            "a_status"          => Input::post("status"),
            "a_user"            => $_SESSION["user_id"],
            "a_date"            => F::GetDate(),
            "a_time"            => F::GetTime()
        ];
        
        if(a_apirouting::updateBy(["a_id" => Input::get("id")], $data)){
            new Alert("success", "Routing information saved successfully.");
        }else{
            new Alert("error", "Fail saving routing information. Please try again or contact your IT support team.");
        }
    break;
    
    case "delete":
        
        if(a_apirouting::deleteBy(["a_id" => Input::get("id")])){
            new Alert("success", "Routing information saved successfully.");
        }else{
            new Alert("error", "Fail saving routing information. Please try again or contact your IT support team.");
        }
    break;
}