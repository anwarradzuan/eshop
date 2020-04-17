<?php
new Controller ($_POST);
switch(url::get(3)){  
	case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> List Informations
            <a href="<?= PORTAL ?>system/setting/information/add" class="btn btn-sm btn-primary">
                <span class="fa fa-plus"></span> Add new Information
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th class="text-center">Portal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Current</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(infos::{"list"}() as $r){
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <?= $r->i_name ?>
                                <a href="<?= $r->i_url ?>" target="_blank">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </td>
                            <td class="text-center"><?= $r->i_portal ?></td>
                            <td class="text-center"><?= $r->i_status ? "Enabled" : "Disabled" ?></td>
                            <td></td>
                            <td class="text-center">
                                <a href="<?= PORTAL ?>system/setting/information/edit/<?= $r->i_id ?>" class="btn btn-primary btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="<?= PORTAL ?>system/setting/information/delete/<?= $r->i_id ?>" class="btn btn-danger btn-sm">
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
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-plus"></span> Add Information
            <a href="<?= PORTAL ?>system/setting/information" class="btn btn-primary btn-sm">
                Back
            </a>
        </div>
		<div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-10">
						<div class="panel panel-info">
							<div class="panel-heading">
								Information
							</div>
						
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										Name:
										<input type="text" class="form-control" placeholder="Name" name="name" required/><br />
									</div>		

									<div class="col-md-2">
										Logo:
										<input type="file" accept="image/*" name="file"/>
			                        </div>
			                        
									<div class="col-md-2">
										Mobile Logo:
										<input type="file" accept="image/*" name="file2"/>
									</div>
									
									<div class="col-md-2">
										Invoice Logo:
										<input type="file" accept="image/*" name="file3"/>
									</div>
								</div>	
								<div class="row">
			                        <div class="col-md-6">
			                        	Title:
										<input type="text" class="form-control" placeholder="Title" name="title" /><br />
										
										Author:
										<input type="text" class="form-control" placeholder="Author" name="author" /><br />
										
										URL:
										<input type="text" class="form-control" placeholder="URL" name="url" /><br />
										
										Keyword:
										<input type="text" class="form-control" placeholder="Keyword" name="keyword" /><br />
									</div>  
			                        <div class="col-md-6">
			                        	Status:
										<select class="form-control select2" name="status">
										<?php
											foreach(Setting::$boolean as $b => $v){
										?>	
											<option value="<?= $b ?>"><?= $v ?></option>
										<?php
										}
										?>
										</select><br /><br />
										
										Portal:
										<input type="text" class="form-control" placeholder="Portal" name="portal" /><br />
										
										Registration No:
										<input type="text" class="form-control" placeholder="Reg No" name="regNo" /><br />
										
										Address:
										<input type="text" class="form-control" placeholder="Address" name="address" /><br />
			                        </div>
			                        <div class="col-md-6"> 
				                         Email:
				                        <input type="text" class="form-control" placeholder="Email" name="email" /><br />
				                        
				                         Phone:
				                        <input type="text" class="form-control" placeholder="Phone" name="phone" /><br />
									</div>
									<div class="col-md-6"> 
				                         Fax:
				                        <input type="text" class="form-control" placeholder="Fax" name="fax" /><br />
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
				                        Description:
				                        <textarea class="form-control" name="description" rows="12"></textarea>
				                     </div>  
				                </div>
	                    	</div>
	                    </div>
					</div>
                	<div class="col-md-10 text-center">
					<?php
						Controller::form("system/setting/information",
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
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
	$id = url::get(4);
	$p = infos::getBy(["i_id" => $id]);
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-plus"></span> Edit Information
            <a href="<?= PORTAL ?>system/setting/information" class="btn btn-primary btn-sm">
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
					<div class="col-md-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Information
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										Name:
										<input type="text" class="form-control" placeholder="Name" name="name" value="<?= $x->i_name ?>" /><br />
										
										Title:
										<input type="text" class="form-control" placeholder="Title" name="title" value="<?= $x->i_title ?>" /><br />
									</div>		
									
									<div class="col-md-2" class="text-center">
										Logo:
										<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
							            	<input type="file" id="grid-input-6" class="custom-file-input" name="file">
							               	<span class="custom-file-control form-control">Choose file...</span>
							                <div class="px-file-buttons">
							                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
							                  	<button type="button" class="btn btn-primary btn-xs px-file-browse">Browse</button>
							                </div>
							            </label>
										<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= $x->i_logo ?>"  class="img-responsive">
			                        </div>
			                        
									<div class="col-md-2" class="text-center">
										Mobile Logo:
										<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-7">
							            	<input type="file" id="grid-input-7" class="custom-file-input" name="file2">
							               	<span class="custom-file-control form-control">Choose file...</span>
							                <div class="px-file-buttons">
							                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
							                  	<button type="button" class="btn btn-primary btn-xs px-file-browse">Browse</button>
							                </div>
							            </label>
										<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= $x->i_mobileLogo ?>"  class="img-responsive">
									</div>
									
									<div class="col-md-2" class="text-center">
										Invoice Logo:
										<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-8">
							            	<input type="file" id="grid-input-8" class="custom-file-input" name="file3">
							               	<span class="custom-file-control form-control">Choose file...</span>
							                <div class="px-file-buttons">
							                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
							                  	<button type="button" class="btn btn-primary btn-xs px-file-browse">Browse</button>
							                </div>
							            </label>
										<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= $x->i_invoiceLogo ?>"  class="img-responsive">
									</div>
								</div>	
								<div class="row">
			                        <div class="col-md-6">
			                        	Author:
										<input type="text" class="form-control" placeholder="Author" name="author" value="<?= $x->i_author ?>" /><br />
										
										Status:
										<select class="form-control select2" name="status">
										<?php
											foreach(Setting::$boolean as $b => $v){
										?>	
											<option value="<?= $b ?>" <?php echo ($b == $x->i_status  ? "selected" : "")  ?> ><?= $v ?></option>
										<?php
										}
										?>
										</select><br /></br />
										
										URL:
										<input type="text" class="form-control" placeholder="URL" name="url" value="<?= $x->i_url ?>" /><br />
										
										Keyword:
										<input type="text" class="form-control" placeholder="Keyword" name="keyword" value="<?= $x->i_keyword ?>" /><br />
										
										Email:
				                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $x->i_email ?>" /><br />
				                        
				                        Contact Us Email:
				                        <input type="text" class="form-control" placeholder="Email" name="contact_email" value="<?= $x->i_contact_email ?>" /><br />
				                        
									</div>  
			                        <div class="col-md-6">
										Portal:
										<input type="text" class="form-control" placeholder="Portal" name="portal" value="<?= $x->i_portal ?>" /><br />
										
										Registration No:
										<input type="text" class="form-control" placeholder="Reg No" name="regNo" value="<?= $x->i_regno ?>" /><br />
										
										Address:
										<input type="text" class="form-control" placeholder="Address" name="address" value="<?= $x->i_address ?>" /><br />
										
										Fax:
				                        <input type="text" class="form-control" placeholder="Fax" name="fax" value="<?= $x->i_fax ?>" /><br />
				                        
				                        Phone:
				                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?= $x->i_phone ?>" /><br />
				                        
				                        Bcc Contact Us (<i>example: email@email.com, email@email.com</i>):
				                        <input type="text" class="form-control" placeholder="Bcc" name="bcc" value="<?= $x->i_bcc ?>" /><br />
			                        </div>
								</div>
								<div class="row">
									<div class="col-md-6">
				                        Description:
				                        <textarea class="form-control" name="description" rows="12" ><?= $x->i_description ?></textarea>
				                     </div>  
				                  </div>  
	                    	</div>
						</div>
					</div>
					<div class="col-md-10 text-center">
					<?php
						Controller::form("system/setting/information",
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
		$id = url::get(4);
		$p = infos::getBy(["i_id" => $id]);
	?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-list"></span>Delete Information
			<a href="<?= PORTAL ?>system/setting/information" class="btn btn-primary btn-sm">
				Back
			</a>
		</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						Delete Data
					</div>
					<div class="panel-body">
		      			<form action="" method="POST">
	      				<?php 
							if(count($p) > 0){
							$p = $p[0];
                        ?>
                        	Are you sure to delete <b><?php echo $p->i_name ?></b> permanently?<br /><br />
                        <?php
                           Controller::form("system/setting/information",
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
                        		new Alert("warning", "Data not found odr has been removed");
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







































































