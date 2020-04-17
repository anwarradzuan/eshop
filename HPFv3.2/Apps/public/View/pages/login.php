<?php
new Controller ($_POST);
?> 
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
<?php
	Page::load("widget/public/page_title");
?>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-2">
		<div class="row">
			<div class="col-md-6">
			<form class="login-box" method="post" action="">
				<h4 class="margin-bottom-1x">Member Login</h4>
				<div class="form-group input-group">
					<input class="form-control" name="username" type="text" placeholder="Email or Username" required><span class="input-group-addon"><i class="icon-head"></i></span>
				</div>
				<div class="form-group input-group">
					<input class="form-control" name="password" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
				</div>
					<div class="g-recaptcha" data-sitekey="6LfwVcoUAAAAAAmpXptMRbecE5U-RJbt7rH9agdC" align="center"></div>
				<div class="text-center">
					<?php
						Controller::form("public/login",
						[
						"type"  => "login2"  
						]);
					?>
					<button class="btn btn-primary btn-block margin-bottom-none" type="submit">Login</button><br />
					<a class="navi-link" href="<?= PORTAL ?>forgot_password">Forgot password?</a>
				</div>
			</form>
			</div>
			<div class="col-md-6">
				<div class="padding-top-3x hidden-md-up"></div>
				<h3 class="margin-bottom-1x">No Account? Register</h3>
				<p>Registration takes less than a minute but gives you full control over your orders.</p>
				<form class="row" method="post" action="">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="reg-fn">Full Name</label>
							<input class="form-control" type="text" id="reg-fn" name="c_name" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-fn">Username</label>
							<input class="form-control" type="text" id="reg-fn" name="c_login" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-email">E-mail Address</label>
							<input class="form-control" type="email" id="reg-email" name="c_email" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-pass">Password</label>
							<input class="form-control" type="password" id="reg-pass" name="n_pass" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-pass-confirm">Confirm Password</label>
							<input class="form-control" type="password" id="reg-pass-confirm" name="c_pass" required>
						</div>
					</div>
					<div class="col-md-12 text-center">
						<div class="g-recaptcha" data-sitekey="6LfwVcoUAAAAAAmpXptMRbecE5U-RJbt7rH9agdC" align="center"></div>
					</div>
					
					<div class="col-12 text-center text-sm-right">
						<button class="btn btn-primary margin-bottom-none btn-block" type="submit">Register</button>
						<?php
							Controller::form("public/register", ["action" => "register"]);
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<div class="site-backdrop"></div>