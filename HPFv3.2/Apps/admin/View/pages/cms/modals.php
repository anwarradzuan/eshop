<?php

new Controller ($_POST);
switch(url::get(2)){
	
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Modal Management
            <a href="<?= PORTAL ?>cms/modals/add/" class="btn btn-primary btn-sm">
            	<span class="fa fa-plus"></span> 
                Add New Modal
            </a>
        </div>
		<div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table" id="datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-center">Alias</th>
                        	<th class="text-center">Status</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(modals::list() as $r){
                    ?>
	                    <tr>
	                        <td class="text-center"><?= $no++ ?></td>
							<td><?= $r->m_name ?></td>
							<td class="text-center"><?= $r->m_alias ?></td>
							<td class="text-center <?= $r->m_status ?>"><?= ($r->m_status == 1) ? "Enable" : "Disable" ?> </td>
	                        <td class="text-center">
	                            <a href="<?= PORTAL ?>cms/modals/edit/<?= $r->m_id ?>" class="btn btn-sm btn-primary">
	                                <span class="fa fa-edit"></span>
	                            </a>
								
	                            <a href="<?= PORTAL ?>cms/modals/delete/<?= $r->m_id ?>" class="btn btn-danger btn-sm">
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
            <span class="fa fa-list"></span> Add Modal
			<a href="<?= PORTAL ?>cms/modals/" class="btn btn-primary btn-sm">
				Back
			</a>
        </div>    
		<div class="panel-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						Name:
						<input type="text" class="form-control" name="name" placeholder="Modal Name" /><br />
						
						Alias:
						<input type="text" class="form-control" name="alias" placeholder="Alias" /><br />
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">
								Width:
								<br><input type="number" class="form-control" name="width" placeholder="Width" /></br>
							</div>
							
							<div class="col-md-4">
								Height: 
								<br><input type="number" class="form-control" name="height" placeholder="Height" /></br>
							</div>
							<div class="col-md-4">
								Status:
								<br><select class="form-control" name="status">
									<option value="1">Enable</option>
									<option value="2">Disable</option>
								</select></br>
							</div>
						</div>
					</div>
					<div class="col-md-12">
					Content:
					<textarea class="form-control" name="content" id="m_content" rows="25"></textarea>
					<script>
						/*tinymce.init({ 
							selector: '#m_content',
							extended_valid_elements: 'span'
						});*/
						window.onload = function(){
						    CKEDITOR.replace("m_content");
						    CKEDITOR.config.height = 500;
						}
						
					</script><br />
					<div class="col-md-12 text-center">
					<?php
						Controller::form("cms/modal",
						[
						"type"  => "add"  
						]);
					?>
						<button class="btn btn-success">
							<span class="fa fa-save"></span> Add Modal
						</button>
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
    	$p = modals::getBy(["m_id" => $id]); //Select
    ?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span>Edit Modal
			
			<a href="<?= PORTAL ?>cms/modals/" class="btn btn-primary btn-sm">
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
						<br><input type="text" name="name" class="form-control" placeholder="Name" value="<?= $x->m_name ?>" /></br>
							
							Alias:
						<input type="text" name="alias" class="form-control" placeholder="Alias" value="<?= $x->m_alias ?>" /></br>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">
								Width:
								<br><input type="number" class="form-control" name="width" placeholder="Width"  /></br>
							</div>
							<div class="col-md-4">
								Height: 
								<br><input type="number" class="form-control" name="height" placeholder="Height"  /></br>
							</div>
							<div class="col-md-4">
								Status:
								<br><select class="form-control" name="status">
									<option value="1">Enable</option>
									<option value="2">Disable</option>
								</select></br>
							</div>
						</div>
					</div>
					<div class="col-md-12">
					Content:
					<textarea class="form-control" name="content" id="m_content" rows="25" value="<?= $x->m_content ?>"><?= $x->m_content ?></textarea>
						<script>
							/*tinymce.init({ 
								selector: '#m_content',
								extended_valid_elements: 'span'
							});*/
							window.onload = function(){
							    CKEDITOR.replace("m_content");
							    CKEDITOR.config.height = 500;
							}
							
						</script><br />
						<div class="col-md-12 text-center">
							<?php
								Controller::form("cms/modal",
								[
								"type"  => "edit"  
								]);
							?>
							<button class="btn btn-success">
								<span class="fa fa-save"></span> Edit Modal
							</button>
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
		$s = modals::getBy(["m_id" => $id]); 
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span>Delete Modal 
			<a href="<?= PORTAL ?>cms/modals/" class="btn btn-primary btn-sm">
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
                        Are you sure to delete <b><?php echo $s->m_name ?></b> item permanently?<br /><br />
                        <?php
                           Controller::form("cms/modal",
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