<?php
#IPStack Setup
$main = url::get("main");
$portal = PORTAL;
$pagex = Url::get(0);

if($pagex == "index"){
    $pagex = "home";
}

#theme
// styles-2ecc71.min.css
// styles-e74c3c.min.css
// styles-f39c12.min.css
#theme custom
// styles-ff9900.min.css
// styles-e60000.min.css
// styles-ff0066.min.css

$page =  new Page();
$page->addTopTag('
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
');

$page->addBottomTag('
	
');

switch($pagex){
	
	case "login" : 
		
		$page->title = APP_NAME;
		
		$page->title = "Login" . " - " . APP_NAME;
		$page->loadPage("pages/login");
		
		$page->render();
	
	break;
		
	default:
		$page->title = APP_NAME;
		
		$page->title = "Home" . " - " . APP_NAME;
		$page->loadPage("pages/home");
		
		$page->render();
	break;
	
	
}




