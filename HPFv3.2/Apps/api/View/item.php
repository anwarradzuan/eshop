<?php

switch(url::Get(1)){
	case "search":
		Page::Load("item/search");
	break;
	
	case "payment_success":
		Page::Load("item/payment_success");
	break;
	
	case "sorting":
		Turbo::app("public")->View("pages/api/sorting.php");
	break;
	
	case "wish_list":
		Turbo::app("public")->View("pages/api/wish_list.php");
	break;
	
	case "item_option":
		Page::Load("item/item_option");
	break;
}
