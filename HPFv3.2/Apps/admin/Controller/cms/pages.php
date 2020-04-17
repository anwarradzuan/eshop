<?php
switch (input::post('type')){
    
    case "add";
    
        $p = menus::insertInto(
            [
                "m_name"        => input::POST('m_name'),
                "m_url"       	=> input::POST('m_url'), 
            	"m_route"       => input::POST('m_route'),
                "m_status"      => input::POST('m_status'),
                "m_type"        => input::POST('m_type'),
                "m_content"     => input::POST('content', 0),
                "m_date"        => F::GetDate(),
                "m_time"        => F::GetTime(),
                "m_user"        => $_SESSION ['user_login']
            ]
        );
        if($p){
            new Alert("success", "Data Saved");
        }else{
            new Alert("Error", "Error");
        }
    
                                                                        
    break;
        
    case "edit";
                                        //where //new data
        $p = menus::updateBy(
            ["m_id"=>url::get(3)],
            [
                "m_name"        => input::POST('m_name'),
                "m_url"       	=> input::POST('m_url'), 
            	"m_route"       => input::POST('m_route'),
                "m_status"      => input::POST('m_status'),
                "m_type"        => input::POST('m_type'),
                "m_content"     => input::POST('content', 0),
                "m_date"        => F::GetDate(),
                "m_time"        => F::GetTime(),
                "m_user"        => $_SESSION ['user_login']
            ]
        );
        if($p){
            new Alert("success", "Data Saved");
        }else{
            new Alert("Error", "Error");
        }
                                                                        
    break;  
    
    case "delete":
        menus::deleteBy(
        ["m_id"=> url::get(3)]);
    
        new Alert("success", "Deleted");
    break;
    
}
?>