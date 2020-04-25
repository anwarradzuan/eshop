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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
'
);

$page->addBottomTag('
	
');

switch($pagex){
		
	default:
		$page->title = APP_NAME;
		
		$page->title = $m->m_name . " - " . APP_NAME;
		$page->loadPage($m->m_route);
		
		$page->render();
	break;
	
	
}




