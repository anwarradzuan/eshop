<?php

class Quotation extends quotations{
	public function __construct(){
		
	}
	
	public static function getQuotationNo(){
		$prefix = "Q-" . date("dmY") . "-1";
		$x = DB::conn()->q("SELECT * FROM quotations");
		$no = $x->count();
		
		$q_no = $prefix . str_pad(($no + 1), 4, '0', STR_PAD_LEFT);
		return $q_no;
	}
	
	public static function createQuotation($data){
		$x = DB::conn()->insert("quotations", $data);
		
		if($x){
			return true;
		}else{
			return false;
		}
	}
	
	public static function isExist($no){
		$x = DB::conn()->query("SELECT * FROM quotations WHERE q_no = ?", array("q_no" => $no));
		
		if($x->count() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public static function getQuotationByNo($no){
		$x = DB::conn()->query("SELECT * FROM quotations WHERE q_no = ?", array("q_no" => $no));
		
		return $x->results();
	}
	
	public static function delete($no){
		DB::conn()->query("DELETE FROM quotation_item WHERE i_doc = ?", array("i_doc" => $no));
		
		$x = DB::conn()->query("DELETE FROM quotations WHERE q_no = ?", array("q_no" => $no));
		
		if($x){
			return true;
		}else{
			return false;
		}
	}
}

?>