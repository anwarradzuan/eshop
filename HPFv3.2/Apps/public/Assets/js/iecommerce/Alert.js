function Alert(type, message = ""){
	
	switch(type){
		case "success_old":
			$("body").append(`
				<div class="alert1 success">
				<i class="icon-check g-font-size-25"></i> 
					<span class="closebtn1 close"  data-dismiss="alert">&times;</span>  
					<strong>Success!</strong> ` + message + `
				</div>	
			`);
			
			$( "div.success" ).fadeIn( 300 ).delay( 2500 ).fadeOut( 400 );
			
			
		break;
		
		case "error_old":
			$("body").append(`
				<div class="alert1 error">
					<span class="closebtn1 iziToast-close"  data-dismiss="alert">&times;</span>
					<strong>Error!</strong> ` + message + `
				</div>	
			`);
			
			$( "div.error" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
		break;
		
		case "warning_old":
			$("body").append(`
				<div class="alert1 warning">
					<span class="closebtn1 close"  data-dismiss="alert">&times;</span> 
					<strong>Warning!</strong> ` + message + `
				</div>	
			`);
			
			$( "div.warning" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
		break;
		
		case "info_old":
			$("body").append(`
				<div class="alert1 info">
					<span class="closebtn1 close"  data-dismiss="alert">&times;</span>  
					<strong>Information!</strong> ` + message + `
				</div>	
			`);
			
			$( "div.info" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
		break;
		
		case "success":
			
			$("body").append(`
				<div class="iziToast-wrapper iziToast-wrapper-topRight">
					<div class="iziToast-capsule" style="height: auto;">
						<div class="iziToast fadeInLeft iziToast-success">
							<div class="iziToast-body" style="padding-left: 33px;">
								<strong>Success!</strong><p>` + message + `</p>
								<i class="iziToast-icon icon-circle-check"></i>
							</div>
							<button class="iziToast-close">
							</button>
						</div>
					</div>
				</div>
			`);
			$( "div.iziToast-wrapper" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			
		break;
		
		case "error":
			
			$("body").append(`
				<div class="iziToast-wrapper iziToast-wrapper-topRight">
					<div class="iziToast-capsule" style="height: auto;">
						<div class="iziToast fadeInLeft iziToast-danger">
							<div class="iziToast-body" style="padding-left: 33px;">
								<strong>Error!</strong><p>` + message + `</p>
								<i class="iziToast-icon icon-ban"></i>
							</div>
							<button class="iziToast-close">
							</button>
						</div>
					</div>
				</div>
			`);
			$( "div.iziToast-wrapper" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			
		break;
		
		case "warning":
			
			$("body").append(`
				<div class="iziToast-wrapper iziToast-wrapper-topRight">
					<div class="iziToast-capsule" style="height: auto;">
						<div class="iziToast fadeInLeft iziToast-warning">
							<div class="iziToast-body" style="padding-left: 33px;">
								<strong>Warning</strong><p>` + message + `</p>
								<i class="iziToast-icon icon-flag"></i>
							</div>
							<button class="iziToast-close">
							</button>
						</div>
					</div>
				</div>
			`);
			$( "div.iziToast-wrapper" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			
		break;
		
		case "info":
			
			$("body").append(`
				<div class="iziToast-wrapper iziToast-wrapper-topRight">
					<div class="iziToast-capsule" style="height: auto;">
						<div class="iziToast fadeInLeft iziToast-info">
							<div class="iziToast-body" style="padding-left: 33px;">
								<strong>Notice!</strong><p>` + message + `</p>
								<i class="iziToast-icon icon-bell"></i>
							</div>
							<button class="iziToast-close">
							</button>
						</div>
					</div>
				</div>
			`);
			$( "div.iziToast-wrapper" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			
		break;
	}
}