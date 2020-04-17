<?php
	
new Controller ($_POST);
switch(url::get(2)){
	
	case "":
	?>	  
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span> Announcement
			<a href="<?= PORTAL ?>marketing/announcement/add" class="btn btn-primary btn-sm">
			<span class="fa fa-plus"></span>
			Add Announcement
			</a>
		</div>
		<div class="panel-body">
			<div class="table-primary">
				<table class="table table-hover table-bordered data-table" id="datatables">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-left">Name</th>
							<th class="text-left">Description</th>
							<th class="text-center">Start</th>
							<th class="text-center">Expired</th>
							<th class="text-center">Status</th>
							<th class="text-center">:::</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach(announcements::list() as $p){
					?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $p->a_name ?></td>
							<td><?= $p->a_description ?></td>
							<td class="text-center"><?= $p->a_start ?></td>
							<td class="text-center"><?= $p->a_expired ?></td>
							<td class="text-center <?= $p->a_status ?>"><?= ($p->a_status == 1) ? "Enable" : "Disable" ?> </td>
							<td class="text-center">
								<a href="<?= PORTAL ?>marketing/announcement/edit/<?= $p->a_id ?>" class="btn btn-sm btn-primary">
									<span class="fa fa-edit"></span>
								</a>
								<a href="<?= PORTAL ?>marketing/announcement/delete/<?= $p->a_id ?>" class="btn btn-danger btn-sm">
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
			<span class="fa fa-list"></span>Add Announcement
			<a href="<?= PORTAL ?>marketing/announcement" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>
		<div class="panel-body">
			<form action="" method="POST">
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							Add New
						</div>
						<div class="panel-body">
							Full Name:
							<input type="text" name="name" class="form-control" placeholder="Name" value="" id="" /><br />
							
							Description:
							<input type="text" name="description" class="form-control" placeholder="Description" value="" id="" /><br />
							
							Content:
							<input type="text" name="content" class="form-control" placeholder="Content" value="" id=""><br />
							
							Start:
							<input type="text" name="start" class="form-control single-date" placeholder="Start" value="" id=""><br />
							
							Expired:
							<input type="text" name="expired" class="form-control single-date" placeholder="Expired" value="" id=""><br />
							
							Status:
							<select class="form-control select2" name="status">
							<?php
							foreach(Setting::$boolean as $b => $v){
							?>	
								<option value="<?= $b ?>"><?= $v ?></option>
							<?php
							}
							?>
							</select>
						</div>
						<div class="col-md-12 text-center">
							<?php
								Controller::form("marketing/announcement",
								[
								"type"  => "add"  
								]);
							?>
							<br>
								<button class="btn btn-success">
								<span class="fa fa-save"></span> Add 
								</button>
							</br>
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
		$p = announcements::getBy(["a_id" => $id]);
	?>
	<div class="panel panel default">
		<div class="panel-heading">
			<span class="fa fa-list"></span>Edit Announcement
			<a href="<?= PORTAL ?>marketing/announcement" class="btn btn-primary btn-sm">
			Back
			</a>
		</div>
		<br>
			<div class="panel-body">
			<?php
				if(count($p) > 0){
				$x = $p[0];
			
			?>
				<form action="" method="POST">
					<div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
							Edit
							</div>
							<div class="panel-body">
								Full Name:
								<input type="text" name="name" class="form-control" placeholder="Name" value="<?= $x->a_name ?>"  /><br />
								
								Description:
								<input type="text" name="description" class="form-control" placeholder="Description" value="<?= $x->a_description ?>" /><br />
								
								Content:
								<input type="text" name="content" class="form-control" placeholder="Content" value="<?= $x->a_content ?>" ><br />
								
								Start:
								<input type="text" name="start" class="form-control single-date" placeholder="Start" value="<?= $x->a_start ?>" ><br />
								
								Expired:
								<input type="text" name="expired" class="form-control single-date" placeholder="Expired" value="<?= $x->a_expired ?>" ><br />
								
								Status:
								<select class="form-control select2" name="status">
								<?php
								foreach(Setting::$boolean as $b => $v){
								?>	
									<option value="<?= $b ?>" <?php echo ($b == $x->a_status  ? "selected" : "")  ?> ><?= $v ?></option>
								<?php
								}
								?>
								</select>
							</div>
							<div class="col-md-12 text-center">
							<?php
								Controller::form("marketing/announcement",
								[
								"type"  => "edit"  
								]);
							?>
								<br>
									<button class="btn btn-success">
										<span class="fa fa-save"></span> Save
									</button>
								</br>
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
		</br>  
	</div>
	<?php
	break;
	
	case "delete":
		$id = url::get(3);
		$p = announcements::getBy(["a_id" => $id]);
	?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span>Delete Announcement
			<a href="<?= PORTAL ?>marketing/announcement" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						Delete
					</div>
					<div class="panel-body">
		      			<form action="" method="POST">
	      				<?php 
                            if(count($p) > 0){
                                $p = $p[0];
                        ?>
                        	Are you sure to delete <b><?php echo $p->a_name ?></b> permanently?<br /><br />
                        <?php
                           Controller::form("marketing/announcement",
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
		
 