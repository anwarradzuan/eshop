<?php

new Controller ($_POST);
switch(url::get(3)){
    case "":
    ?>    
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Templates
            <a href="<?= PORTAL ?>marketing/email/template/add" class="btn btn-primary btn-sm">
            	<span class="fa fa-plus"></span>
                Add Templates
            </a>
        </div>
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table" id="datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Title</th>
                        	<th class="text-center">Date</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						$no = 1;
						foreach(templates::list() as $p){
					?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                        	<td><?= $p->t_title ?></td>
                        	<td class="text-center"><?= $p->t_date ?></td>
							<td class="text-center">
								<a href="<?= PORTAL ?>marketing/email/template/edit/<?php echo $p->t_id ?>" class="btn btn-sm btn-primary">
									<span class="fa fa-edit"></span>
								</a>
								<a href="<?= PORTAL ?>marketing/email/template/delete/<?php echo $p->t_id ?>" class="btn btn-danger btn-sm">
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
            <span class="fa fa-list"></span>Add Template
				<a href="<?= PORTAL ?>marketing/email/template/" class="btn btn-primary btn-sm">
					Back
				</a>
        </div> 
        <div class="panel-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-12">
						Title:
						<input type="text" class="form-control" name="title" placeholder="Title" /><br />
						
						Content:
						<textarea class="form-control summernote" name="content" id="t_content" rows="25" value=""></textarea>
					</div>
				</div>
				<div class="col-md-10 text-center">
				<?php
					Controller::form("marketing/template",
					[
					"type"  => "add"  
					]);
				?>
					<button class="btn btn-success">
						<span class="fa fa-save"></span> Add Template
					</button>
				</div>
			</form>
		</div>
    </div>
<?php
break;

case "edit":
	$id = router::get(4);
	$p = templates::getBy(["t_id" => $id]);
	?>
	<div class="panel panel default">
        <div class="panel-heading">
            <span class="fa fa-list"></span>Edit Template
				<a href="<?= PORTAL ?>marketing/email/template/" class="btn btn-primary btn-sm">
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
					<div class="col-md-12">
						Title:
						<input type="text" class="form-control" name="title" placeholder="Title" value="<?= $x->t_title ?>"/><br />
						
						Content:
						<textarea class="form-control summernote" name="content" id="t_content" rows="25" ><?= F::decode64($x->t_content) ?></textarea>
					</div>
				</div>
				<div class="col-md-10 text-center">
				<?php
					Controller::form("marketing/template",
					[
					"type"  => "edit"  
					]);
				?>
					<button class="btn btn-success">
						<span class="fa fa-save"></span> Save
					</button>
				</div>
			</form>
		<?php
		}else{
                new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
            }
		?>
		</div>
    </div>
<?php
break;

case "delete":
	$id = router::get(4);
	$p = templates::getBy(["t_id" => $id]);
?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span> Delete Template
				<a href="<?= PORTAL ?>marketing/email/template/" class="btn btn-primary btn-sm">
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
							if(count($p) > 0){
							$p = $p[0];
						?>
							Are you sure to delete <b><?php echo $p->t_title ?></b> permanently?<br /><br />
						<?php
							Controller::form("marketing/template",
							[
							"type"  => "delete"  
							]);
						?>
							<br>
								<button class="btn btn-danger">
									<span class="fa fa-trash"></span> Yes
								</button>
							</br>
						</form>
						<?php
						}else 
                        	{
                        		new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
                        	}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
break;

}
?>