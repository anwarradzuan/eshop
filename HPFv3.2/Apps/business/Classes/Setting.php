<?php

class Setting{
    public static $orderStatus = [
        0   => "Unpaid",
        1   => "Paid",
        2   => "Pending",
        3   => "Processing",
        4   => "Working",
        5   => "Expired",
        6   => "Cancelled"
    ];
    
    public static $invoiceStatus = [
        0   => "Unpaid",
        1   => "Paid",
        2   => "Expired",
        3   => "Cancel"
    ];
    
    public static $boolean = [
        0   => "Disable",
        1   => "Enable"
    ];
    
    public static $invoiceNotification = [
        0   => "None",
        1   => "On Order",
        2   => "On Invoice"
    ];
    
    public static $invoiceNotificationType = [
        0   => "Quantity",
        1   => "Yearly",
        2   => "Monthly",
        3   => "Hourly"
    ];
    
    public static $notificationDue = [
        0   => "None",
        1   => "1 Day",
        2   => "3 Days",
        3   => "1 Week",
        4   => "2 Weeks",
        5   => "1 Month",
        6   => "3 Months",
        7   => "6 Months"
        
    ];
    
    public static $themes = [
        0     => 'default',
        1     => 'asphalt',
        2     => 'purple-hills',
        3     => 'adminflare',
        4     => 'dust',
        5     => 'frost',
        6     => 'fresh',
        7     => 'silver',
        8     => 'clean',
        9     => 'white',
        10    => 'candy-black',
        11    => 'candy-blue',
        12    => 'candy-red',
        13    => 'candy-orange',
        14    => 'candy-green',
        15    => 'candy-purple',
        16    => 'candy-cyan',
        17    => 'mint-dark',
        18    => 'dark-blue',
        19    => 'dark-red',
        20    => 'dark-orange',
        21    => 'dark-green',
        22    => 'dark-purple',
        23    => 'dark-cyan',
        24    => 'darklight-blue',
        25    => 'darklight-red',
        26    => 'darklight-orange',
        27    => 'darklight-green',
        28    => 'darklight-purple',
        29    => 'darklight-cyan',
    ];
    
    public static $invoiceItem = [
        0   => "Logo",
        1   => "Company Information",
        2   => "Client Information",
        3   => "Proforma Number",
        4   => "Invoice Number",
        5   => "Item List Table",
        6   => "Invoice Date",
        7   => "Invoice Reference",
        10  => "Line",
        11  => "Terms and Condition",
        12  => "Total Table",
        13  => "Blank",
        14  => "Document Title",
        15  => "Note to Recepient"
    ];
    
    public static $systemMenuPosition = [
        0   => "Main",
        1   => "User Profile"
    ];
    
    public static $discountType = [
        0   => "Amount",
        1   => "%"
    ];
    
    public static $quotationDue = [
        0   => "None",
        1   => "1 Day",
        2   => "3 Days",
        3   => "1 Week",
        4   => "2 Weeks",
        5   => "1 Month",
        6   => "3 Months",
        7   => "6 Months"
        
    ];
    
    public static $quotationNotificationType = [
        0   => "Quantity",
        1   => "Yearly",
        2   => "Monthly",
        3   => "Hourly"
    ];
    
    public static $mainPageOrder = [
        0   => "Normal",
        1   => "Main Banner",
        2   => "Promotion"
    ];
    
	public static $banner = [
		0	=> "Main Banner",
		1 	=> "Promotion",
		2	=> "About Us",
		3	=> "Contact Us"
	];
	
	public static $yn = [
		0	=> "No",
		1 	=> "Yes",
	];
	
	public static $itemOption = [
		1	=> "Select",
		2 	=> "Radio",
		3	=> "Checkbox"
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
	
	public static $order = [
		0 => "<span class='text-info'>To Ship</span>",
		1 => "<span class='text-success'>Complete</span>",
		2 => "<span class='text-primary'>Product Dispatched</span>",
		3 => "<span class='text-warning'>Delayed</span>",
		4 => "<span class='text-danger'>Cancelled</span>"
	];
	
    public static function GetByKey($var, $key){
        return isset(self::${$var}[$key]) ? self::${$var}[$key] : null;
    }
    
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