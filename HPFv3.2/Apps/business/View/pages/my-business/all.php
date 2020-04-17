<?php
new Controller ($_POST);
switch (url::get(1)) {
	case 'add':
		?>
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <span class="fa fa-list"> Business Details
            	<a class="btn btn-primary" href="<?php echo PORTAL ?>my-business" >Back</a>
	        </div>
	        <div class="panel-body">
	            <div class="row">
	                 <div class="col-md-12">
	                    <div class="panel panel-info">
	                        <div class="panel-heading">
	                            Company Information
	                        </div>
	                        <div class="panel-body">
								<form method="post" action"" enctype="multipart/form-data">
									<div class="row">
		                        		<div class="col-md-4">
		                        			Company Name:
											<input type="text" name="c_name" class="form-control" placeholder="Company Name" required/><br />
											Registration. No:
											<input type="text" name="c_reg" class="form-control" placeholder="Registration No"required/><br />
											Telephone  :
											<input type="text" name="c_phone" class="form-control" placeholder="Telephone"/><br />
											Email:
											<input type="text" name="c_email" class="form-control" placeholder="Email"/><br />
		                        		</div>
		                        		<div class="col-md-4">
		                        			Bank name:
		                        			<select class="form-control select2" name="c_bankName">
		                        				<option value=""></option>
		                        				<?php
		                        					foreach (Setting::$bankName as $bb => $cc) {
														?>
														<option value="<?= $bb ?>"><?= $cc ?></option>
														<?php
													}
		                        				?>
		                        			</select><br /><br />
											Account No:
											<input type="text" name="c_accNo" class="form-control" placeholder="Account No" required/><br />
											Branch  :
											<input type="text" name="c_bankBranch" class="form-control" placeholder="Bank Branch"/><br />
											Fax:
											<input type="text" name="c_fax" class="form-control" placeholder="Fax"/><br />
		                        		</div>
		                        		<div class="col-md-2">
		                        			Company Logo:asd
		                        			<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
								            	<input type="file" id="grid-input-6" class="custom-file-input" name="file" accept="image/*">
								               	<span class="custom-file-control form-control">Choose file...</span>
								                <div class="px-file-buttons">
								                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
								                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
								                </div>
								            </label><br />
		                        			<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/default.png" alt="" class="" style="max-width: 100%;">
		                        		</div>
		                        	</div>
		                        	<div class="row">
		                        		<div class="col-md-12">
		                        			Address:
											<textarea name="c_address" class="form-control" placeholder="Address" id=""></textarea><br />
		                        		</div>
		                        	</div>
		                        	<div class="row">
		                        		<div class="col-md-3">
		                        			Postal Code:
											<input type="text" name="c_postalCode" class="form-control" placeholder="Postal Code" id="" /><br />
		                        		</div>
		                        		<div class="col-md-3">
		                        			City:
											<input type="text" name="c_city" class="form-control" placeholder="City"/><br />
		                        		</div>
		                        		<div class="col-md-3">
		                        			State:
											<input type="text" name="c_state" class="form-control" placeholder="State"/><br />
		                        		</div>
		                        		<div class="col-md-3">
		                        			Country:
		                        			<select name="c_country" class="select2">
		                        				<?php
		                        					foreach (countries::list() as $k) {
														?>
															<option value="<?= $k->c_code ?>"><?= $k->c_name?></option>
														<?php
													}
		                        				?>
		                        			</select>
		                        		</div>
		                        	</div>
		                        	<div class="row ">
		                        		<div class="col-md-12">
		                        			What your business do?
		                        			<textarea class="form-control" name="c_details" placeholder="Details"></textarea>
		                        		</div>
		                        	</div><br />
		                        	<div class="row">
		                        		<div class="col-md-12 text-center">
						                    <?php
						                        Controller::Form(
						                            "business", 
						                            [
						                                "action"  => "add"  
						                            ]
						                        );
						                    ?>
						                    <input type="hidden" name="c_id" value="<?= $com->c_id ?>"/>
						                    <button class="btn btn-success btn-block">
						                        <span class="fa fa-save"></span> Save
						                    </button>
						                </div>
		                        	</div>
	                        	</form>
	                        </div>
	                    </div>    
	                </div>
	            </div>
	        </div>
	    </div>
		<?php
	break;
		
	case 'edit':
		?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <span class="fa fa-list"> Business Details
        	 	<a class="btn btn-primary" href="<?php echo PORTAL ?>my-business" >Back</a>
	        </div>
	        
	        <div class="panel-body">
	            <div class="row">
	                 <div class="col-md-6">
	                    <div class="panel panel-info">
	                        <div class="panel-heading">
	                            Company Information
	                        </div>
	                        <div class="panel-body">
	                        	<?php
									$com = company::getBy(["c_key" => url::get('2')]);
									if(count($com) > 0){
										$com = $com[0];
										?>
										<form method="post" action"" enctype="multipart/form-data">
											<div class="row">
				                        		<div class="col-md-4">
				                        			Company Name:
													<input type="text" name="c_name" class="form-control" placeholder="Company Name" value="<?= $com->c_name ?>" required/><br />
													Registration. No:
													<input type="text" name="c_reg" class="form-control" placeholder="Registration No" value="<?= $com->c_reg ?>" required/><br />
													Telephone  :
													<input type="text" name="c_phone" class="form-control" placeholder="Telephone" value="<?= $com->c_phone ?>"/><br />
													Email:
													<input type="text" name="c_email" class="form-control" placeholder="Email" value="<?= $com->c_email ?>"/><br />
				                        		</div>
				                        		<div class="col-md-4">
				                        			Bank name:
				                        			<select class="form-control select2" name="c_bankName">
				                        				<option value=""></option>
				                        				<?php
				                        					foreach (Setting::$bankName as $bb => $cc) {
																?>
																<option value="<?= $bb ?>" <?= $bb == $com->c_bankName ? "selected" : "" ?> ><?= $cc ?></option>
																<?php
															}
				                        				?>
				                        			</select><br /><br />
													Account No:
													<input type="text" name="c_accNo" class="form-control" placeholder="Account No" value="<?= $com->c_accNo ?>" required/><br />
													Branch  :
													<input type="text" name="c_bankBranch" class="form-control" placeholder="Bank Branch" value="<?= $com->c_bankBranch ?>"/><br />
													Fax:
													<input type="text" name="c_fax" class="form-control" placeholder="Fax" value="<?= $com->c_fax ?>"/><br />
				                        		</div>
				                        		<div class="col-md-4">
				                        			Company Logo:
				                        			<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
										            	<input type="file" id="grid-input-6" class="custom-file-input" name="file" accept="image/*">
										               	<span class="custom-file-control form-control">Choose file...</span>
										                <div class="px-file-buttons">
										                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
										                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
										                </div>
										            </label>
				                        			<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/<?= empty($com->c_logo) ? "default.png" : $com->c_logo ?>" alt="" class="" style="max-width: 100%;">
				                        		</div>
				                        	</div>
				                        	<div class="row">
				                        		<div class="col-md-12">
				                        			Address:
													<textarea name="c_address" class="form-control" placeholder="Address" id=""><?= $com->c_address?></textarea><br />
				                        		</div>
				                        	</div>
				                        	<div class="row">
				                        		<div class="col-md-3">
				                        			Postal Code:
													<input type="text" name="c_postalCode" class="form-control" placeholder="Postal Code" value="<?= $com->c_postalCode ?>" id="" /><br />
				                        		</div>
				                        		<div class="col-md-3">
				                        			City:
													<input type="text" name="c_city" class="form-control" placeholder="City" value="<?= $com->c_city ?>" /><br />
				                        		</div>
				                        		<div class="col-md-3">
				                        			State:
													<input type="text" name="c_state" class="form-control" placeholder="State" value="<?= $com->c_state ?>" /><br />
				                        		</div>
				                        		<div class="col-md-3">
				                        			Country:
				                        			<select name="c_country" class="select2">
				                        				<?php
				                        					foreach (countries::list() as $k) {
																?>
																	<option value="<?= $k->c_code ?>" <?= ($k->c_code == $com->c_country ? "selected" : "") ?> ><?= $k->c_name?></option>
																<?php
															}
				                        				?>
				                        			</select>
				                        		</div>
				                        		
				                        	</div>
				                        	<div class="row ">
				                        		<div class="col-md-12">
				                        			What your business do?
				                        			<textarea class="form-control" name="c_details" placeholder="Details"><?= $com->c_details ?></textarea>
				                        		</div>
				                        	</div><br />
				                        	<div class="row">
				                        		<div class="col-md-12 text-center">
								                    <?php
								                        Controller::Form(
								                            "business", 
								                            [
								                                "action"  => "update"  
								                            ]
								                        );
								                    ?>
								                    <input type="hidden" name="c_id" value="<?= $com->c_id ?>"/>
								                    <button class="btn btn-success btn-block">
								                        <span class="fa fa-save"></span> Save
								                    </button>
								                </div>
				                        	</div>
			                        	</form>
									
									<?php
									}
	                        	?>
	                        </div>
	                    </div>    
	                </div>
	                <div class="col-md-6">
	                    <div class="panel panel-warning">
	                        <div class="panel-heading">
	                            Company Details
	                        </div>
	                        <div class="panel-body">
	                        	<?php
									$com = company::getBy(["c_key" => url::get('2')]);
									if(count($com) > 0){
										$com = $com[0];
										?>
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="row">
										        <div class="col-sm-3">
													<label id="grid-input-7-file" class="custom-file px-file" for="grid-input-7">
										            	<input type="file" id="grid-input-7" class="custom-file-input" accept="image/*" multiple name="file[]">
										               	<span class="custom-file-control form-control">Choose file...</span>
										                <div class="px-file-buttons">
										                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
										                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-7">Browse</label>
										                </div>
										          	</label><br />
										          	*Maximum image size is 100kb
										        </div>
										        <div class="col-md-2">
										            <button style="float:left;" class="btn btn-success" name="submit">
										                <span class="fa fa-plus"></span> Add
										            </button>
										        </div>
										        <?php
										            Controller::Form(
										                "business", 
										                [
										                    "action"  => "banner"  
										                ]
										            );
										        ?>
									        </div><br />
										</form>
										<div class="row">
											<div class="col-md-12">
			                        			<table class="table table-bordered">
			                        				<thead>
			                        					<tr>
			                        						<th>Image</th>
			                        						<th>Order</th>
			                        						<th>Action</th>
			                        					</tr>
			                        				</thead>
			                        				<tbody>
			                        					<?php
			                        						$company_cms = company_cms::getBy(["cc_company" => $com->c_id]);
															
															if(count($company_cms) > 0){
																
																foreach ($company_cms as $cc) {
																?>
																	<tr>
						                        						<td><img src="<?= PORTAL_BUSINESS ?>assets/medias/company/banner/<?= $cc->cc_file ?>" alt="" class="" style="max-width: 100%;"></td>
					                        							<td class="text-center" width="40%">
												                        	<input type="number" 
																				class="form-control banner-order" 
																				name="order1" 
																				placeholder="Order" 
																				min="0"
																				data-id="<?= $cc->cc_id ?>"
																				data-company="<?= $cc->cc_company ?>"
																				value="<?= $cc->cc_order ?>"
																			/>
																			*Put number sequence start from '1' for image order or put '0' to DISABLE image 
												                        </td>
						                        						<td class="text-center" width="20%">
												                           	<button class="btn btn-danger delete-pic" data-bannerId="<?= $cc->cc_id ?>">
												                           	<span class="fa fa-trash"></span>	Delete
												                           	</button>
												                        </td>
						                        					</tr>
																<?php
																}
															}else{
																echo "<tr><td>No images found</td></tr>";
															}
			                        					?>
			                        				</tbody>
			                        			</table>
		                        			</div>
										</div>
									<?php
									}
	                        	?>
	                        </div>
	                    </div>    
	                </div>
	            </div>
	        </div>
	    </div>
		<?php
	break;
		
	default:
		?>
		<div class="panel panel-default">
		    <div class="panel-heading">
		        <span class="fa fa-list"> Business List
		        <!-- <a class="btn btn-primary" href="<?= PORTAL ?>my-business/add/add"><span class="fa fa-plus">Add New Business</span></a> -->
		    </div>
		    <div class="panel-body">
		        <div class="table-primary">
		            <table class="table table-hover table-bordered data-table">
		                <thead>
		                    <tr>
		                        <th class="text-center">No</th>
		                        <th class="text-center">Company Name</th>
		                        <th class="text-center">Reg no</th>
		                        <th class="text-center">Eamil</th>
		                        <th class="text-center">Date</th>
		                        <th class="text-center">Action</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php
		                    $i = 1;
							$client = $_SESSION['cl_company'];
		                    foreach(company::getBy(["c_id" => $client]) as $m){
		                    ?>
		                    <tr class="text-center">
		                        <td class="text-center"><?= $i ?></td>
		                        <td class="text-center"><?= $m->c_name ?></td>
		                        <td class="text-center"><?= $m->c_reg ?></td>
		                        <td class="text-center"><?= $m->c_email ?></td>
		                        <td class="text-center"><?= $m->c_date ?></td>
		                        <td class="text-center">
		                            <a class="btn btn-primary" href="<?= PORTAL ?>my-business/edit/<?php echo $m->c_key ?>" ><span class="fa fa-edit"></span></a>
		                            <!-- <a class="btn btn-danger" href="<?= PORTAL ?>my-business/delete/<?php echo $m->c_key ?>" ><span class="fa fa-trash"></span></a> -->
		                        </td>
		                    </tr>
		                    <?php
		                         $i++;
		                    }
		                    ?>
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
		<?php
	break;
}
	$_token = F::UniqKey();
	$token = Token::create($_token, "photo");
?>
<script>
	window.onload = function(){
		
		$(document).on("change", ".banner-order", function(){
			$.ajax({
				url : "<?= PORTAL ?>api/clients",
				method : "POST",
				data : {
					_token : "<?php echo $_token ?>",
					token : "<?php echo $token ?>",
					action : "<?= F::Encrypt($_token . "updateOrderBanner") ?>",
					picOrder: $(this).val(),
					bannerId: $(this).attr("data-id"),
					companyId: $(this).attr("data-company")
				},
				dataType : "json" 
			}).done(function(res){
				// console.log(res);
				if(res.status == "success"){
				}else{
				}
			})
		});
		
		$(document).on("click", ".delete-pic", function(){
	        $.ajax({
	            url: "<?= PORTAL_BUSINESS ?>api/clients",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                bannerId: $(this).attr("data-bannerId"),
	                action: "<?= F::Encrypt($_token . "deleteBanner") ?>"
	            },
	            dataType: "json"
	        }).done(function(res){
	        	// console.log(res);
	        	 window.location = window.location;
	            
	        });
	    });
	};
</script>