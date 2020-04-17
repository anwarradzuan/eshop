<?php

// $part = explode(":", input::POST("akey"));
// 	
// $input = base64_decode($part[1]);
// $iv = base64_decode($part[0]);
// 
// $decrypt = Encrypter::AESDecrypt($input, md5(AES_PASSWORD), $iv);

switch (input::POST("action")) {
	
	case F::Encrypt(Input::post("akey") . "search"):
		
		$value = input::post("key");
		$content = "";
		if(!empty($value)){
			
			$item_name = DB::conn()->query("SELECT * FROM items WHERE i_name LIKE ? AND i_company IN (SELECT c_id FROM company WHERE c_status = 1) LIMIT 10", array("i_name" => "%" . $value . "%"))-> results();
			
			if(count($item_name) > 0){
				
				foreach ($item_name as $item) {
					$content .= '
					<div class="col-md-12" style="background-color: white;">
						<a	href="'. PORTAL_PUBLIC .'categories/view_item/'. $item->i_key .'" style="text-decoration: none;">
							<div class = "row" style  = "margin-right: 0px">
								<div class = "col-md-12" style="line-height: 17px;">
									<p style="font-size:; color: black">'. $item->i_name .'</p>
								</div>
							</div>
						</a>
					</div>
					';
				}
				echo json_encode([
		            "status"    => "success",
		            "message"   => "Search Item Found",
		            "code"      => "SEARCH_FOUND",
		            "data"		=> $content,
		            "key"		=> $item->i_key
		        ]); 
				
			}else{
				$content='
					<div class="col-md-12" style="background-color: white;">
						<a style="text-decoration: none;">
							<div class = "row" style  = "margin-right: 0px">
								<div class = "col-md-12" style="line-height: 17px;">
									<p style="font-size:; color: black">No result found</p>
								</div>
							</div>
						</a>
					</div>
				';
				echo json_encode([
		            "status"    => "error",
		            "message"   => "Search Not Found",
		            "code"      => "SEARCH_NOT_FOUND",
		            "data"		=> $content,
		            "key"		=> $value
		        ]); 
			}
		}
		
	break;
}

?>