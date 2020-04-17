<?php

foreach(invoices::list(['where' => 'i_status > 0' ]) as $inv){
    foreach(explode(",", $inv->i_notification) as $x){
        $in = Setting::getByKey("invoiceNotification", $x);
        
        switch($in){
            case "On Invoice":
                $date = $inv->i_time;
                $now = F::GetTime();
                $bal = $now - $date;
                
                foreach(explode(",", $inv->i_notificationDue) as $x){
                    switch($x){
                        case  $bal > (60 * 60 * 24):
                            $due = Setting::getByValue("notificationDue", "1 Day");
                        break;
                        
                        case $bal > (60 * 60 * 24 * 3):
                            $due = Setting::getByValue("notificationDue", "3 Days");
                        break;
                        
                        case $bal > (60 * 60 * 24 * 7):
                            $due = Setting::getByValue("notificationDue", "1 Week");
                        break;
                        
                        case $bal > (60 * 60 * 24 * 14):
                            $due = Setting::getByValue("notificationDue", "2 Weeks");
                        break;
                        
                        case $bal > (60 * 60 * 24 * 30):
                            $due = Setting::getByValue("notificationDue", "1 Month");
                        break;
                        
                        case $bal > (60 * 60 * 24 * 90):
                            $due = Setting::getByValue("notificationDue", "3 Months");
                        break;
                        
                        case $bal > (60 * 60 * 24 * 180):
                            $due = Setting::getByValue("notificationDue", "6 Months");
                        break;
                        
                        default:
                            $due = 0;
                        break;
                    }
                    
                    $n = notifications::getBy([
                        "n_type"                => "invoice",
                        "n_doc"                 => $inv->i_d,
                        "n_notificationType"    => $in,
                        "n_notificationDue"     => $due
                    ]);
                    
                    if(count($n) < 1){
                        //Send Email
                        
                        notifications::insertInto([
                            "n_type"                => "invoice",
                            "n_doc"                 => $inv->i_d,
                            "n_notificationType"    => $in,
                            "n_notificationDue"     => $due,
                            "n_date"                => F::GetDate(),
                            "n_time"                => F::GetTime()
                        ]);
                    }
                }
            break;
            
            case "On Order":
                $inv_no = $inv->i_no;
                foreach(orders::getBy(['o_doc' => $inv_no, 'o_quantityType' => 'Yearly', 'o_status' => '4']) as $order){
                    
                    $date = $order->o_time;
                    $now  = F::getTime();
                    $bal  = $now - $date;
                    
                    foreach(explode(",", $inv->i_notificationDue) as $x){
                        
                        switch($x){
                            case  $bal > (60 * 60 * 24):
                                $due = Setting::getByValue("notificationDue", "1 Day");
                            break;
                            
                            case $bal > (60 * 60 * 24 * 3):
                                $due = Setting::getByValue("notificationDue", "3 Days");
                            break;
                            
                            case $bal > (60 * 60 * 24 * 7):
                                $due = Setting::getByValue("notificationDue", "1 Week");
                            break;
                            
                            case $bal > (60 * 60 * 24 * 14):
                                $due = Setting::getByValue("notificationDue", "2 Weeks");
                            break;
                            
                            case $bal > (60 * 60 * 24 * 30):
                                $due = Setting::getByValue("notificationDue", "1 Month");
                            break;
                            
                            case $bal > (60 * 60 * 24 * 90):
                                $due = Setting::getByValue("notificationDue", "3 Months");
                            break;
                            
                            case $bal > (60 * 60 * 24 * 180):
                                $due = Setting::getByValue("notificationDue", "6 Months");
                            break;
                            
                            default:
                                $due = 0;
                            break;
                        }
                        
                        $n = notifications::getBy([
                            "n_type"                => "order",
                            "n_doc"                 => $order->o_id,
                            "n_notificationType"    => $in,
                            "n_notificationDue"     => $due
                        ]);
                        
                        if(count($n) < 1){
                            //Send Email
                            
                            notifications::insertInto([
                                "n_type"                => "order",
                                "n_doc"                 => $order->o_id,
                                "n_notificationType"    => $in,
                                "n_notificationDue"     => $due,
                                "n_date"                => F::GetDate(),
                                "n_time"                => F::GetTime()
                            ]);
                        }
                    }
                }
                
                
            break;
        }
    }
}
    