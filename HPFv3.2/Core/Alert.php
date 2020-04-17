<?php
require_once(dirname(__DIR__) . "/Misc/document_access.php");

class Alert{
	public function __construct($type, $message, $style = "", $class = ""){
		switch($type){
			case "success":
			?>
				<div class="alert alert-success alert-dismissable <?= $class ?>" style="<?= $style ?>">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> <?= ($message) ?>
				</div>
			<?php
			break;
			
			case "error":
			?>
				<div class="alert alert-danger alert-dismissable <?= $class ?>" style="<?= $style ?>">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong> <?= ($message) ?>
				</div>
	            
			<?php
			break;
			
			case "warning":
			?>
				<div class="alert alert-warning alert-dismissable <?= $class ?>" style="<?= $style ?>">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Warning!</strong> <?= ($message) ?>
				</div>
			<?php
			break;
			
			case "info":
			?>
				<div class="alert alert-info alert-dismissable <?= $class ?>" style="<?= $style ?>">
					<strong>Notice!</strong> <?= ($message) ?>
				</div>
			<?php
			break;
			
			case "success_toast":
			?>
				<div class="col-md-12">
	            	<a id="success_alert" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast-message="<?= ($message) ?>"></a>
	            </div>
	            <script>
					window.onload=function(){
					  document.getElementById("success_alert").click();
					};
				</script>
			<?php
			break;
			
			case "error_toast":
			?>
	            <div class="col-md-12">
	            	<a id="error_alert" data-toast data-toast-position="topRight" data-toast-type="danger" data-toast-icon="icon-ban" data-toast-title="Error!" data-toast-message="<?= ($message) ?>"></a>
	            </div>
	            <script>
					window.onload=function(){
					  document.getElementById("error_alert").click();
					};
				</script>
	            
			<?php
			break;
			
			case "warning_toast":
			?>
				<div class="col-md-12">
	            	<a id="warning_alert" data-toast data-toast-position="topRight" data-toast-type="warning" data-toast-icon="icon-flag" data-toast-title="Warning!" data-toast-message="<?= ($message) ?>"></a>
	            </div>
	            <script>
					window.onload=function(){
					  document.getElementById("warning_alert").click();
					};
				</script>
			<?php
			break;
			
			case "info_toast":
			?>
				
				<div class="col-md-12">
	            	<a id="info_alert" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="icon-bell" data-toast-title="Notice!" data-toast-message="<?= ($message) ?>"></a>
	            </div>
	            <script>
					window.onload=function(){
					  document.getElementById("info_alert").click();
					};
				</script>
			<?php
			break;
		}
	}
}

?>