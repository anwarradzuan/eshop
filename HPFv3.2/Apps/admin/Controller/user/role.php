<?php

switch(Input::post("type")){
    case "add":
        if(!empty(Input::post("name"))){
            if(roles::insertInto([
                "r_name"    => Input::post("name"),
                "r_user"    => $_SESSION["user_login"],
                "r_date"    => F::GetDate(),
                "r_time"    => F::GetTime()
            ])){
                new Alert("success", "Role information saved successfully.");
            }else{
                new Alert("error", "Fail saving role information.");
            }
        }else{
            new Alert("error", "Role name are required.");
        }
    break;
    
    case "edit":
        if(!empty(Input::post("name"))){
            if(roles::updateBy(["r_id" => url::get(3)], [
                "r_name"    => Input::post("name"),
                "r_user"    => $_SESSION["user_login"],
                "r_date"    => F::GetDate(),
                "r_time"    => F::GetTime()
            ])){
                new Alert("success", "Role information saved successfully.");
            }else{
                new Alert("error", "Fail saving role information.");
            }
        }else{
            new Alert("error", "Role name are required.");
        }
    break;
    
    case "delete":
        if(roles::deleteBy(["r_id" => url::get(3)])){
            new Alert("success", "Role information saved successfully.");
        }else{
            new Alert("error", "Fail saving role information.");
        }
    break;
    
}