<?php

class Imap{
    public static $server = "intelhost.com.my", $port = "143", $portType = "notls";
    public static $email = "hery@intelhost.com.my", $password = "#mastermastermaster#";
    public static $box = "INBOX";
    
    public static function connection(){
        $x = imap_open("{". self::$server .":". self::$port ."/". self::$portType ."}" . self::$box, self::$email, self::$password);
        
        return $x ? $x : false;
    }
    
    public static function list($set = ["criteria" => "ALL", "order" => "ASC", "start" => 0, "limit" => 0]){
        $data = [];
        
        foreach(self::ids($set) as $y){
            $t = self::getSumary($y);
            
            $data[] = $t;
        }
        
        return $data;
    }
    
    public static function ids($set = ["criteria" => "ALL", "order" => "ASC", "start" => 0, "limit" => 0]){
        $data = imap_search(self::connection(), !empty($set["criteria"]) ? $set["criteria"] : "ALL");
        $order = (!empty($set["order"]) ? $set["order"] : "ASC");
        $data = ($order == "ASC" ? array_reverse($data) : $data);
        $start = 0;
        
        if(isset($set["start"])){
            if($set["start"] > 0){
                if(isset($data[$set["start"]])){
                    $start = $set["start"];
                }
            }
        }
        
        if(isset($set["limit"])){
            if($set["limit"] > 0){
                $limit = $set["limit"];
            }
        }
        
        if(isset($limit)){
            $data = array_slice($data, $start, $limit);
        }else{
            $data = array_slice($data, $start);
        }
        
        return $data;
    }
    
    public static function getSumary($id){
        $t = imap_fetch_overview(self::connection(), $id, 0);
        
        if(count($t) > 0){
            $t = $t[0];
            
        }else{
            $t = null;
        }
        return $t;
    }
    
    public static function getHeader($id){
        $x = imap_header(self::connection(), $id);
        
        return $x;
    }
    
    public static function getBody($id){
        $h = imap_fetchbody(self::connection(), $id, 1);
        
        return ($h);
    }
    
    public static function getAttachment($id){
        $h = imap_fetchbody(self::connection(), $id, 2);
        
        return ($h);
    }
    
    public static function mailBoxes(){
        $m = imap_open("{". self::$server .":". self::$port ."/". self::$portType ."}", self::$email, self::$password);
        
        $list = imap_list($m, "{". self::$server ."}", "*");
        
        return $list;
    }
    
    public function __destruct(){
        imap_errors();
        imap_alerts();
    }
}
