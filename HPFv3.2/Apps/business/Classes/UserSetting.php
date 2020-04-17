<?php

class UserSetting extends users{
    public static function getTheme(){
        $theme = Setting::getByKey("themes", 0);
        
        if(isset($_SESSION["cl_login"])){
            $client = clients::getBy(["cl_login" => $_SESSION["cl_login"]]);
            
            if(count($client) > 0){
                $client = $client[0];
                $client = $client->cl_theme;
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
        $x = clients::getBy(["cl_id" => $_SESSION["cl_id"]]);
        
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