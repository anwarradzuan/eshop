<?php
new Controller($_POST, $route);

switch(input::get('action')){
	case "":
	?>
	<div class="panel">
		<div class="panel-heading">
		    <div class="row">
		        <div class="col-md-10 form-group">
        			Languages
        			<a href="<?= F::URLParams() ?>&action=add" class="btn btn-primary btn-sm">
        				<span class="fa fa-plus"></span> Add new language pack
        			</a> 
    			</div>
    			<div class="col-md-2 form-group">
        			<form action="" method="POST" enctype="multipart/form-data">
        			    Upload Language Pack:
        				<label class="custom-file m-b-2">
                            <input type="file" class="custom-file-input" name="pack" accept="application/json">
                            <span class="custom-file-control form-control">Choose file...</span>
                            <input type="hidden" name="submit" value="<?= $_SESSION["IR"] ?>" >
                            <input type="hidden" name="route" value="admin/systems/upload_language" />
                        </label>
        				<button class="btn btn-success btn-sm">
        					<span class="fa fa-upload">Upload</span> 
        				</button>
    			    </form>
    			 </div>
        	</div>
			
		</div>
		<div class="panel-body">
		    <div class="table-primary">
			<table class="table table-hover table-bordered data-table">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th>Language</th>
						<th class="text-center">Code</th>
						<th class="text-center">Author</th>
						<th class="text-center">Date</th>
						<th class="text-right" width="20%">Action</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
					$no = 1;
					foreach(scandir(ASSET . "langs") as $file){
						if(is_file(ASSET . "langs/" . $file)){
							$part = explode(".", $file);
							
							if(isset($part[1])){
								if($part[1] == "json"){
									$str = file_get_contents(ASSET."langs/" . $file);
									$obj = json_decode($str);
								?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $obj->language_pack->name ?></td>
									<td class="text-center"><?= $part[0] ?></td>
									<td class="text-center"><?= $obj->language_pack->author ?></td>
									<td class="text-center"><?= $obj->language_pack->created ?></td>
									<td class="text-right">
										<a href="<?= PORTAL ?>assets/langs/<?= $file ?>" target="_blank" class="btn btn-sm btn-info">
											<span class="fa fa-download"></span> Download
										</a>
										<a href="<?= F::URLParams() ?>&action=edit&id=<?= $part[0] ?>" class="btn btn-primary btn-sm">
											<span class="fa fa-edit"></span>
										</a>
										
										<a href="<?= F::URLParams() ?>&action=delete&id=<?= $part[0] ?>" class="btn btn-danger btn-sm">
											<span class="fa fa-trash"></span>
										</a>
									</td>
								</tr>
								<?php
								}
							}
						}
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
			<span class="fa fa-plus"></span> Add new language pack
			<a href="<?= PORTAL ?>system/setting/language" class="btn btn-sm btn-primary">
				Back
			</a>
		</div>
		<div class="panel-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-4">
					    <div class="panel panel-info">
                            <div class="panel-heading">
                                Language Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            Name:
					                        <input type="text" class="form-control" placeholder="Language Pack Name" name="name" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            Code:
					                        <input type="text" class="form-control" placeholder="Code" name="code" />
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            Author:
					                        <input type="text" class="form-control" placeholder="Author" name="author" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            Date:
					                           <input type="date" class="form-control" placeholder="Date" name="date" value="<?= date("Y-m-d") ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-md-12 text-center">
                        <?php
                            Controller::Form(
                                "language", 
                                [
                                    "type"  => "add"  
                                ]
                            );
                        ?>
                        <button class="btn btn-success">
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
		$code = input::get('id');
	?>
	<div class="panel">
		<div class="panel-heading">
			<span class="fa fa-edit"></span> Edit language pack
			
			<a href="<?= PORTAL ?>system/setting/language" class="btn btn-sm btn-primary">
				Back
			</a>
		</div>
		
		<div class="panel-body">
		    <div class="table-primary">
		<?php
			if(file_exists(ASSET . "langs/" . $code . ".json")){
				$str = file_get_contents(ASSET . "langs/" . $code . ".json");
				$obj = json_decode($str);
		?>
			<div class="row">
				<div class="col-md-4">
					<form action="" method="POST">
						Name:
						<input type="text" class="form-control" placeholder="Language Pack Name" name="name" value="<?= $obj->language_pack->name ?>" /><br />
						
						Code:
						<input type="text" class="form-control" placeholder="Code" name="code" value="<?= $code ?>" /><br />
						
						Author:
						<input type="text" class="form-control" placeholder="Author" name="author" value="<?= $obj->language_pack->author ?>" /><br />
						
						Date:
						<?php
							$st = strtotime($obj->language_pack->created);
							$date = gmdate("Y-m-d", $st);
						?>
						<input type="date" class="form-control" placeholder="Date" name="date" value="<?= $date ?>" /><br />
						
						<?php
                            Controller::Form(
                                "language", 
                                [
                                    "type"  => "edit"  
                                ]
                            );
                        ?>
						
						<button class="btn btn-success btn-block">
							<span class="fa fa-save"></span> Save Language Pack
						</button>
					</form>
				</div>
				
				<div class="col-md-8">
					<strong>
						Add new word:
					</strong><br />
					<form action="" method="POST">
						<div class="row">
							<div class="col-md-5">
								<input type="text" class="form-control" placeholder="Word" name="word" /><br />
							</div>
							
							<div class="col-md-5">
								<input type="text" class="form-control" placeholder="Value" name="value" /><br />
							</div>
							
							<div class="col-md-2">
								<input type="hidden" name="submit" value="<?= $_SESSION["IR"] ?>" />
								<input type="hidden" name="route" value="admin/systems/word" />
								
								<button class="btn btn-success btn-block">
									<span class="fa fa-plus"></span>
								</button>
							</div>
						</div>
					</form>
					
					<hr />
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th class="text-center" width="5%">No</th>
								<th width="45%">Word</th>
								<th width="50%">Value</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
							$langs = json_decode($str, true);
							$no = 1;
							foreach($langs as $lang => $value){
								if($lang != "language_pack"){
								?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td>
										<?php /*<input type="text" class="form-control word-input" value="<?= $lang ?>" data-word="<?= $lang ?>" data-code="<?= $code ?>" /> */ ?>
										<?= $lang ?>
									</td>
									<td><input type="text" class="form-control value-input" value="<?= $value ?>" data-word="<?= $lang ?>" data-code="<?= $code ?>" /></td>
								</tr>
								<?php
								}
							}
						?>
						</tbody>
					</table>
					<?php
						$token_name = F::Encrypt(F::UniqKey("WORD_"));
						$token = Token::create($token_name, "WORD_");
					?>
					<script>
						$(".table").dataTable();
						
						$(document).on("keyup", ".value-input", function(){
							$.ajax({
								method: "POST",
								url: "<?= PORTAL ?>admin/rpc/system/word",
								data: {
									token_name: "<?= $token_name ?>",
									_token: "<?= $token ?>",
									code: $(this).attr("data-code"),
									word: $(this).attr("data-word"),
									value: $(this).val(),
									act: "<?= F::Encrypt($token_name . "changeValue") ?>"
								},
								dataType: "text"
							}).done(function(res){
								console.log(res);
							});
						});
						
						/*
						$(document).on("keyup", ".word-input", function(){
							$.ajax({
								method: "POST",
								url: "<?= PORTAL ?>admin/rpc/system/word",
								data: {
									token_name: "<?= $token_name ?>",
									_token: "<?= $token ?>",
									code: $(this).attr("data-code"),
									word: $(this).attr("data-word"),
									value: $(this).val(),
									act: "<?= F::Encrypt($token_name . "changeWord") ?>"
								},
								dataType: "text"
							}).done(function(res){
								console.log(res);
							}).fail(function(res){
								console.log(res);
							});
						});
						*/
					</script>
				</div>
			</div>
			
		<?php
			}else{
				new Alert("error", "Language pack not found.");
			}
		?>
		</div>
		</div>
	</div>
	<?php
	break;
	
	case "delete":
		$code = input::get('id');
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="fa fa-trash"></span> Edit language pack
			
			<a href="<?= PORTAL ?>system/setting/language" class="btn btn-sm btn-primary">
				Back
			</a>
		</div>
		
		<div class="panel-body">
		     <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Language Information
                        </div>
                        <?php
                			if(file_exists(ASSET . "langs/" . $code . ".json")){
                				$str = file_get_contents(ASSET . "langs/" . $code . ".json");
                				$obj = json_decode($str);
                		?>
                        <div class="panel-body">
                            <div class="form-group">
                                <form action="" method="POST">
                                    <h3>Are you sure?</h3>
                						<p>
                							By clicking below button will remove language pack <i><?= $obj->language_pack->name ?></i> permanently.
                						</p>
                						<?php
                                            Controller::Form(
                                                "language", 
                                                [
                                                    "type"  => "delete"  
                                                ]
                                            );
                                        ?>
                						
                						<button class="btn btn-danger btn-sm">
                							<span class="fa fa-trash"></span> Delete Language Pack
                						</button>
                                </form>
                            </div>
                        </div>
                        <?php
                			}else{
                				new Alert("error", "Language pack not found.");
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