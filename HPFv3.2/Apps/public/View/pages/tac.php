<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
	<?php
	    Page::load("widget/public/page_title");
	?>
	<div class="container padding-top-1x mb-2">
		<div class="row align-items-center padding-bottom-2x">
	      	<div class="col-md-12 order-md-1">
	        	<div class="mt-30 hidden-md-up"></div>
	        	<?php
	        		$url = url::get(0);
	        		$page = menus::getBy(["m_url" => $url]);
					
					if(count($page) > 0){
						$page = $page[0];
						?>
							<?= $page->m_content ?>
						<?php
					}else{
						echo "Comming Soon";
					}
	        	?>
	        	<a class="text-medium text-decoration-none" href="<?= PORTAL_PUBLIC ?>shop">Shop Now <i class="icon-arrow-right"></i></a>
	      	</div>
	    </div>
	    <hr>
	    <div class="row align-items- padding-bottom-2x">
	      	<div class="col-md-4"><img class="d-block w-200 m-auto" src="<?= PORTAL?>assets/medias/iecommerce/img/features/01.jpg" alt="Online Shopping"></div>
	      	<div class="col-md-4 order-md-2"><img class="d-block w-200 m-auto" src="<?= PORTAL?>assets/medias/iecommerce/img/features/02.jpg" alt="Delivery"></div>
	    	<div class="col-md-4"><img class="d-block w-200 m-auto" src="<?= PORTAL?>assets/medias/iecommerce/img/features/03.jpg" alt="Mobile App"></div>
	    </div>
	</div>
</div>
<!-- Back To Top Button-->
<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>