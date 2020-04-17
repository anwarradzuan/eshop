<!-- Featured Products Carousel-->
<section class="container padding-top-3x padding-bottom-3x">
<h3 class="text-center mb-30">Featured Products</h3>
	<div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
	<!-- Product-->
	<?php
		$company_c = company::getBy(["c_status" => 1]);
		foreach ($company_c as $company) {
			foreach(items::getBy(["i_status"=> 1, "i_company" => $company->c_id], ["order" => "i_time DESC", "limit" => 10]) as $y){
			$ipid = $y->i_id;
			$t = item_picture::getBy(["ip_item" => $ipid, "ip_order" => 1]);
			
			if(count($t) > 0){
			$t = $t[0];
					?>
					<div class="grid-item">
						<div class="product-card">
							<div class="product-badge text-danger"></div>
							<a class="product-thumb" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key?>/<?= $y->i_name?>">
							<img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $t->ip_file?>" alt="Product"></a>
						  <h3 class="product-title"><a href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name?>"><?= F::trimWord($y->i_name, 24) ?></a></h3>
						  <h4 class="product-price">
							<?= Currency::getSign() ?><?= number_format(Currency::getPrice($y->i_price), 2) ?>
						  </h4>
							<div class="product-buttons">
						  		<a class="btn btn-outline-primary btn-sm add-cart" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name?>">View Product</a>
							</div>
						</div>
					</div>
					<?php
				}
			}
		}
	 ?>
	</div>
</section>