<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
<?php
new Controller($_POST);
    //Page::load("widget/public/page_title");
?>
<?php
	$ban = banners::getBy(["b_position" => 3, "b_status" => 1], ["order" => "b_time DESC", "limit" => 1]);
    if(count($ban) > 0){
    	$ban = $ban[0];
?>
<section class="hero-slider" style="top: 10px; background-image: url(<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/banners/<?= $ban->b_file ?>);">
	<div class="text-center" style="margin-top:5%;" >
		<h1 style="font-size: 6vmin; font-family: 'Raleway', sans-serif; color: white ;"><b>Hi,</b><br /></h1>
		<h1 style="font-size: 10vmin; font-family: 'Raleway', sans-serif; color: white;"><b> How Can We <br /></h1>
		<h1 style="font-size: 8vmin; font-family: 'Raleway', sans-serif; color: white;"><b>Help You?</b></h1>
	</div>
</section><br /><br />
<?php
	}
?>
  <!-- Page Content-->
	<div class="container padding-bottom-2x mb-2">
		<div class="row">
			<div class="col-md-4">
				<div class="display-3 text-muted opacity-75 mb-30">Hot Line</div>
			</div>
			<div class="col-md-8">
				<ul class="list-icon">
					<li> <i class="icon-mail"></i><a class="navi-link" href="mailto:customer.service@unishop.com">support@intelhost.com.my</a></li>
					<li> <i class="icon-bell"></i>+6012-283 6731 OR +607-521 1178</li>
				</ul>
			</div>
		</div>
		<hr class="">
		<form method="POST">
			<div class="row margin-top-2x">
				<div class="col-md-4">
					<div class="display-3 text-muted opacity-75 mb-30">Email Us</div>
				</div>
				<div class="col-md-4">
					Email:
					<input class="form-control" type="email" name="email" required>
				</div>
				<div class="col-md-4">
					Subject:
					<input class="form-control" type="text" name="subject" required>
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
					Message:
					<textarea class="form-control" name="message" required ></textarea><br />
					<div class="g-recaptcha" data-sitekey="6LfwVcoUAAAAAAmpXptMRbecE5U-RJbt7rH9agdC" align="center"></div>
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-8 text-right">
					<button class="btn btn-primary">Send</button>
				</div>
			</div>
			<input type="hidden" name="CSRFToken" value="OWY4NmQwODE4ODRjN2Q2NTlhMmZlYWEwYzU1YWQwMTVhM2JmNGYxYjJiMGI4MjJjZDE1ZDZMGYwMGEwOA==">
			<?php
				Controller::form("public/contact_us",
				[
				"action"  => "send"  
				]);
			?>
		</form>
		<hr class="">
		<div class="row margin-top-2x">
			<div class="col-md-4">
				<div class="display-3 text-muted opacity-75 mb-30">Location</div>
			</div>
			<div class="col-md-8 text-right">
				<div class="embed-responsive embed-responsive-16by9" style="height: 351px;">
					<iframe src="https://maps.google.com/maps?q=1.540444,103.631467&hl=es;z=14&amp;output=embed" class="embed-responsive-item" frameborder="10" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>