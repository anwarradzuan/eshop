<?php

class AMenus extends menus{
    public static $url;
    
    public static function url($id, $url = "", $no = 0){
        $m = a_menus::getBy(["m_id" => $id]);
        
        if(count($m) > 0){
            $m = $m[0];
            $url .= $m->m_url . "/";
            
            if($m->m_main > 0){
                
                $url = self::url($m->m_main, $url, $no++);
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