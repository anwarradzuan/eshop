<?php
new Controller($_POST);

switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> List Users 
            <a href="<?= PORTAL ?>users/manage-users/add" class="btn btn-sm btn-primary">
                <span class="fa fa-plus"></span> Add new User
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-responsive data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(users::list() as $r){
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $r->user_name ?></td>
                            <td class="text-center"><?= $r->user_login ?></td>
                            <td class="text-center"><?= count(roles::getBy(["r_id" => $r->user_role])) > 0 ? roles::getBy(["r_id" => $r->user_role])[0]->r_name : "NIL" ?></td>
                            <td class="text-center"><?= $r->user_status ? "Active" : "Inactive" ?></td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>users/manage-users/edit/<?= $r->user_id ?>" class="btn btn-primary btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                
                                <a href="<?= PORTAL ?>users/manage-users/delete/<?= $r->user_id ?>" class="btn btn-sm btn-danger">
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
            <span class="fa fa-plus"></span> Add new User
            <a href="<?= PORTAL ?>users/manage-users" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" /><br />
                        
                        Username:
                        <input type="text" class="form-control" placeholder="Username" name="login" /><br />
                        
                        Email:
                        <input type="email" class="form-control" placeholder="Email" name="email" /><br />
                        
                        Phone:
                        <input type="tel" class="form-control" placeholder="Phone" name="phone" /><br />
                        
                        Password:
                        <input type="password" class="form-control" placeholder="Password" name="password" /><br />
                        
                        Status:
                        <select class="form-control select2" name="status">
                        <?php
                            foreach(Setting::$boolean as $id => $value){
                            ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                            <?php
                            }
                        ?>
                        </select><br /><br />
                        
                        Roles:
                        <select class="form-control select2" name="role">
                        <?php
                            foreach(roles::list() as $role){
                        ?>
                            <option value="<?= $role->r_id ?>"><?= $role->r_name ?></option>
                        <?php        
                            }
                        ?>
                        </select><br /><br />
                        
                        <?php
                            Controller::Form("user/user", ["type" => "add"]);
                        ?>
                        
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-plus"></span> Add user
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
            <span class="fa fa-edit"></span> Edit User
            <a href="<?= PORTAL ?>users/manage-users" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $u = users::getBy(["user_id" => $id]);
            
            if(count($u) > 0){
                $u = $u[0];
        ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $u->user_name ?>" /><br />
                        
                        Username:
                        <input type="text" class="form-control" placeholder="Username" name="login" value="<?= $u->user_login ?>" /><br />
                        
                        Email:
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $u->user_email ?>" /><br />
                        
                        Phone:
                        <input type="tel" class="form-control" placeholder="Phone" name="phone" value="<?= $u->user_phone ?>" /><br />
                        
                        Password (new password only):
                        <input type="password" class="form-control" placeholder="Password" name="password" autofill="off" /><br />
                        
                        Status:
                        <select class="form-control select2" name="status">
                        <?php
                            foreach(Setting::$boolean as $id => $value){
                            ?>
                            <option value="<?= $id ?>" <?= $id == $u->user_status ? "selected" : "" ?>><?= $value ?></option>
                            <?php
                            }
                        ?>
                        </select><br /><br />
                        
                        Roles:
                        <select class="form-control select2" name="role">
                        <?php
                            foreach(roles::list() as $role){
                        ?>
                            <option value="<?= $role->r_id ?>" <?= $role->r_id == $u->user_role ? "selected" : "" ?>><?= $role->r_name ?></option>
                        <?php        
                            }
                        ?>
                        </select><br /><br />
                        
                        <?php
                            Controller::Form("user/user", ["type" => "edit"]);
                        ?>
                        
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-save"></span> Save information
                        </button>
                    </div>
                </div>
            </form>
        <?php
            }else{
                new Alert("error", "No user information found in our record.");
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
            <span class="fa fa-trrash"></span> Delete User
            <a href="<?= PORTAL ?>users/manage-users" class="btn btn-sm btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $u = users::getBy(["user_id" => $id]);
            
            if(count($u) > 0){
                $u = $u[0];
        ?>
            <form action="" method="POST">
                <h3 class="m-t-0">Are you sure?</h3>
                <p>
                    By clicking below button will remove user <strong><?= $u->user_name ?></strong> permanently.
                </p>
                <?php
                    Controller::Form("user/user", ["type" => "delete"]);
                ?>
                
                <button class="btn btn-sm btn-danger">
                    <span class="fa fa-trash"></span> Delete information
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "No user information found in our record.");
            }
        ?>
        </div> 
    </div>
    <?php
    break;
}