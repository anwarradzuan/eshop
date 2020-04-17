<?php

if(isset($_POST["g-recaptcha-response"])){
	
	$response = $_POST["g-recaptcha-response"];
	$secret = "6LfwVcoUAAAAAPiXA-6Jr6Zv3saRfrIqE0G5123A";
	$remoteip = $_SERVER["REMOTE_ADDR"];
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=" . $secret . "&response=" . $response . "&remoteip=" . $remoteip);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$res = curl_exec ($ch);
	curl_close ($ch);
			
	$obj = json_decode($res);
	
	if($obj->success){
		
		$bool = false;
		$client = clients::getBy(["cl_login" => Input::post("login")]);
		
		if(count($client) > 0){
		    $bool = true;
		}
		
		if(!$bool){
		    $client = clients::getBy(["cl_email" => Input::post("login")]);
		    
		    if(count($client) > 0){
		        $bool = true;
		    }
		}
		
		
		if($bool){
		    $client = $client[0];
		    if($client->cl_password == F::Encrypt(Input::post("password"))){
		        $_SESSION["cl_login"] = $client->cl_login;
		        $_SESSION["cl_id"] = $client->cl_id;
		        $_SESSION["cl_password"] = $client->cl_password;
				$_SESSION["cl_company"] = $client->cl_company;
		    ?>
		        <script>
		            window.location = window.location;
		        </script>
		    <?php
		    }else{
		        new Alert("error", "Sorry, your password is not correct.");
		    }
		}else{
		    new Alert("error", "Sorry, your username or email is not registered in our system.");
		}		
		
	}else{
		new Alert("error", "Please complete the reCAPTCHA task");
	}
}else{
	new Alert("error","Please check the reCAPTCHA box");
}