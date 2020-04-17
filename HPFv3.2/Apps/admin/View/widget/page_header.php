<div class="page-header">
    <h1>
    <?php
        if(url::get(0) != "index"){
            $p = a_menus::getBy(['m_url' => url::get('main')], ['m_status' => 1]);
            		
            if(count ($p) > 0){
                $p = $p[0];
                
                if(!empty(url::get(1))){
                ?>
                    <span class="text-muted font-weight-light">
                        <span class="<?= $p->m_icon ?>"></span> <?= $p->m_name ?> /
                    </span>
                <?php
                    $m = a_menus::getBy(["m_url" => url::get(1), "m_main" => $p->m_id], ["order" => "m_order ASC"]);
                        
                    if(count($m) > 0){
        	            $m = $m[0];
        	            
        	            if(!empty(url::get(2))){
                            $mx = a_menus::getBy(["m_url" => url::get(2), "m_main" => $m->m_id], ["order" => "m_order ASC"]);
                            ?>
                            <span class="text-muted font-weight-light">
                                <span class="<?= $m->m_icon ?>"></span> <?= $m->m_name ?> /
                            </span>
                            <?php
                            if(count($mx) > 0){
                                $mx = $mx[0];
                                echo '<span class="' . $mx->m_icon .'"></span> ' .  $mx->m_name;
                            }else{
                                //echo "Not Found";
                            }
                        }else{
                            $view = a_menus::list(["where" => "m_main = " . $m->m_id . " AND m_status = 1", "order" => "m_order ASC"]);
                            
                            if(count($view) > 0){
                                $view = $view[0];
                            ?>
                                <span class="text-muted font-weight-light">
                                    <span class="<?= $m->m_icon ?>"></span> <?= $m->m_name ?> / 
                                </span>
                                <span class="<?= $view->m_icon ?>"></span> <?= $view->m_name ?>  
                            <?php
                            }else{
                            ?>
                                <span class="<?= $m->m_icon ?>"></span> <?= $m->m_name ?> 
                            <?php
                            }
                        }
        	        }else{
    	                //echo "Not Found";
        	        }
                }else{
                    $sub = a_menus::list(["where" => "m_main = " . $p->m_id . " AND m_status = 1", "order" => "m_order DESC"]);
                    
                    if(count($sub) > 0){
                        $sub = $sub[0];
                    ?>
                        <span class="text-muted font-weight-light">
                            <span class="<?= $p->m_icon ?>"></span> <?= $p->m_name ?> / 
                        </span>
                        <span class="<?= $sub->m_icon ?>"></span> <?= $sub->m_name ?> 
                    <?php
                    }else{
                    ?>
                        <span class="<?= $p->m_icon ?>"></span> <?= $p->m_name ?>
                    <?php
                    }
                }
            }
        }else{
            $p = a_menus::list(["where" => "m_status = 1 AND m_main = 0", "order" => "m_order ASC"]);
        		
            if(count ($p) > 0){
                $p = $p[0];
                
                 $m = a_menus::list(["where" => "m_main = " . $p->m_id . " AND m_status = 1", "order" => "m_order ASC"]);
                
                if(count($m) > 0){
                ?>
                    <span class="text-muted font-weight-light">
                        <span class="<?= $p->m_icon ?>"></span> <?= $p->m_name ?> /
                    </span>
                <?php
    	            $m = $m[0];
    	            
    	            $view = a_menus::list(["where" => "m_main = " . $m->m_id . " AND m_status = 1", "order" => "m_order ASC"]);
    	            
    	            if(count($view) > 0){
                       $view = $view[0];
                    ?>
                        <span class="text-muted font-weight-light">
                            <span class="<?= $m->m_icon ?>"></span> <?= $m->m_name ?> /
                        </span>
                    <?php
                        echo '<span class="' . $view->m_icon .'"></span> ' .  $view->m_name;
                    }else{
                    ?>
                        <span class="<?= $m->m_icon ?>"></span> <?= $m->m_name ?> 
                    <?php
                    }
                }else{
                ?>
                    <span class="<?= $p->m_icon ?>"></span> <?= $p->m_name ?>
                <?php
                }
                
                
            }else{
                //echo "None";
            }
        }
        
    ?>
    </h1>

</div>