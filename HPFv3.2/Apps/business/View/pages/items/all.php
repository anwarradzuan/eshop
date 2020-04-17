<?php
new Controller ($_POST);
switch (url::Get(2)){
    case "":
    
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"> All Items
            <a class="btn btn-primary" href="<?= PORTAL ?>items/all-item/add"><span class="fa fa-plus">Add New Item</span></a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Price (<?= Currency::getSign() ?>)</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
						$client = $_SESSION['cl_id'];
                        foreach(items::getBy(["i_client" => $client]) as $m){
                        ?>
                        <tr class="text-center">
                            <td class="text-center"><?php echo $i ?></td>
                            <td class="text-center" width="10%"><?php echo $m->i_name ?></td>
                            <td width="8%">
                            	<?php 
                            		$pic = item_picture::getBy(["ip_item" => $m->i_id]);
									if(count($pic) > 0){
										$pic = $pic[0];
										?>
											<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $pic->ip_file ?>" class="img img-responsive text-center" />
										<?php
									}else{
										echo"No Image";
									}
                            	
                            	?>
                            </td>
                            <td class="text-center"><?= number_format(Currency::getPrice($m->i_price), 2) ?></td>
                            
                            <td class="text-center">
                            	<?php 
                            		$cat = item_category::getBy(["ic_item" => $m->i_id]);
                            		if(count($cat) > 0){
                            			$cat = $cat[0];
                            			$c = category::getBy(["c_id" => $cat->ic_category]);
										
										if(count($c) > 0){
											$c = $c[0];
											echo $c->c_name;
										}
                            		}
                            	?>
                            	
                            </td>
                            <td class="text-center">
                                <?php
                                    $b = $m->i_status;
									if($b == 0){
										echo "Disable";
									}else{
										echo "Enable";
									}
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="<?= PORTAL ?>items/all-item/edit/<?php echo $m->i_key ?>" ><span class="fa fa-edit"></span></a>
                                <a class="btn btn-danger" href="<?= PORTAL ?>items/all-item/delete/<?php echo $m->i_key ?>" ><span class="fa fa-trash"></span></a>
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
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-plus"> Add Item</span>
                <a class="btn btn-primary" href="<?php echo PORTAL ?>items/all-item" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-info">
                        	<form action="" method="POST">
                                <div class="panel-heading">
                                    Item Information
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            Name:
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            Status:
                                            <select  class="form-control select2" name="status">
                                                <?php
					            			        foreach(Setting::$boolean as $c => $k){
					            			            ?>
					            			                <option value="<?= $c ?>"><?= $k ?></option>
					            			            <?php
					            			        }
					            			    ?>
                                            </select><br /><br />
                                        </div>
                                        <div class="col-sm-4">
                                            Company/Branch:
                                            <select  class="form-control select2" name="company">
                                                <?php
                                                	$cl = clients::getBy(["cl_id" => $_SESSION['cl_id']]);
													if(count($cl) > 0){
													$cl = $cl[0];
														echo $cl->cl_company;
												
														foreach(company::getBy(['c_id' => $cl->cl_company]) as $company){
					            			            ?>
					            			                <option value="<?= $company->c_id ?>"><?= $company->c_name ?></option>
					            			            <?php
					            			        	}
													}
					            			    ?>
                                            </select><br /><br />
                                        </div>
                                    </div><br />
                                    <div class="row">
                                        <div class="col-sm-4">
                                            Price (<?= Currency::getCode() ?>):
                                            <input class="form-control" type="text" name="price" required>
                                        </div>
                                        <div class="col-sm-4">
                                            SKU (Optional):
                                            <input class="form-control" type="text" name="sku">
                                        </div>
                                        <div class="col-sm-4">
                                            Category:
                                            <select  class="form-control select2" name="category">
                                                <?php
					            			        foreach(category::list() as $c){
					            			            ?>
					            			                <option value="<?= $c->c_id ?>"><?= $c->c_name ?></option>
					            			            <?php
					            			        }
					            			    ?>
                                            </select><br /><br /><br />
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-3">
                                            Weight (kg):
                                            <input class="form-control" type="text" name="weight">
                                        </div>
                                        <div class="col-sm-3">
                                            Height (cm):
                                            <input class="form-control" type="text" name="height">
                                        </div>
                                        <div class="col-sm-3">
                                            Width (cm):
                                            <input class="form-control" type="text" name="width">
                                        </div>
                                        <div class="col-sm-3">
                                            Length (cm):
                                            <input class="form-control" type="text" name="length">
                                        </div>
                                    </div><br /><br /><br />
                                    <div class="row">
                                    	<div class="col-md-12 text-center">
				                            <?php
				                                Controller::Form(
				                                    "items/items-all", 
				                                    [
				                                        "action"  => "add"  
				                                    ]
				                                );
				                            ?>
				                            <button class="btn btn-success btn-block">
				                                <span class="fa fa-save"></span> Save
				                            </button>
				                        </div>
                                    </div>
                                </div>
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    break;
    
    case "edit":
?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="fa fa-edit"> Edit Item
                <a class="btn btn-primary" href="<?php echo PORTAL ?>items/all-item">Back</a>
            </div>
            <div class="panel-body">
            	<div class="row">
            		<?php
	            		$id = url::get(3);
			            $items = items::getBy(['i_key' => $id]);
						if(count($items) > 0){
							$item = $items[0];
						
							$menus = ["Item Informations", "Medias", "Item Options", "Attributes", "Item Promotions", "Item Descriptions"];
							$view = F::URLSlugDecode(url::get(4));
							if(empty($view)){
								$view = $menus[0];
							}
					?>
            		<div class="col-md-12">
			            <ul class="nav nav-tabs" id="tab-resize-tabs">
			            	<?php
								foreach($menus as $menu){
									if($menu == $view){
										$active = "active";
									}else{
										$active = "";
									}
								?>
								<li class="<?= $active ?>">
									<a href="<?= PORTAL_BUSINESS ?>items/all-item/edit/<?= url::Get(3) ?>/<?= F::URLSlugEncode($menu) ?>" data-toggle=""><?= $menu ?></a>
								</li>
								<?php
								}
							?>
			            </ul>
			            <div class="tab-content">
			            	<?php
								switch($view){
									default:
										case "Item Informations":
											Page::Load("pages/items/edit/info");
										break;
										
										case "Medias":
											Page::Load("pages/items/edit/image");
										break;
										
										case "Item Options":
											Page::Load("pages/items/edit/option");
										break;
										
										case "Attributes":
											Page::Load("pages/items/edit/attribute");
										break;
										
										// case "Additional Fees":
											// Page::Load("pages/items/edit/fee");
										// break;
										
										case "Item Promotions":
											Page::Load("pages/items/edit/promotion");
										break;
										
										case "Item Descriptions":
											Page::Load("pages/items/edit/detail");
										break;
										
										// case "Shipping":
											// Page::Load("pages/items/edit/shipping");
										// break;
									
									
								}
							?>
			            </div>
			    	</div>
			    	<?php
			    		}
			    	?>
            	</div>
            </div>
        </div>
<?php
    break;
   
    case "delete":
?>
        
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-trash"> Delete Item
                <a class="btn btn-primary" href="<?php echo PORTAL ?>items/all-item" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Item Information
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST">
                                    <?php 
                                        $id=url::get('3');
                                        $t = items::getBy(['i_key' => $id]);
                                        
                                        if(count($t) > 0){
                                            $t = $t[0];
                                    ?>
                                   	 Are you sure to delete <b><?php echo $t->i_name ?></b> item permanently?<br /><br />
                                   	 <button class="btn btn-danger">
                                        <span class="fa fa-trash"></span> Confirm
                                    </button>
                                    <?php
                                        Controller::Form(
                                            "items/items-all", 
                                            [
                                                "action"  => "delete"  
                                            ]
                                        );
                                    ?>
                                    <?php
                                        }else{
                                            new Alert("error","Data not found");
                                        }

                                    ?>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    break;   
}
?>