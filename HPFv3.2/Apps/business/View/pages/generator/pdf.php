<?php

switch(url::get(2)){
    case "invoice":
        Page::Load("generator/invoice");
    break;
    
    default:
        Page::Load("404");
    break;
}
