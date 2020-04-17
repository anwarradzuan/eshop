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
		<p style="font-size: 3vmin">Item Description</p>
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
        <div class="panel-body">
            <div class="row">
            	<?php
            		$detail = item_detail::getBy(["id_item" => $item->i_id]);
					if(count($detail) > 0){
						$detail = $detail[0];
            	?>
                        <div class="col-sm-12">
                        	Content:
                            <textarea class="form-control details" name="content" id="datails" rows="20"><?= $detail->id_detail ?></textarea>
                            <br />
                        </div>
                <?php
                	}else{
                		?>
                		<div class="col-sm-12">
                        	Content:
                            <textarea class="form-control details" name="content" id="datails" rows="20"></textarea>
                            <br />
                        </div>
                		<?php
                	}
                ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                	<button class="col-md-12 btn btn-success item-detail">
                		<input type="hidden" class="form-control item-id" value="<?= $item->i_id ?>"/>
                        <span class="fa fa-save"></span> Save
                    </button>
            	</div>
    		</div>
        </div>
    </div>
</div>
<?php
	$_token = F::UniqKey();
	$token = Token::create($_token, "details");
?>
<script>
var x;
window.onload = function(){
	
	x = CKEDITOR.replace("content");
	CKEDITOR.config.height = 300;
	
	$(document).on("click", ".item-detail", function(){
		$.ajax({
			url : "<?= PORTAL ?>api/hitem",
			method : "POST",
			data : {
				_token : "<?php echo $_token ?>",
				token : "<?php echo $token ?>",
				action : "<?= F::Encrypt($_token . "updateDetail") ?>",
				itemId: $('.item-id').val(),
				details: x.getData()
			},
			dataType : "json" 
		}).done(function(res){
			//console.log(res);
			if(res.status == "success"){
	            	
				Alert ("success", res.message)
            }else{
                Alert ("error", res.message)
            }
		})
	});
};
</script>
<?php
	}
?>