<?php
new Controller ($_POST);
switch (input::get('action')){
    case "":
    
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"> All Item Category
            <a class="btn btn-primary" href="<?= PORTAL ?>items/item-category&action=add"><span class="fa fa-plus">Add New Item</span></a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Main</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $i = 1;
                        foreach(category::list() as $m){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i ?></td>
                            <td class="text-center"><?php echo $m->c_name ?></td>
                            <td class="text-center"><?php echo $m->c_user ?></td>
                            <td class="text-center">
                            	<?php
                            		$main = $m->c_main;
									if($main == 0){
										echo "No";
									}else{
										echo "Yes";
									} 
                            	 ?>
                            </td>
                            <td class="text-center"><?php echo $m->c_date ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="<?= PORTAL ?>items/item-category&action=edit&id=<?php echo $m->c_id ?>" ><span class="fa fa-edit"></span></a>
                                <a class="btn btn-danger" href="<?= PORTAL ?>items/item-category&action=delete&id=<?php echo $m->c_id ?>" ><span class="fa fa-trash"></span></a>
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
                <span class="fa fa-plus"> Add Item Category
                <a class="btn btn-primary" href="<?php echo PORTAL ?>items/item-category" >Back</a>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Category Information
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                Name:
                                                <input class="form-control" type="text" name="c_name" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                Main:
	                                            <select  class="form-control select2" name="c_main">
	                                                <option value="1">Yes</option>
	                                                <option value="0">No</option>
	                                            </select><br /><br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <?php
                                Controller::Form(
                                    "items/items-category", 
                                    [
                                        "type"  => "add"  
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
<?php
    break;
    
    case "edit":
?>
        
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-edit"> Edit Item Category
                <a class="btn btn-primary" href="<?php echo PORTAL ?>items/item-category" >Back</a>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Category Information
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                            <?php 
                                                $t = category::getBy(['c_id' =>input::get('id')]);
                                                
                                                if(count($t) > 0){
                                                    $t = $t[0];
                                            ?>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                               Item Name:
                                            <input class="form-control" type="text" name="c_name" value="<?php echo $t->c_name?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                Main:
                                            <select  class="form-control select2" name="c_main">
                                            	<?php
                                            		foreach(Setting::$yn as $a => $b){
                                            			?>
                                            			<option value="<?= $a ?>" <?php echo ($a == $t->c_main ? "selected" : "") ?>><?= $b ?></option>
                                            			<?php
                                            		}
                                            	?>
                                                
                                            </select><br /><br />
                                            </div>
                                        </div>
                                        <button class="btn btn-success col-md-12">
                                            <span class="fa fa-save"></span> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <?php
                                Controller::Form(
                                    "items/items-category", 
                                    [
                                        "type"  => "edit"  
                                    ]
                                );
                            ?>
                            <?php
                                }else{
                                    new Alert("error","Data not found");
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
    break;
    
    case "delete":
        
        ?>
        
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-trash"> Delete Item Category
                <a class="btn btn-primary" href="<?php echo PORTAL ?>items/item-category" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Quotation Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="" method="POST">
                                        <?php 
                                            $t = types::getBy(['t_id' =>input::get('id')]);
                                            
                                            if(count($t) > 0){
                                                $t = $t[0];
                                        ?>
                                        Are you to delete <b><?php echo $t->t_name ?></b> permanently?<br /><br />
                                        <?php
                                            Controller::Form(
                                                "items/items-category", 
                                                [
                                                    "type"  => "delete"  
                                                ]
                                            );
                                        ?>
                                        <button class="btn btn-danger">Confirm</button>
                                        <?php
                                            }else{
                                                new Alert("error","Data Not Found");
                                            }
                                        ?>
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
}
?>