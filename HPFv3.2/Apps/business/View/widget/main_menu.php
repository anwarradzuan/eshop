<nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>
    <ul class="px-nav-content">
        <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
            <a href="<?= PORTAL ?>users/my-account">
                <img src="<?= PORTAL ?>assets/medias/profiles/<?= empty(UserSetting::detail()->cl_picture) ? "default.png" : UserSetting::detail()->cl_picture ?>" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;" />
            </a>
            
            <div class="font-size-16">
                <span class="font-weight-light">Hi, </span>
                <strong><?= F::TrimWord(UserSetting::detail()->cl_name , 16) ?></strong>
            </div>
            
            <div class="btn-group" style="margin-top: 4px;">
            <?php
                foreach(cm_menus::list(["where" => "cm_position LIKE '%User Profile%' AND cm_status = 1", "order" => "cm_order ASC"]) as $pm){
            ?>
                <a href="<?= PORTAL ?><?= AMenus::url($pm->cm_id) ?>" class="btn btn-xs btn-primary btn-outline">
                    <i class="<?= $pm->cm_icon ?>"></i>
                </a>
            <?php
                }
            ?>
            </div>
        </li>
    <?php
        $main = url::get(0);
        
        $nx = 0;
        foreach(cm_menus::list(["where" => "cm_status = 1 and cm_main = 0 AND cm_position LIKE '%Main%'", "order" => "cm_order ASC"]) as $m){
            $sub = cm_menus::getBy(["cm_main" => $m->cm_id, "cm_status" => 1]);
            
            if($main == "index" && $nx == 0){
                $mac = "active";
            }else{
                $mac = "";
            }
            
            if(count($sub) > 0){
        ?>
            <li class="px-nav-item px-nav-dropdown <?= url::get(0) == $m->cm_url ? "active" : "" ?>">
                <a href="#">
                    <i class="<?= $m->cm_icon ?>"></i>
                    <span class="px-nav-label"><?= $m->cm_name ?></span>
                </a>
                
                <ul class="px-nav-dropdown-menu">
                <?php
                    $nxx = 0;
                    foreach(cm_menus::list(["where" => "cm_main = " . $m->cm_id . " AND cm_status = 1 AND cm_position LIKE '%Main%'", "order" => "cm_order ASC"]) as $ms){
                    ?>
                    <li class="px-nav-item <?= (url::get(0) == $m->cm_url && empty(url::get(1)) && @$no++ == 0) ? "active" : (url::get(1) == $ms->cm_url ? "active" : "") ?> <?= !$nxx ? $mac : "" ?>">
                        <a href="<?= PORTAL_BUSINESS ?><?= $m->cm_url ?>/<?= $ms->cm_url ?>">
                            <i class="<?= $ms->cm_icon ?>"></i>
                            <span class="px-nav-label"><?= $ms->cm_name ?></span>
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
            <li class="px-nav-item <?= url::get(0) == $m->cm_url ? "active" : "" ?> <?= $mac ?>">
                <a href="<?= PORTAL ?><?= $m->cm_url ?>">
                    <i class="<?= $m->cm_icon ?>"></i>
                    <span class="px-nav-label"><?= $m->cm_name ?></span>
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
            
            $p = cm_menus::getBy(["cm_url" => $sub]);
            
            if(count($p) > 0){
                $p = $p[0];
                $no = 0;
                foreach(cm_menus::list(["where" => "cm_main = " . $p->cm_id . " AND cm_status = 1 AND cm_position LIKE '%Main%'", "order" => "cm_order ASC"]) as $v){
                    $childs = cm_menus::getBy(["cm_main" => $v->cm_id, "cm_status" => 1], ["order" => "cm_order ASC"]);
                    
                    if(count($childs) > 0){
                ?>
                    <li class="dropdown  <?= (empty(url::get(2)) && ($no == 0)) ? "active" : (url::get(2) == $v->cm_url ? "active" : "") ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="<?= $v->cm_icon ?>"></span> <?= $v->cm_name ?>
                        </a>
                        
                        <ul class="dropdown-menu">
                        <?php
                            
                            foreach($childs as $child){
                        ?>
                            <li class="<?= (empty(url::get(3)) && url::get(2) == $v->cm_url && (@$nox++ == 0)) ? "active" : url::get(3) == $child->cm_url ? "active" : "" ?>">
                                <a href="<?= PORTAL ?><?= url::get(0) ?>/<?= url::get(1) ?>/<?= $v->cm_url ?>/<?= $child->cm_url ?>">
                                    <span class="<?= $child->cm_icon ?>"></span> <?= $child->cm_name ?>
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
                    <li class="<?= (empty(url::get(2)) && ($no == 0)) ? "active" : url::get(2) == $v->cm_url ? "active" : "" ?>">
                        <a href="<?= PORTAL ?><?= url::get(0) ?>/<?= url::get(1) ?>/<?= $v->cm_url ?>">
                            <i class="<?= $v->cm_icon ?>"></i> <?= $v->cm_name ?>
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
                <a href="<?= PORTAL ?>orders/all-orders" >
				<span class="fa fa-bell fa-lg"></span>
				<span class="label label-danger" >0</span>
                </a>
            </li>
			<li class="dropdown">
                <a href="<?= PORTAL ?>logout">LOG OUT</a>
            </li>
            <!--<li class="dropdown">
				
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
            <ul class="dropdown-menu">
                <li><a href="<?= PORTAL ?>logout">LOG OUT</a></li>
                <li><a href="#">Second item</a></li>
                <li class="divider"></li>
                <li><a href="#">Third item</a></li>
            </ul>
            </li>-->
        </ul>
    </div>
</nav>
<?php
	$_token = F::UniqKey();
	$token = Token::create($_token, "notification");
 ?>
<script>
window.onload = function(){
	function notification(){
        $.ajax({
            url: "<?= PORTAL_BUSINESS ?>api/notification",
            method : "POST",
            data : {
                _token: "<?= $_token ?>",
                token: "<?= $token ?>",
                action: "noti"
            },
            dataType:"json"
        }).done(function(res){
            //console.log(res);
            if(res.status == "success"){
            	$result = "";
				rows = res.data;
				
				$("#noti").html(rows);
				
            }else{
                rows = 0;
				
				$("#noti").html(rows);
            }
        })
    };
};
</script>

<div class="px-content">
    <?php include_once(VIEW . "widget/page_header.php"); ?>