<br /><br />
<section class="widget widget-featured-products">
	<!-- Entry-->
<h3 class="widget-title">Promotion For You</h3>
<?php
	//$product = items::getBy(["i_status" => 1], ["order" => "i_time DESC", "limit" => 5]);
	$promo = item_promotion::list(["limit" => 6]);
	foreach ($promo as $pro) {
		$item_id = $pro->ip_item;
		
		$product = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_id = '$item_id' AND i_company IN (SELECT c_id FROM company WHERE c_status = 1)")->results();
		foreach($product as $p){
			
			if($pro->ip_type == 1){
				$pro_total = ($p->i_price *  $pro->ip_value) / 100;
				$new_total = $p->i_price - $pro_total;
				
				$value = "<p class='product-badge text-danger'>" . $pro->ip_value . "% Off</p>";
				
			}else{
				$new_total = $p->i_price - $pro->ip_value;
				
				$value = "<p class='product-badge text-danger'>" . Currency::getSign() . "" . $pro->ip_value . " Off</p>";
			}
			$pic = item_picture::getBy(["ip_item" => $p->i_id, "ip_order" => 1]);
			?>
			<div class="entry">
				<div class="entry-thumb">
					<a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $p->i_key ?>/<?= $p->i_name ?>"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product"></a>
				</div>
				<div class="entry-content">
					<h4 class="entry-title">
						
						<a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $p->i_key ?>/<?= $p->i_name ?>"><?= F::Trimword($p->i_name, 24) ?></a>
					</h4>
					<!-- <span class="entry-meta"><?= Currency::GetSign() ?><?= number_format($p->i_price, 2) ?> </span>  -->
					<del><?= Currency::getSign() ?><?= number_format(Currency::getPrice($p->i_price), 2) ?></del> <?= Currency::getSign() ?><?= number_format(Currency::getPrice($new_total), 2) ?>
					<?= $value ?><br /><br />
				</div>
			</div>
		<?php
		}	
	}
?>
</section>