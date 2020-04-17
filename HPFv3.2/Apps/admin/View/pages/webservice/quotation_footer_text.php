<?php
switch (input::POST('action')){
    
    case "getFooter":
        
        $f = quotation_footer_text::getBy(['q_id' => input::POST("footer_id")]);
        
        if(count($f) > 0){
            $f = $f[0];
            
            echo json_encode([
                "status"    => "success",
                "message"   => "Data footer text loaded.",
                "code"      => "FOOTER_DATA_FOUND",
                "data"      => $f
            ]); 
        }else{
            echo json_encode([
                "status"    => "error",
                "message"   => "Data footer text not loaded.",
                "code"      => "FOOTER_DATA_NOT_FOUND"
            ]); 
        }
    
    break;
}
?>