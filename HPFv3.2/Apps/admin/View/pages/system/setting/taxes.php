<?php

new Controller($_POST);

switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> List Taxes
            <a href="<?= PORTAL ?>system/taxes/add" class="btn btn-sm btn-primary">
                <span class="fa fa-plus"></span> Add new Tax 
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-responsive data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-right">Rate</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(taxes::list() as $rt){
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $rt->t_name ?></td>
                            <td class="text-right"><?= $rt->t_rate ?>%</td>
                            <td class="text-center"><?= $rt->t_status ? "Enabled" : "Disabled" ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="<?= PORTAL ?>system/taxes/edit&id=<?php echo $rt->t_id ?>" ><span class="fa fa-edit"></span></a>
                                <a class="btn btn-danger" href="<?= PORTAL ?>system/taxes/delete&id=<?php echo $rt->t_id ?>" ><span class="fa fa-trash"></span></a>
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
            <span class="fa fa-plus"></span> Add new Tax
            
            <a href="<?= PORTAL ?>system/taxes" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" /><br />
                        
                        Rate:
                        <input type="text" class="form-control" placeholder="Rate" name="rate" /><br />
                        
                        Register ID:
                        <input type="text" class="form-control" placeholder="Register ID" name="reg_id" /><br />
                        
                        Code:
                        <input type="text" class="form-control" placeholder="Code" name="code" /><br />
                        Status:
                        <select class="form-control select2" name ="status">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select><br /><br />
                        
                        <?php
                            Controller::Form("system/tax", ["type" => "add"]);  
                        ?>
                        
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-save"></span> Save Information
                        </button>
                    </div>
                    
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
    ?>
    
        <div class="panel">
            <div class="panel-heading">
                <span class="fa fa-plus"></span> Edit Tax
                
                <a href="<?= PORTAL ?>system/taxes" class="btn btn-sm btn-primary">
                    Back
                </a>
            </div>
            
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                             $t = taxes::getBy(["t_id" => input::get("id")]);
                                 
                             if(count($t) > 0){
                                 $t = $t[0];
                             
                            ?>
                            Name:
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $t->t_name?>" /><br />
                            
                            Rate:
                            <input type="text" class="form-control" placeholder="Rate" name="rate" value="<?= $t->t_rate?>" /><br />
                            
                            Register ID:
                            <input type="text" class="form-control" placeholder="Register ID" name="reg_id" value="<?= $t->t_regid?>" /><br />
                            
                            Code:
                            <input type="text" class="form-control" placeholder="Code" name="code" value="<?= $t->t_code?>" /><br />
                            Status:
                            <select  class="form-control select2" name="main">
                                <option value="0">None</option>
                            <?php
                                foreach(Setting::$boolean as $m => $u){
                                ?>
                                <option value="<?php echo $m ?>" <?php echo $m == $t->t_status ? "selected" : "" ?>>
                                    <?php echo $u ?>
                                </option>
                            <?php
                                }
                            ?>
                            </select><br /><br />
                                            
                            <?php
                             }
                            ?>
                            <?php
                                Controller::Form("system/tax", ["type" => "edit"]);  
                            ?>
                            
                            <button class="btn btn-sm btn-primary">
                                <span class="fa fa-save"></span> Save
                            </button>
                        </div>
                        
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    <?php
        
    break;
    
    case "delete":
    ?>
        <div class="panel">
            <div class="panel-heading">
                <span class="fa fa-plus"></span> Delete Tax
                
                <a href="<?= PORTAL ?>system/taxes" class="btn btn-sm btn-primary">
                    Back
                </a>
            </div>
            
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                             $t = taxes::getBy(["t_id" => input::get("id")]);
                                 
                             if(count($t) > 0){
                                 $t = $t[0];
                             
                            ?>
                            Are you sure to delete <?= $t->t_name?> permanently?<br /><br />
                            <button class="btn btn-sm btn-danger">
                                <span class="fa fa-trash"></span> Confirm
                            </button>     
                            <?php
                             }
                            ?>
                            <?php
                                Controller::Form("system/tax", ["type" => "delete"]);  
                            ?>
                        </div>
                        
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    break;
}


















