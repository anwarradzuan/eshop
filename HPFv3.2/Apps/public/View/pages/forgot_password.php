<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
<?php
	new Controller($_POST);
    Page::load("widget/public/page_title");
?>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2>Forgot your password?</h2>
                <p>Change your password in three easy steps. This helps to keep your new password secure.</p>
                <ol class="list-unstyled">
                    <li><span class="text-primary text-medium">1. </span>Fill in your email address below.</li>
                    <li><span class="text-primary text-medium">2. </span>We'll email you a recovary link to reset your password.</li>
                    <li><span class="text-primary text-medium">3. </span>Use the link in your email to change your password on our secure website.</li>
                </ol>
                <form class="card mt-4" method="POST" action="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email-for-pass">Enter your email address</label>
                            <input class="form-control" type="email" id="email-for-pass" name="email" required><small class="form-text text-muted">Type in the email address you used when you registered with Intelligent Ecommerce. Then we'll email a recovery link to this address.</small>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                    <?php
                    	Controller::form("public/request_password_recovery",
						[
						"action"  => "request_reset"  
						]);
                    ?>
                </form>
            </div>
        </div>
    </div>
	<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<div class="site-backdrop"></div>