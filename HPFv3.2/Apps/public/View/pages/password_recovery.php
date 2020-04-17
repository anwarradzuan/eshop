<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
<?php
	new Controller($_POST);
?>
	<!-- Page Title-->
	<div class="page-title">
	    <div class="container">
	        <div class="column">
	        <?php
	            $t = url::get(0);
	            $x = url::get(1);
	            $y = menus::getBy(["m_url" => $t]);
	            if(count($y) > 0){
	                $y= $y[0];
	        ?>
	                <h1><?= $y->m_name?></h1>
	        
	        </div>
	        <div class="column">
	            <?php
	                if(!empty($x)){
	                        ?>
	                        <ul class="breadcrumbs">
	                            <li>
	                                <a href="<?= PORTAL?>">Home</a>
	                            </li>
	                            <li class="separator">&nbsp;</li>
	                            <li><a href=""><?= $y->m_name?></a></li>
	                        </ul>
	                        <?php
	                }else{
	                    ?>
	                    <ul class="breadcrumbs">
	                        <li>
	                            <a href="<?= PORTAL?>">Home</a>
	                        </li>
	                        <li class="separator">&nbsp;</li>
	                        <li><?= $y->m_name?></li>
	                    </ul>
	                    <?php
	                }
	            ?>
	            
	        </div>
	        <?php
	            }
	        ?>
	    </div>
	</div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
            	<?php
            		$key = url::get(1);
					
					if(!empty($key)){
						$keys = password_recovery::getBy(["pr_key" => $key]);
						
						if(count($keys) > 0){
							$key = $keys[0];
							
							if($key->pr_expired > F::GetTime() AND $key->pr_status == 0){
								
								?>
								<h2>Customer Account Recovery</h2>
				                <p>Please insert your email and new password</p>
				                <form class="card mt-4" method="POST" action="">
				                    <div class="card-body">
				                        <div class="form-group">
				                            <label for="email-for-pass">Email</label>
				                            <input class="form-control" type="email" id="email-for-pass" name="email" required><small class="form-text text-muted">Type in the email address you used when you registered with Intelligent Ecommerce.</small>
				                        	<label for="email-for-pass">New Password</label>
				                            <input class="form-control" type="password" id="" name="password" required><small class="form-text text-muted"></small>
				                        
				                        </div>
				                    </div>
				                    <div class="card-footer text-right">
				                        <button class="btn btn-primary" type="submit">Submit</button>
				                        <input type="hidden" name="key" value="<?= $key->pr_key ?>" />
				                    </div>
				                    <?php
				                    	Controller::form("public/password_recovery",
										[
										"action"  => "reset_pass"  
										]);
				                    ?>
				                </form>
								<?php
							}elseif($key->pr_expired > F::GetTime() AND $key->pr_status == 1){
								new Alert("info", "Your password has been successfully updated.");
								echo "<div class='col-md-12 text-center'><a class='btn btn-danger btn-sm'	href='" . PORTAL_PUBLIC . "login'><span class='fa fa-arrow-left'></span> Login</a></div>";
							}else{
								new Alert("error", "Sorry, requested URL not found in our database.  Please make sure you are using a correct URL to access this page.");
								echo "<div class='col-md-12 text-center'><a class='btn btn-danger btn-sm'	href='" . PORTAL_PUBLIC . "'><span class='fa fa-arrow-left'></span> Back to Home</a></div>";
							}
						}else{
							new Alert("error", "Sorry, requested URL not found in our database.  Please make sure you are using a correct URL to access this page.");
							echo "<div class='col-md-12 text-center'><a class='btn btn-danger btn-sm'	href='" . PORTAL_PUBLIC . "'><span class='fa fa-arrow-left'></span> Back to Home</a></div>";
						}
					}else{
						new Alert("error", "Sorry, requested URL not found in our database. Please make sure you are using a correct URL to access this page.");
						echo "<div class='col-md-12 text-center'><a class='btn btn-danger btn-sm'	href='" . PORTAL_PUBLIC . "'><span class='fa fa-arrow-left'></span> Back to Home</a></div>";
					}
            	?>
                
            </div>
        </div>
    </div>
<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>