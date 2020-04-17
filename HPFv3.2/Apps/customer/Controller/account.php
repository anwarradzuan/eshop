<?php

switch (input::POST('action')){
	
    case "update":
        
        $c_id = $_SESSION['customer_id'];
		$cust = customers::getBy(["c_id" => $c_id]);
        
        if(count($cust) > 0){
            $cust = $cust[0];
            $newpass =  input::POST('n_pass');
			$conpass =  input::POST('c_pass');
			$oldpass =  F::Encrypt(input::POST('old_pass'));
			
			if(!empty($newpass) AND !empty($conpass)){
				
				if($oldpass == $cust->c_password){
					
					if($newpass == $conpass){
					
						$data = [
							"c_name"		=> input::POST('c_name'),
							"c_phone"       => input::POST('c_phone'),
							"c_gender"      => input::POST('gender'),
							"c_login"		=> input::POST('c_login'),
							// "c_bank"       	=> input::POST('c_bank'),
							// "c_acc"			=> input::POST('c_acc'),
							"c_password"	=> F::Encrypt($conpass)
						];
						
						if(file_exists($_FILES["file"]["tmp_name"])){
			                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
			                $temp = $_FILES["file"]["tmp_name"];
			                
			                $pt = pathinfo($fname);
			                $ext = $pt["extension"];
			                
			                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/account/" . $fname, $ext, 220, 220);
			    			
			    			if($u){
			    				$data["c_picture"] = $fname;
			    			}	
			            }
	            
						if(customers::updateBy(["c_id" => $c_id],
							$data
						)){
							new Alert("success_toast", "Record Saved.");
						}else{
							new Alert("error_toast","Data not saved");
						}
					}else{
						new Alert("error_toast","Password did not match");	
					}
					
				}else{
					new Alert("error_toast","Current Password did not match");
				}
				
			}else{
				
				$data2 = [
					"c_name"	=> input::POST('c_name'),
					"c_phone"	=> input::POST('c_phone'),
					"c_gender"  => input::POST('gender'),
					"c_login"	=> input::POST('c_login'),
					"c_bank"    => input::POST('c_bank'),
					"c_acc"		=> input::POST('c_acc')
				];
				
				if(file_exists($_FILES["file"]["tmp_name"])){
	                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
	                $temp = $_FILES["file"]["tmp_name"];
	                
	                $pt = pathinfo($fname);
	                $ext = $pt["extension"];
	                
	                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/account/" . $fname, $ext, 220, 220);
	    			
	    			if($u){
	    				$data2["c_picture"] = $fname;
	    			}	
	            }
				
				if(customers::updateBy(["c_id" => $c_id],
					$data2
				)){
					 new Alert("success_toast", "Record Saved.");
				}else{
					new Alert("error_toast","Data not saved");
				}
			}
        }else{
        	
			new Alert("Error", "No user Found");
		}
    break;
}
?>
