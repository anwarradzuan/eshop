<?php
	$id = url::get(3);
	$no = 0; 
	$items = items::getBy(['i_key' => $id]);
	if(count($items) >0){
		$item =	$items[0];
		?>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<p style="font-size: 3vmin">Item Options</p>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
				<?php
					switch (url::get(5)){
						case "add_option":
							?>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-1">
										<a class="btn btn-primary bt-bloack" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
											<span class=""> Back</span>
										</a>
									</div>
								</div>
								<div class="row">
					    			<div class="col-md-6">
		                        		Name:
		                        		<input type="text" name="" class="form-control io-name" data-item="<?= $item->i_id?>" required>
		                        	</div>
					    		</div>
					    		<div class="row">
					    			<div class="col-sm-6">
					                    Type:
					                    <select  class="form-control select2 io-type" name="" data-item="<?= $item->i_id?>" >
					                    		<option value="">Select</option>
					                       <?php
					        			        foreach(Setting::$itemOption as $c => $d){
					        			            ?>
					        			                <option value="<?= $c ?>"><?= $d ?></option>
					        			            <?php
					        			        }
					        			    ?>
					                    </select><br /><br />
					                </div>
					    		</div>
					    		<hr />
					    		<div class="row">
					    			<div class="col-sm-6">
					                    Option Value:
					                </div>
					                <div class="col-sm-3">
					                    Price (<?= Currency::GetSign() ?>):
					                </div>
					                <div class="col-sm-3">
					                    <button class="btn btn-block btn-info add-value">
					                    	<span class="fa fa-plus"> Add</span>
					                    </button>
					                </div>
					    		</div><br />
					    		<div id="view_value">
						    		<div class="row row-<?= $no ?>">
						    			<div class="col-sm-6">
						                    <input class="form-control io-value io-value-<?= $no ?>" type="text" name="" value="" data-row="<?= $no ?>" placeholder="Option Value" required><br />
						                </div>
						                <div class="col-sm-3">
						                    <input class="form-control text-right io-price io-price-<?= $no ?>" type="text" name="" value="" data-row="<?= $no ?>" placeholder="0.00"><br />
						                </div>
						                <div class="col-sm-3">
						                    <button class="btn btn-block btn-danger delete-value" data-row="<?= $no ?>">
						                    	<span class="fa fa-trash"> Remove</span>
						                    </button>
						                </div>
						    		</div>
					    		</div>
					    		<div class="row">
						    		<div class="col-md-12">
						    			<button class="btn btn-success btn-block add-option">
						    				<span class="fa fa-save"></span> Save
						    			</button>
						    		</div>
					    		</div>
							</div>
							<?php
						break;
						
						case "edit_option":
							
							$io = item_option::getBy(["io_id"=> url::get(6)]);
							
							if(count($io) > 0){
								$io =$io[0];
								?>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-1">
											<a class="btn btn-primary bt-bloack" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
												<span class=""> Back</span>
											</a>
										</div>
									</div>
									<div class="row">
						    			<div class="col-md-6">
			                        		Name:
			                        		<input type="text" name="" class="form-control io-name" data-item="<?= $item->i_id?>" value="<?= $io->io_name ?>" required>
			                        	</div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-6">
						                    Type:
						                    <select  class="form-control select2 io-type" name="" data-item="<?= $item->i_id?>" >
						                    		<option value="">Select</option>
						                       <?php
						        			        foreach(Setting::$itemOption as $c => $d){
						        			            ?>
						        			                <option value="<?= $c ?>" <?= ($c == $io->io_type ? "Selected" : "") ?> ><?= $d ?></option>
						        			            <?php
						        			        }
						        			    ?>
						                    </select><br /><br />
						                </div>
						    		</div>
						    		<hr />
						    		<div class="row">
						    			<div class="col-sm-6">
						                    Option Value:
						                </div>
						                <div class="col-sm-3">
						                    Price (<?= Currency::GetSign() ?>):
						                </div>
						                <div class="col-sm-3">
						                    <button class="btn btn-block btn-info add-value">
						                    	<span class="fa fa-plus"> Add</span>
						                    </button>
						                </div>
						    		</div><br />
						    		<div id="view_value">
						    			<?php
						    				$iov = item_option_value::getBy(["iov_option" => $io->io_id]);
											foreach($iov as $val){
						    			?>
							    		<div class="row row-<?= $no  ?>">
							    			<div class="col-sm-6">
							                    <input class="form-control io-value io-value-<?= $no ?>" type="text" name="" value="<?= $val->iov_value ?>" data-row="<?= $no ?>" data-ivid="<?= $val->iov_id ?>" placeholder="Option Value" required><br />
							                </div>
							                <div class="col-sm-3">
							                    <input class="form-control text-right io-price io-price-<?= $no ?>" type="text" name="" value="<?= $val->iov_price ?>" data-row="<?= $no ?>" data-ivid="<?= $val->iov_id ?>" placeholder="0.00"><br />
							                </div>
							                <div class="col-sm-3">
							                    <button class="btn btn-block btn-danger delete-value1" data-row="<?= $no ?>" data-ivid="<?= $val->iov_id ?>">
							                    	<span class="fa fa-trash"> Remove</span>
							                    </button>
							                </div>
							    		</div>
							    		<?php
							    			$no++;
							    			}
							    		?>
						    		</div>
						    		<div class="row">
							    		<div class="col-md-12">
							    			<button class="btn btn-success btn-block edit-option" data-ioid="<?= $io->io_id ?>">
							    				<span class="fa fa-save"></span> Save
							    			</button>
							    		</div>
						    		</div>
								</div>
								<?php
							}else{
								new Alert("Error", "Data Not Found");
							}
							
						break;
							
						case "delete_option":
							$io = item_option::getBy(["io_id"=> url::get(6)]);
							
							if(count($io) > 0){
								$io =$io[0];
								?>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-1">
											<a class="btn btn-primary bt-bloack" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
												<span class=""> Back</span>
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-12 text-center">
					                            Are you sure you want to remove <b><?= $io->io_name ?></b> option?
					                      	</div><br /><br /><br />
					                        <div class="row">
					                            <div class="col-sm-12">
					                            	<div class="col-md-2"></div>
					                            	<a class="col-md-3 btn btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
					                                    <span class="fa fa-trash"></span> No
					                               	</a> 
					                                <div class="col-md-2"></div>
					                            	<button class="col-md-3 btn btn-success delete-option" data-ioid="<?= $io->io_id ?>">
					                                    <span class="fa fa-trash"></span> Yes
					                                </button>
					                        	</div>
					                		</div><br />
				                		</div>
									</div>
								</div>
								<?php
							}else{
								?>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-1">
											<a class="btn btn-primary bt-bloack" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>">
												<span class=""> Back</span>
											</a>
										</div>
									</div><br />
									<div class="row">
										<div class="col-sm-12 text-center">
					                            <?php new Alert("error", "Data Removed")?>
				                		</div>
									</div>
								</div>
								<?php
							}
							
						break;
							
						default:
							?>
							<div class="col-md-2">
								<a class="btn btn-success btn-block" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/add_option">
									<span class="fa fa-plus"> Add</span>
								</a>
							</div><br /><br />
							<div class="col-sm-12 table-responsive">
						        <table class="table table-bordered">
						            <thead>
						                <tr>
						                    <th class="text-center">No</th>
						                    <th class="text-center">Name</th>
						                    <th class="text-center">Type</th>
						                    <th class="text-center">Value</th>
						                    <th class="text-center">Action</th>
						                </tr>
						            </thead>
						            <tbody id="listOption">
						                <?php
						                	$n=1;
						                    foreach(item_option::getBy(['io_item' => $item->i_id ]) as $p){
						                ?>
						                <tr>
						                    <td class="text-center "><?= $n ?></td>
						                    <td class="text-center"><?= $p->io_name ?></td>
						                    <td class="text-center">
						                    	<?php
						                    		$type = $p->io_type;
													if($type == 1){
														echo "Select";
													}elseif($type == 2){
														echo "Radio";
													}elseif($type == 3){
														echo "Checkbox";
													}else{
														echo "Not Selected";
													}
						                    	?>
						                    </td>
						                    <td class="text-center">
						                       	<?php
						                       		$opid = $p->io_id;
						                       		$iov = item_option_value::getBy(["iov_option" => $opid]);
													foreach($iov as $val){
														?>
															<?= $val->iov_value ?> (<?= Currency::GetSign() ?><?= $val->iov_price ?>)<br />
														<?php
													}
						                       	 ?>
						                    </td>
						                    <td class="text-center">
						                    	<a class="btn btn-block btn-info" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/edit_option/<?= $p->io_id ?>">
						                    		<span class="fa fa-pencil"></span>	Edit
						                    	</a>
						                       	<a class="btn btn-block btn-danger" href="<?= PORTAL ?>items/all-item/edit/<?= url::Get(3) ?>/<?= url::Get(4) ?>/delete_option/<?= $p->io_id ?>">
						                       		<span class="fa fa-trash"></span>	Delete
						                       	</a>
						                    </td>
						                </tr>
						                <?php
						                    $n++;
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
				$token = Token::create($_token, "option");
			?>
			<script>
			window.onload = function(){
				
				$row_number = <?= $no ?>;
			
				function add_row(){
					$row_number += 1;
					
				    $("#view_value").append(
				    `
				    <div class="row row-`+ $row_number + `">
				    	<div class="col-sm-6">
				            <input class="form-control io-value io-value-`+ $row_number + `" type="text" name="" value="" data-row="`+ $row_number + `" placeholder="Option Value" data-ivid="" required><br />
				        </div>
				        <div class="col-sm-3">
				            <input class="form-control io-price io-price-`+ $row_number + `" type="text" name="" value="" data-row="`+ $row_number + `" placeholder="Price" data-ivid="" required><br />
				        </div>
				        <div class="col-sm-3">
				            <button class="btn btn-block btn-danger delete-value" data-row="`+ $row_number + `">
				            	<span class="fa fa-trash"> Remove</span>
				            </button>
				        </div>
				    </div>
				    `    
				    );
				}
				
				$(".add-value").on("click",function(){
				    add_row();
				});
			
				$(document).on("click", ".delete-value", function(){
	                $(".row-" + $(this).attr("data-row")).remove();
	            });
	            
				$(document).on("click", ".add-option", function(){
					$list = generateData();
                	$text = JSON.stringify($list);
				   // console.log($list);
				    $.ajax({
				        url: "<?= PORTAL ?>api/aitem",
				        method: "POST",
				        data: {
				        	_token: "<?= $_token ?>",
                			token: "<?= $token ?>",
				        	action : "<?= F::Encrypt($_token . "addOption") ?>",
				            io_item: "<?= $item->i_id ?>",
				            data : base64_encode($text)
				        },
				        dataType: "JSON"
			        }).done(function(res){
			            console.log(res);
			            if(res.status == "success"){
							Alert ("success", res.message)
			            }else{
			                Alert ("error", res.message)
			            }
			     	});
			     });
			     
			     $(document).on("click", ".delete-value1", function(){
			     	$(".row-" + $(this).attr("data-row")).remove();
			     	
					$list = generateData();
                	$text = JSON.stringify($list);
				    
				    $.ajax({
				        url: "<?= PORTAL ?>api/aitem",
				        method: "POST",
				        data: {
				        	_token: "<?= $_token ?>",
                			token: "<?= $token ?>",
				        	action : "<?= F::Encrypt($_token . "deleteValue") ?>",
				            data_ivid: $(this).attr("data-ivid"),
				            data : base64_encode($text)
				        },
				        dataType: "json"
			        }).done(function(res){
			            //console.log(res);
			            if(res.status == "success"){
							Alert ("success", res.message)
			            }else{
			                Alert ("error", res.message)
			            }
			     	});
			     });
			     
			     $(document).on("click", ".edit-option", function(){
			     	
					$list = generateData2();
                	$text = JSON.stringify($list);
				    
				    $.ajax({
				        url: "<?= PORTAL ?>api/aitem",
				        method: "POST",
				        data: {
				        	_token: "<?= $_token ?>",
                			token: "<?= $token ?>",
				        	action : "<?= F::Encrypt($_token . "editOption") ?>",
				            data_ioid: $(this).attr("data-ioid"),
				            data : base64_encode($text)
				        },
				        dataType: "JSON"
			        }).done(function(res){
			            //console.log(res);
			            if(res.status == "success"){
							Alert ("success", res.message)
			            }else{
			                Alert ("error", res.message)
			            }
			     	});
			     });
			     
			     $(document).on("click", ".delete-option", function(){
				    
				    $.ajax({
				        url: "<?= PORTAL ?>api/aitem",
				        method: "POST",
				        data: {
				        	_token: "<?= $_token ?>",
                			token: "<?= $token ?>",
				        	action : "<?= F::Encrypt($_token . "deleteOption") ?>",
				            data_ioid: $(this).attr("data-ioid")
				        },
				        dataType: "json"
			        }).done(function(res){
			            // /console.log(res);
			            window.location = window.location;
			     	});
			     });
			     
			     function generateData(){
	                $list = {
	                    io_name: $('.io-name').val(),
			            io_type: $('.io-type').val(),
	                    values: []
	                };
	                
	                $(".io-value").each(function(){
	                    
                        $list.values.push({
                            io_value: $(".io-value-" + $(this).attr("data-row")).val(),
                            io_price: $(".io-price-" + $(this).attr("data-row")).val()
                        });
	                        
	                });
	                
	                return $list;
	            }
	            
	            function generateData2(){
	                $list = {
	                    io_name: $('.io-name').val(),
			            io_type: $('.io-type').val(),
	                    values: []
	                };
	                
	                $(".io-value").each(function(){
	                    
                        $list.values.push({
                            io_value: $(".io-value-" + $(this).attr("data-row")).val(),
                            io_price: $(".io-price-" + $(this).attr("data-row")).val(),
                            iv_id: $(this).attr("data-ivid")
                        });
	                });
	                
	                return $list;
	            }
			     
			};
			
				
			</script>
		<?php
		$no++;
	}else{
		
	}
?>