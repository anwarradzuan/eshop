<?php

new Controller ($_POST);
switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Widgets
        </div>
		<div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table" id="datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-center">Position</th>
                        	<th class="text-center">Type</th>
                        	<th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(widgets::list() as $t){
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
							<td><?= $t->w_name ?></td>
							<td class="text-center"><?= $t->w_position ?></td>
							<td class="text-center"><?= ($t->w_type == 0) ? "Fixed" : "Editable" ?></td>
							<td class="text-center <?= $t->w_status ?>"><?= ($t->w_status == 1) ? "Enable" : "Disable" ?> </td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>cms/widgets/edit/<?= $t->w_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="<?= PORTAL ?>cms/widgets/delete/<?= $t->w_id ?>" class="btn btn-danger btn-sm">
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
    
    case "edit":
    	$id = url::get(3);
    	$p = widgets::getBy(["w_id" => $id]); //Select
    ?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span> Widgets
				<a href="<?= PORTAL ?>cms/widgets/" class="btn btn-primary btn-sm">
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
					<div class="col-md-10">
						Enable?: 
						<br>
							<select class="form-control select2" name="status">
								<option value="0">Disable</option>
								<option value="1">Enable</option>
							</select>
						</br>
					</div>
					<div class="col-md-12">
						Content:
						<textarea class="form-control summernote" name="content" id="w_content" rows="25" value="<?= $x->w_content ?>"><?= $x->w_content ?></textarea>
						<div class="col-md-12 text-center">
						<?php
							Controller::form("cms/widget",
							[
							"type"  => "edit"  
							]);
						?>
							<button class="btn btn-success">
								<span class="fa fa-save"></span> Save Widget
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
		$s = widgets::getBy(["w_id" => $id]); 
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Widgets
				<a href="<?= PORTAL ?>cms/widgets/" class="btn btn-primary btn-sm">
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
                            Are you sure to delete <b><?php echo $s->w_name ?></b> item permanently?<br /><br />
                        <?php
                           Controller::form("cms/widget",
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