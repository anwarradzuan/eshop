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
					<p style="font-size: 3vmin">Item Shipping</p>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
			    		<div class="row">
			    			<div class="col-sm-10">
			                    Shipping information:
			                </div>
			                <div class="col-sm-2">
			                    <button class="btn btn-block btn-info add-value">
			                    	<span class="fa fa-plus"> Add</span>
			                    </button>
			                </div>
			    		</div><br />
			    		<div id="view_value">
			    			<?php
			    				$shipping = item_option_value::getBy(["iov_shipping" => $item->i_id]);
								if(count($shipping) > 0){
									foreach ($shipping as $ship){
										?>
										<div class="row row-<?= $no ?>">
							    			<div class="col-sm-7">
							    				Name:
							                    <input class="form-control iov-name iov-name-<?= $no ?>" type="text" name="" value="<?= $ship->iov_value?>" data-row="<?= $no ?>" data-iovid="<?= $ship->iov_id ?>" placeholder="Shipping Name" ><br />
							                </div>
							                <div class="col-sm-3 text-right">
							                	Amount (<?= Currency::getCode() ?>):
							                    <input class="form-control iov-price iov-price-<?= $no ?> text-right" type="text" name="" value="<?= number_format($ship->iov_price, 2) ?>" data-row="<?= $no ?>" placeholder="Amount" ><br />
							                </div>
							                <div class="col-sm-2">
							                    <button class="btn btn-block btn-danger delete-shipping" data-row="<?= $no ?>" data-iovid="<?= $ship->iov_id ?>">
							                    	<span class="fa fa-trash"> Remove</span>
							                    </button>
							                </div>
							                <div class="col-md-10">
							                	Description:
							                	<textarea class="form-control iov-description iov-description-<?= $no ?>" type="text" name=""data-row="<?= $no ?>" placeholder="Description" ><?= $ship->iov_description?></textarea><br />
							                </div>
							    		</div>
							    		<hr />
										<?php
										$no++;
									}
								}else{
									?>
									<div class="row row-<?= $no ?>">
						    			<div class="col-sm-5">
						    				Name:
						                    <input class="form-control iov-name iov-name-<?= $no ?>" type="text" name="" value="" data-row="<?= $no ?>" data-iovid="" placeholder="Shipping Name" ><br />
						                </div>
						                <div class="col-sm-5">
						                	Amount (<?= Currency::getCode() ?>):
						                    <input class="form-control iov-price iov-price-<?= $no ?> text-right" type="text" name="" value="" data-row="<?= $no ?>" placeholder="Amount" ><br />
						                </div>
						                <div class="col-sm-2">
						                    <button class="btn btn-block btn-danger delete-shipping" data-row="<?= $no ?>" data-iovid="">
						                    	<span class="fa fa-trash"> Remove</span>
						                    </button>
						                </div>
						                <div class="col-md-10">
						                	Description:
						                	<textarea class="form-control iov-description iov-description-<?= $no ?>" type="text" name="" value="" data-row="<?= $no ?>" placeholder="Description" ></textarea><br />
						                </div>
						    		</div>
						    		<hr />
									<?php
								}
			    			?>
			    		</div>
			    		<div class="row">
				    		<div class="col-md-12">
				    			<button class="btn btn-success btn-block update-shipping">
				    				<span class="fa fa-save"></span> Save
				    			</button>
				    		</div>
			    		</div>
					</div>
				</div>
			</div>
			<?php
				$_token = F::UniqKey();
				$token = Token::create($_token, "shipping");
			?>
			<script>
			window.onload = function(){
				
				$row_number = <?= $no ?>;
			
				function add_row(){
					$row_number += 1;
					
				    $("#view_value").append(
				    `
				    <div class="row row-`+ $row_number + `">
				    	<div class="col-sm-7">
				    		Name:
				            <input class="form-control iov-name iov-name-`+ $row_number + `" type="text" name="" value="" data-row="`+ $row_number + `" data-iovid="" placeholder="Shipping Name" data-ivid=""><br />
				        </div>
				        <div class="col-sm-3 text-right">
				        	Price (<?= Currency::getCode() ?>):
				            <input class="form-control iov-price iov-price-`+ $row_number + ` text-right" type="text" name="" value="" data-row="`+ $row_number + `" placeholder="Amount" data-ivid=""><br />
				        </div>
				        <div class="col-sm-2">
				            <button class="btn btn-block btn-danger delete-shipping" data-row="`+ $row_number + `">
				            	<span class="fa fa-trash"> Remove</span>
				            </button>
				        </div>
				        <div class="col-sm-10">
				        	 Description:
				            <textarea class="form-control iov-description iov-description-`+ $row_number + `" type="text" name="" value="" data-row="`+ $row_number + `" placeholder="Description" data-ivid=""></textarea><br />
				        </div>
				    </div>
				    <hr />
				    `    
				    );
				}
				
				$(".add-value").on("click",function(){
				    add_row();
				});
			
	            
				$(document).on("click", ".update-shipping", function(){
					$list = generateData();
                	$text = JSON.stringify($list);
				    
				    /**/
				    $.ajax({
				        url: "<?= PORTAL_BUSINESS ?>api/hitem",
				        method: "POST",
				        data: {
				        	_token: "<?= $_token ?>",
                			token: "<?= $token ?>",
				        	action : "<?= F::Encrypt($_token . "updateShipping") ?>",
				            iov_item: "<?= $item->i_key ?>",
				            data : base64_encode($text)
				        },
				        dataType: "text"
			        }).done(function(res){
			        	console.log(res);
			            //window.location = window.location;
			            // if(res.status == "success"){
							// Alert ("success", res.message)
			            // }else{
			                // Alert ("error", res.message)
			            // }
			     	});
					/**/
			    });
			     
			    function generateData(){
	                $list = {
	                    values: []
	                };
	                
	                $(".iov-name").each(function(){
	                    
                        $list.values.push({
                            iov_name: $(".iov-name-" + $(this).attr("data-row")).val(),
                            iov_id: $(this).attr("data-iovid"),
                            iov_price: $(".iov-price-" + $(this).attr("data-row")).val(),
                            iov_description: $(".iov-description-" + $(this).attr("data-row")).val()
                        });
	                        
	                });
	                
	                return $list;
	            }
	            
				$(document).on("click", ".delete-shipping", function(){
				 	//$(".row-" + $(this).attr("data-row")).remove();
					console.log($(this).attr("data-iovid"));
					$.ajax({
					    url: "<?= PORTAL_BUSINESS ?>api/hitem",
						method: "POST",
						data: {
							_token: "<?= $_token ?>",
							token: "<?= $token ?>",
							action : "<?= F::Encrypt($_token . "deleteShipping") ?>",
							data_iovid: $(this).attr("data-iovid")
						},
						dataType: "json"
					}).done(function(res){
					    //console.log(res);
					    window.location = window.location;
				       	// if(res.status == "success"){
							// Alert ("success", res.message)
			            // }else{
			                // Alert ("error", res.message)
			            // }
				 	});
				});
			};
			</script>
		<?php
		$no++;
	}else{
		
	}
?>