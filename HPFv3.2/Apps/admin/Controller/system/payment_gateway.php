<?php


switch(Input::post("type")){
    case "add":
        if(!empty(input::post("name"))){
            $data = [
                "p_name"    => Input::post("name"),
                "p_key1"    => Input::post("key1"),
                "p_key2"    => Input::post("key2"),
                "p_default" => Input::post("default")
            ];
            
            if(pg::insertInto($data)){
                new Alert("success", "Gateway information saved successfully.");
            }else{
                new Alert("error", "Fail saving your gateway information. Please try again or contact your IT support team.");
            }
        }else{
            new Alert("error", "Please insert at least gateway name.");
        }
    break;
    
    case "edit":
        if(!empty(input::post("name"))){
            $data = [
                "p_name"    => Input::post("name"),
                "p_key1"    => Input::post("key1"),
                "p_key2"    => Input::post("key2"),
                "p_default" => Input::post("default")
            ];
            
            if(pg::updateBy(["p_id" => url::get(3)], $data)){
                new Alert("success", "Gateway information saved successfully.");
            }else{
                new Alert("error", "Fail saving your gateway information. Please try again or contact your IT support team.");
            }
        }else{
            new Alert("error", "Please insert at least gateway name.");
        }
    break;
    
    case "delete":
        if(pg::deleteBy(["p_id" => url::get(3)])){
            new Alert("success", "Gateway information deleted successfully.");
        }else{
            new Alert("error", "Fail saving your gateway information. Please try again or contact your IT support team.");
        }
    break;
}