<?php
switch (input::post('action')){
    case "":
    case F::Encrypt(Input::post("_token") . "listEmail"):
        $wb = new Imap();
        
        $x = $wb->list(["start" => Input::post("start"), "limit" => Input::post("limit")]);
        
        if(count($x) > 0){
            echo json_encode([
                "status"    => "success",
                "message"   => "Data loaded.",
                "code"      => "DATA_FOUND",
                "data"      => ($x)
            ]); 
        }else{
            echo json_encode([
                "status"    => "error",
                "message"   => "Data not loaded.",
                "code"      => "DATA_NOT_FOUND"
            ]); 
        }
        
    break;
    
    case F::Encrypt(Input::post("_token") . "sentMail"):
        
        $x = Imap::list();
        
        if(count($x) > 0){
            echo json_encode([
                "status"    => "success",
                "message"   => "Data loaded.",
                "code"      => "DATA_FOUND",
                "data"      => $x
            ]); 
        }else{
            echo json_encode([
                "status"    => "error",
                "message"   => "Data not loaded.",
                "code"      => "DATA_NOT_FOUND"
            ]); 
        }
        
    break;
}
?>