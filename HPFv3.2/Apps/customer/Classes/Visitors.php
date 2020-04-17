<?php

class Visitors{
	private $ip, $url, $today;
	public function __construct($ip, $url){
		$this->url = $url;
		$this->ip = $ip;
		$this->today = date("d-M-Y", time() + 28800);
		
		if(!in_array($_SERVER["REMOTE_ADDR"], Ip::getIp())){
			$this->IPExist();
			$this->urlExist();
		}
	}
	
	private function IPExist(){
		$x = DB::conn()->query("SELECT * FROM visitors WHERE v_ip = ? AND v_date = ?", ["v_ip" => $this->ip, "v_date" => $this->today]);
		if($x->count() < 1){
			$this->addIP();
		}else{
			DB::conn()->query("UPDATE visitors SET v_hit = v_hit+1 WHERE v_ip = ? AND v_date = ?", ["v_ip" => $this->ip, "v_date" => $this->today]);
		}
	}
	
	private function addIP(){
		$o = file_get_contents("http://api.ipstack.com/". $this->ip ."?access_key=" . IPSTACK);
		$obj = json_decode($o);
		
		DB::conn()->insert("visitors", ["v_ip" => $this->ip, "v_date" => $this->today, "v_time" => (time() + 28800), "v_hit" => 1, "v_country" => $obj->country_name]);
	}
	
	private function urlExist(){
		$x = DB::conn()->query("SELECT * FROM hits WHERE h_url = ? AND h_date = ?", ["h_url" => $this->url, "h_date" => $this->today]);
		if($x->count() > 0){
			$this->updateHit();
		}else{
			$this->addUrl();
		}
	}
	
	private function addUrl(){
		DB::conn()->insert("hits", ["h_url" => $this->url, "h_date" => $this->today, "h_hit" => 1, "h_portal" => "customer"]);
	}
	
	private function updateHit($existance = ""){
		DB::conn()->query("UPDATE hits SET h_hit = h_hit+1 WHERE h_url = ? AND h_date = ?", ["h_url" => $this->url, "h_date" => $this->today]);
	}
}

?>