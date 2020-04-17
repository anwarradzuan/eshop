<?php

switch(url::get(3)){
    case "":
    case "all-email":
        Page::Load("marketing/mail/all");
    break;
    
    case "sent":
        Page::Load("marketing/mail/sent");
    break;
    
    case "compose":
        Page::Load("marketing/mail/compose");
    break;
}