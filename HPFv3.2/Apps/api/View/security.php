<?php
$part = explode(":", Input::post("akey"));

if(count($part) < 2){
	$bool = true;
}else{
	$bool = false;
	$iv = F::Decode64($part[0]);
	$text = Encrypter::AESDecrypt(F::Decode64($part[1]), AES_PASSWORD, $iv);
	$x = explode(":", $text);

	if($_SERVER["REMOTE_ADDR"] == $x[1] . ""){
		
		if(F::GetTime() > $x[2]){	
			header("Content-Tpye: application/json");
			die(json_encode([
				"status"	=> "error",
				"code"		=> "TOKEN_EXPIRED",
				"message"	=> "Requested token has been expired. Please refresh to get new token."
			]));
		}
		
		switch(strtolower($x[0])){
			case "web":
				
			break;
			
			case "android":
			case "ios":
				
			break;
			
			case "windows":
			
			break;
			
			default:
				header("Content-Tpye: application/json");
				echo json_encode([
					"status"	=> "error",
					"code"		=> "REQUEST_PLATFORM_NOT_SUPPORTED",
					"message"	=> "Requested platform is not supported by this API."
				]);
				die();
			break;
		}
	}else{
		$bool = true;
	}
}

if($bool){
	$page = new Page();
	$page->title = "Page Not Found";
	$page->addTopTag('
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="icon" type="image/png" href="'. PORTAL_PUBLIC .'assets/medias/iecommerce/img/favicon.png">
		
		<link rel="stylesheet" media="screen" href="'. PORTAL_PUBLIC .'/assets/css/iecommerce/vendor.min.css">
		<link id="mainStyles" rel="stylesheet" media="screen" href="'. PORTAL_PUBLIC .'/assets/css/iecommerce/styles-ff9900.min.css">
	');
	Turbo::app("public")->View("404.php");
	$page->render();
	//die(json_encode(["status" => "error"]));
	die();
}