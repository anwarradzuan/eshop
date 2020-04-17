<?php
new Controller($_POST);

switch(url::Get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> All Payment Gateway 
            <a href="<?= F::URLParams() ?>/add" class="btn btn-primary btn-sm">
                <span class="fa fa-plus"></span> Add new Gateway
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-responsive table-hover data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-center">Default</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(pg::list() as $r){
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $r->p_name ?></td>
                            <td class="text-center"><?= $r->p_default ? "Yes" : "No" ?></td>
                            <td class="text-center">
                                <a href="<?= F::URLParams() ?>/edit/<?= $r->p_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                
                                <a href="<?= F::URLParams() ?>/delete/<?= $r->p_id ?>" class="btn btn-sm btn-danger">
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
            <span class="fa fa-plus"></span> Add new Gateway
            
            <a href="<?= PORTAL ?>system/payment-gateway" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" /><br />
                        
                        Key1:
                        <textarea class="form-control" name="key1"></textarea><br />
                        
                        Key2:
                        <textarea class="form-control" name="key2"></textarea><br />
                        
                        Default:
                        <select class="form-control select2" name="default">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select><br /><br />
                        
                        <?php
                            Controller::Form("system/payment_gateway", ["type" => "add"]);
                        ?>
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-plus"></span> Add Gateway 
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
            <span class="fa fa-plus"></span> Add new Gateway
            
            <a href="<?= PORTAL ?>system/payment-gateway" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $p = pg::getBy(["p_id" => $id]);
            
            if(count($p) > 0){
                $p = $p[0];
        ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $p->p_name ?>" /><br />
                        
                        Key1:
                        <textarea class="form-control" name="key1"><?= $p->p_key1 ?></textarea><br />
                        
                        Key2:
                        <textarea class="form-control" name="key2"><?= $p->p_key2 ?></textarea><br />
                        
                        Default:
                        <select class="form-control select2" name="default">
                            <option value="0" <?= $p->p_default ? "" : "selected" ?>>No</option>
                            <option value="1" <?= $p->p_default ? "selected" : "" ?>>Yes</option>
                        </select><br /><br />
                        
                        <?php
                            Controller::Form("system/payment_gateway", ["type" => "edit"]);
                        ?>
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-save"></span> Save Gateway 
                        </button>
                    </div>
                </div>
            </form>
        <?php
            }else{
                new Alert("error", "Sorry, your selected gateway does not exist in our record.");
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
            <span class="fa fa-plus"></span> Add new Gateway
            
            <a href="<?= PORTAL ?>system/payment-gateway" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $p = pg::getBy(["p_id" => $id]);
            
            if(count($p) > 0){
                $p = $p[0];
        ?>
            <form action="" method="POST">
                <h3 class="m-t-0">Are you sure?</h3>
                
                <p>By clicking below button will remove gateway <strong><?= $p->p_name ?></strong> permanently.</p>
                
                <?php
                    Controller::Form("system/payment_gateway", ["type" => "delete"]);
                ?>
                <button class="btn btn-sm btn-danger">
                    <span class="fa fa-trash"></span> Delete Gateway 
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "Sorry, your selected gateway does not exist in our record.");
            }
        ?>
        </div>
    </div>
    <?php 
    break;
}


































