<?php

new Controller ($_POST);
switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Section Management
            <a href="<?= PORTAL ?>cms/sections/add/" class="btn btn-primary btn-sm">
            	<span class="fa fa-plus"></span>
                Add New Section
            </a>
        </div>
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table" id="datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Alias</th>
                        	<th class="text-center">Page</th>
                        	<th class="text-center">Status</th>
                        	<th class="text-center">Is Menu?</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    <tbody>
	                    <?php
	                        $no = 1;
	                        foreach(sections::list() as $p){
	                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                        	<td class="text-center"><?= $p->s_name ?></td>
                            <td class="text-center"><?= $p->s_alias ?></td>
                            <td class="text-center"><?= ($p->s_page == 1) ? "Intelhost Home Page" : "Disable" ?> </td>
                            <td class="text-center <?= $p->s_status ?>"><?= ($p->s_status == 1) ? "Enable" : "Disable" ?> </td>
							<td class="text-center <?= $p->s_ismenu ?>"><?= ($p->s_ismenu == 1) ? "Yes" : "No" ?> </td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>cms/sections/edit/<?= $p->s_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="<?= PORTAL ?>cms/sections/delete/<?= $p->s_id ?>" class="btn btn-danger btn-sm">
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
            <span class="fa fa-list"></span>Add Section
			<a href="<?= PORTAL ?>cms/sections/" class="btn btn-primary btn-sm">
				Back
			</a>
        </div>    
    	<div class="panel-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						Name:
						<input type="text" class="form-control" name="name" placeholder="Section Name" /><br />
						
						Alias:
						<input type="text" class="form-control" name="alias" placeholder="Alias" /><br />
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">
								Order:
								<br><input type="number" class="form-control" name="order" placeholder="Order" /></br>
							</div>
							<div class="col-md-4">
								Status: 
								<br><select class="form-control" name="status">
									<option value="1">Enable</option>
									<option value="2">Disable</option>
								</select></br>
							</div>
							<div class="col-md-4">
								Is Menu:
								<br><select class="form-control" name="ismenu">
									<option value="1">No</option>
									<option value="2">Yes</option>
								</select></br>
							</div>
							<div class="col-md-6">
								Page:
								<br><select class="form-control" name="page">
									<option value="1">Intelhost Home Page</option>
									<option value="2">Intelhost Home Page</option>
								</select></br>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						Content:
						<textarea class="form-control" name="content" id="s_content" rows="25"></textarea>
						<div class="col-md-12 text-center">
						<?php
							Controller::form("cms/section",
							[
							"type"  => "add"  
							]);
						?>
							<br><button class="btn btn-success">
								<span class="fa fa-save"></span> Add Section
							</button></br>
						</div>
					</div>
				</div>
			</form>
		</div> 			
	</div>	
	<?php
	break;
    
    case "edit":
	$id = url::get(3);
	$p = sections::getBy(["s_id" => $id]); //Select
    ?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span>Edit Section 
			<a href="<?= PORTAL ?>cms/sections/" class="btn btn-primary btn-sm">
			Back
			</a>
		</div>    
		<div class="panel-body">
		<?php
			if(count($p) > 0){
			$x = $p[0];
		
		?>
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						Name:
						<input type="text" class="form-control" name="name" placeholder="Section Name" value="<?= $x->s_name ?>" /><br />
						
						Alias:
						<input type="text" class="form-control" name="alias" placeholder="Alias" value="<?= $x->s_alias ?>" /><br />
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">
								Order:
								<br><input type="number" class="form-control" name="order" placeholder="Order" /></br>
							</div>
							<div class="col-md-4">
								Status: 
								<br><select class="form-control" name="status" id="s_status" value="<?= $x->s_status ?>"><?= $x->s_status ?>
									<option value="1">Enable</option>
									<option value="2">Disable</option>
								</select></br>
							</div>
							<div class="col-md-4">
								Is Menu:
								<br><select class="form-control" name="ismenu" id="s_ismenu" value="<?= $x->s_ismenu ?>"><?= $x->s_ismenu ?>
									<option value="1">No</option>
									<option value="2">Yes</option>
								</select></br>
							</div>
							<div class="col-md-6">
								Page:
								<br><select class="form-control" name="page" id="s_page">
									<option value="<?= $x->s_page ?>">Intelhost Home Page</option>
									<option value="<?= $x->s_page ?>">Intelhost Home Page</option>
								</select></br>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						Content:
						<textarea class="form-control" name="content" id="s_content" rows="25" value="<?= $x->s_content ?>"><?= $x->s_content ?></textarea>
						<div class="col-md-12 text-center">
						<?php
							Controller::form("cms/section",
							[
							"type"  => "edit"  
							]);
						?>
							<br>
							<button class="btn btn-success">
								<span class="fa fa-save"></span>Save 
							</button></br>
						</div>
					</div>
				</div>
			</form>
		<?php
		}else
		{
        	new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
        }
		?>
		</div> 			
	</div>		
		
    <?php	
	break;
    
    case "delete":
		$id = url::get(3);
		$s = sections::getBy(["s_id" => $id]); 
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span>Delete Section
				<a href="<?= PORTAL ?>cms/sections/" class="btn btn-primary btn-sm">
					Back
				</a>
        </div>    
    	<div class="panel-body">
		    <div class="col-md-4">
		      	<div class="panel">
	      			<div class="panel-heading">
                        Delete Data
                    </div>
			      	<div class="panel-body">
		      			<form action="" method="POST">
		      				<?php 
                                if(count($s) > 0){
                                    $s = $s[0];
                            ?>
                                Are you sure to delete <b><?php echo $s->s_name ?></b> item permanently?<br /><br />
                            <?php
                               Controller::form("cms/section",
                            	[
                            		"type"  => "delete"  
                        		]);
                            ?>
                            <br>
                        		<button class="btn btn-danger">
                                    <span class="fa fa-trash"></span> Yes
                                </button>
                            </br>
		      				<?php
							}else 
								{
									new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
								}
                            ?>
		      			</form>
		      		</div>
	      		</div>
	        </div>
		</div>
    </div>
    <?php	
        
    break;
}

?>
