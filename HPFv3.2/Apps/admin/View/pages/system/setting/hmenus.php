<?php
new Controller ($_POST);
switch (input::get('action')){
    case "":
    
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"> List Host Manus
            <a class="btn btn-primary" href="<?= PORTAL ?>system/setting/hmenus&action=add"><span class="fa fa-plus">Add New Menus</span></a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Main Name</th>
                            <th>URL</th>
                            <th>Route</th>
                            <th>Main</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Icon</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $i = 0;
                    foreach(cm_menus::list() as $m){
                        $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $m->cm_name?></td>
                        <td><?php echo $m->cm_url?></td>
                        <td><?php echo $m->cm_route?></td>
                        <td class="text-center">
                        <?php
            				
            				$x = cm_menus::getBy(['cm_id' => $m->cm_main]);
            				
            				if(count($x) > 0){
            				    $x = $x[0];
            				    echo $x->cm_name;
            				}else{
            				    echo "None";
            				}
            				
                        ?>
                        </td>
                        <td class="text-center"><?php echo $m->cm_order?></td>
                        <td class="text-center">
                            <?php
                                $b = $m->cm_status;
                                
                                if($b == 1){
                                    echo "Enable";
                                }else{
                                    echo "Disable";
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <span class="<?php echo $m->cm_icon?>"></span>
                        </td>
                        <td class="text-center"><?php echo $m->cm_date?></td>
                        <td class="text-center"><?php echo $m->cm_user?></td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="<?php echo PORTAL ?>system/setting/hmenus&action=edit&id=<?php echo $m->cm_id ?>" ><span class="fa fa-edit"></span></a>
                            <a class="btn btn-danger" href="<?php echo PORTAL ?>system/setting/hmenus&action=delete&id=<?php echo $m->cm_id ?>" ><span class="fa fa-trash"></span></a>
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
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-plus"> Add Menus
                <a class="btn btn-primary" href="<?php echo PORTAL ?>system/setting/hmenus" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Menus Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="" method="POST">
                                        Name:
                                        <input class="form-control" type="text" name="name" value=""><br />
                                        
                                        URL:
                                        <input class="form-control" type="text" name="url" value=""><br />
                                        
                                        Route:
                                        <input class="form-control" type="text" name="m_route" value=""><br />
                                        
                                        Main:
                                        <select  class="form-control select2" name="main">
                                            <option value="0">None</option>
                                        <?php
                                            foreach(cm_menus::list() as $m){
                                            ?>
                                            <option value="<?php echo $m->cm_id?>"><?php echo $m->cm_name?> (<?= $m->cm_route ?>)</option>
                                        <?php
                                            }
                                        ?>
                                        </select><br /><br />
                                        
                                        Order:
                                        <input class="form-control" type="number" name="order" value=""><br />
                                        
                                        Eligible in Position:
                                        <select class="form-control select2" multiple style="width: 100%" name="position[]" placeholder="Select Position">
                                        <?php
                                            foreach(Setting::$systemMenuPosition as $pos => $value){
                                            ?>
                                            <option value="<?= $value ?>"><?= $value ?></option>
                                            <?php
                                            }
                                        ?>
                                        </select><br /><br />
                                        
                                        Status:
                                        <select  class="form-control select2" name="status">
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select><br /><br />
                                        
                                        Icon:
                                        <input class="form-control" type="" name="icon" value=""><br />
                                        
                                        <?php
                                            Controller::Form("hmenus", ["type"  => "add"]);
                                        ?>
                                        <button class="btn btn-success">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    break;
    
    case "edit":
        
        ?>
        
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-edit"> Edit Menus
                <a class="btn btn-primary" href="<?php echo PORTAL ?>system/setting/hmenus" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Menus Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php
                        				$p = cm_menus::getBy(['cm_id' => input::get('id')]);
                        				
                        				if(count($p) > 0){
                        					$p = $p[0];
                        			?>
                                    <form action="" method="POST">
                                        Menu Name:
                                        <input class="form-control" type="text" name="name" value="<?php echo $p->cm_name ?>"><br />
                                        
                                        Menu URL:
                                        <input class="form-control" type="text" name="url" value="<?php echo $p->cm_url ?>"><br />
                                        
                                        Menu Route:
                                        <input class="form-control" type="text" name="m_route" value="<?php echo $p->cm_route ?>"><br />
                                        
                                        Menu Main:
                                        <select  class="form-control select2" name="main">
                                            <option value="0">None</option>
                                        <?php
                                            foreach(cm_menus::list() as $m){
                                            ?>
                                            <option value="<?php echo $m->cm_id?>" <?php echo $m->cm_id == $p->cm_main ? "selected" : "" ?>>
                                                <?php echo $m->cm_name?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select><br /><br />
                                            
                                        Menu Order:
                                        <input class="form-control" type="number" name="order" value="<?php echo $p->cm_order ?>"><br />
                                        
                                        Eligible in Position:
                                        <select class="form-control select2" multiple style="width: 100%" name="position[]" placeholder="Select Position">
                                        <?php
                                            $posd = explode(",", $p->cm_position);
                                            foreach(Setting::$systemMenuPosition as $pos => $value){
                                                if(in_array($value, $posd)){
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }
                                            ?>
                                            <option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
                                            <?php
                                            }
                                        ?>
                                        </select><br /><br />
                                        
                                        Menu Status:
                                        <select  class="form-control select2" name="status">
                                            <option value="1" <?php echo ($p->cm_status == 1 ? "selected" : "") ?>>Enable</option>
                                            <option value="0" <?php echo ($p->cm_status == 0 ? "selected" : "") ?>>Disable</option>
                                        </select><br /><br />
                                        Menu Icon:
                                        <input class="form-control" type="text" name="icon" value="<?php echo $p->cm_icon ?>"><br />
                                        
                                        <?php
                                            Controller::Form(
                                                "hmenus", 
                                                [
                                                    "type"  => "edit"  
                                                ]
                                            );
                                        ?>
                                        <button class="btn btn-success">Save</button>
                                    </form>
                                    <?php
                        				}
                                    ?>
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
        
        ?>
        
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-edit"> Delete Menus
                <a class="btn btn-primary" href="<?php echo PORTAL ?>system/setting/hmenus" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Menus Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php
                        				$p = cm_menus::getBy(['cm_id' => input::get('id')]);
                        				
                        				if(count($p) > 0){
                        					$p = $p[0];
                        			?>
                                    <form action="" method="POST">
                                        Menu Name:
                                        Are you sure to delete '<?php echo $p->cm_name ?>' manu permanently?<br /><br />
                                        <?php
                                            Controller::Form(
                                                "hmenus", 
                                                [
                                                    "type"  => "delete"  
                                                ]
                                            );
                                        ?>
                                        <button class="btn btn-danger">Confirm</button>
                                    </form>
                                    <?php
                        				}
                                    ?>
                                </div>
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