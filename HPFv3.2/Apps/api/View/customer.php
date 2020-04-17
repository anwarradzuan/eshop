<?php

switch(url::Get(1)){
	case "account":
		Turbo::app("customer")->View("pages/api/account.php");
	break;
	
	case "address":
		Page::Load("customer/address");
	break;
}
