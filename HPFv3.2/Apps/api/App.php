<?php
Page::Load("security");

header("Content-Type: application/json");
switch (url::get("main")) {
	case 'item':
		Page::Load("item");
	break;
	
	case "cart":
		Turbo::app("customer")->View("pages/api/cart.php");
	break;
	
	case "customer":
		Page::Load("customer");
	break;
	
	case "shipping":
		Page::Load("shipping");
	break;
		
	default:
		echo json_encode([
			"status"	=> "error",
			"code"		=> "UNAUTHORIZED_ACCESS", 
			"message"	=> "Your request has been blocked due to unauthorized."
		]);
	break;
}