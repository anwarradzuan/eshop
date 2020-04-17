<?php
$user = users::getBy(["user_id" => $_SESSION["user_id"]])[0];

new Controller($_POST);
?>
<ul class="nav nav-tabs page-block mt-0" id="account-tabs">
    <li class="active">
        <a href="#account-profile" data-toggle="tab">
            Profile
        </a>
    </li>
    <li>
        <a href="#account-password" data-toggle="tab">
            Password
        </a>
    </li>
</ul>


<div class="tab-content p-y-4">
    <div class="tab-pane fade in active" id="account-profile">
        <div class="row">
            <div class="col-md-8 col-lg-9" id="">
                <div class="p-x-1">
                    <fieldset class="form-group form-group-lg">
                        <label for="account-name">Name</label>
                        <input type="text" class="form-control name" id="account-name" name="name" placeholder="Mr. " value="<?= $user->user_name ?>">
                    </fieldset>
                    
                    <fieldset class="form-group form-group-lg">
                        <label for="account-username">Username</label>
                        <input type="text" class="form-control username" id="account-username" name="login" placeholder="Username" value="<?= $user->user_login ?>">
                        <small class="text-muted">Use for <strong>login</strong> to this admin panel.</small>
                    </fieldset>
                    
                    <fieldset class="form-group form-group-lg">
                        <label for="account-email">E-mail</label>
                        <input type="email" class="form-control email" id="account-email" name="email" placeholder="Email" value="<?= $user->user_email ?>">
                        <small class="text-muted">Use for <strong>login & password reset</strong>.</small>
                    </fieldset>
                    
                    <fieldset class="form-group form-group-lg">
                        <label for="account-location">Phone</label>
                        <input type="text" class="form-control phone" name="phone" value="<?= $user->user_phone ?>" placeholder="01X-XXX XXXX" />
                    </fieldset>
                    
                    <!-- <?php Controller::FormAjax("user/profile") ?> -->
                    <!-- <button type="button" class="btn btn-lg btn-primary m-t-3 submit-form update-profile" data-form="#user-profile">Update profile</button> -->
                    <button type="button" class="btn btn-lg btn-primary m-t-3 update-profile" data-form="">Update profile</button>
                </div>
            </div>
            
            <div class="m-t-4 visible-xs visible-sm"></div>
            
            <div class="col-md-4 col-lg-3">
                <div class="panel bg-transparent">
                    <div class="panel-body text-xs-center">
                        <img src="<?= PORTAL ?>assets/medias/profiles/<?= empty(UserSetting::detail()->user_picture) ? "default.png" : UserSetting::detail()->user_picture ?>" alt="" class="" style="max-width: 100%;">
                        <div class="m-t-2 text-muted font-size-12">JPG, GIF or PNG. Max size of 1MB (200x200)</div>
                    </div>
                    <hr class="m-y-0">
                    <div class="panel-body text-xs-center" >
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?php Controller::form("user/profile_picture", ["action" => "edit"]) ?>
                                    <label class="custom-file px-file">
                                        <input type="file" class="btn custom-file-input " onchange="this.form.submit()" name="picture" />
                                        <button type="button" class="btn btn-primary btn-block px-file-browse">Browse</button>
                                    </label>
                                </form>
                            </div>
                            
                            <div class="col-md-6">
                                <form action="api/user/profile-picture" id="remove-profile-picture">
                                    <?php Controller::formAJAX("", ["action" => "remove-picture"]); ?>
                                    <button type="button" class="btn btn-block submit-form" data-form="#remove-profile-picture">
                                        <i class="fa fa-trash"></i> Clear
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="tab-pane fade" id="account-password">
        <div id="" class="p-x-1">
            <fieldset class="form-group form-group-lg">
                <label for="account-password">Old password</label>
                <input type="password" class="form-control old" id="account-password" name="old" placeholder="Old Password" />
            </fieldset>
            
            <fieldset class="form-group form-group-lg">
                <label for="account-new-password">New password</label>
                <input type="password" class="form-control new1" id="account-new-password" name="new1" placeholder="New Password" />
                <small class="text-muted">Minimum 6 characters</small>
            </fieldset>
            
            <fieldset class="form-group form-group-lg">
                <label for="account-new-password-repeat">Verify password</label>
                <input type="password" class="form-control new2" id="account-new-password-repeat" name="new2" placeholder="Repeat Password" />
            </fieldset>
            <button type="button" class="btn btn-lg btn-primary m-t-3 change-password" data-form="">Change password</button>
        </div>
    </div>
</div>
<?php
	$_token = F::UniqKey();
	$token = Token::create($_token, "profile");
?>
<script>
	window.onload = function(){
		$(document).on("click", ".update-profile", function(){
	        $.ajax({
	            url: "<?= PORTAL_ADMIN ?>api/profile",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "updateProfile") ?>",
	                name : $(".name").val(),
	                email : $(".email").val(),
	                phone : $(".phone").val(),
	                username : $(".username").val()
	            },
	            dataType: "json"
	        }).done(function(res){
	        	if(res.status == "success"){
                    Alert ("success", res.message)
                }else{
                    Alert ("error", res.message)
                }
	        });
	    });
	    $(document).on("click", ".change-password", function(){
	        $.ajax({
	            url: "<?= PORTAL_ADMIN ?>api/password",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                akey : "<?= TOKEN_SECURE ?>",
					action : "<?= F::Encrypt(TOKEN_SECURE . "updatePassword") ?>",
	                old : $(".old").val(),
	                new1 : $(".new1").val(),
	                new2 : $(".new2").val()
	            },
	            dataType: "json"
	        }).done(function(res){
	        	if(res.status == "success"){
                    Alert ("success", res.message)
                }else{
                    Alert ("error", res.message)
                }
	        });
	    });
	    
	};
</script>