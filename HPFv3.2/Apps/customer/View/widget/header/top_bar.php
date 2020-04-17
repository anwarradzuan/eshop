<!-- Topbar-->
<div class="topbar">
    <div class="topbar-column">
    	<?php
			$info = infos::getBy(["i_status" => 1]);
			if(count($info) > 0){
				$info = $info[0];
		?>
	    	<a class="hidden-md-down" href="mailto:support@unishop.com">
	    		<i class="icon-mail"></i>&nbsp; <?= $info->i_email ?>
	    	</a>
	    	<a class="hidden-md-down" href="tel:00331697720">
	    		<i class="icon-bell"></i>&nbsp; <?= $info->i_phone ?>
	    	</a>
			<a class="social-button sb-facebook shape-none sb-dark" href="https://www.facebook.com/intelhost.my/" target="_blank">
				<i class="socicon-facebook"></i>
			</a>
			<a class="social-button sb-google shape-none sb-dark" href="https://plus.google.com/100750639778478267038" target="_blank">
				<i class="socicon-google"></i>
			</a>
	    	<a class="social-button sb-instagram shape-none sb-dark" href="#" target="_blank">
	    		<i class="socicon-instagram">
	    		</i>
	    	</a>
	    	<a class="social-button sb-pinterest shape-none sb-dark" href="#" target="_blank">
	    		<i class="socicon-pinterest"></i>
	    	</a>
    	<?php
    		}
    	?>
    </div>
    <div class="topbar-column">
    	<a class="" href="<?= PORTAL_BUSINESS ?>"><i class="icon-box"></i>&nbsp; Sell center</a>
    	<!-- <a class="hidden-md-down" href="#"><i class="icon-download"></i>&nbsp; Get mobile app</a> -->
        <div class="lang-currency-switcher-wrap">
            <div class="lang-currency-switcher dropdown-toggle">
            	<span class="language">
            		<img alt="English" src="<?= PORTAL?>assets/medias/iecommerce/img/flags/GB.png">
            	</span>
            	<span class="currency">$ USD</span></div>
            <div class="dropdown-menu">
                <div class="currency-select">
                    <select class="form-control form-control-rounded form-control-sm">
                        <option value="usd">$ USD</option>
                        <option value="usd">€ EUR</option>
                        <option value="usd">£ UKP</option>
                        <option value="usd">¥ JPY</option>
                    </select>
                </div><a class="dropdown-item" href="#"><img src="<?= PORTAL?>assets/medias/iecommerce/img/flags/FR.png" alt="Français">Français</a><a class="dropdown-item" href="#"><img src="<?= PORTAL?>assets/medias/iecommerce/img/flags/DE.png" alt="Deutsch">Deutsch</a><a class="dropdown-item" href="#"><img src="<?= PORTAL?>assets/medias/iecommerce/img/flags/IT.png" alt="Italiano">Italiano</a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar-->