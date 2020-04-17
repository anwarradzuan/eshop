<?php
defined("HFA") or die();

switch(Input::post("type")){
    case "add":
        ///*
        $data = [
            "cl_name"       => Input::post("cl_name"),
            "cl_phone"      => Input::post("cl_phone"),
            "cl_email"      => Input::post("cl_email"),
            "cl_address"    => Input::post("cl_address"),
            "cl_postal"     => Input::post("cl_postal"),
            "cl_city"       => Input::post("cl_city"),
            "cl_state"      => Input::post("cl_state"),
            "cl_country"    => Input::post("cl_country"),
            "cl_company"    => Input::post("cl_company"),
            "cl_regno"      => Input::post("cl_regno"),
            "cl_compPhone"  => Input::post("cl_compPhone"),
            "cl_compFax"    => Input::post("cl_compFax"),
            "cl_compEmail"  => Input::post("cl_compEmail"),
            "cl_compAbout"  => Input::post("cl_compAbout"),
            "cl_password"   => F::Encrypt(Input::post("cl_password")),
            "cl_login"      => Input::post("cl_login"),
            "cl_date"       => F::GetDate(),
            "cl_time"       => f::GetTime()
        ];
        
        if(clients::insertInto($data)){
            new Alert("success", "Client information saved successfully.");
        }else{
            new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
        }
        //*/
    break;
        
    case "edit":
        $data = [
            "cl_name"       => Input::post("cl_name"),
            "cl_phone"      => Input::post("cl_phone"),
            "cl_email"      => Input::post("cl_email"),
            "cl_address"    => Input::post("cl_address"),
            "cl_postal"     => Input::post("cl_postal"),
            "cl_city"       => Input::post("cl_city"),
            "cl_state"      => Input::post("cl_state"),
            "cl_country"    => Input::post("cl_country"),
            "cl_company"    => Input::post("cl_company"),
            "cl_regno"      => Input::post("cl_regno"),
            "cl_compPhone"  => Input::post("cl_compPhone"),
            "cl_compFax"    => Input::post("cl_compFax"),
            "cl_compEmail"  => Input::post("cl_compEmail"),
            "cl_compAbout"  => Input::post("cl_compAbout"),
            "cl_password"   => F::Encrypt(Input::post("cl_password"))
        ];
        
        if(clients::updateBy(["cl_id" => Input::get("id")], $data)){
            new Alert("success", "Client information saved successfully.");
        }else{
            new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
        }
    break;
    
    case "delete":
        
        if(clients::deleteBy(["cl_id" => Input::get("id")])){
            new Alert("success", "Client information deleted successfully.");
        }else{
            new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
        }
    break;
}