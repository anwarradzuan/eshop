<?php

new Controller($_POST);

switch(url::get(2)){
	case "":
	?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span> All Packages
			
			<a href="<?= F::UrlParams() ?>/add" class="btn btn-primary btn-sm">
				<span class="fa fa-plus"></span> Add Package
			</a>
		</div>
		
		<div class="panel-body">
			<div class="table-responsive table-primary">
				<table class="table datatable table-hover table-responsive">
					<thead>
						<tr>
							<th class="text-center"t>No</th>
							<th>Name</th>
							<th>Desription</th>
							<th class="text-center">Status</th>
							<th class="text-center">User</th>
							<th class="text-center">Date</th>
							<th class="text-right">:::</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$no = 1;
						foreach(packages::list() as $r){
					?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $r->p_name ?></td>
							<td><?= $r->p_description ?></td>
							<td class="text-center"><?= $r->p_status ? "Enabled" : "Disabled" ?></td>
							<td class="text-center"><?= $r->p_user ?></td>
							<td class="text-center"><?= $r->p_date ?></dt>
							<td class="text-right">
								<a href="<?= PORTAL ?>clients/packages/edit/<?= $r->p_id ?>" class="btn btn-warning btn-sm">
									<span class="fa fa-pencil"></span>
								</a>
								
								<a href="<?= PORTAL ?>clients/packages/delete/<?= $r->p_id ?>" class="btn btn-danger btn-sm">
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
			<script>
				$(".datatable").dataTable();
			</script>
		</div>
	</div>
	<?php
	break;
	
	case "add":
	?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-pencil"></span> Add Package 
			
			<a href="<?= PORTAL ?>clients/packages" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>
		
		<div class="panel-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						Name:
						<input type="text" class="form-control" placeholder="Package Name" name="name" /><br />
						
						Rate / Price:
						<input type="text" class="form-control" placeholder="Price" name="price" /></br />
						
						Scheme:
						<select class="form-control select2" name="scheme">
							<option value="0">Yearly</option>
							<option value="1">Percentage Commission</option>
						</select><br /><br />
						
						Status:
						<select class="form-control select2" name="status">
							<option value="1">Enable</option>
							<option value="0">Disable</option>
						</select>
						<br /><br />
						
						Limit: (0 = Unlimited):
						<input type="number" value="0" name="limit" class="form-control" placeholder="0 for unlimited" />
						<br />
						
						Users (Number of staff):
						<input type="number" value="1" name="users" class="form-control" placeholder="Users" />
						<br />
						
						Order:
						<input type="number" value="0" name="order" class="form-control" placeholder="Sorting" />
						<br />
					</div>
					
					<div class="col-md-6">
						Description:
						<textarea class="form-control" placeholder="Description" name="description"></textarea><br />
						
						Content:
						<textarea class="summernote" name="content"></textarea><br />
					</div>
					
					<div class="col-md-12 text-center">
						<?= Controller::form("clients/packages", ["action" => "add"]); ?>
						<button class="btn btn-success btn-sm">
							<span class="fa fa-save"></span> Save Package
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
			<span class="fa fa-pencil"></span> Edit Package 
			
			<a href="<?= PORTAL ?>clients/packages" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>
		
		<div class="panel-body">
		<?php
			$p = packages::getBy(["p_id" => $id]);
			
			if(count($p) > 0){
				$p = $p[0];
		?>
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						Name:
						<input type="text" class="form-control" placeholder="Package Name" name="name" value="<?= $p->p_name ?>" /><br />
						
						Rate / Price:
						<input type="text" class="form-control" placeholder="Price" name="price" value="<?= $p->p_value ?>" /></br />
						
						Scheme:
						<select class="form-control select2" name="scheme">
							<option value="0" <?= !$p->p_scheme ? "selected" : "" ?>>Yearly</option>
							<option value="1" <?= $p->p_scheme ? "selected" : "" ?>>Percentage Commission</option>
						</select><br /><br />
						
						Status:
						<select class="form-control select2" name="status">
							<option value="1" <?= $p->p_status ? "selected" : "" ?>>Enable</option>
							<option value="0" <?= !$p->p_status ? "selected" : "" ?>>Disable</option>
						</select>
						<br /><br />
						
						Limit (0 = Unlimited):
						<input type="number" value="<?= $p->p_limit ?>" name="limit" class="form-control" placeholder="0 for unlimited" />
						<br />
						
						Users (Number of staff):
						<input type="number" value="<?= $p->p_users ?>" name="users" class="form-control" placeholder="Users" />
						<br />
						
						Order:
						<input type="number" value="<?= $p->p_order ?>" name="order" class="form-control" placeholder="Sorting" />
						<br />
						
					</div>
					
					<div class="col-md-6">
						Description:
						<textarea class="form-control" placeholder="Description" name="description"><?= $p->p_description ?></textarea><br />
						
						Content:
						<textarea class="summernote" name="content"><?= $p->p_content ?></textarea><br />
					</div>
					
					<div class="col-md-12 text-center">
						<?= Controller::form("clients/packages", ["action" => "edit"]); ?>
						<button class="btn btn-success btn-sm">
							<span class="fa fa-save"></span> Save Package
						</button>
					</div>
				</div>
			</form>
		<?php
			}else{
				new Alert("error", "No package information found.");
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
			<span class="fa fa-pencil"></span> Edit Package 
			
			<a href="<?= PORTAL ?>clients/packages" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>
		
		<div class="panel-body">
		<?php
			$p = packages::getBy(["p_id" => $id]);
			
			if(count($p) > 0){
				$p = $p[0];
		?>
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-12 ">
						<h3 class="m-t-0">Are you sure?</h3>
						
						<p>
							By clicking below button will delete package '<?= $p->p_name ?>' permanently?
						</p>
						<?= Controller::form("clients/packages", ["action" => "delete"]); ?>
						<button class="btn btn-danger btn-sm">
							<span class="fa fa-trash"></span> Save Package
						</button>
					</div>
				</div>
			</form>
		<?php
			}else{
				new Alert("error", "No package information found.");
			}
		?>
		</div>
	</div>
	<?php
	break;
	
	default:
		Page::Load("404");
	break;
}

?>