<?php
    new Controller ($_POST);
    
    switch(url::get(1)){
        case"":
            ?>
            <div class="row">
        	    <div class="col-md-1"></div>
        	    <div class="col-md-4">
        	        <form action="" method="POST" enctype="multipart/form-data">
            	        <h1 class="text-center">Item</h1>
            	        Name: 
            			<input class="form-control" type="text" name="i_name"/></br>
            			Price: 
            			<input class="form-control" type="number" name="i_price"/></br>
            			Description: 
            			<textarea class="form-control" name="i_description" rows="5"></textarea></br>
            			Category: 
            			<select class="form-control" name="category">
            			    <?php
            			        foreach(category::list() as $c){
            			            ?>
            			                <option value="<?= $c->c_id ?>"><?= $c->c_name ?></option>
            			            <?php
            			        }
            			    ?>
            			</select></br>
            			Order: 
            			<select class="form-control" name="i_order">
            			    <option value="0">Normal</option>
            				<option value="1">Main Banner</option>
            				<option value="2">Promotion</option>
            			</select></br>
            			Image (Only one):
            			<input class="" type="file" accept="image/*" name="file" required/>
            			<?php
            				Controller::form("admin/item",
            				[
            				"type"  => "add"  
            				]);
            			?>
            			<button class="col-md-12 btn btn-success">
            				<span class="fa fa-save"></span> Add
            			</button>
        			</form><br />
        			<div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Order</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach(items::list() as $t){
                                    ?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <th scope="row"><?= $t->i_name?></th>
                                        <td><?= $t->i_price?></td>
                                        <td><?= $t->i_type?></td>
                                        <td><?= $t->i_order?></td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-primary" href="<?= PORTAL?>add_item/edit_item/<?= $t->i_id?>">Edit</a>
                                            <a class="btn btn-outline-danger">Delete</a>
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
        	    
        	    <div class="col-md-3">
        	        <form action="" method="POST" enctype="multipart/form-data">
            	        <h1 class="text-center">Banner</h1>
            			Name: 
            			<input class="form-control" type="text" name="b_name"/></br>
            			Content: 
            			<textarea class="form-control" name="b_content" rows="5"></textarea></br>
            			Position: 
            			<select class="form-control" name="b_type">
            				<option value="0">Main Banner</option>
            				<option value="1">Promotion</option>
            				<option value="2">About US</option>
            			</select></br>
            			Status: 
            			<select class="form-control" name="b_status">
            				<option value="0">Disable</option>
            				<option value="1">Enable</option>
            			</select></br>
            			Image (Only one):
            			<input class="" type="file" accept="image/*" name="file" required/>
            			<?php
            				Controller::form("admin/banner",
            				[
            				"type"  => "add"  
            				]);
            			?>
            			<button class="col-md-12 btn btn-success">
            				<span class="fa fa-save"></span> Add
            			</button>
        			</form><br />
        			<div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach(banners::list() as $t){
                                    ?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <th scope="row"><?= $t->b_name?></th>
                                        <td><?= $t->b_content?></td>
                                        <td><?= $t->b_status?></td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-danger">Delete</a>
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
        		<div class="col-md-3">
        		    <form action="" method="POST">
        		        <h1>Category</h1>
        		        Name:
        		        <input class="form-control" type="text" name="c_name"><br />
        		        Main:
        		        <select class="form-control" name="c_main">
        		            <option value="1">Yes</option>
        		            <option value="0">No</option>
        		        </select><br /><br />
        		        <?php
        		            Controller::form("admin/category", ["type"=> "add"]);
        		        ?>
        		        <button class="col-md-12 btn btn-success">
        		            <span class="fa fa-save"></span> Add
        		        </button>
        		    </form>
        		    <div class="table-responsive">
                		<table class="table">
                		    <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Main (Put in the main page)</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach(category::list() as $t){
                                    ?>
                                    <form action="" method="POST">
                                    <tr>
                                        <td><?= $i?></td>
                                        <th scope="row"><?= $t->c_name?></th>
                                        <td><?= $t->c_main?></td>
                                        <td class="text-center">
                                        	<a class="btn btn-outline-primary" href="<?= PORTAL?>add_item/edit_category/<?= $t->c_id?>">Add Sub</a>
                                            <?php
                                                Controller::form("admin/category", ["type" => "delete"])
                                            ?>
                                            <input type="hidden" name="c_id" value="<?= $t->c_id?>"/>
                                            <button class="btn btn-outline-danger">
                                		        <span class="fa fa-save"></span> Delete
                            		        </button>
                                        </td>
                                    </tr>
                                    </form>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                		</table>
            		</div>
        		</div>
        	</div><br />
            <?php
        break;
        
        case"edit_item":
            ?>
                <div class="row">
                    <div class="col-md-1"></div>
            	    <div class="col-md-4">
            	        <?php
            	            $x = url::get(2);
            	            $y = items::getBy(["i_id" => $x]);
            	            if(count($y) > 0){
            	                $y = $y[0];
            	                ?>
            	                <form action="" method="POST" enctype="multipart/form-data">
			            	        <h1 class="text-center">Item</h1>
			            	        Name: 
			            			<input class="form-control" type="text" name="i_name" value="<?= $y->i_name ?>"/></br>
			            			Price: 
			            			<input class="form-control" type="number" name="i_price" value="<?= $y->i_price ?>"/></br>
			            			Description: 
			            			<textarea class="form-control" name="i_description" rows="5"><?= $y->i_description ?></textarea></br>
			            			Category: 
			            			<select class="form-control" name="category">
			            			    <?php
			            			    	$ic = item_category::getBy(["ic_item" => $x]);
											if(count($ic) > 0){
												$ic = $ic[0];
				            			        foreach(category::list() as $c){
				            			            ?>
				            			                <option value="<?= $c->c_id ?>"<?= $c->c_id == $ic->ic_category ? "selected" : ""?> ><?= $c->c_name ?></option>
				            			            <?php
				            			        }
											}
			            			    ?>
			            			</select></br>
			            			Order: 
			            			<select class="form-control" name="i_order">
			            				<?php
			            					foreach( Setting::$mainPageOrder as $a => $b ){
			            						?>
			            							<option value="<?= $a ?>" <?= $a == $y->i_order ? "selected": ""?>><?= $b ?></option>
			            						<?php
			            					}
			            				?>
			            			</select></br>
			            			<?php
			            				Controller::form("admin/item",
			            				[
			            				"type"  => "edit"  
			            				]);
			            			?>
			            			<button class="col-md-12 btn btn-success">
			            				<span class="fa fa-save"></span> Save
			            			</button>
			        			</form><br />
            	                <?php
            	            }
            	        ?>
            	    </div>
            	    <div class="col-md-2">
            	        <?php
            	            $x = url::get(2);
            	            $y = items::getBy(["i_id" => $x]);
            	            if(count($y) > 0){
            	                $y = $y[0];
            	                ?>
            	                <form action="" method="POST" enctype="multipart/form-data">
			            	        <h1 class="text-center">Picture</h1>
			            			Image (Multiple Picture):
			            			<input type="file" accept="image/*" required id = "pic" multiple name="file[]" />
			            			<?php
			            				Controller::form("admin/item",
			            				[
			            				"type"  => "add_picture"  
			            				]);
			            			?>
			            			<button class="col-md-12 btn btn-success" name="submit">
			            				<span class="fa fa-save"></span> Add
			            			</button>
			        			</form><br />
            	        		<?php
            	            }
            	        ?>
            	    </div>
            	    <div class="col-md-4">
            	        <?php
            	            $x = url::get(2);
            	            $y = items::getBy(["i_id" => $x]);
            	            if(count($y) > 0){
            	                $y = $y[0];
            	                ?>
            	                <h1 class="text-center">Picture List</h1>
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>File</th>
                                                <th class="text-center">Order</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach(item_picture::getBy(["ip_item" => $x]) as $t){
                                                ?>
                                                <tr>
                                                    <td><?= $i?></td>
                                                    <td>
                                                        <div class="product-item">
                                                            <a class="product-thumb">
                                                                <img src="<?= PORTAL?>assets/medias/iecommerce/img/shop/products/<?= $t->ip_file?>" style="width: 50%"/>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center" style="width: 20%">
                                                    	<input type="number" 
																class="form-control image-order" 
																name="order1" 
																placeholder="Order" 
																min="0"
																data-id="<?= $t->ip_item ?>"
																data-itemid="<?= $t->ip_id ?>"
																value="<?= $t->ip_order ?>"
														/><br />
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-outline-danger delete-pic"  data-itemId="<?= $t->ip_item ?>" data-picId="<?= $t->ip_id?>">Delete</button>
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
            	            }
            	        ?>
            	    </div>
            	    <?php
						$_token = F::UniqKey();
						$token = Token::create($_token, "photo");
					?>
            	    <script>
            	    	window.onload = function(){
									
							$(document).on("change", ".image-order", function(){
								$.ajax({
									url : "<?= PORTAL ?>api/item",
									method : "POST",
									data : {
										_token : "<?php echo $_token ?>",
										token : "<?php echo $token ?>",
										action : "<?= F::Encrypt($_token . "updateOrder") ?>",
										picOrder: $(this).val(),
										itemId: $(this).attr("data-id"),
										picId: $(this).attr("data-itemid")
									},
									dataType : "json" 
								}).done(function(res){
									if(res.status == "success"){
									}else{
									}
								})
							});
							
							$(document).on("click", ".delete-pic", function(){
						        $.ajax({
						            url: "<?= PORTAL ?>api/item",
						            method: "POST",
						            data: {
						                _token: "<?= $_token ?>",
						                token: "<?= $token ?>",
						                picId: $(this).attr("data-picId"),
						                action: "<?= F::Encrypt($_token . "deletePic") ?>"
						            },
						            dataType: "json"
						        }).done(function(res){
						        	window.location = window.location;
						            
						        });
						    });
						};
        	    	</script>
                </div>
            <?php
        break;
    }
?>