<?php
defined("HFA") or die();

new Controller($_POST);

switch(url::get(2)){
    case "":
    ?>
    <div class="panel panel-default">
	    <div class="panel-heading">
	        <span class="fa fa-list"> Business List
	        <a class="btn btn-primary" href="<?= PORTAL ?>clients/all-company/add"><span class="fa fa-plus">Add New Business</span></a>
	    </div>
	    <div class="panel-body">
	        <div class="table-primary">
	            <table class="table table-hover table-bordered data-table">
	                <thead>
	                    <tr>
	                        <th class="text-center">No</th>
	                        <th class="text-center">Company Name</th>
	                        <th class="text-center">Reg no</th>
	                        <th class="text-center">Client</th>
	                        <th class="text-center">Email</th>
	                        <th class="text-center">Status</th>
	                        <th class="text-center">Date</th>
	                        <!-- <th class="text-center">Commission(%)</th> -->
	                        <th class="text-center">Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php
	                    $i = 1;
	                    foreach(company::list() as $m){
	                    ?>
	                    <tr class="text-center">
	                        <td class="text-center"><?= $i ?></td>
	                        <td class="text-center"><?= $m->c_name ?></td>
	                        <td class="text-center"><?= $m->c_reg ?></td>
	                        <td class="text-center">
	                        	<?php
	                        		$cl = clients::getBy(["cl_company" => $m->c_id]);
									if(count($cl) > 0){
										echo $cl[0]->cl_name;
									}else{
										echo "Clinet not found";
									}
	                        	 ?>
	                        </td>
	                        <td class="text-center"><?= $m->c_email ?></td>
	                        <td class="text-center">
	                        	<?php
	                        		foreach (Setting::$boolean as $key => $value) {
										if($key == $m->c_status){
											echo "<b>".$value."</b>";
										}
									}
	                        	?>
	                        </td>
	                        <td class="text-center"><?= $m->c_date ?></td>
	                        <!-- <td class="text-center"><?= $m->c_commission ?></td> -->
	                        <td class="text-center">
	                            <a class="btn btn-warning" href="<?= PORTAL ?>clients/all-company/edit/<?php echo $m->c_key ?>" ><span class="fa fa-edit"></span> Edit</a>
	                            <a class="btn btn-danger" href="<?= PORTAL ?>clients/all-company/delete/<?php echo $m->c_key ?>" ><span class="fa fa-trash"></span> Delete</a>
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
    
    case "add":
    ?>
    <div class="panel panel-default">
	        <div class="panel-heading">
	            <span class="fa fa-list"> Company Details
            	<a class="btn btn-primary" href="<?php echo PORTAL ?>clients/all-company" >Back</a>
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
		                        			Company Logo:
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
		                        		<div class="col-md-2">
		                        			Postal Code:
											<input type="text" name="c_postalCode" class="form-control" placeholder="Postal Code" id="" /><br />
		                        		</div>
		                        		<div class="col-md-2">
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
		                        		<div class="col-md-2">
		                        			City:
											<input type="text" name="c_city" class="form-control" placeholder="City"/><br />
		                        		</div>
		                        		<div class="col-md-2">
		                        			State:
											<input type="text" name="c_state" class="form-control" placeholder="State"/><br />
		                        		</div>
		                        		<div class="col-md-4">
		                        			Client:
				                        	<select class="form-control select2 " name="c_client" required>
				                        		<option></option>
				                        		<?php
				                        			foreach(clients::list() as $cl){
				                        				?>
				                        					<option value="<?= $cl->cl_id ?>"><?= $cl->cl_name?></option>
				                        				<?php
				                        			}
				                        		?>
				                        	</select>
		                        		</div>
		                        		<!-- <div class="col-md-2">
		                        			Commission Rate (%):
											<input type="text" name="c_commission" class="form-control" placeholder="Commission Rate"/><br />
		                        		</div> -->
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
						                            "clients/company", 
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
    
    case "edit":
        $id = url::get(3);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"> Company Details
        	<a class="btn btn-primary" href="<?php echo PORTAL ?>clients/all-company" >Back</a>
        </div>
        <div class="panel-body">
            <div class="row">
                 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Company Information
                        </div>
                        <div class="panel-body">
                        	<?php
                        		$comp =  company::getby(["c_key" => $id]);
								if(count($comp) > 0){
									$comp = $comp[0];
									?>
									<form method="post" action"" enctype="multipart/form-data">
										<div class="row">
			                        		<div class="col-md-4">
			                        			Company Name:
												<input type="text" name="c_name" class="form-control" placeholder="Company Name" value="<?= $comp->c_name ?>" required/><br />
												Registration. No:
												<input type="text" name="c_reg" class="form-control" placeholder="Registration No" value="<?= $comp->c_reg ?>" required/><br />
												Telephone  :
												<input type="text" name="c_phone" class="form-control" placeholder="Telephone" value="<?= $comp->c_phone ?>"/><br />
												Email:
												<input type="text" name="c_email" class="form-control" placeholder="Email" value="<?= $comp->c_email ?>"/><br />
			                        		</div>
			                        		<div class="col-md-4">
			                        			Bank name:
			                        			<select class="form-control select2" name="c_bankName">
			                        				<option value=""></option>
			                        				<?php
			                        					foreach (Setting::$bankName as $bb => $cc) {
															?>
															<option value="<?= $bb ?>" <?= ($bb==$comp->c_bankName ? "selected" : "") ?> ><?= $cc ?></option>
															<?php
														}
			                        				?>
			                        			</select><br /><br />
												Account No:
												<input type="text" name="c_accNo" class="form-control" placeholder="Account No" value="<?= $comp->c_accNo ?>" required/><br />
												Branch  :
												<input type="text" name="c_bankBranch" class="form-control" placeholder="Bank Branch" value="<?= $comp->c_bankBranch ?>" /><br />
												Fax:
												<input type="text" name="c_fax" class="form-control" placeholder="Fax" value="<?= $comp->c_fax ?>"/><br />
			                        		</div>
			                        		<div class="col-md-2 form-group has-success">
			                        			Status:
			                        			<select class="form-control select2" name="c_status">
			                        				<option value=""></option>
			                        				<?php
			                        					foreach (Setting::$boolean as $bb => $cc) {
															?>
															<option value="<?= $bb ?>" <?= ($bb==$comp->c_status ? "selected" : "") ?> ><?= $cc ?></option>
															<?php
														}
			                        				?>
			                        			</select><br /><br />
			                        		</div>
			                        		<div class="col-md-2">
			                        			Company Logo:
			                        			<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
									            	<input type="file" id="grid-input-6" class="custom-file-input" name="file" accept="image/*">
									               	<span class="custom-file-control form-control">Choose file...</span>
									                <div class="px-file-buttons">
									                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
									                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
									                </div>
									            </label><br />
			                        			<img src="<?= PORTAL_BUSINESS ?>assets/medias/company/<?= empty($comp->c_logo) ? "default.png" : $comp->c_logo ?>" alt="" class="" style="max-width: 100%;">
			                        		</div>
			                        	</div>
			                        	<div class="row">
			                        		<div class="col-md-12">
			                        			Address:
												<textarea name="c_address" class="form-control" placeholder="Address" id=""><?= $comp->c_address ?></textarea><br />
			                        		</div>
			                        	</div>
			                        	<div class="row">
			                        		<div class="col-md-2">
			                        			Postal Code:
												<input type="text" name="c_postalCode" class="form-control" placeholder="Postal Code" id="" value="<?= $comp->c_postalCode ?>"/><br />
			                        		</div>
			                        		<div class="col-md-2">
			                        			Country:
			                        			<select name="c_country" class="select2">
			                        				<?php
			                        					foreach (countries::list() as $k) {
															?>
																<option value="<?= $k->c_code ?>" <?= ($k->c_code==$comp->c_country ? "selected" : "") ?> ><?= $k->c_name?></option>
															<?php
														}
			                        				?>
			                        			</select>
			                        		</div>
			                        		<div class="col-md-2">
			                        			City:
												<input type="text" name="c_city" class="form-control" placeholder="City" value="<?= $comp->c_city ?>"/><br />
			                        		</div>
			                        		<div class="col-md-2">
			                        			State:
												<input type="text" name="c_state" class="form-control" placeholder="State" value="<?= $comp->c_state ?>"/><br />
			                        		</div>
			                        		<div class="col-md-4">
			                        			Client:
					                        	<select class="form-control select2 " name="c_client"required>
					                        		<option></option>
					                        		<?php
					                        			foreach(clients::list() as $cl){
					                        				?>
					                        					<option value="<?= $cl->cl_id ?>" <?= ($cl->cl_id==$comp->c_client ? "selected" : "") ?> ><?= $cl->cl_name?></option>
					                        				<?php
					                        			}
					                        		?>
					                        	</select>
			                        		</div>
			                        		<!-- <div class="col-md-2">
			                        			Commission Rate (%):
												<input type="text" name="c_commission" class="form-control" placeholder="Commission Rate" value="<?= $comp->c_commission ?>"/><br />
			                        		</div> -->
			                        	</div>
			                        	<div class="row ">
			                        		<div class="col-md-12">
			                        			What your business do?
			                        			<textarea class="form-control" name="c_details" placeholder="Details"><?= $comp->c_details ?></textarea>
			                        		</div>
			                        	</div><br />
			                        	<div class="row">
			                        		<div class="col-md-12 text-center">
							                    <?php
							                        Controller::Form(
							                            "clients/company", 
							                            [
							                                "action"  => "edit"  
							                            ]
							                        );
							                    ?>
							                    <input type="hidden" name="c_id" value="<?= $comp->c_id ?>"/>
							                    <button class="btn btn-success btn-block">
							                        <span class="fa fa-save"></span> Save
							                    </button>
							                </div>
			                        	</div>
		                        	</form>
									<?php
								}else{
									new Alert("error", "No company found");
								}
                        	?>
                        </div>
                    </div>    
                </div>
            </div>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="panel panel-warning">
	                    <div class="panel-heading">
	                        <span class="fa fa-file"></span>
	                        Orders
	                    </div>
	                    
	                    <div class="panel-body">
	                        <div class="table-primary">
	                            <table class="table table-bordered table-hover">
	                                <thead>
	                                    <tr>
	                                        <th class="text-center">No</th>
	                                        <th>Order Number</th>
	                                        <th class="text-center">Total</th>
	                                        <th class="text-center">Status</th>
	                                        <th class="text-center">Date</th>
	                                    </tr>
	                                </thead>
	                                
	                                <tbody>
	                                <?php
	                                    $no = 1;
	                                    foreach(order_item::getBy(["oi_company" => $comp->c_id]) as $ro){
	                                    ?>
	                                        <tr class="">
	                                            <td class="text-center"><?= $no++ ?></td>
	                                            <td class="text-center"><strong><?= $ro->oi_key ?></strong></td>
	                                            <td class="text-center"><?= $ro->oi_gtotal ?></td>
	                                            <td class="text-center">
	                                            	<?php
	                                            		foreach(Setting::$order as $s => $t){
	                                            			if($s == $ro->oi_shipping_status){
	                                            				echo $t;
	                                            			}
	                                            		}
	                                            	?>
	                                            </td>
	                                            <td class="text-center"><?= $ro->oi_date ?></td>
	                                        </tr>
	                                    <?php
	                                    }
	                                ?>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
    </div>
    <?php
    break;
    
    case "delete":
        $id = url::get(3);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-trash"></span>
            Delete Company
            
            <a href="<?= PORTAL ?>clients/all-company" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $comp = company::getBy(["c_key" =>$id]);
            if(count($comp) > 0){
                $comp = $comp[0];    
				
            
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">
                    Are you sure?
                </h3>
                
                <p>
                	All <b>'<?= $comp->c_name ?>'</b> company details, items and client will bre removed permanently.
                </p>
                
                <?php
                    Controller::Form(
                        "clients/company", 
                        [
                            "action"  => "delete"  
                        ]
                    );
                ?>
                <button class="btn btn-danger">
                    <span class="fa fa-trash"></span>
                    Delete
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "Sorry, selected comapny is not found in our database. Please select a correct user to view information.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
    
    default:
        Page::Load(404);
    break;
}

