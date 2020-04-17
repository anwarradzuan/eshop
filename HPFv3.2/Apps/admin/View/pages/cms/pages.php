<?php

new Controller ($_POST);
switch(url::get(2)){
	
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> List Pages
            <a href="<?= PORTAL ?>cms/pages/add" class="btn btn-sm btn-primary">
                <span class="fa fa-plus"></span> Add New Page 
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table" id="datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">URL</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">User</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
	                    <?php
	                        $no = 1;
	                        foreach(menus::list() as $p){
	                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $p->m_name ?></td>
                            <td class="text-center"><?= $p->m_url ?></td>
                            <td class="text-center"><?= ($p->m_status == 1) ? "Enable" : "Disable" ?> </td>
                            <td class="text-center">
                            	<?php
                            		if($p->m_type == 0){
                            			echo "Public Only";
                            		}elseif($p->m_type == 1){
                            			echo "Customer Only";
                            		}else{
                            			echo "Both";
                            		}
                            	?>
                            </td>
                            <td class="text-center"><?= $p->m_user ?></td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>cms/pages/edit/<?= $p->m_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                
                                <a href="<?= PORTAL ?>cms/pages/delete/<?= $p->m_id ?>" class="btn btn-danger btn-sm">
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
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-plus"> Add New Page
                <a class="btn btn-primary" href="<?php echo PORTAL ?>cms/pages" >Back</a>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Page Information
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Name :
                                                <input class="form-control" type="text" name="m_name" placeholder="Name" required>
                                            </div>
                                            <div class="col-sm-2">
                                               	URL :
                                                <input class="form-control" type="text" name="m_url" placeholder="URL" required>
                                            </div>
                                            <div class="col-sm-2">
                                               	Route :
                                                <input class="form-control" type="text" name="m_route" placeholder="Route" required>
                                            </div>
                                            <div class="col-sm-2">
                                                Status :
                                                <select name="m_status" class="form-control select2">
                                                    <?php
                                                    foreach(Setting::$boolean as $d => $z){
                                                    ?>
                                                        <option value="<?php echo $d ?>"><?php echo $z?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select><br /><br />
                                            </div>
                                            <div class="col-sm-2">
                                                Type :
                                                <select name="m_type" class="form-control select2">
                                                    <option value="0">Public Only</option>
                                                    <option value="1">Customer Only</option>
                                                    <option value="2">Both</option>
                                                </select><br /><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Content:
                                                <textarea class="form-control " name="content" id="" rows="20"></textarea>
                                                <script>
												window.onload = function(){
												    CKEDITOR.replace("content");
												    CKEDITOR.config.height = 500;
												}
												</script><br />
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input class="form-control code" type="hidden" name="code">
                            <?php
                                Controller::Form("cms/pages", ["type" => "add"]);
                            ?>
                            <button class="col-md-12 btn btn-success">
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
		$id = url::get(3);
		$p = menus::getBy(["m_id" => $id]);
	?>
		<div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-plus"> Edit
                <a class="btn btn-primary" href="<?php echo PORTAL ?>cms/pages" >Back</a>
            </div>
            <div class="panel-body">
            	<?php
	        		if(count($p) > 0){
	        			$p = $p[0];
	        			?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Page Information
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                            			<div class="row">
                                			<div class="col-sm-4">
                                                Name :
                                                <input class="form-control" type="text" name="m_name" placeholder="Name" value="<?= $p->m_name ?>" required>
                                            </div>
                                            <div class="col-sm-2">
                                               	URL :
                                                <input class="form-control" type="text" name="m_url" placeholder="URL" value="<?= $p->m_url ?>" required>
                                            </div>
                                            <div class="col-sm-2">
                                               	Route :
                                                <input class="form-control" type="text" name="m_route" placeholder="Route" value="<?= $p->m_route ?>" required>
                                            </div>
                                            <div class="col-sm-2">
                                                Status :
                                                <select name="m_status" class="form-control select2">
                                                    <?php
                                                    foreach(Setting::$boolean as $d => $z){
                                                    ?>
                                                        <option value="<?php echo $d ?>" <?= $d == $p->m_status ? "selected" : "" ?> ><?php echo $z?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select><br /><br />
                                            </div>
                                            <div class="col-sm-2">
                                                Type :
                                                <select name="m_type" class="form-control select2">
                                                    <option value="0" <?= $p->m_type == 0 ? "selected":"" ?> >Public Only</option>
                                                    <option value="1" <?= $p->m_type == 1 ? "selected":"" ?> >Customer Only</option>
                                                    <option value="2" <?= $p->m_type == 2 ? "selected":"" ?> >Both</option>
                                                </select><br /><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Content:
                                                <textarea class="form-control " name="content" id="" rows="20"><?= $p->m_content ?></textarea>
                                                <script>
												window.onload = function(){
												    CKEDITOR.replace("content");
												    CKEDITOR.config.height = 500;
												}
												</script><br />
                                                <br />
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input class="form-control code" type="hidden" name="code">
                            <?php
                                Controller::Form("cms/pages", ["type" => "edit"]);
                            ?>
                            <button class="col-md-12 btn btn-success">
                                <span class="fa fa-save"></span> Save
                            </button>
                         </div>
                    </div>
                </form>
                <?php
            		}else{
            			new Alert("error", "Data not found");
            		}
            	?>
            </div>
        </div>
	<?php
    break;
    
    case "delete":
	$id = url::get(3);
	$s = menus::getBy(["m_id" => $id]); 
	?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span>Delete Page
			<a href="<?= PORTAL ?>cms/pages/" class="btn btn-primary btn-sm">
				Back
			</a>
        </div>   
        <?php
        	if(count($s) > 0){
        		$s = $s[0];
				?>
					<div class="panel-body">
					    <div class="col-md-4">
					      	<div class="panel">
				      			<div class="panel-heading">
			                        Delete Page
			                    </div>
						      	<div class="panel-body">
						      		<div class="row">
						      			<div class="col-md-12">
						      				Are you sure to remove "<b><?= $s->m_name ?></b>" page?
						      			</div>
						      		</div>
						      		<div class="row">
						      			<div class="col-md-12">
						      				<form action="" method="POST">
					                            <br>
					                            <?php
					                                Controller::Form("cms/pages", ["type" => "delete"]);
					                            ?>
					                        		<button class="btn btn-danger btn-block">
					                                    <span class="fa fa-trash"></span> Yes
					                                </button>
					                            </br>
							      			</form>
						      			</div>
						      		</div>
					      		</div>
				      		</div>
				        </div>
					</div>
				<?php
        	}else{
        		new Alert("error", "Data not found or has been removed");
        	}
        ?> 
    </div>
    <?php	
        
    break;
  
}