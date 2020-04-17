<?php

class UserSetting extends users{
    public static function getTheme(){
        $theme = Setting::getByKey("themes", 0);
        
        if(isset($_SESSION["user_login"])){
            $user = users::getBy(["user_login" => $_SESSION["user_login"]]);
            
            if(count($user) > 0){
                $user = $user[0];
                $theme = $user->user_theme;
            }
        }
        
        $tm = Setting::getByValue("themes", $theme);
        
        if(is_null($tm)){
           $theme = "default";
        }else{
            $_SESSION["theme"] = $theme;
        }
        
        return $theme;
    }
    
    public static function detail() {
        $x = users::getBy(["user_id" => $_SESSION["user_id"]]);
        
        if(count($x) > 0){
            $x = $x[0];
            
            return $x;
        }else{
            return null;
        }
    }
    
    //Get current website admin
    public static function currentState(){
        
    }
}