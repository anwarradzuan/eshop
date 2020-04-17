<?php
	$id = url::get(3);
	$i = 1;
    $items = items::getBy(['i_key' => $id]);
	if(count($items) > 0){
		$item = $items[0];
?>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<p style="font-size: 3vmin">Item Attribute</p>
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="row">
			<?php
				switch (url::get(5)) {
					case "delete_attribute":
							$att = item_attribute::getBy(["ia_id" => url::Get(6)]);
					
							if(count($att) > 0){
								$att =$att[0];
								?>
								<div class="col-sm-12">
									<div class="col-sm-12 text-center">
			                            Are you sure you want to remove <b><?= $att->ia_name ?></b> attribute?
			                      	</div><br /><br /><br />
			                        <div class="row">
			                            <div class="col-sm-12">
			                            	<div class="col-md-2"></div>
			                            	<a class="col-md-3 btn btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
			                                    <span class="fa fa-trash"></span> No
			                               	</a> 
			                                <div class="col-md-2"></div>
			                            	<button class="col-md-3 btn btn-success delete-atrribute">
			                            		<input type="hidden" class="ia-id" value="<?= $att->ia_id ?>">
			                                    <span class="fa fa-trash"></span> Yes
			                                </button>
			                        	</div>
			                		</div><br />
		                		</div>
								<?php
							}else{
								?>
								<div class="col-sm-12">
									<div class="col-sm-12 text-center">
			                            <?php new Alert('error', "Data removed")?>
			                           	<a class="btn btn-primary" style="" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
			                            	<span class=""></span> Back
			                            </a>
			                		</div>
		                		</div>
								<?php
							}
					break;
					
					default:
						switch (url::get(5)) {
							case "edit_attribute":
								$att = item_attribute::getBy(["ia_id" => url::get(6)]);
								if(count($att) > 0){
									$att =$att[0];
								?>
								<div class="col-md-6">
			                        <div class="panel-body">
			                            <div class="row">
			                            	<div class="col-md-4">
			                            		Attribute:
			                            		<input type="text" name="ia_name" class="form-control ia-name" value="<?= $att->ia_name ?>" required>
			                            	</div>
			                            </div><br />
			                            <div class="row">
			                            	<div class="col-md-12">
			                            		Text:
			                            		<textarea class="form-control details ia-value" name="content" id="" rows="5"><?= $att->ia_value ?></textarea>
			                            	</div>
			                            </div><br />
			                             <div class="row">
			                                <div class="col-md-12">
			                                    <button class="btn btn-block btn btn-success edit-attribute">
			                                    	<input class="form-control ia-id" type="hidden" name="" value="<?= $att->ia_id ?>" required>
			                                        <span class="fa fa-save"></span> Save
			                                    </button>
			                                </div>
			                            </div>
			                        </div>
				                </div>
								<?php
								}
							break;
							
							default:
							
								?>
				                    
				                    	<div class="col-md-6">
					                        <div class="panel-body">
					                            <div class="row">
					                            	<div class="col-md-4">
					                            		Attribute:
					                            		<input type="text" name="ia_name" class="form-control ia-name" required>
					                            	</div>
				                            </div><br />
					                            <div class="row">
					                            	<div class="col-md-12">
					                            		Text:
					                            		<textarea class="form-control details ia-value" name="content" id="" rows="5"></textarea>
					                            	</div>
					                            </div><br />
					                             <div class="row">
					                                <div class="col-md-12">
					                                    <button class="btn btn-block btn btn-success add-attribute">
					                                        <span class="fa fa-save"></span> Save
					                                    </button>
					                                </div>
					                            </div>
					                        </div>
						                </div>
				                    	
				                    
								<?php	
							
							break;
						}
					?>
					<div class="col-md-6">
			        	<div class="col-sm-12 table-responsive">
			        		<table class="table">
			                    <thead>
			                        <tr>
			                            <th class="text-center">No</th>
			                            <th class="text-center">Attribute</th>
			                            <th class="text-center">Text</th>
			                            <th class="text-center">Option</th>
			                        </tr>
			                    </thead>
			                    <tbody id="listAttribute">
			                        <?php
										$att = item_attribute::getBy(["ia_item" => $item->i_id]);
										foreach ($att as $p) {
			                        ?>
			                        <tr>
			                            <td class="text-center"><?= $i ?></td>
			                            <td class="text-center">
			                            	<?= $p->ia_name?>
			                            </td>
			                            <td class="text-center">
			                            	<?= $p->ia_value?>
			                            </td>
			                            <td class="text-center">
			                            	<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/edit_attribute/<?= $p->ia_id ?>">
					                    		<span class="fa fa-pencil"></span>	Edit
					                    	</a>
					                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/delete_attribute/<?= $p->ia_id ?>">
					                       		<span class="fa fa-trash"></span>	Delete
					                       	</a>
			                            </td>
			                        </tr>
			                        <?php
			                            $i++;
										}
			                        ?>
			                    </tbody>
			                </table> 
			        	</div>
			    	</div>
					<?php
					break;
					
				}
			?>
		</div>
	</div>
</div>
<?php
	$_token = F::UniqKey();
	$token = Token::create($_token, "attribute");
?>
<script>
window.onload = function(){
	$lfeesno = <?= $i ?>;
	$(document).on("click", ".add-attribute", function(){
		$.ajax({
			url : "<?= PORTAL ?>api/hitem",
			method : "POST",
			data : {
				_token : "<?php echo $_token ?>",
				token : "<?php echo $token ?>",
				action : "<?= F::Encrypt($_token . "addAttribute") ?>",
				itemId: "<?= $item->i_id ?>",
				ia_name: $('.ia-name').val(),
				ia_value: $('.ia-value').val()
			},
			dataType : "json" 
		}).done(function(res){
			//console.log(res);
			if(res.status == "success"){
	            
	            att	= res.data;
	            
	            $("#listAttribute").append(`
	            	<tr>
						<td class="text-center">`+ $lfeesno +`</td>
						<td class="text-center">`+ att.ia_name +`</td>
						<td class="text-center">`+ att.ia_value +`</td>
						<td class="text-center">
							<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/edit_attribute/`+ att.if_id +`">
	                    		<span class="fa fa-pencil"></span>	Edit
	                    	</a>
	                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/delete_attribute/`+ att.if_id +`">
	                       		<span class="fa fa-trash"></span>	Delete
	                       	</a>
						</td>
					</tr>
	            	`)
	            	
				Alert ("success", res.message)
				$lfeesno += 1;
            }else{
                Alert ("error", res.message)
            }
		})
	});
	
	$(document).on("click", ".edit-attribute", function(){
        $.ajax({
            url: "<?= PORTAL_BUSINESS ?>api/hitem",
            method: "POST",
            data: {
                _token: "<?= $_token ?>",
                token: "<?= $token ?>",
                action : "<?= F::Encrypt($_token . "editAttribute") ?>",
				ia_id: $('.ia-id').val(),
				ia_name: $('.ia-name').val(),
				ia_value: $('.ia-value').val()
            },
            dataType: "json"
        }).done(function(res){
        	//console.log(res);
        	 //window.location = window.location;
            if(res.status == "success"){
            	
				Alert ("success", res.message)
            }else{
                Alert ("error", res.message)
            }
        });
    });
    
    $(document).on("click", ".delete-atrribute", function(){
        $.ajax({
            url: "<?= PORTAL_BUSINESS ?>api/hitem",
            method: "POST",
            data: {
                _token: "<?= $_token ?>",
                token: "<?= $token ?>",
                action: "<?= F::Encrypt($_token . "deleteAttribute") ?>",
                ia_id : $(".ia-id").val()
            },
            dataType: "json"
        }).done(function(res){
        	//console.log(res);
        	window.location = window.location;
            // if(res.status == "success"){
            	// $(".row-" + $(this).attr("data-row")).remove();
				// Alert ("success", res.message)
            // }else{
                // Alert ("error", res.message)
            // }
        });
    });
};
</script>
<?php
	}
?>