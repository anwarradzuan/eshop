<?php

class Ip{
	public function __construct(){}
	
	public static function getIp(){
		$a = fopen(ASSET . "Data/ip.json", "r");
		$ip = json_decode(stream_get_contents($a), true);
		
		return $ip;
	}
}

?>