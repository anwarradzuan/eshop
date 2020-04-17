<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
	<?php
	    //Page::load("widget/public/page_title");
	?>
	<?php
		$ban = banners::getBy(["b_position" => 2, "b_status" => 1], ["order" => "b_time DESC", "limit" => 1]);
        if(count($ban) > 0){
        	$ban = $ban[0];
	?>
	<section class="hero-slider" style="top: 10px; background-image: url(<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/banners/<?= $ban->b_file ?>);">
		<div class="text-center" style="margin-top:6%;" >
			<h1 style="font-size: 6vmin; font-family: 'Raleway', sans-serif; color: white;"><b>IT'S<br /></h1>
			<h1 style="font-size: 10vmin; font-family: 'Raleway', sans-serif; color: white;"><b>Shopping <br /></h1>
			<h1 style="font-size: 8vmin; font-family: 'Raleway', sans-serif; color: white;"><b>Time!</b></h1>
		</div>
	</section>
	<?php
		}
	?>
  <!-- Page Content-->
	<div class="container padding-top-2x mb-2">
		<div class="row align-items-center padding-bottom-2x">
	      	<div class="col-md-12 order-md-1 text-center">
	        	<div class="mt-30 hidden-md-up"></div>
	        	<?php
	        		$url = url::get(0);
	        		$page = pages::getBy(["p_url" => $url]);
					
					if(count($page) > 0){
						$page = $page[0];
						?>
							<?= $page->p_content ?>
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
	    <!-- <hr>
	    <div class="text-center padding-top-3x mb-30">
	      <h2>Our Core Team</h2>
	      <p class="text-muted">People behind your awesome shopping experience.</p>
	    </div>
	    <div class="row">
	      <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="<?= PORTAL?>assets/medias/iecommerce/img/team/01.jpg" alt="Team">
	        <h6>Grace Wright</h6>
	        <p class="text-muted mb-2">Founder, CEO</p>
	        <div class="social-bar"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
	      </div>
	      <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="<?= PORTAL?>assets/medias/iecommerce/img/team/02.jpg" alt="Team">
	        <h6>Taylor Jackson</h6>
	        <p class="text-muted mb-2">Financial Director</p>
	        <div class="social-bar"><a class="social-button shape-circle sb-skype" href="#" data-toggle="tooltip" data-placement="top" title="Skype"><i class="socicon-skype"></i></a><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-paypal" href="#" data-toggle="tooltip" data-placement="top" title="PayPal"><i class="socicon-paypal"></i></a></div>
	      </div>
	      <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="<?= PORTAL?>assets/medias/iecommerce/img/team/03.jpg" alt="Team">
	        <h6>Quinton Cross</h6>
	        <p class="text-muted mb-2">Marketing Director</p>
	        <div class="social-bar"><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a><a class="social-button shape-circle sb-email" href="#" data-toggle="tooltip" data-placement="top" title="Email"><i class="socicon-mail"></i></a></div>
	      </div>
	      <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="<?= PORTAL?>assets/medias/iecommerce/img/team/04.jpg" alt="Team">
	        <h6>Liana Mullen</h6>
	        <p class="text-muted mb-2">Lead Designer</p>
	        <div class="social-bar"><a class="social-button shape-circle sb-behance" href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="socicon-behance"></i></a><a class="social-button shape-circle sb-dribbble" href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="socicon-dribbble"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a></div>
	      </div>
	    </div> -->
	</div>
</div>
<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>