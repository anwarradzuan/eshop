<?php
defined("HFA") or die();

new Controller($_POST);

switch(url::get(1)){
    case "":
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"></span> All Customer
            <a href="<?= PORTAL_ADMIN ?>customer/add/a" class="btn btn-primary">
                <span class="fa fa-plus"></span> Register new customer
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
            <table class="table table-reponsive table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Country</th>
                        <th class="text-center">Date Register</th>
                        <th class="text-center">:::</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    $no = 1;
                    foreach(customers::list(["order" => "c_date DESC"]) as $c){
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                            <?= $c->c_name ?>
                        </td>
                        <td class="text-center">
                            <?= $c->c_phone ?><br />
                        </td>
                        <td class="text-center">
                        	<strong>
                        		<?= $c->c_email ?>
                        	</strong>
                        </td>
                        <td class="text-center">
                        	<?= $c->c_country ?>
                        </td>
                        <td class="text-center">
                        	<?= $c->c_date ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= PORTAL ?>customer/edit/<?= $c->c_id ?>" class="btn btn-primary">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?= PORTAL ?>customer/delete/<?= $c->c_id ?>" class="btn btn-danger">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php
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
            <span class="fa fa-plus"></span>
            Add Customer
            <a href="<?= PORTAL ?>customer" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Customer Information
                            </div>
                            <div class="panel-body">
                                <div class="row">
	                        		<div class="col-md-8">
	                        			Name:
										<input type="text" name="c_name" class="form-control" placeholder="Name" required/><br />
	                        		</div>
	                        		<div class="col-md-4">
	                        			Customer Picture:
							            <label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							            	<input type="file" id="grid-input-6" class="custom-file-input" name="file">
							               	<span class="custom-file-control form-control">Choose file...</span>
							                <div class="px-file-buttons">
							                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
							                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
							                </div>
							            </label>
	                        		</div>
	                        	</div>
	                        	<div class="row">
	                        		<div class="col-md-4">
	                        			Email:
										<input type="text" name="c_email" class="form-control" placeholder="Email" required/><br />
	                        		</div>
	                        		<div class="col-md-4">
	                        			Telephone  :
										<input type="text" name="c_phone" class="form-control" placeholder="Telephone" required/><br />
	                        		</div>
	                        		<div class="col-md-4">
	                        			Gender:
	                        			<select name="c_gender" class="select2" required>
	                        				<option value="">Please Select</option>
	                        				<?php
	                        					foreach(Setting::$gender as $k => $v) {
													?>
														<option value="<?= $k ?>" ><?= $v?></option>
													<?php
												}
	                        				?>
	                        			</select><br /><br />
	                        			
	                        			
	                        		</div>
	                        	</div>
	                        	<div class="row">
	                        		<div class="col-md-12">
	                        			Address:
										<textarea name="c_address" class="form-control" placeholder="Address"></textarea><br />
	                        		</div>
	                        	</div>
	                        	<div class="row">
	                        		<div class="col-md-6">
	                        			City:
										<input type="text" name="c_city" class="form-control" placeholder="City" required/><br />
	                        		</div>
	                        		<div class="col-md-6">
	                        			Postal Code:
										<input type="text" name="c_postcode" class="form-control" placeholder="Postal Code"/><br />
	                        		</div>
	                        		<div class="col-md-6">
	                        			State:
										<input type="text" name="c_state" class="form-control" placeholder="State"/><br />
	                        		</div>
	                        		<div class="col-md-6">
	                        			Country:
	                        			<select name="c_country" class="select2">
	                        				<?php
	                        					foreach(countries::list() as $k) {
													?>
														<option value="<?= $k->c_code ?>"><?= $k->c_name?></option>
													<?php
												}
	                        				?>
	                        			</select><br /><br />
	                        		</div>
	                        	</div>
                            </div>
                        </div>    
                    </div>
                    
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Login Information
                            </div>
                            <div class="panel-body">
                                Username:
    							<input type="text" name="c_login" class="form-control" placeholder="Login" required/><br />
    							
    							Password:
    							<input type="password" name="c_password" class="form-control" placeholder="Password" required/><br />
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <?php
                            Controller::Form(
                                "customer", 
                                [
                                    "type"  => "add"  
                                ]
                            );
                        ?>
                        <button class="btn btn-block btn-success">
                            <span class="fa fa-plus"></span>
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
        $id = url::get(2);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-plus"></span>
            Add Customer
            <a href="<?= PORTAL ?>customer" class="btn btn-primary">
                Back
            </a>
        </div>
        <div class="panel-body">
        	<?php
	        	$c = customers::getBy(["c_id" => $id]);
				if(count($c) > 0){
					$c = $c[0];
	        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Customer Information
                            </div>
                            <div class="panel-body">
                                <div class="row">
	                        		<div class="col-md-9">
	                        			Name:
										<input type="text" name="c_name" class="form-control" placeholder="Name" value="<?= $c->c_name ?>" required/><br />
										
	                        			Email:
										<input type="text" name="c_email" class="form-control" placeholder="Email" value="<?= $c->c_email ?>" required/><br />
										
	                        			Telephone:
										<input type="text" name="c_phone" class="form-control" placeholder="Telephone" value="<?= $c->c_phone ?>" required/><br />
										
										Gender:
	                        			<select name="c_gender" class="select2" required>
	                        				<option value="">Please Select</option>
	                        				<?php
	                        					foreach(Setting::$gender as $k => $v) {
													?>
														<option value="<?= $k ?>" <?= ($k == $c->c_gender ? "selected" : "") ?> ><?= $v?></option>
													<?php
												}
	                        				?>
	                        			</select><br /><br />
	                        		</div>
	                        		<div class="col-md-3">
	                        			Picture:
	                        			
										<img src="<?= PORTAL_CUSTOMER ?>assets/medias/iecommerce/img/account/<?= (empty($c->c_picture) ? "default.png" : $c->c_picture) ?>"  class="img-responsive">
										<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							            	<input type="file" id="grid-input-6" class="custom-file-input" name="file">
							               	<span class="custom-file-control form-control">Choose file...</span>
							                <div class="px-file-buttons">
							                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
							                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
							                </div>
							            </label>
	                        		</div>
	                        		
	                        	</div>
	                        	<div class="row">
	                        		<div class="col-md-12">
	                        			Address:
										<textarea name="c_address" class="form-control" placeholder="Address"><?= $c->c_address ?></textarea><br />
	                        		</div>
	                        	</div>
	                        	<div class="row">
	                        		<div class="col-md-6">
	                        			City:
										<input type="text" name="c_city" class="form-control" placeholder="City" value="<?= $c->c_city ?>" required/><br />
	                        		</div>
	                        		<div class="col-md-6">
	                        			Postal Code:
										<input type="text" name="c_postcode" class="form-control" placeholder="Postal Code" value="<?= $c->c_postcode ?>"/><br />
	                        		</div>
	                        		<div class="col-md-6">
	                        			State:
										<input type="text" name="c_state" class="form-control" placeholder="State" value="<?= $c->c_state ?>"/><br />
	                        		</div>
	                        		<div class="col-md-6">
	                        			Country:
	                        			<select name="c_country" class="select2">
	                        				<?php
	                        					foreach(countries::list() as $k) {
													?>
														<option value="<?= $k->c_code ?>" <?= ($k->c_code == $c->c_country ? "selected" : "") ?> ><?= $k->c_name?></option>
													<?php
												}
	                        				?>
	                        			</select><br /><br />
	                        		</div>
	                        	</div>
                            </div>
                        </div>    
                    </div>
                    
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Login Information
                            </div>
                            <div class="panel-body">
                                Username:
    							<input type="text" name="c_login" class="form-control" placeholder="Login" value="<?= $c->c_login ?>" required/><br />
    							
    							Password:
    							<input type="password" name="c_password" class="form-control" placeholder="Password"/><br />
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <?php
                            Controller::Form(
                                "customer", 
                                [
                                    "type"  => "edit"  
                                ]
                            );
                        ?>
                        <button class="btn btn-block btn-success">
                            <span class="fa fa-plus"></span>
                            Save
                        </button>
                    </div>
                </div>
            </form>
            <?php
            	}else{
					new Alert("error", "Data not Found");
				}
            ?>
        </div>
    </div>
    
    <?php
        $cl = clients::getBy(["cl_id" => $id]);
        
        if(count($cl) > 0){
            $cl = $cl[0];
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
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
                                        <th class="text-right">Total</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    $no = 1;
                                    foreach(orders::getBy(["o_client" => $cl->cl_id]) as $ro){
                                    ?>
                                        <tr class="">
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><strong><?= $ro->o_no ?></strong></td>
                                            <td class="text-center"><?= $ro->o_gtotal ?></td>
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center"><?= $ro->o_date ?></td>
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
        
    <?php
        }
    
    break;
    
    case "delete":
        $id = url::get(2);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-trash"></span>
            Delete Client
            
            <a href="<?= PORTAL ?>customer" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $c = customers::getBy(["c_id" => $id]);
            
            if(count($c) > 0){
                $c = $c[0];   
            
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">
                    Are you sure?
                </h3>
                
                <p>
                    By clicking below button will remove the selected data <b>'<?= $c->c_name ?>'</b> permanently.
                </p>
                
                <?php
                    Controller::Form(
                        "customer", 
                        [
                            "type"  => "delete"  
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
                new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
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

