<?php

?>
<style>
body  {
  background-image: url("<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/Untitled-3.jpg");
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
</style>

<div class="page-signin-header p-a-2 text-sm-center bg-white">
	<a class="" href="<?= PORTAL_PUBLIC ?>">
		<img src="<?= PORTAL_PUBLIC ?>assets/medias/iecommerce/img/logo/1.png" alt="Intelligent eCommerce" class ="elogo" style="">
	</a>
    <a class="px-demo-brand px-demo-brand-lg text-default" href="<?= PORTAL_ADMIN ?>">
        <?= APP_NAME ?>
    </a>
    
    <div class="front-e" style=""><a href="<?= PORTAL_PUBLIC ?>" target="_blank" class="btn btn-primary">Front End</a></div>
</div>
<?php
new Controller($_POST);
?>

<div class="page-signin-container" id="page-signin-form">
    
    	<h1 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Admin Login</h1>
    
    
    <form action="" method="POST" class="panel p-a-4" style="opacity: 0.95;">
        <fieldset class=" form-group form-group-lg">
            <input type="text" class="form-control" name="login" placeholder="Username or Email">
        </fieldset>
        
        <fieldset class=" form-group form-group-lg">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </fieldset>
        
        <div class="clearfix">
            <a href="#" class="font-size-12 text-muted pull-xs-right" id="page-signin-forgot-link">Forgot your password?</a>
        </div>
        
        <?php Controller::form("login"); ?>
        <button class="btn btn-block btn-lg btn-primary m-t-3">Sign In</button>
    </form>
</div>

<div class="page-signin-container" id="page-signin-forgot-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Password reset</h2>
    
    <form action="" method="POST" class="panel p-a-4" style="opacity: 0.95;">
        <fieldset class="form-group form-group-lg">
            <input type="email" class="form-control" name="email" placeholder="Your Email">
        </fieldset>
        
        <?php Controller::form("forgot_password", ["action" => "request_reset"]); ?>
        <button class="btn btn-block btn-lg btn-primary m-t-3">Send password reset link</button>
            <div class="m-t-2 text-muted">
            <a href="#" id="page-signin-forgot-back">&larr; Back</a>
        </div>
    </form>
</div>
<script>
window.onload = function(){
    $('#page-signin-forgot-back').on('click', function(e) {
        e.preventDefault();
        
        $('#page-signin-form').css({ display: 'block' });
        $('#page-signin-forgot-form').css({ display: 'none' });
        
        $(window).trigger('resize');
    });
    
    
    $('#page-signin-forgot-link').on('click', function(e) {
        e.preventDefault();
        
        $('#page-signin-form').css({ display: 'none' });
        $('#page-signin-forgot-form').css({ display: 'block' });
        
        $(window).trigger('resize');
    });
    /*
    $(function() {
    //pxDemo.initializeDemoSidebar();
    
        $('#px-demo-sidebar').pxSidebar();
        //pxDemo.initializeDemo();
    });
    
    $(function() {
        pxDemo.initializeBgsDemo('body', 0, '#000', function(isBgSet) {
            $('h2')[isBgSet ? 'addClass' : 'removeClass']('text-white font-weight-bold');
            
            $('h4')
                .addClass(isBgSet ? 'text-white' : 'text-muted')
                .removeClass(isBgSet ? 'text-muted' : 'text-white');
            });
            
        
            
        
        
        $('[data-toggle="tooltip"]').tooltip();
    });
    */
};

</script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    