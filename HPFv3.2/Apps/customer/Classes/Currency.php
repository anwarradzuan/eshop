<?php

// class Currency{
    // public static function getCode(){
        // return 'USD';
    // }
	// public static function getSign(){
        // return '$';
    // }
	// public static function getRate(){
        // return 1;
    // }
	// public static function getPrice($price, $c = ""){
		// return ($price * self::getRate());
	// }
// }

class Currency{
    public static function getCode(){
        return 'MYR';
    }
	public static function getSign(){
        return 'RM';
    }
	public static function getRate(){
        return 1;
    }
	public static function getPrice($price, $c = ""){
		return ($price * self::getRate());
	}
}