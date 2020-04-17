<?php
new Controller($_POST);

switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> All Roles
            
            <a href="<?= PORTAL ?>users/roles/add" class="btn btn-sm btn-primary">
                <span class="fa fa-plus"></span> Add Role
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered table-responsive data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(roles::list() as $r){
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $r->r_name ?></td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>users/roles/edit/<?= $r->r_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                
                                <a href="<?= PORTAL ?>users/roles/delete/<?= $r->r_id ?>" class="btn btn-danger btn-sm">
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
            <span class="fa fa-plus"></span> Add Role
            
            <a href="<?= PORTAL ?>users/roles" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" /><br />
                        
                        <?php
                            Controller::Form("user/role", ["type" => "add"]);
                        ?>
                        
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-plus"></span> Add Role
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
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-save"></span> Save Role
            
            <a href="<?= PORTAL ?>users/roles" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $r = roles::getBy(["r_id" => $id]);
            
            if(count($r) > 0){
                $r = $r[0];
        ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $r->r_name ?>" /><br />
                        
                        <?php
                            Controller::Form("user/role", ["type" => "edit"]);
                        ?>
                        
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-save"></span> Save Role
                        </button>
                    </div>
                </div>
            </form>
        <?php
            }else{
                new Alert("error", "Role information not found.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
    
    case "delete":
        $id = url::get(3);
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-save"></span> Save Role
            
            <a href="<?= PORTAL ?>users/roles" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $r = roles::getBy(["r_id" => $id]);
            
            if(count($r) > 0){
                $r = $r[0];
        ?>
            <form action="" method="POST">
                <h3 class="m-t-0">Are you sure?</h3>
                
                <p>
                    By clicking below button will remove role information <strong><?= $r->r_name ?></strong> permanently.
                </p>
                
                <?php
                    Controller::Form("user/role", ["type" => "delete"]);
                ?>
                
                <button class="btn btn-sm btn-danger">
                    <span class="fa fa-trash"></span> Delete Role
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "Role information not found.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
}