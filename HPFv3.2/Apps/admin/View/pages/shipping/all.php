<?php
defined("HFA") or die();

new Controller($_POST);

switch(url::get(1)){
    case "":
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"></span> List Shipping
            <a href="<?= PORTAL ?>shipping/add/add" class="btn btn-primary">
                <span class="fa fa-plus"></span> Add new Shipping
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
            <table class="table table-reponsive table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">From</th>
                        <th class="text-center">To</th>
                        <th class="text-right">Price (<?= Currency::getSign() ?>)</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">:::</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    $no = 1;
                    foreach(shippings::list(["order" => "s_id DESC"]) as $shipping){
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $shipping->s_name?></td>
                        <td class="text-center">
							<?php 
                        		$from = $shipping->s_from;
                        		foreach (countries::list() as $ff){
									$code = $ff->c_code;
									if($code == $from){
										echo $ff->c_name . " " . "(" . $code . ")";
									} 
								}
                        	?>
						</td>
                        <td class="text-center">
                        	<?php 
                        		$from = $shipping->s_to;
                        		foreach (countries::list() as $ff){
									$code = $ff->c_code;
									if($code == $from){
										echo $ff->c_name . " " . "(" . $code . ")";
									} 
								}
                        	?>
                        </td>
                        <td class="text-right"><?= number_format($shipping->s_value, 2) ?></td>
                        <td class="text-center">
                        	<?php 
                        		$status = $shipping->s_status; 
                        		foreach (Setting::$boolean as $key => $value) {
									if($status == $key){
										echo $value;
									}
								}
                        	?>
                        </td>
                        <td class="text-center"><?= $shipping->s_user ?></td>
                        <td class="text-center"><?= $shipping->s_date ?></td>
                        <td class="text-center">
                            <a href="<?= PORTAL ?>shipping/edit/<?= $shipping->s_id ?>" class="btn btn-primary">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?= PORTAL ?>shipping/delete/<?= $shipping->s_id ?>" class="btn btn-danger">
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
            Add Shipping
            
            <a href="<?= PORTAL ?>shipping" class="btn btn-primary">
                Back
            </a>
        </div>
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Shipping Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            Name:
                                            <input class="form-control" type="text" name="s_name" value="" placeholder="Name" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            Price (<?= Currency::getSign() ?>):
                                            <input class="form-control" type="text" name="s_value" value="" placeholder="Price">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            Status:
                                            <select name="s_status" class="select2" >
                                            	<?php
                                            		foreach (Setting::$boolean as $k => $x){
                                            			
														?>
															<option value="<?= $k ?>"><?= $x ?></option>
														<?php
													}
                                            	?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            Weight (grams):
                                            <input class="form-control" type="number" name="s_weight" value="" min="1" placeholder="gm" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            From:
                                            <select name="s_from" class="select2">
                                            	<?php
                                            		foreach (countries::list() as $ct){
                                            			
														?>
															<option value="<?= $ct->c_code ?>"><?= $ct->c_name ?></option>
														<?php
													}
                                            	?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            To:
                                            <select name="s_to" class="select2" >
                                            	<?php
                                            		foreach (countries::list() as $ct){
                                            			
														?>
															<option value="<?= $ct->c_code ?>"><?= $ct->c_name ?></option>
														<?php
													}
                                            	?>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            Description:
                                            <textarea name="s_description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
			                        <?php
			                            Controller::Form("shipping", ["action" => "add"]);
			                        ?>
			                        <button class="btn btn-success btn-block">
			                            <span class="fa fa-save"></span> Save
			                        </button>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
    	$id = url::get(2);
		$et = shippings::getBy(["s_id"=> $id]);
		if(count($et) > 0){
			$et = $et[0];
			?>
			<div class="panel panel-default">
		        <div class="panel-heading">
		            <span class="fa fa-plus"></span>
		            Edit Shipping Information
		            <a href="<?= PORTAL ?>shipping" class="btn btn-primary">
		                Back
		            </a>
		        </div>
		        <div class="panel-body">
		            <form action="" method="POST">
		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="panel panel-info">
		                            <div class="panel-heading">
		                                Shipping Information
		                            </div>
		                            <div class="panel-body">
		                                <div class="form-group">
		                                    <div class="row">
		                                        <div class="col-sm-12 form-group">
		                                            Name:
		                                            <input class="form-control" type="text" name="s_name" value="<?= $et->s_name ?>" placeholder="Name" required>
		                                        </div>
		                                        <div class="col-sm-4 form-group">
		                                            Price (<?= Currency::getSign() ?>):
		                                            <input class="form-control" type="text" name="s_value" value="<?= number_format($et->s_value, 2) ?>" placeholder="Price">
		                                        </div>
		                                        <div class="col-sm-4 form-group">
		                                            Status:
		                                            <select name="s_status" class="select2" >
		                                            	<?php
		                                            		foreach (Setting::$boolean as $k => $x){
		                                            			
																?>
																	<option value="<?= $k ?>" <?= ($k==$et->s_status ? "selected" : "") ?> ><?= $x ?></option>
																<?php
															}
		                                            	?>
		                                            </select>
		                                        </div>
		                                        <div class="col-sm-4 form-group">
		                                            Weight (grams):
		                                            <input class="form-control" type="number" name="s_weight" value="<?= $et->s_weight ?>" min="1" placeholder="gm" required>
		                                        </div>
		                                        <div class="col-sm-6 form-group">
		                                            From:
		                                            <select name="s_from" class="select2">
		                                            	<?php
		                                            		foreach (countries::list() as $ct){
		                                            			
																?>
																	<option value="<?= $ct->c_code ?>" <?= ( $ct->c_code == $et->s_from ? "selected" : "") ?> ><?= $ct->c_name ?></option>
																<?php
															}
		                                            	?>
		                                            </select>
		                                        </div>
		                                        <div class="col-sm-6 form-group">
		                                            To:
		                                            <select name="s_to" class="select2" >
		                                            	<?php
		                                            		foreach (countries::list() as $ct){
		                                            			
																?>
																	<option value="<?= $ct->c_code ?>" <?= ( $ct->c_code == $et->s_to ? "selected" : "") ?> ><?= $ct->c_name ?></option>
																<?php
															}
		                                            	?>
		                                            </select>
		                                        </div>
		                                        <div class="col-sm-12 form-group">
		                                            Description:
		                                            <textarea name="s_description" class="form-control"><?= $et->s_description ?></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="text-center">
					                        <?php
					                            Controller::Form("shipping", ["action" => "edit"]);
					                        ?>
					                        <button class="btn btn-success btn-block">
					                            <span class="fa fa-save"></span> Save
					                        </button>
					                    </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
			<?php
		}else{
			new Alert("error","No shipping information founded");
		}
    	
    break;
    
    case "delete":
        $id = url::get(2);
    ?>
    <div class="col-md-4 panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-trash"></span>
            Delete Shipping
            
            <a href="<?= PORTAL ?>shipping" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $check = shippings::getBy(["s_id" => $id]);
            
            if(count($check) > 0){
                $check = $check[0];
            
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">
                    Are you sure?
                </h3>
                
                <p>
                    By clicking below button will remove <b>'<?= $check->s_name ?>'</b> shipping information permanently.
                </p>
                
                <?php
                    Controller::Form(
                        "shipping", 
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
                new Alert("error", "Shipping successfully removed or selected shipping is not found in our database. Please select a correct shipping data to view the information.");
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

