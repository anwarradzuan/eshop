<?php

new Controller ($_POST);
switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Banners
            <a href="<?= PORTAL ?>cms/banners/add" class="btn btn-primary btn-sm">
            	<span class="fa fa-plus"></span>
                Add New Banner
            </a>
        </div>
		<div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table" id="datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Position</th>
                            <th class="text-center">Image</th>
                        	<th class="text-center">Status</th>
                        	<th class="text-center">User?</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(banners::list() as $p){
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
							<td class="text-center">
								<?php
									$pos = $p->b_position;
									
									if($pos == 0){
										echo "Main Banner";
									}elseif($pos == 1){
										echo "Promotion";
									}elseif($pos == 2){
										echo "About Us";
									}else{
										echo "Contact Us";
									}
									
								?></td>
							<td class="text-center" width="30%">
								<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/banners/<?= $p->b_file ?>" class="img img-responsive text-center" />
							</td>
							<td class="text-center"><?= ($p->b_status == 1) ? "Enable" : "Disable" ?> </td>
							<td><?= $p->b_user ?></td>
							<td  class="text-center">
                                <a href="<?= PORTAL ?>cms/banners/edit/<?= $p->b_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="<?= PORTAL ?>cms/banners/delete/<?= $p->b_id ?>" class="btn btn-danger btn-sm">
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
            <span class="fa fa-list"></span> Banners
			<a href="<?= PORTAL ?>cms/banners/" class="btn btn-primary btn-sm">
				Back
			</a>
        </div>    
		<div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
					<br>
					<div class="col-md-2">
						<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							<input type="file" name="file" id="grid-input-6" class="custom-file-input">
							<span class="custom-file-control form-control">Choose file...</span>
							<div class="px-file-buttons">
								<button type="button" class="btn btn-xs px-file-clear">Clear</button>
								<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
							</div>
						</label>
					</div>
					</br>
					<br>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								Banner Name
								<input type="text" class="form-control" name="b_name" placeholder="Banner Name"><br />
							</div>
							<div class="col-md-3">
								Position: 
								<br />
								<select class="form-control" name="b_position">
									<?php
										foreach(Setting::$banner as $t => $y){
											?>
												<option value="<?= $t ?>"><?= $y ?></option>
											<?php
										}
									?>
								</select>
								<br />
							</div>
							<div class="col-md-3">
								Status: 
								<br><select class="form-control" name="b_status">
								<option value="0">Disable</option>
								<option value="1">Enable</option>
								</select></br>
							</div>
						</div>
					</div>
					</br>
					<div class="col-md-12">
						Content:
						<textarea class="form-control summernote" name="b_content" id="b_content" rows="25"></textarea>
						<div class="col-md-12 text-center">
							<?php
								Controller::form("cms/banner",
								[
								"type"  => "add"  
								]);
							?>
							<button class="btn btn-success">
								<span class="fa fa-save"></span> Add Banner
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
    	$p = banners::getBy(["b_id" => $id]); //Select
    ?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span> Banners
			<a href="<?= PORTAL ?>cms/banners/" class="btn btn-primary btn-sm">
			Back
			</a>
		</div>    
		<div class="panel-body">
		<?php
			if(count($p) > 0){
			$x = $p[0];
		?>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-2">
						<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							<input type="file" name="file" id="grid-input-6" class="custom-file-input">
							<span class="custom-file-control form-control">Choose file...</span>
							<div class="px-file-buttons">
								<button type="button" class="btn btn-xs px-file-clear">Clear</button>
								<button type="button" class="btn btn-primary btn-xs px-file-browse">Browse</button>
							</div>
						</label>
					</div>
					</br>
					<br>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								Banner Name
								<input type="text" class="form-control" name="b_name" placeholder="Banner Name" value="<?= $x->b_name ?>"><br />
							</div>
							<div class="col-md-3">
								Position: 
								<br><select class="form-control" name="b_position">
									<?php
										foreach( Setting::$banner as $a => $b ){
		            						?>
		            							<option value="<?= $a ?>" <?= $a == $x->b_position ? "selected": ""?>><?= $b ?></option>
		            						<?php
		            					}
									?>
								</select></br>
							</div>
							<div class="col-md-3">
								Status: 
								<br><select class="form-control" name="b_status">
									<?php
										foreach(Setting::$boolean as $d => $e){
											?>
												<option value="<?= $d ?>" <?= ($d == $x->b_status ?  "selected" : "") ?> ><?= $e ?></option>
											<?php
										}
									?>
								</select></br>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						Content:
						<textarea class="form-control summernote" name="b_content" id="b_content" rows="25" value="<?= $x->b_content ?>"><?= $x->b_content ?></textarea>
					
						<div class="col-md-12 text-center">
						<?php
							Controller::form("cms/banner",
							[
							"type"  => "edit"  
							]);
						?>
							<button class="btn btn-success">
								<span class="fa fa-save"></span> Save 
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
		$s = banners::getBy(["b_id" => $id]); 
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Banners
			<a href="<?= PORTAL ?>cms/banners/" class="btn btn-primary btn-sm">
				Back
			</a>
        </div>    
    	<div class="panel-body">
		    <div class="col-md-4">
		      	<div class="panel">
	      			<div class="panel-heading">
                        Delete Banner
                    </div>
			      	<div class="panel-body">
		      			<form action="" method="POST">
	      				<?php 
                            if(count($s) > 0){
                                $s = $s[0];
                        ?>
                            Are you sure to delete <b><?php echo $s->b_name ?></b> banner permanently?<br /><br />
                        <?php
                           Controller::form("cms/banner",
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
                        		new Alert("error", "Data deleted");
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
		
