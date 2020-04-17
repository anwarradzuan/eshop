<?php
defined("HFA") or die();

new Controller($_POST);

switch(url::get(2)){
    case "":
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"></span> All Clients
            <a href="<?= PORTAL ?>clients/all-clients/add" class="btn btn-primary">
                <span class="fa fa-plus"></span> Register new client
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
            <table class="table table-reponsive table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th class="text-center">Company</th>
                        <th class="text-right">Sold</th>
                        <th class="text-center">:::</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    $no = 1;
                    foreach(clients::list(["order" => "cl_id DESC"]) as $c){
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td>
                            <?= $c->cl_name ?>
                        </td>
                        <td>
                            Tel: <?= $c->cl_phone ?><br />
                            Email: <?= $c->cl_email ?>
                        </td>
                        <td class="text-center">
                        	<strong>
                        		<?php
                        			$d = company::getBy(["c_id" => $c->cl_company]);
                        				if(count($d) > 0){
                        					$d =$d[0];
											echo $d->c_name;
                        				}
                        		?>
                        	</strong>
                        </td>
                        <td class="text-right">
                        <?php
                            $x = DB::conn()->query("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_client = ? AND oi_shipping_status > 0", ["oi_client" => $c->cl_id])->results();
                            
                            if(count($x) > 0){
                                echo number_format($x[0]->total, 2);
                            }else{
                                echo "0.00";
                            }
                        ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= PORTAL ?>clients/all-clients/edit/<?= $c->cl_id ?>" class="btn btn-primary">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?= PORTAL ?>clients/all-clients/delete/<?= $c->cl_id ?>" class="btn btn-danger">
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
            Add Client
            
            <a href="<?= PORTAL ?>clients/all-clients" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Client Information
                            </div>
                            
                            <div class="panel-body">
                                
					            
					            <div class="row">
					            	<div class="col-md-8">
					            		Full Name:
					            		<input type="text" name="cl_name" class="form-control" placeholder="Name" required/><br />
					            	</div>
					            	<div class="col-md-4">
					            		Profile Picture:
										<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							            	<input type="file" id="grid-input-6" class="custom-file-input" accept="image/*" name="file">
							               	<span class="custom-file-control form-control">Choose file...</span>
							                <div class="px-file-buttons">
							                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
							                  	<lebel type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</lebel>
							                </div>
							          	</label><br />
					            	</div>
									<div class="col-md-6">
										Telephone:
						            	<input type="tel" name="cl_phone" class="form-control" placeholder="Phone Number" required/><br />
									</div>
									<div class="col-md-6">
										Email:
						            <input type="email" name="cl_email" class="form-control" placeholder="Email" required/><br />
									</div>
								</div>
				                    Company:
                					<select class="form-control select2" xdata-allow-clear="true" name="cl_company" id="">
                					<?php
                						foreach(company::list() as $a){
                					?>
                						<option value="<?= $a->c_id ?>"><?= $a->c_name ?></option>
                					<?php
                						}
                					?>
                					</select><br /><br />
					            
					            Address:
					            <textarea name="cl_address" class="form-control" placeholder="Address" id="cl_address"></textarea><br />
					            
					            <div class="row">
					                <div class="col-md-6">
					                    Postal Code:
					                    <input type="text" name="cl_postal" class="form-control" placeholder="Postal Code" required/><br />
					                </div>
					                
					                <div class="col-md-6">
					                    City:
					                    <input type="text" name="cl_city" class="form-control" placeholder="City"/><br />
					                </div>
					                
					                <div class="col-md-6">
					                    State:
				                        <input type="text" name="cl_state" class="form-control" placeholder="State"/><br />
					                </div>
					                
					                <div class="col-md-6">
					                    Country:
                    					<select class="form-control select2" xdata-allow-clear="true" name="cl_country" id="cl_country">
                    					<?php
                    						foreach(DB::conn()->query("SELECT * FROM countries WHERE c_code <> ?", array(""))->results() as $a){
                    					?>
                    						<option value="<?= $a->c_code ?>"><?= $a->c_name ?></option>
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
                                Client Login
                            </div>
                            
                            <div class="panel-body">
                                Username:
    							<input type="text" name="cl_login" class="form-control" placeholder="Login" value="" id="cl_login" required/><br />
    							
    							Password:
    							<input type="password" name="cl_password" class="form-control" placeholder="Password" value="" id="cl_password" required/><br />
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Bank Information
                            </div>
                            
                            <div class="panel-body">
                            	<div class="col-md-12">
                            		<select class="form-control select2" name="cl_bankName">
                            			<option value="">Please Select</option>
                            			<?php
                            				foreach (Setting::$bankName as $key => $value) {
												?>
												<option value="<?= $key ?>" ><?= $value ?></option>
												<?php
											}
                            			?>
                            		</select>
                            	</div><br /><br />
                            	<div class="col-md-6">
                            		Account No:
                        			<input class="form-control" name="cl_accno" value="">
                            	</div>
                            	<div class="col-md-6">
                            		Bank Branch:
                            		<input class="form-control" name="cl_bankbranch" value="">
                            	</div>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <?php
                            Controller::Form(
                                "clients/clients", 
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
        $id = url::get(3);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-edit"></span>
            Edit Client
            
            <a href="<?= PORTAL ?>clients/all-clients" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $cl = clients::getBy(["cl_id" => $id]);
            
            if(count($cl) > 0){
                $cl = $cl[0];
        ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Client Information
                            </div>
                            <div class="panel-body">
                            	<img src="<?= PORTAL_BUSINESS ?>assets/medias/profiles/<?= empty($cl->cl_picture) ? "default.png" : $cl->cl_picture ?>" alt="" class="" style="max-width: 100%;"><br />
                            	Profile Picture:
								<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
					            	<input type="file" id="grid-input-6" class="custom-file-input" accept="image/*" name="file">
					               	<span class="custom-file-control form-control">Choose file...</span>
					                <div class="px-file-buttons">
					                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
					                  	<lebel type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</lebel>
					                </div>
					          	</label><br />
                                Full Name:
					            <input type="text" name="cl_name" class="form-control" placeholder="Name" value="<?= $cl->cl_name ?>" id="cl_name" /><br />
					            
					            Telephone:
					            <input type="tel" name="cl_phone" class="form-control" placeholder="Phone Number" value="<?= $cl->cl_phone ?>" id="cl_phone" /><br />
					
					            Email:
					            <input type="email" name="cl_email" class="form-control" placeholder="Email" value="<?= $cl->cl_email ?>" id="cl_email"><br />
					            
					            Company:
            					<select class="form-control select2" xdata-allow-clear="true" name="cl_company" id="">
            					<?php
            						foreach(company::list() as $a){
            					?>
            						<option value="<?= $a->c_id ?>" <?= $cl->cl_company == $a->c_id ? "selected" : "" ?> ><?= $a->c_name ?></option>
            					<?php
            						}
            					?>
            					</select><br /><br />
					            
					            Address:
					            <textarea name="cl_address" class="form-control" placeholder="Address" id="cl_address"><?= $cl->cl_address ?></textarea><br />
					            
					            <div class="row">
					                <div class="col-md-6">
					                    Postal Code:
					                    <input type="text" name="cl_postal" class="form-control" placeholder="Postal Code" value="<?= $cl->cl_postal ?>" id="cl_postal" /><br />
					                </div>
					                
					                <div class="col-md-6">
					                    City:
					                    <input type="text" name="cl_city" class="form-control" placeholder="City" value="<?= $cl->cl_city ?>" id="cl_city" /><br />
					                </div>
					                
					                <div class="col-md-6">
					                    State:
				                        <input type="text" name="cl_state" class="form-control" placeholder="State" value="<?= $cl->cl_state ?>" id="cl_state" /><br />
					                </div>
					                
					                <div class="col-md-6">
					                    Country:
                    					<select class="form-control select2" xdata-allow-clear="true" name="cl_country" id="cl_country">
                    					<?php
                    						foreach(DB::conn()->query("SELECT * FROM countries WHERE c_code <> ?", array(""))->results() as $a){
                    					?>
                    						<option value="<?= $a->c_code ?>" <?= $cl->cl_country == $a->c_code ? "selected" : "" ?>><?= $a->c_name ?></option>
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
                                Client Login
                            </div>
                            
                            <div class="panel-body">
                                Username:
    							<input type="text" name="cl_login" class="form-control" placeholder="Login" value="<?= $cl->cl_login ?>" id="cl_login" /><br />
    							
    							Password (new password only):
    							<input type="password" name="cl_password" class="form-control" autocomplete="off" placeholder="Password" id="cl_password" value=""/><br />
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Bank Information
                            </div>
                            
                            <div class="panel-body">
                            	<div class="col-md-12" name="c_bankName">
                            		<select class="form-control select2" name="cl_bankName">
                            			<option value="">Please Select</option>
                            			<?php
                            				foreach (Setting::$bankName as $key => $value) {
												?>
												<option value="<?= $key ?>" <?= $key==$cl->cl_bankName ? "Selected" : "" ?> ><?= $value ?></option>
												<?php
											}
                            			?>
                            		</select>
                            	</div><br /><br />
                            	<div class="col-md-6">
                            		Account No:
                        			<input class="form-control" name="cl_accno" value="<?= $cl->cl_accno ?>">
                            	</div>
                            	<div class="col-md-6">
                            		Bank Branch:
                            		<input class="form-control" name="cl_bankbranch" value="<?= $cl->cl_bankbranch ?>">
                            	</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12 text-center">
                        <?php
                            Controller::Form(
                                "clients/clients", 
                                [
                                    "type"  => "edit"  
                                ]
                            );
                        ?>
                        <button class="btn btn-success">
                            <span class="fa fa-save"></span>
                            Save
                        </button>
                    </div>
                </div>
            </form>
        <?php
            }else{
                new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
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
                                    foreach(order_item::getBy(["oi_client" => $cl->cl_id]) as $ro){
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
        
    <?php
        }
    
    break;
    
    case "delete":
        $id = url::get(3);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-trash"></span>
            Delete Client
            
            <a href="<?= PORTAL ?>clients/all-clients" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $cl = clients::getBy(["cl_id" => $id]);
            
            if(count($cl) > 0){
                $cl = $cl[0];    
				$comp = company::getBy(["c_id" =>$cl->cl_company]);
            
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">
                    Are you sure?
                </h3>
                
                <p>
                    By clicking below button will remove the selected data <b>'<?= $cl->cl_name ?>'</b> permanently.
                </p>
                
                <?php
                    Controller::Form(
                        "clients/clients", 
                        [
                            "type"  => "delete"  
                        ]
                    );
                ?>
                <input name="c_id" type="hidden" value="<?= (count($comp) > 0) ? $comp[0]->c_id : "" ?>"/>
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

