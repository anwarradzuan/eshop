<?php

class Invoice extends invoices{
	
	public function __construct(){}
	
	public static function getProformaNumber(){
		$x = self::countProforma() + 1;
		return "PRO-" . date("Ymd", time() + 28800) . "-". str_pad(($x + 1), 5, '0', STR_PAD_LEFT);
	}
	
	public static function countProforma(){
		$x = DB::conn()->q("SELECT * FROM invoices")->count();
		return $x;
	}
	
	public static function getInvoiceNumber($proforma){
		$x = self::getProformaDetail($proforma);
		$y = self::countInvoice();
		$pno = "INV-" . str_pad($x->i_id, 5, '0', STR_PAD_LEFT) . "-1" . str_pad(($y + 1), 3, '0', STR_PAD_LEFT);
		return $pno;
	}
	
	public static function countInvoice(){
		$x = DB::conn()->q("SELECT * FROM invoices WHERE i_pno <> '' AND i_exchange = '0'")->count();
		return $x;
	}
	
	public static function getProformaDetail($proforma){
		$x = DB::conn()->query("SELECT * FROM invoices WHERE i_no = ?", array("i_no" => $proforma));
		if($x->count() > 0){
			$x = $x->results()[0];
		}else{
			$x = false;
		}
		return $x;
	}
	
	public static function createProforma($proforma, $client, $status = "", $currency = "", $date = "", $user = ""){
		if(empty($status)){
			$status = 0;
		}
		
		if(empty($user)){
			$user = $_SESSION[md5("intelhost-admin-user-login")];
		}
		
		if(empty($currency)){
			$currency = self::getDefaultCurrency();
		}
		
		$curr = new Currency($currency);
		
		if(empty($date)){
			$date = date("d-M-Y", time() + 288000);
		}
		
		$year = gmdate("Y", strtotime($date));
		
		$x = DB::conn()->insert("invoices", array(
			"i_no"			=> $proforma,
			"i_date" 		=> $date,
			"i_client"		=> $client,
			"i_month"		=> $date,
			"i_year"		=> $year,
			"i_currency"	=> $currency,
			"i_custom"		=> 1,
			"i_time"		=> (time() + 28800),
			"i_total"		=> 0,
			"i_gtotal"		=> 0,
			"i_tax"			=> 0,
			"i_ispartial"	=> $status,
			"i_crate"		=> $curr->getRate(),
			"i_pickcurr"	=> $currency,
			"i_user"		=> $user
		));
		
		if($x){
			$a = true;
		}else{
			$a = false;
		}
		return $a;
	}
	
	private static function getDefaultCurrency(){
		$x = DB::conn()->query("SELECT * FROM currency WHERE c_default = ?", array("c_default" => 1));
		if($x->count() > 0){
			$x = $x->results()[0]->c_code;
		}else{
			$x = "USD";
		}
		return $x;
	}
	
	public static function createInvoice($inv){
		$x = DB::conn()->query("SELECT * FROM invoices WHERE i_no = ?", array("i_no" => $inv));
		if($x->count() > 0){
			
		}else{
			$x = false;
		}
		return $x;
	}
	
	
	private function createInvoicePDF(){
		
	}
	
	
}

?>


















