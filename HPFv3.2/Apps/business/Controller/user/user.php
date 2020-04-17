<?php

switch(input::post("type")){
    case "add":
        if(!empty(Input::post("name")) && !empty(Input::post("login"))){
            $data = [
                "user_name"     => Input::post("name"),
                "user_login"    => Input::post("login"),
                "user_email"    => Input::post("email"),
                "user_status"   => Input::post("status"),
                "user_phone"    => Input::post("phone"),
                "user_password" => F::Encrypt(Input::post("password")),
                "user_role"    => Input::post("role")
            ];
            
            if(users::insertInto($data)){
                new Alert("success", "User has been successfully added. ");
            }else{
                new Alert("error", "Fail saving user infomration. Please try again or contact your IT support team.");
            }
        }else{
            new Alert("error", "Please insert name and username.");
        }
    break;
    
    case "edit":
        if(!empty(Input::post("name")) && !empty(Input::post("login"))){
            $data = [
                "user_name"     => Input::post("name"),
                "user_login"    => Input::post("login"),
                "user_email"    => Input::post("email"),
                "user_status"   => Input::post("status"),
                "user_phone"    => Input::post("phone"),
                "user_role"    => Input::post("role")
            ];
            
            if(!empty(Input::post("password"))){
                $data["user_password"] = F::Encrypt(Input::post("password"));
            }
            
            if(users::updateBy(["user_id" => url::get(3)], $data)){
                new Alert("success", "User has been successfully added. ");
            }else{
                new Alert("error", "Fail saving user infomration. Please try again or contact your IT support team.");
            }
        }else{
            new Alert("error", "Please insert name and username.");
        }
    break;
    
    case "delete":
        if(users::deleteBy(["user_id" => url::get(3)])){
            new Alert("success", "User has been successfully deleted. ");
        }else{
            new Alert("error", "Fail deleting user infomration. Please try again or contact your IT support team.");
        }
    break;
}