<nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>
    <ul class="px-nav-content">
        <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
            <a href="<?= PORTAL ?>users/my-account">
                <img src="<?= PORTAL ?>assets/medias/profiles/<?= empty(UserSetting::detail()->user_picture) ? "default.png" : UserSetting::detail()->user_picture ?>" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;" />
            </a>
            
            <div class="font-size-16">
                <span class="font-weight-light">Hi, </span>
                <strong><?= F::TrimWord(UserSetting::detail()->user_name , 16) ?></strong>
            </div>
            
            <div class="btn-group" style="margin-top: 4px;">
            <?php
                foreach(a_menus::list(["where" => "m_position LIKE '%User Profile%' AND m_status = 1", "order" => "m_order ASC"]) as $pm){
            ?>
                <a href="<?= PORTAL ?><?= AMenus::url($pm->m_id) ?>" class="btn btn-xs btn-primary btn-outline">
                    <i class="<?= $pm->m_icon ?>"></i>
                </a>
            <?php
                }
            ?>
            </div>
        </li>
    <?php
        $main = url::get(0);
        
        $nx = 0;
        foreach(a_menus::list(["where" => "m_status = 1 and m_main = 0 AND m_position LIKE '%Main%'", "order" => "m_order ASC"]) as $m){
            $sub = a_menus::getBy(["m_main" => $m->m_id, "m_status" => 1]);
            
            if($main == "index" && $nx == 0){
                $mac = "active";
            }else{
                $mac = "";
            }
            
            if(count($sub) > 0){
        ?>
            <li class="px-nav-item px-nav-dropdown <?= url::get(0) == $m->m_url ? "active" : "" ?>">
                <a href="#">
                    <i class="<?= $m->m_icon ?>"></i>
                    <span class="px-nav-label"><?= $m->m_name ?></span>
                </a>
                
                <ul class="px-nav-dropdown-menu">
                <?php
                    $nxx = 0;
                    foreach(a_menus::list(["where" => "m_main = " . $m->m_id . " AND m_status = 1 AND m_position LIKE '%Main%'", "order" => "m_order ASC"]) as $ms){
                    ?>
                    <li class="px-nav-item <?= (url::get(0) == $m->m_url && empty(url::get(1)) && @$no++ == 0) ? "active" : (url::get(1) == $ms->m_url ? "active" : "") ?> <?= !$nxx ? $mac : "" ?>">
                        <a href="<?= PORTAL ?><?= $m->m_url ?>/<?= $ms->m_url ?>">
                            <i class="<?= $ms->m_icon ?>"></i>
                            <span class="px-nav-label"><?= $ms->m_name ?></span>
                        </a>
                    </li>
                    <?php
                    $nxx++;
                    }
                ?>
                </ul>
            </li>
        <?php  
            }else{
        ?>
            <li class="px-nav-item <?= url::get(0) == $m->m_url ? "active" : "" ?> <?= $mac ?>">
                <a href="<?= PORTAL ?><?= $m->m_url ?>">
                    <i class="<?= $m->m_icon ?>"></i>
                    <span class="px-nav-label"><?= $m->m_name ?></span>
                </a>
            </li>
        <?php
            }
            $nx++;
        }
    ?>
    </ul>
</nav>

<nav class="navbar px-navbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><?= APP_NAME ?></a>
    </div>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>
    <div class="collapse navbar-collapse" id="px-navbar-collapse">
        <ul class="nav navbar-nav">
        <?php
            $sub = url::get(1);
            
            $p = a_menus::getBy(["m_url" => $sub]);
            
            if(count($p) > 0){
                $p = $p[0];
                $no = 0;
                foreach(a_menus::list(["where" => "m_main = " . $p->m_id . " AND m_status = 1 AND m_position LIKE '%Main%'", "order" => "m_order ASC"]) as $v){
                    $childs = a_menus::getBy(["m_main" => $v->m_id, "m_status" => 1], ["order" => "m_order ASC"]);
                    
                    if(count($childs) > 0){
                ?>
                    <li class="dropdown  <?= (empty(url::get(2)) && ($no == 0)) ? "active" : (url::get(2) == $v->m_url ? "active" : "") ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="<?= $v->m_icon ?>"></span> <?= $v->m_name ?>
                        </a>
                        
                        <ul class="dropdown-menu">
                        <?php
                            
                            foreach($childs as $child){
                        ?>
                            <li class="<?= (empty(url::get(3)) && url::get(2) == $v->m_url && (@$nox++ == 0)) ? "active" : url::get(3) == $child->m_url ? "active" : "" ?>">
                                <a href="<?= PORTAL ?><?= url::get(0) ?>/<?= url::get(1) ?>/<?= $v->m_url ?>/<?= $child->m_url ?>">
                                    <span class="<?= $child->m_icon ?>"></span> <?= $child->m_name ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li class="<?= (empty(url::get(2)) && ($no == 0)) ? "active" : url::get(2) == $v->m_url ? "active" : "" ?>">
                        <a href="<?= PORTAL ?><?= url::get(0) ?>/<?= url::get(1) ?>/<?= $v->m_url ?>">
                            <i class="<?= $v->m_icon ?>"></i> <?= $v->m_name ?>
                        </a>
                    </li>
                <?php
                    }
                    
                    $no++;
                }
            }
        ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-angle-double-down fa-4x"></span>
                </a>
            <ul class="dropdown-menu">
                <li><a href="<?= PORTAL ?>logout">LOG OUT</a></li>
                <!-- <li><a href="#">Second item</a></li>
                <li class="divider"></li>
                <li><a href="#">Third item</a></li> -->
            </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="px-content">
    <?php include_once(VIEW . "widget/page_header.php"); ?>