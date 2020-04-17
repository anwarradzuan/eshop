<?php
new Controller($_POST);

switch(input::get("action")){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span>
            API Routing List
            <a href="<?= PORTAL ?>system/setting/api-routing-setting&action=add" class="btn btn-primary">
                <span class="fa fa-plus"></span> Add new routing
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Description</th>
                            <th>URL Route</th>
                            <th>File Route</th>
                            <th>Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(a_apirouting::list() as $r){
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>   
                            <td><?= $r->a_description ?></td>
                            <td><?= $r->a_url ?></td>
                            <td><?= $r->a_path ?></td>
                            <td>
                            	<?php
                            	 if($r->a_role == 0){
                            	 	echo "Public";
                            	 }elseif($r->a_role == 1){
                            	 	echo "Admin";
                            	 }else{
                            	 	echo "Client";
                            	 }
                           		?>
                           	</td>
                            <td><?= $r->a_status ? "Enabled" : "Disabled" ?></td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>system/setting/api-routing-setting&action=edit&id=<?= $r->a_id ?>" class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                
                                <a href="<?= PORTAL ?>system/setting/api-routing-setting&action=delete&id=<?= $r->a_id ?>" class="btn btn-danger">
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
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-plus"></span>
            Add API routing
            
            <a href="<?= PORTAL ?>system/setting/api-routing-setting" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Description:
                        <textarea class="form-control" placeholder="Description" name="description"></textarea><br />
                        
                        Status:
                        <select class="form-control select2" name="status">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select><br /><br />
                        Role:
                        <select class="form-control select2" name="status">
                            <option value="0">Public</option>
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                        </select><br /><br />
                    </div>
                    
                    <div class="col-md-6">
                        URL:
                        <div class="input-group">
                            <span class="input-group-addon"><?= PORTAL ?>api/</span>
                            <textarea class="form-control" name="url" placeholder="URL"></textarea>
                        </div><br />
                        
                        Path:
                        <div class="input-group">
                            <span class="input-group-addon">/Views/pages/webservice/</span>
                            <textarea class="form-control" name="path" placeholder="URL"></textarea>
                        </div><br />
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <?= Controller::Form("api_routing", ["type" => "add"]) ?>
                        <button class="btn btn-success">
                            <span class="fa fa-plus"></span> Add routing
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
        $id = Input::get("id");
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-plus"></span>
            Add API routing
            
            <a href="<?= PORTAL ?>system/setting/api-routing-setting" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $a = a_apirouting::getBy(["a_id" => $id]);
            
            if(count($a) > 0){
                $a = $a[0];
        ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Description:
                        <textarea class="form-control" placeholder="Description" name="description"><?= $a->a_description ?></textarea><br />
                        
                        Status:
                        <select class="form-control select2" name="status">
                            <option value="1" <?= $a->a_status ? "selected" : "" ?>>Enable</option>
                            <option value="0" <?= $a->a_status ? "" : "selected" ?>>Disable</option>
                        </select><br /><br />
                        Role:
                        <select class="form-control select2" name="a_role">
                        	<option value="0" <?= $a->a_role==0 ? "selected" : "" ?>>Public</option>
                            <option value="1" <?= $a->a_role==1 ? "selected" : "" ?>>Admin</option>
                            <option value="2" <?= $a->a_role==2 ? "selected" : "" ?>>Client</option>
                        </select><br /><br />
                    </div>
                    
                    <div class="col-md-6">
                        URL:
                        <div class="input-group">
                            <span class="input-group-addon">https://myiecommerce.intelpro.com.my/api/</span>
                            <textarea class="form-control" name="url" placeholder="URL"><?= $a->a_url ?></textarea>
                        </div><br />
                        
                        Path:
                        <div class="input-group">
                            <span class="input-group-addon">/Views/pages/webservice/</span>
                            <textarea class="form-control" name="path" placeholder="Path"><?= $a->a_path ?></textarea>
                        </div><br />
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <?= Controller::Form("api_routing", ["type" => "edit"]) ?>
                        <button class="btn btn-success">
                            <span class="fa fa-edit"></span> Save
                        </button>
                    </div>
                </div>
                
            </form>
        <?php
            }else{
                new Alert("error", "sorry, selected routing information not found in system database.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
    
    case "delete":
        $id = Input::get("id");
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-plus"></span>
            Add API routing
            
            <a href="<?= PORTAL ?>system/setting/api-routing-setting" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $a = a_apirouting::getBy(["a_id" => $id]);
            
            if(count($a) > 0){
                $a = $a[0];
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">Are you sure?</h3>
                <p>
                    By clicking below button will remove routing '<?= $a->a_url ?>' permanently.
                </p>
                
                <?= Controller::Form("api_routing", ["type" => "delete"]) ?>
                <button class="btn btn-danger">
                    <span class="fa fa-trash"></span> Delete routing
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "sorry, selected routing information not found in system database.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
}