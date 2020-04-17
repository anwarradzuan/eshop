<?php
 	$id = url::get(3);
    $items = items::getBy(['i_key' => $id]);
	$i = 1;
	if(count($items) > 0){
		$item = $items[0];
?>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<p style="font-size: 3vmin">Additional Fees</p>
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<?php
		switch (url::Get(5)) {
			case "delete_fee":
						
					$i_fee = item_fees::getBy(["if_id" => url::Get(6)]);
					
					if(count($i_fee) > 0){
						$i_fee =$i_fee[0];
						?>
						<div class="col-sm-12">
							<div class="col-sm-12 text-center">
	                            Are you sure you want to remove <b><?= $i_fee->if_name ?></b> fee?
	                      	</div><br /><br /><br />
	                        <div class="row">
	                            <div class="col-sm-12">
	                            	<div class="col-md-2"></div>
	                            	<a class="col-md-3 btn btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
	                                    <span class="fa fa-trash"></span> No
	                               	</a> 
	                                <div class="col-md-2"></div>
	                            	<button class="col-md-3 btn btn-success delete-fee">
	                            		<input type="hidden" class="fee-id" value="<?= $i_fee->if_id ?>">
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
				
				?>
				<div class="col-sm-6">
				<?php
				switch (url::Get(5)) {
					
					case "edit_fee":
						
						$x = item_fees::getBy(["if_id" => url::Get(6)]);
						
						if(count($x) > 0){
							$x = $x[0];
							?>
							<a class="btn btn-primary" href="<?php echo PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4)?>" >Back</a>
								<div class="row">
				        			<div class="col-sm-12">
				                        Name:
				                        <input class="form-control if-name" type="text" name="if_name" value="<?= $x->if_name ?>" required><br />
				                    </div>
				        		</div>
				        		<div class="row">
				        			<div class="col-sm-6">
				                        Fee Type:
				                        <select  class="form-control select2 if-type" name="if_type">
				                           <?php
				            			        foreach(Setting::$discountType as $c => $d){
				            			            ?>
				            			                <option value="<?= $c ?>" <?= ($c == $x->if_type ? "selected" : "" ) ?> ><?= $d ?></option>
				            			            <?php
				            			        }
				            			    ?>
				                        </select><br /><br />
				                    </div>
				        			<div class="col-sm-6">
				                        Value:
				                        <input class="form-control text-right if-value" type="text" name="if_value" value="<?= $x->if_value ?>" required><br />
				                    </div>
				        		</div>
				        		<div class="row">
				                    <div class="col-sm-12">
				                    	<button class="btn-block btn btn-success edit-fee">
				                    		<input class="form-control fee-id" type="hidden" name="" value="<?= $x->if_id ?>" required>
				                            <span class="fa fa-save"></span> Save
				                        </button>
				                	</div>
				        		</div>
				        
							<?php
						}else{
							echo "No data found";
						}
						
					break;
					
					default:
						?>
				    		<div class="row">
				    			<div class="col-sm-12">
				                    Name:
				                    <input class="form-control if-name" type="text" name="if_name" value="" required><br />
				                </div>
				    		</div>
				    		<div class="row">
				    			<div class="col-sm-6">
				                    Fee Type:
				                    <select  class="form-control select2 if-type" name="if_type">
				                       <?php
				        			        foreach(Setting::$discountType as $c => $d){
				        			            ?>
				        			                <option value="<?= $c ?>"><?= $d ?></option>
				        			            <?php
				        			        }
				        			    ?>
				                    </select><br /><br />
				                </div>
				    			<div class="col-sm-6">
				                    Value:
				                    <input class="form-control text-right if-value" type="text" name="if_value" value="" placeholder="0.00" required><br />
				                </div>
				    		</div>
				    		<div class="row">
				                <div class="col-sm-12 text-center">
				                	<button class="btn btn-block btn-success add-fee">
				                        <span class="fa fa-save"></span> Save
				                    </button>
				            	</div>
				    		</div>
						<?php
					break;
					}
				?>
				</div>
				<div class="col-sm-6 table-responsive">
			        <table class="table">
			            <thead>
			                <tr>
			                    <th class="text-center">No</th>
			                    <th class="text-center">Name</th>
			                    <th class="text-center">Type</th>
			                    <th class="text-center">Value</th>
			                    <th class="text-center">Action</th>
			                </tr>
			            </thead>
			            <tbody id="listFees">
			                <?php
			                    
			                    foreach(item_fees::getby(['if_item' => $item->i_id ]) as $p){
			                    
			                ?>
			                <tr>
			                    <td class="text-center "><?= $i ?></td>
			                    <td class="text-center"><?= $p->if_name ?></td>
			                    <td class="text-center">
			                    	<?php
			                    		$type = $p->if_type;
										if($type == 0){
											echo "Amount";
										}else{
											echo"%";
										}
			                    	?>
			                    </td>
			                    <td class="text-center">
			                       	<?= $p->if_value ?>
			                    </td>
			                    <td class="text-center">
			                    	<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/edit_fee/<?= $p->if_id ?>">
			                    		<span class="fa fa-pencil"></span>	Edit
			                    	</a>
			                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/delete_fee/<?= $p->if_id ?>">
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
				<?php
				
			break;
		}
		?>
	</div>
</div>
<?php
	$_token = F::UniqKey();
	$token = Token::create($_token, "fee");
?>
<script>
	window.onload = function(){
		$lfeesno = <?= $i ?>;
		$(document).on("click", ".add-fee", function(){
			$.ajax({
				url : "<?= PORTAL ?>api/aitem",
				method : "POST",
				data : {
					_token : "<?php echo $_token ?>",
					token : "<?php echo $token ?>",
					action : "<?= F::Encrypt($_token . "addFee") ?>",
					itemId : "<?= $item->i_id ?>",
	                if_name : $(".if-name").val(),
	                if_type : $(".if-type").val(),
	                if_value : $(".if-value").val()
				},
				dataType : "JSON" 
			}).done(function(res){
				//console.log(res.data);
				if(res.status == "success"){
					fee = res.data;
					if(fee.if_type != 1){
						type = "Amount";
					}else{
						type = "%";
					}
					
					$("#listFees").append(`
						<tr>
							<td class="text-center">`+ $lfeesno +`</td>
							<td class="text-center">`+ fee.if_name +`</td>
							<td class="text-center">`+ type +`</td>
							<td class="text-center">`+ fee.if_value +`</td>
							<td class="text-center">
								<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/edit_fee/`+ fee.if_id +`">
		                    		<span class="fa fa-pencil"></span>	Edit
		                    	</a>
		                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/delete_fee/`+ fee.if_id +`">
		                       		<span class="fa fa-trash"></span>	Delete
		                       	</a>
							</td>
						</tr>
						
						`);
					Alert ("success", res.message);
					$lfeesno += 1;
                }else{
                    Alert ("error", res.message);
                }
			})
		});
		
		$(document).on("click", ".edit-fee", function(){
	        $.ajax({
	            url: "<?= PORTAL ?>api/aitem",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                action: "<?= F::Encrypt($_token . "editFee") ?>",
	                fee_id : $(".fee-id").val(),
	                if_name : $(".if-name").val(),
	                if_type : $(".if-type").val(),
	                if_value : $(".if-value").val()
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
		
		$(document).on("click", ".delete-fee", function(){
	        $.ajax({
	            url: "<?= PORTAL ?>api/aitem",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                action: "<?= F::Encrypt($_token . "deleteFee") ?>",
	                fee_id : $(".fee-id").val()
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