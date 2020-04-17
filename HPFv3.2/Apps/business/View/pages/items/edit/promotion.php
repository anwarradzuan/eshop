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
		<p style="font-size: 3vmin">Promotion</p>
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<?php
		switch (url::Get(5)) {
			case "delete_promotion":
				?>
					<?php
						$ip = item_promotion::getBy(["ip_id" => url::Get(6)]);
						
						if(count($ip) > 0){
							$ip =$ip[0];
							?>
							<div class="col-md-12">
								<div class="col-sm-12 text-center">
	                                Are you sure you want to remove <b><?= $ip->ip_name ?></b> promotion?
	                          	</div><br /><br /><br />
	                            <div class="row">
	                                <div class="col-sm-12">
	                                	<div class="col-md-2"></div>
	                                	<a class="col-md-3 btn btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::get(4)?>">
	                                        <span class="fa fa-trash"></span> No
	                                   	</a> 
	                                    <div class="col-md-2"></div>
	                                	<button class="col-md-3 btn btn-success delete-promotion">
	                                		<input type="hidden" class="ip-id" value="<?= $ip->ip_id ?>">
	                                        <span class="fa fa-trash"></span> Yes
	                                    </button>
	                            	</div>
	                    		</div><br />
	                    	</div>
							<?php
						}else{
							?>
							<div class="col-md-12">
								<div class="col-sm-12 text-center">
		                            <?php new Alert('error', "Data removed")?>
		                           	<a class="btn btn-primary" style="" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
		                            	<span class=""></span> Back
		                            </a>
		                		</div>
	                		</div>
							<?php
						}
					?>
				<?php
			break;
			
			default:
				
				?>
					<div class="col-md-6">
					<?php
					switch (url::Get(5)) {
						
						case "edit_promotion":
							$z = item_promotion::getBy(["ip_id" => url::Get(6)]);
							if(count($z) > 0){
								$z = $z[0];
								?>
								<a class="btn btn-primary" href="<?php echo PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::get(4)?>" >Back</a>
				            		<div class="row">
				            			<div class="col-sm-6">
				                            Name:
				                            <input class="form-control ip-name" type="text" name="ip_name" value="<?= $z->ip_name ?>" required><br />
				                        </div>
				                        <div class="col-sm-6">
				                            Expired Date:
				                            <input class="form-control single-date ip-expired" type="text" name="ip_expired" value="<?= $z->ip_expired ?>"><br />
				                        </div>
				            		</div>
				            		<div class="row">
				            			<div class="col-sm-6">
				                            Promotion Type:
				                            <select  class="form-control select2 ip-type" name="ip_type">
				                               <?php
					            			        foreach(Setting::$discountType as $c => $d){
					            			            ?>
					            			                <option value="<?= $c ?>" <?= ($c == $z->ip_type ? "selected" : "") ?> ><?= $d ?></option>
					            			            <?php
					            			        }
					            			    ?>
				                            </select><br /><br />
				                        </div>
				            			<div class="col-sm-6">
				                            Value:
				                            <input class="form-control ip-value" type="number" name="ip_value" value="<?= $z->ip_value ?>" required><br />
				                        </div>
				            		</div>
				            		<div class="row">
				                        <div class="col-sm-12">
				                        	<button class="col-md-12 btn btn-success edit-promotion">
				                        		<input class="form-control ip-id" type="hidden" name="ip_value" value="<?= $z->ip_id ?>">
				                                <span class="fa fa-save"></span> Save
				                            </button>
				                    	</div>
				            		</div>
								<?php
							}else{
								
							}
						break;
						
						default:
							?>
				        		<div class="row">
				        			<div class="col-sm-6">
				                        Name:
				                        <input class="form-control ip-name" type="text" name="ip_name" value="" required><br />
				                    </div>
				                    <div class="col-sm-6">
				                        Expired Date:
				                        <input class="form-control single-date ip-expired" type="" name="ip_expired" required><br />
				                    </div>
				        		</div>
				        		<div class="row">
				        			<div class="col-sm-6">
				                        Promotion Type:
				                        <select  class="form-control select2 ip-type" name="ip_type">
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
				                        <input class="form-control ip-value" type="number" name="ip_value" value="" required><br />
				                    </div>
				        		</div>
				        		<div class="row">
				                    <div class="col-sm-12">
				                    	<button class="col-md-12 btn btn-success add-promotion">
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
				                    <th class="text-center">Expired Date</th>
				                    <th class="text-center">Action</th>
				                </tr>
				            </thead>
				            <tbody id="listPromotion">
				                <?php
				                    foreach(item_promotion::getby(['ip_item' => $item->i_id ]) as $p){
				                    
				                ?>
				                <tr>
				                    <td class="text-center "><?= $i ?></td>
				                    <td class="text-center"><?= $p->ip_name ?></td>
				                    <td class="text-center">
				                    	<?php
				                    		$type = $p->ip_type;
											if($type == 0){
												echo "Amount";
											}else{
												echo"%";
											}
				                    	?>
				                    </td>
				                    <td class="text-center">
				                       	<?= $p->ip_value ?>
				                    </td>
				                    <td class="text-center"><?= $p->ip_expired ?></td>
				                    <td class="text-center">
				                    	<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::get(4)?>/edit_promotion/<?= $p->ip_id ?>">
				                    		<span class="fa fa-pencil"></span> Edit
				                    	</a>
				                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::get(4)?>/delete_promotion/<?= $p->ip_id ?>">
				                       		<span class="fa fa-trash"></span> Delete
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
	$_token = F::Uniqkey();
	$token = Token::create($_token, "promotion");
?>
<script>
	window.onload = function(){
		$pno = <?= $i ?>;
		
		$(document).on("click", ".add-promotion", function(){
				//console.log("sadasd");
			$.ajax({
				url : "<?= PORTAL_BUSINESS ?>api/hitem",
				method : "POST",
				data : {
					_token : "<?= $_token?>",
					token : "<?= $token ?>",
					action: "<?= F::Encrypt($_token . "addPromotion") ?>",
					itemId : "<?= $item->i_id ?>",
					ip_name : $(".ip-name").val(),
					ip_type : $(".ip-type").val(),
					ip_value : $(".ip-value").val(),
					ip_expired :$(".ip-expired").val()
				},
				dataType : "json"
			}).done(function(res){
				//console.log(res);
				if(res.status == "success"){
					
				pro = res.data;
				if(pro.ip_type != 1){
					type = "Amount";
				}else{
					type = "%";
				}
					
				$("#listPromotion").append(`
					<tr>
						<td class="text-center">`+ $pno +`</td>
						<td class="text-center">`+ pro.ip_name +`</td>
						<td class="text-center">`+ type +`</td>
						<td class="text-center">`+ pro.ip_value +`</td>
						<td class="text-center">`+ pro.ip_expired +`</td>
						<td class="text-center">
							<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/edit_promotion/`+ pro.ip_id +`">
	                    		<span class="fa fa-pencil"></span>	Edit
	                    	</a>
	                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/delete_promotion/`+ pro.ip_id +`">
	                       		<span class="fa fa-trash"></span>	Delete
	                       	</a>
						</td>
					</tr>
					`);
					Alert ("success", res.message);
					$pno +=1;
				}else{
						Alert ("error", res.message);
				}
			});
		});
		
		$(document).on("click", ".edit-promotion", function(){
	        $.ajax({
	            url: "<?= PORTAL_BUSINESS ?>api/hitem",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                action: "<?= F::Encrypt($_token . "editPromotion") ?>",
	                ip_id : $(".ip-id").val(),
	                ip_name : $(".ip-name").val(),
					ip_type : $(".ip-type").val(),
					ip_value : $(".ip-value").val(),
					ip_expired :$(".ip-expired").val()
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
		
		$(document).on("click", ".delete-promotion", function(){
	        $.ajax({
	            url: "<?= PORTAL_BUSINESS ?>api/hitem",
	            method: "POST",
	            data: {
	                _token: "<?= $_token ?>",
	                token: "<?= $token ?>",
	                action: "<?= F::Encrypt($_token . "deletePromotion") ?>",
	                ip_id : $(".ip-id").val()
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