<?php

class Setting{
    public static $mainPageOrder = [
        0   => "Normal",
        1   => "Main Banner",
        2   => "Promotion"
    ];
    
    public static $boolean = [
        0   => "Disable",
        1   => "Enable"
    ];
	
	public static $bankName = [
     	"Maybank"   						=> "Maybank",
     	"CIMB Bank"   						=> "CIMB Bank",
     	"Public Bank Berhad"   				=> "Public Bank Berhad",
     	"RHB Bank"   						=> "RHB Bank",
     	"Hong Leong Bank"   				=> "Hong Leong Bank",
     	"AmBank Group"  					=> "AmBank Group",
     	"United Overseas Bank (Malaysia)"   => "United Overseas Bank (Malaysia)",
     	"Bank Rakyat"   					=> "Bank Rakyat",
     	"OCBC Bank (Malaysia) Berhad"   	=> "OCBC Bank (Malaysia) Berhad",
     	"HSBC Bank Malaysia Berhad"   		=> "HSBC Bank Malaysia Berhad",
     	"Bank Simpanan Nasional"   			=> "Bank Simpanan Nasional"
       
    ];
    
    public static function GetByKey($var, $key){
        return isset(self::${$var}[$key]) ? self::${$var}[$key] : null;
    }
	
	public static $order = [
		0 => "<span class='text-info'>To Ship</span>",
		1 => "<span class='text-success'>Complete</span>",
		2 => "<span class='text-primary'>Product Dispatched</span>",
		3 => "<span class='text-warning'>Delayed</span>",
		4 => "<span class='text-danger'>Cancelled</span>"
	];
    
    public static function GetByValue($var, $value){
        $nk = null;
        foreach(self::${$var} as $key => $val){
            if($val == $value){
                $nk = $key;
                break;
            }
        }
        
        return $nk;
    }
}