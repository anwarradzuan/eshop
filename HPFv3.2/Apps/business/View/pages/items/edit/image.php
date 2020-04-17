<?php
	$id = url::get(3);
    $items = items::getBy(['i_key' => $id]);
	if(count($items) > 0){
		$item = $items[0];
	?>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<p style="font-size: 3vmin">Medias</p>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-3">
						Video URL:
						<?php
							if(!empty($item->i_vidUrl)){
								?>
								<input type="text" class="form-control" name ="i_vidUrl" placeholder="https://..." value="<?= $item->i_vidUrl ?>">
								<?php
							}else{
								?>
								<input type="text" class="form-control" name ="i_vidUrl" placeholder="https://...">
								<?php
							}
						?>
					</div>
				</div><br />
				<div class="row">
			        <div class="col-sm-3">
						<label id="grid-input-6-file" class="custom-file px-file" for="grid-input-6">
			            	<input type="file" id="grid-input-6" class="custom-file-input" accept="image/*" multiple name="file[]">
			               	<span class="custom-file-control form-control">Choose file...</span>
			                <div class="px-file-buttons">
			                 	<button type="button" class="btn btn-xs px-file-clear">Clear</button>
			                  	<label type="button" class="btn btn-primary btn-xs px-file-browse" for="grid-input-6">Browse</label>
			                </div>
			          	</label><br />
			        </div>
			        <div class="col-md-2">
			            <button style="float:left;" class="btn btn-success" name="submit">
			                <span class="fa fa-plus"></span> Add
			            </button>
			        </div>
			        <?php
			            Controller::Form(
			                "items/items-all", 
			                [
			                    "action"  => "add_image"  
			                ]
			            );
			        ?>
		        </div><br />
			</form>
			<div class="row">
			    <div class="col-sm-12 table-responsive">
			            <table class="table table-bordered">
			                <thead>
			                    <tr>
			                        <th class="text-center">No</th>
			                        <th class="text-center">Iamge</th>
			                        <th class="text-center">Order</th>
			                        <th class="text-center">Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    <?php
			                        $i = 1;
			                        foreach(item_picture::getby(['ip_item' => $item->i_id ]) as $p){
			                        
			                    ?>
			                    <tr>
			                        <td class="text-center" width="10%"><?= $i ?></td>
			                        <td class="text-center" width="10%">
			                        	<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $p->ip_file ?>" class="img img-responsive text-center" />
			                        </td>
			                        <td class="text-center" width="20%">
			                        	<input type="number" 
											class="form-control image-order" 
											name="order1" 
											placeholder="Order" 
											min="0"
											data-id="<?= $p->ip_item ?>"
											data-itemid="<?= $p->ip_id ?>"
											value="<?= $p->ip_order ?>"
										/>
										*Put number sequence start from '1' for image order or put '0' to DISABLE image 
			                        </td>
			                        <td class="text-center" width="20%">
			                           	<button class="btn btn-danger delete-pic"  data-itemId="<?= $item->i_id ?>" data-picId="<?= $p->ip_id ?>">
			                           	<span class="fa fa-trash"></span>	Delete
			                           	</button>
			                        </td>
			                    </tr>
			                    <?php
			                        $i++;
			                        }
			                    ?>
			                </tbody>
			            </table>
			            <?php
			                Controller::Form(
			                    "items/items-all", 
			                    [
			                        "action"  => "add_image"  
			                    ]
			                );
			            ?>
			    </div>
			</div>
		</div>
	</div>
	<?php
		$_token = F::UniqKey();
		$token = Token::create($_token, "photo");
	?>
	<script>
		window.onload = function(){
			
			$(document).on("change", ".image-order", function(){
				$.ajax({
					url : "<?= PORTAL ?>api/hitem",
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
					//console.log(res);
					if(res.status == "success"){
					}else{
					}
				})
			});
			
			$(document).on("click", ".delete-pic", function(){
		        $.ajax({
		            url: "<?= PORTAL_BUSINESS ?>api/hitem",
		            method: "POST",
		            data: {
		                _token: "<?= $_token ?>",
		                token: "<?= $token ?>",
		                picId: $(this).attr("data-picId"),
		                action: "<?= F::Encrypt($_token . "deletePic") ?>"
		            },
		            dataType: "json"
		        }).done(function(res){
		        	//console.log(res);
		        	 window.location = window.location;
		            
		        });
		    });
		};
	</script>
<?php
	}
?>