<?php
$main = url::get("main");
$portal = PORTAL;
$pagex = Url::get(0);

if($pagex == "index"){
    $pagex = "home";
}

$page =  new Page();
$page->addTopTag('
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    
    <link rel="icon" type="image/png" href="'. PORTAL_PUBLIC .'assets/medias/iecommerce/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="'. $portal .'assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="'. $portal .'assets/css/pixeladmin.min.css" rel="stylesheet" type="text/css" />
    <link href="'. $portal .'assets/css/widgets.min.css" rel="stylesheet" type="text/css" />
    <link href="'. $portal .'assets/css/themes/candy-orange.min.css" rel="stylesheet" type="text/css" />
    <script>
        PORTAL = "'. $portal .'";
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
    <script src="'. $portal .'assets/pace/pace.min.js"></script>
    <link href="'. $portal .'assets/css/custom.css" rel="stylesheet" type="text/css" />
	
	<script src="'. $portal .'assets/js/jquery.min.js"></script>
    <script src="'. $portal .'assets/js/bootstrap.min.js"></script>
    
    <script src="'. $portal .'assets/js/pixeladmin.min.js"></script>
    <script src="'. $portal .'assets/js/app.js"></script>
    <script src="'. $portal .'assets/vendors/ckeditor/ckeditor.js"></script>
    <script src="'. $portal .'assets/js/custom.js"></script>
'
);

$page->addBottomTag('
	
'
);

if(isset($_SESSION["user_login"])){
    		$page->setMainMenu('widget/main_menu.php');
    		$page->setFooter('widget/footer.php');
    		
    		switch(url::get(0)){
    		    default:
    		    case "index":
    		    case "":
    		        if(url::get(0) != "index"){
            		    $p = a_menus::getBy(['m_url' => url::get('main')], ['m_status' => 1]);
            		    
            		    if(count($p) > 0){
                		    $p = $p[0];
                		    
                		    if(!empty(url::get(2))){
                		        $mx = a_menus::getBy(["m_url" => url::get(1), "m_main" => $p->m_id]);
                		        
                		        if(count($mx) > 0){
                		            $mx = $mx[0];
                    		        $m = a_menus::getBy(["m_url" => url::get(2), "m_main" => $mx->m_id]);
                    		        
                    		        if(count($m) > 0){
                    		            $m = $m[0];
                    		            
                    		            $page->title = $m->m_name . " - " . APP_NAME;
                    		            $page->loadPage($m->m_route);
                    		            $page->Render();
                    		        }else{
                    		            $page->title = $mx->m_name . " - " . APP_NAME;
                    		            $page->loadPage($mx->m_route);
                    		            $page->Render();
                    		        }
                		        }else{
                		            $page->title = $p->m_name . " - " . APP_NAME;
                		            $page->loadPage($p->m_route);
                		            $page->Render();
                		        }
                		    }else{
                		        if(!empty(url::get(1))){
                		            $m = a_menus::getBy(["m_url" => url::get(1), "m_main" => $p->m_id]);
                		            
                		            if(count($m) > 0){
                    		            $m = $m[0];
                    		            
                    		            $mx = a_menus::getBy(["m_main" => $m->m_id, "m_status" => 1], ["order" => "m_order ASC"]);
                    		            
                    		            if(count($mx) > 0){
                    		                $mx = $mx[0];
                    		                $page->title = $mx->m_name . " - " . APP_NAME;
                        		            $page->loadPage($mx->m_route);
                        		            $page->Render();
                    		            }else{
                        		            $page->title = $m->m_name . " - " . APP_NAME;
                        		            $page->loadPage($m->m_route);
                        		            $page->Render();
                    		            }
                    		        }else{
                    		            $page->title = "Page Not Found - " . APP_NAME;
                    		            $page->loadPage("404");
                    		            $page->Render();
                    		        }
                		        }else{
                		            $page->title = $p->m_name . " - " . APP_NAME;
                		            $page->loadPage($p->m_route);
                		            $page->Render();
                		        }
                		    }  
                		}else{
                		    $page->title = "Not found - " . APP_NAME;
                			$page->loadPage("404");
                			
                			$page->Render();
                		}
            		}else{
            		    $p = a_menus::list(["where" => "m_status = 1 AND m_main = 0", "order" => "m_order ASC"]);
            		    
            		    if(count($p) > 0){
            		        $p = $p[0];
            		        
            		        $m = a_menus::list(["where" => "m_main = " . $p->m_id . " AND m_status = 1", "order" => "m_order ASC"]);
            		        
            		        if(count($m) > 0){
            		            $m = $m[0];
            		            
            		            $v = a_menus::list(["where" => "m_main = " . $m->m_id . " AND m_status = 1", "order" => "m_order ASC"]);
            		            
            		            if(count($v) > 0){
            		                $v = $v[0];
            		                
            		                $page->title = $v->m_name . " - " . APP_NAME;
            	                    $page->loadPage($v->m_route);
            		            }else{
            		                $page->title = $m->m_name . " - " . APP_NAME;
            	                    $page->loadPage($m->m_route);
            		            }
            		        }else{
            		            $page->title = $p->m_name . " - " . APP_NAME;
            	                $page->loadPage($p->m_route);
            		        }
            		        
            	            $page->Render();
            		    }else{
            		        $page->title = "Not found - " . APP_NAME;
                			$page->loadPage("404");
                			
                			$page->Render();
            		    }
                    } 
    		    break;
    		    
    		    case "wb":
    		    case "api":
    		        header("Content-Type: application/json");
    		        if(Token::match(Input::post("_token"), Input::post("token"))){
    		            // $x = a_apirouting::getBy(["a_url" => url::get("path")]);
						$x = DB::conn()->query("SELECT * FROM a_apirouting WHERE a_url = ?", ["a_url" => url::get(1)])->results();
						// $x = DB::conn()->q("")->results();
    		        
        		        if(count($x) > 0){
        		            $x = $x[0];
        		            
        		            if(file_exists(VIEW . "pages/webservice/" . $x->a_path . ".php")){
        		                Page::Load("pages/webservice/" . $x->a_path);
        		            }else{
        		                echo json_encode([
            		                "status"    => "error",
            		                "code"      => "API_PATH_NOT_FOUND",
            		                "message"   => "Requested URI file path not found in system API Engine",
            		                "data"      => null
            		            ]);
        		            }
        		        }else{
        		            echo json_encode([
        		                "status"    => "error",
        		                "code"      => "API_NOT_FOUND",
        		                "message"   => "Requested URI not found in system API Engine",
        		                "data"      => null
        		            ]);
        		        }
    		        }else{
    		            echo json_encode([
    		                "status"    => "error",
    		                "code"      => "TOKEN_NOT_MATCH",
    		                "message"   => "Requested URI not authorized at token",
    		                "data"      => null
    		            ]);
    		        }
    		    break;
    		    
    		    case "generator":
    		        switch(url::get(1)){
    		            case "pdf":
    		                Page::Load("generator/pdf");
    		            break;
    		            
    		            default:
    		                PAge::Load("404");
    		            break;
    		        }    
    		    break;
    		}
		}else{
			
			switch (url::get(0)) {
				case 'password_recovery':
					$page->title = "Password Recovery - " . APP_NAME;
				    $page->loadPage("pages/password_recovery");
				    $page->Render();
					
				break;
				
				default:
					
					$page->title = "Login - " . APP_NAME;
				    $page->loadPage("pages/login");
				    $page->Render();
				    
				break;
			}
		    
		}



