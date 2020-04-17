<?php

?>
<style>
body  {
  background-image: url("<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/Untitled-1.jpg");
  /*background-color: #cccccc;*/
 height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: repeat;
}
.page-signin-header {
    box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
}

.page-signin-header .btn {
    position: absolute;
    top: 12px;
    right: 15px;
}

html[dir="rtl"] .page-signin-header .btn {
    right: auto;
    left: 15px;
}

.page-signin-container {
    width: auto;
    margin: 30px 10px;
}

.page-signin-container form {
    border: 0;
    box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
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
<?php
new Controller($_POST);
	$key = url::get(1);
	if(!empty($key)){
		$keys = password_recovery::getBy(["pr_key" => $key]);
		
		if(count($keys) > 0){
			$keys = $keys[0];
			
			if($keys->pr_expired > F::GetTime() AND $keys->pr_status == 0){
				
				?>
				<div class="page-signin-container" id="page-signin-form">
				    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20" style="color:">Reset Password</h2>
				    
				    <form action="" method="POST" class="panel p-a-4" style="opacity: 0.9">
				    	<?php new Alert("info", "Please insert your regitered email and new password"); ?>
				        <fieldset class=" form-group form-group-lg">
				            <input type="text" class="form-control" name="email" placeholder="Email" required>
				        </fieldset>
				        
				        <fieldset class=" form-group form-group-lg">
				            <input type="password" class="form-control" name="password" placeholder="New Password" required>
				        </fieldset>
				        
				        <div class="clearfix">
				            <a href="#" class="font-size-12 text-muted pull-xs-right" id="page-signin-forgot-link">Forgot your password?</a>
				        </div>
				        <input type="hidden" name="key" value="<?= $keys->pr_key ?>" />
				        <?php Controller::form("password_recovery"); ?>
				        <button class="btn btn-block btn-lg btn-primary m-t-3">Confirm</button>
				    </form>
				</div>
				<?php
				
			}else{
				new Alert("error", "Requested URL has expired. Please request new URL.");
				echo "<a class='btn btn-danger btn-sm'	href='" . PORTAL_BUSINESS . "'><span class='fa fa-arrow-left'></span> Got To Home</a>";
			}
		}else{
			new Alert("error", "Sorry, requested URL not found in our database.  Please make sure you are using a correct URL to access this page.");
		}
	}else{
		new Alert("error", "Sorry, requested URL not found in our database.  Please make sure you are using a correct URL to access this page.");		
	}
?>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    