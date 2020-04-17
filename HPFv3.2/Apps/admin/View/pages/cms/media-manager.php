<?php

new Controller ($_POST);
switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Media
		</div>
		<div class="panel-body">
			<div class="row">
				<br>
				<div class="col-md-3">
					<form action="" method="POST" enctype="multipart/form-data">
						<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							<input type="file" accept="image/*" name="image" onchange="this.form.submit()"  id="grid-input-6" class="custom-file-input">
							<span class="custom-file-control form-control">Choose file...</span>
							<div class="px-file-buttons">
								<button type="button" class="btn btn-xs px-file-clear">Clear</button>
								<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
							</div>
						</label>
						<!-- <input type="file" accept="image/*" name="image" onchange="this.form.submit()" /> -->
						<?= Controller::form("cms/media", ["type" => "add"]) ?>
					</form>
				</div>
				</br>
				<br>
				<div class="panel-body">
					<div class="row">
						<div class="table-primary">
							<table class="table table-hover table-bordered data-table" id="datatables">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>File</th>
										<th width="25%">Image</th>
										<th class="text-center">:::</th>
									</tr>
								</thead>
								
								<tbody>
								<?php
									$no = 1;
									$portal = PORTAL_ADMIN;
									foreach(medias::list() as $d){
								?>
									<tr>
										<td class="text-center"><?= $no++ ?></td>
										<td>
											<textarea class="form-control" style="width: 100%;" readonly="readonly"><?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/medias/<?= $d->m_file ?></textarea>
										</td>
										<td>
											<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/medias/<?= $d->m_file ?>" class="img img-responsive" />
										</td>
										<td class="text-center">
									        <a href="<?= PORTAL ?>cms/media-manager/delete/<?= $d->m_id ?>" class="btn btn-danger btn-sm">
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
        	</div>
        </div>
    </div>
	<?php
	break;

	case "delete":
		$id = url::get(3);
		$p = medias::getBy(["m_id" => $id]);
	?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span> Delete Media
			<a href="<?= PORTAL ?>cms/media-manager/" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>    
		<div class="panel-body">
			<div class="col-md-4">
						<form action="" method="POST">
						<?php 
							if(count($p) > 0){
							$p = $p[0];
						?>
						Are you sure to delete <b><?php echo $p->m_name ?></b> permanently?<br /><br />
						<?php
							Controller::form("cms/media",
							[
								"type"  => "delete"  
							]);
						?>
						<button class="btn btn-danger">
							<span class="fa fa-trash"></span> Yes
						</button>
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
	<?php
	break;
}
?>