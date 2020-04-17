<?php

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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="icon" type="image/png" href="'. PORTAL_PUBLIC .'assets/medias/iecommerce/img/favicon.png">
	
	<link rel="stylesheet" media="" href="'. PORTAL_PUBLIC .'assets/css/iecommerce/vendor.min.css">
	<link id="mainStyles" rel="stylesheet" media="screen" href="'. PORTAL_PUBLIC .'/assets/css/iecommerce/styles-ff9900.min.css">
	<link rel="stylesheet" media="screen" href="'. PORTAL_PUBLIC .'assets/css/iecommerce/custom.css">
	
	<!--Font Awesome-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	
	<!--Data table-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	
	<script src="'. PORTAL_PUBLIC .'assets/js/iecommerce/vendor.min.js"></script>
	
	<!--PayPal-->
	<script src="https://www.paypal.com/sdk/js?client-id=AeseT-QV6v1F2bcwKB0QPsH_ie3H3XVPc7JFz3DL701ewp088G-ehXelniEENQavlQWwueOi0J5KGmmy&currency=MYR"></script>
	<!--<script src="https://www.paypal.com/sdk/js?client-id=AR1mNdYWxmtLZkYpa79qRH6yj8xGoiZh5bLHz0uqZVkkLOiTxKpc0vnK7dPdVhax9rv1yvmAC8ryBc9i&currency=MYR"></script>-->
	
	<!--Data table-->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/w/bs4/dt-1.10.18/datatables.min.js"></script>
	
'
);

$page->addBottomTag('
	
	<script src="'. PORTAL_PUBLIC .'assets/js/iecommerce/scripts.min.js"></script>
	<script src="'. PORTAL_PUBLIC . 'assets/js/iecommerce/modernizr.min.js"></script>
	<script src="'. PORTAL_PUBLIC .'assets/js/iecommerce/card.min.js"></script>
	<script src="'. PORTAL_PUBLIC .'assets/js/iecommerce/Alert.js"></script>
	<script src="'. PORTAL_PUBLIC .'assets/js/iecommerce/custom.js"></script>
	<script src="'. PORTAL_PUBLIC .'assets/js/iecommerce/sha256.js"></script>
'	
);

$page->addTopWidget('widget/header/left_menu.php');
$page->addTopWidget('widget/header/top_bar.php');
$page->addTopWidget('widget/header/main_menu.php');
$page->addTopWidget('widget/header/main_menu_mobile.php');

$page->addBottomWidget('widget/footer/footer.php');
if(!isset($_SESSION["customer_login"])){
	
		header("Location: " . PORTAL_PUBLIC . "login");
		
}else{
	switch($pagex){
		case "test":
			header("Content-Type: text/plain");
			
			print_r(Cart::listAll());
		break;
			
	    case "account":
	    case "Account":
	        //$page = new Page();
	        new Visitors($_SERVER["REMOTE_ADDR"], $_SERVER['REQUEST_URI']);
	        $page->title = "Customer Account  - " . APP_NAME ;
			$page->loadPage("pages/account");
	        $page->Render();
	    break;
		
		case "login":
		case "Login":
			//$page = new Page();
			new Visitors($_SERVER["REMOTE_ADDR"], $_SERVER['REQUEST_URI']);
			$page->title = "Customer Login  - " . APP_NAME ;
			$page->loadPage("pages/login");
			$page->Render();
		break;
		
		case "logout":
		case "Logout":
			session_destroy();
			header("Location: " . PORTAL_PUBLIC . "login");
		break;
		
		
		
		// case "api":
		// case "Api":
// 		
			// $sub = url::get("sub");
			// switch($sub){
				// case "account":
					// Page::Load("pages/api/account");
				// break;
			// }
// 			
		// break;
		
		default:
			$page->title = APP_NAME;
			//$m = menus::getBy(["m_url" => $pagex]);
			$m = DB::conn()->q("SELECT * FROM menus WHERE m_url = '$pagex' AND m_status = '1' AND m_type = '1' OR m_type = '0'")->results();
			
			if(count($m) > 0){
				$m = $m[0];
				new Visitors($_SERVER["REMOTE_ADDR"], $_SERVER['REQUEST_URI']);
				$page->title = $m->m_name . " - " . APP_NAME;
				$page->loadPage($m->m_route);
				
				
			}else{
				header("HTTP/1.0 404 Not Found");
				new Visitors($_SERVER["REMOTE_ADDR"], $_SERVER['REQUEST_URI']);
				$page->loadPage("404");
				$page->title = "Page Not Found - " . APP_NAME;
			}
			
			$page->render();
		break;	
	}

}



