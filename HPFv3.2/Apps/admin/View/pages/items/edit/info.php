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
			<p style="font-size: 3vmin">Item Information</p>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-sm-4">
					Name:
					<input class="form-control i-name" type="text" name="name" value="<?php echo $item->i_name?>" required><br />
				</div>
				<div class="col-sm-4">
					Company/Branch:
					<select  class="form-control select2 i-company" name="company">
						<?php
							foreach(company::getBy(['c_id' => $item->i_company]) as $company){
    			            ?>
    			               <option value="<?= $company->c_id ?>" <?= ($company->c_id == $item->i_company ? "selected" : "") ?> ><?= $company->c_name ?></option>
    			            <?php
    			        	}
						?>
					</select><br /><br />
				</div>
				<div class="col-sm-4 has-warning">
					Status:
					<select  class="form-control select2 i-status" name="status">
						<?php
							foreach(Setting::$boolean as $c => $k){
								?>
									<option value="<?= $c ?>" <?= ($c == $item->i_status ? "selected" : "") ?> ><?= $k ?></option>
								<?php
							}
						?>
					</select><br /><br />
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					Price (<?= Currency::getCode() ?>):
					<input class="form-control text-right i-price" type="text" name="price" value="<?php echo number_format($item->i_price, 2) ?>" required>
				</div>
				<div class="col-md-3">
					SKU (Optional):
					<input class="form-control text-right i-sku" type="text" value="<?php echo $item->i_sku ?>">
				</div>
				<div class="col-sm-3">
					Category:
					<select  class="form-control select2 i-category" name="category">
					   <?php
							$ic = item_category::getBy(["ic_item" => $item->i_id]);
							if(count($ic) > 0){
								$ic = $ic[0];
								foreach(category::list() as $c){
									?>
										<option value="<?= $c->c_id ?>"<?= $c->c_id == $ic->ic_category ? "selected" : ""?> ><?= $c->c_name ?></option>
									<?php
								}
							}
						?>
					</select><br /><br />
				</div>
				<div class="col-sm-3">
					Position (In main page):
					<select  class="form-control select2 i-order" name="i_order">
					   <?php
							foreach(Setting::$mainPageOrder as $c => $k){
								?>
									<option value="<?= $c ?>"<?= $c == $item->i_order ? "selected" : ""?> ><?= $k ?></option>
								<?php
							}
						?>
					</select><br /><br /><br />
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					Weight (kg):
					<input class="form-control i-weight text-right" type="text" name="weight" value="<?php echo $item->i_weight?>" required>
				</div>
				<div class="col-sm-3">
					Height (cm):
					<input class="form-control i-height text-right" type="text" name="height" value="<?php echo $item->i_height?>" required>
				</div>
				<div class="col-sm-3">
					Width (cm):
					<input class="form-control i-width text-right" type="text" name="width" value="<?php echo $item->i_width?>" required>
				</div>
				<div class="col-sm-3">
					Length (cm):
					<input class="form-control i-length text-right" type="text" name="length" value="<?php echo $item->i_length?>" required>
				</div>
			</div><br /><br />
			<div class="row">
				<div class="col-md-12 text-center">
					<button class="btn btn-block btn-success edit-item">
						<span class="fa fa-save"></span> Save
					</button>
				</div>
			</div>
		</div>
	</div>
	<?php
		$_token = F::UniqKey();
		$token = Token::create($_token, "item");
	?>
	<script>
		window.onload = function(){
			$(document).on("click", ".edit-item", function(){
		        $.ajax({
		            url: "<?= PORTAL ?>api/aitem",
		            method: "POST",
		            data: {
		                _token: "<?= $_token ?>",
		                token: "<?= $token ?>",
		                action: "<?= F::Encrypt($_token . "editItem") ?>",
		                itemId : "<?= $item->i_id ?>",
		                i_name : $(".i-name").val(),
		                i_status : $(".i-status").val(),
		                i_price : $(".i-price").val().replace(",",""),
		                i_weight : $(".i-weight").val(),
		                i_category : $(".i-category").val(),
		                i_description : $(".i-description").val(),
		                i_height : $(".i-height").val(),
		                i_width : $(".i-width").val(),
		                i_length : $(".i-length").val(),
		                i_company : $(".i-company").val(),
		                i_sku : $(".i-sku").val(),
		                i_order : $(".i-order").val()
		            },
		            dataType: "json"
		        }).done(function(res){
		        	//console.log(res);
		        	if(res.status == "success"){
                        //  console.log(res);
                        Alert ("success", res.message)
                    }else{
                        Alert ("error", res.message)
                    }
		        	 //window.location = window.location;
		            
		        });
		    });
		};
	</script>
	<?php
	}else{
		
	}
?>
