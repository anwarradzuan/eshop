<?php

class AMenus extends menus{
    public static $url;
    
    public static function url($id, $url = "", $no = 0){
        $m = cm_menus::getBy(["cm_id" => $id]);
        
        if(count($m) > 0){
            $m = $m[0];
            $url .= $m->cm_url . "/";
            
            if($m->cm_main > 0){
                
                $url = self::url($m->cm_main, $url, $no++);
            }else{
                
                $arr = explode("/", $url);
                $arr = array_reverse($arr);
                
                $url = implode("/", $arr);
            }
        }else{
            $url .= "";
        }
        
        return $url;
    }
}