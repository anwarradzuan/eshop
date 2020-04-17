<?php
new Controller ($_POST);
switch (url::Get(2)){
    case "":
    
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"> All Shipping
            <a class="btn btn-primary" href="<?= PORTAL ?>shipping/shipping/add"><span class="fa fa-plus">Add New Shipping</span></a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price (<?= Currency::getSign() ?>)</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
						$comp = $_SESSION['cl_company'];
                        foreach(shippings::getBy(["s_company" => $comp]) as $m){
                        ?>
                        <tr class="text-center">
                            <td class="text-center"><?php echo $i ?></td>
                            <td class="text-center"><?php echo $m->s_name ?></td>
                            <td class="text-center"><?php echo number_format($m->s_value, 2) ?></td>
                            
                            <td class="text-center">
                                <?php
                                    $b = $m->s_status;
									if($b == 0){
										echo "Disable";
									}else{
										echo "Enable";
									}
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="<?= PORTAL ?>shipping/shipping/edit/<?php echo $m->s_id ?>" ><span class="fa fa-edit"></span></a>
                                <a class="btn btn-danger" href="<?= PORTAL ?>shipping/shipping/delete/<?php echo $m->s_id ?>" ><span class="fa fa-trash"></span></a>
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
                <span class="fa fa-plus"> Add Shipping</span>
                <a class="btn btn-primary" href="<?php echo PORTAL ?>shipping" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                        	<form action="" method="POST">
                                <div class="panel-heading">
                                    Shipping Information
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Name:
                                            <input class="form-control" type="text" name="s_name" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-6">
                                            Price (<?= Currency::getSign() ?>):
                                            <input class="form-control" type="number" name="s_value" min="0" required>
                                        </div>
                                        <div class="col-sm-6">
                                            Status:
                                            <select  class="form-control select2" name="s_status">
                                                <?php
					            			        foreach(Setting::$boolean as $c => $k){
					            			            ?>
					            			                <option value="<?= $c ?>"><?= $k ?></option>
					            			            <?php
					            			        }
					            			    ?>
                                            </select><br /><br />
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-12">
	                                    	Description: 
	            							<textarea class="form-control" name="s_description" rows="5"></textarea></br>
                                    	</div>
                                    </div>
                                    <div class="col-md-12 text-center">
			                            <?php
			                                Controller::Form(
			                                    "shipping", 
			                                    [
			                                        "action"  => "add"  
			                                    ]
			                                );
			                            ?>
			                            <button class="btn btn-success">
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
						
							$menus = ["Item Informations", "Images", "Item Options", "Attributes", "Additional Fees", "Item Promotions", "Item Descriptions" ];
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
										
										case "Images":
											Page::Load("pages/items/edit/image");
										break;
										
										case "Item Options":
											Page::Load("pages/items/edit/option");
										break;
										
										case "Attributes":
											Page::Load("pages/items/edit/attribute");
										break;
										
										case "Additional Fees":
											Page::Load("pages/items/edit/fee");
										break;
										
										case "Item Promotions":
											Page::Load("pages/items/edit/promotion");
										break;
										
										case "Item Descriptions":
											Page::Load("pages/items/edit/detail");
										break;
									
									
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