<?php

switch(Input::post("action")){
    case F::Encrypt(Input::post("_token") . "select-theme"):
        @$_SESSION["theme"] = Input::post("theme");
        
         users::updateBy(["user_id" => $_SESSION["user_id"]], ["user_theme" => Input::post("theme")]);
        
        echo json_encode([
            "status"    => "success",
            "code"      => "THEME_SET",
            "message"   => "Theme has been updated"
        ]);
    break;
}