<!-- Off-Canvas Mobile Menu-->
<div class="offcanvas-container" id="mobile-menu">
	    
	<?php
		if(isset($_SESSION['customer_id'])){
			$cus = customers::getBy(["c_id"=> $_SESSION['customer_id']]);
			if(count($cus) > 0){
				$cust = $cus[0];
				?>
				<a class="account-link" href="account-orders.html">
					<div class="user-ava"><img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/<?= (empty($cust->c_picture) ? "default.jpg" : $cust->c_picture) ?>" alt="Intelligent Ecommerce">
    				</div>
					<div class="user-info">
    					<h6 class="user-name"><?= $cust->c_name ?></h6><span class="text-sm text-white opacity-60">290 Reward points</span>
					</div>
				</a>
				<?php
			}
			
    		}else{
				$info = infos::getBy(["i_status" => 1]);
				if(count($info) > 0){
					?>
	    			<a class="account-link" href="account-orders.html">
		    			<div class="user-ava"><img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= $info[0]->i_mobileLogo ?>" alt="Intelligent Ecommerce">
	    				</div>
	    				<div class="user-info">
	    					<h6 class="user-name"><?= $info[0]->i_title ?></h6><span class="text-sm text-white opacity-60"></span>
						</div>
					</a>
	    			<?php
				}
    		}
	?>
    <nav class="offcanvas-menu">
        <ul class="menu">
			<?php
    	        foreach(menus::getBy(["m_status" => 1, "m_type" => 1]) as $m){
					$act = url::get("main");
					?>
					<li class="<?= ($m->m_url == $act ? "active" : "") ?>"><a href="<?= PORTAL?><?= $m->m_url ?>"><?= $m->m_name?></a></li>
					<?php
                }
            ?>
            <?php
            	if(isset($_SESSION['customer_id'])){
            		?>
            			<li class="">
							<span>
								<a href="<?= PORTAL_CUSTOMER ?>logout">
									<span>Logout</span>
								</a>
								<span class="sub-menu-toggle"></span>
							</span>
						</li>
            		<?php
            	}
            ?>
        </ul>
    </nav>
</div>