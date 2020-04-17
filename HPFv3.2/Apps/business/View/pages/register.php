
<style>
body  {
	background-image: url("<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/Untitled-1.jpg");
	height: 100%;
	background-position: center;
	background-repeat: repeat;
}

.widget-pricing,
.pricing-page-customers-logos {
	max-width: 800px;
}

.pricing-page-header.page-header {
	margin-bottom: 0;
	padding-top: 80px;
	padding-bottom: 160px;
	border: none;
	border-radius: 0;
	background-color: rgba(255,255,255,0);
}

.widget-pricing {
	margin-top: -90px;
}

.pricing-page-customers {
	margin-top: 50px;
	margin-bottom: 50px;
	background: rgba(0, 0, 0, .04);
}

.pricing-page-customers-logos {
	margin: 0 auto;
	opacity: .4;
}

.pricing-page-customers-logos img {
	height: 50px;
	margin: 0 10px;
}

.page-signin-header {
    box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
}

.page-signin-header .btn {
    position: absolute;
    top: 12px;
    right: 15px;
}

@media (min-width: 544px) {
    .page-signin-container {
        width: 350px;
        margin: 60px auto;
    }
    
}
@media (max-width: 544px) {
    .front-e{
    	display: none;
    }
}

.elogo{
	width:100px !important;
	position: absolute; 
	left: 0;
}
@media (max-width: 544px) {
    .elogo{
    	right:0 !important;
    	left: auto;
    }
}
.page-signin-social-btn {
    width: 40px;
    padding: 0;
    line-height: 40px;
    text-align: center;
    border: none !important;
}

#page-signin-forgot-form { 
    display: none; 
}
</style>

<div class="page-signin-header p-a-2 text-sm-center bg-white">
	<a class="" href="<?= PORTAL_PUBLIC ?>">
		<img src="<?= PORTAL_PUBLIC ?>assets/medias/iecommerce/img/logo/1.png" alt="Intelligent eCommerce" class ="elogo" style="">
	</a>
    <a class="px-demo-brand px-demo-brand-lg text-default" href="<?= PORTAL_BUSINESS ?>" style="">
        <?= APP_NAME ?>
    </a>
    
    <div class="front-e" style=""><a href="<?= PORTAL_PUBLIC ?>" target="_blank" class="btn btn-primary">Front End</a></div>
</div>

<div class="container">
	<div class="px-content">
<?php
	$bool = false;
	if(!empty(url::get(1))){
		$key = url::get(1);
		
		$p = packages::getBy(['p_key' => $key, "p_status" => 1]);
		
		if(count($p) > 0){
			$p = $p[0];
			$bool = true;
		}
	}
	if(!$bool){
?>
		<div class="pricing-page-header page-header panel" style="padding-bottom: 0px !important">
			<div class="col-md-12 text-xs-center">
				<h1 class="text-xs-center font-size-24 font-weight-bold m-b-1">Get started with NO FEE and NO TRIAL.</h1>
			</div>
			
			<p class="text-xs-center m-b-4 font-size-18 text-muted">Easy setup. Create business in a minutes. No credit card required.</p>
			
			
			<div class="panel">
				<div class="panel-body" style="max-height: 500px; overflow-y: scroll;">
				<?php
					$m = menus::getBy(["m_url" => "htac"]);
					
					if(count($m)){
						$m = $m[0];
						
						echo $m->m_content;
					}
				?>
				</div>
			</div>
			<div class="col-md-12 text-xs-center">
				<a class="btn btn-lg btn-primary font-weight-bold" href="<?= F::URLParams() ?>/PACKAGE5D7320D1A76A7" >START FOR FREE</a>
			</div>
		</div>
	<?php
		}else{
		new Controller ($_POST);
	?>
		<div class="panel">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-9 col-sm-10">
						<a href="<?= PORTAL ?>register" class="btn btn-primary btn-sm">
							<span class="fa fa-arrow-left"></span>
						</a>
						
						<strong><?= $p->p_name ?></strong> - Registration Form
					</div>
					
					<div class="col-md-3 col-sm-2 text-right">
						<a href="<?= PORTAL ?>" class="btn btn-sm btn-danger">
							<span class="fa fa-close"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<form method="POST" action="">
		<div class="row">
			<div class="col-md-6">
				<div class="panel" style="padding-bottom: 6px">
					<div class="panel-heading">
						<span class="fa fa-user"></span> Personal Information
					</div>
					
					<div class="panel-body">
						Full Name:
						<input type="text" class="form-control name" placeholder="Full Name" name="cl_name" required/><br />
						
						Phone:
						<input type="tel" class="form-control telephone" placeholder="Phone" name="cl_telephone" required/><br />
						
						Email:
						<input type="email" class="form-control email" placeholder="Email" name="cl_email" required/><br />
						
						Username:
						<input type="text" class="form-control email" placeholder="Username" name="username" required/><br />
						
						Password:
						<input type="password" class="form-control password" placeholder="Password" name="cl_password" required/><br />
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel" style="padding-bottom: 0px">
					<div class="panel-heading">
						<span class="fa fa-building"></span> Company Information
					</div>
					
					<div class="panel-body">
						Name:
						<input type="text" class="form-control name" placeholder="Company Name" name="comp_name" required/><br />
						
						Registration No:
						<input type="text" class="form-control regno" placeholder="Company Reg No" name="comp_regno" required/><br />
						
						Phone:
						<input type="tel"  class="form-control telephone" placeholder="Company Phone Number" name="comp_telephone" required/><br />
						
						Email:
						<input type="email" class="form-control email" placeholder="Company Email" name="comp_email" required/><br />
						<div class="g-recaptcha" data-sitekey="6LfwVcoUAAAAAAmpXptMRbecE5U-RJbt7rH9agdC" align="center"></div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 text-center">
				<!-- <button class="btn btn-success register-next">
					<span class="fa fa-arrow-right"></span> Next
				</button> -->
				<input type="hidden" name="CSRFToken" value="OWY4NmQwODE4ODRjN2Q2NTlhMmZlYWEwYzU1YWQwMTVhM2JmNGYxYjJiMGI4MjJjZDE1ZDZMGYwMGEwOA==">
				<button class="btn btn-success register-next">
					<span class="fa fa-arrow-right"></span> Submit
				</button>
				<?php
					Controller::Form(
						"membership", 
						[
							"action"  => "registermember"  
						]
					);
				?>
				
			<?php
				$_token = hash("sha256", F::UniqKey());
				$token = Token::create($_token, "REGISTER_");
				
				Page::script(<<<SCRIPT
				console.log(PORTAL);
				$(".register-next").on("click", function(){
					
					var personal = new FormData(document.getElementById("personal"));
					
					$.ajax({
						method: "POST",
						url: PORTAL + "api/clients",
						data:{
							_token		: "$_token",
							token		: "$token",
							name		: $("#personal > .name").val(),
							telephone	: $("#personal > .telephone").val(),
							email		: $("#personal > .email").val(),
							password	: $("#personal > .password").val(),
							cname		: $("#company > .name").val(),
							ctelephone	: $("#company > .telephone").val(),
							cemail		: $("#company > .email").val(),
							cregno		: $("#company > .regno").val()
						},
						dataType: "text"
					}).done(function(res){
						console.log(res);
						if(res.status == "status"){
							console.log("Success");
						}else{
							console.log("Fail on api");
						}
					}).fail(function(){
						console.log("FAILLL");
					});
				});
SCRIPT
);
?>
			</div>
		</div>
		</form>
	<?php
	}
	?>
	</div>
</div>
