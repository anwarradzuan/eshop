<!-- Also Like Widget-->
<section class="widget widget-featured-products">
	<!-- Entry-->
	<?php
		if(isset($_SESSION["customer_id"])){
			$cust = $_SESSION["customer_id"];
			$wish = wishlist::getBy(["w_customer" => $cust]);
			
			if(!empty($wish)){
				?>
					<h3 class="widget-title">Wishlist</h3>
				<?php
				foreach($wish as $w){
					$x = $w->w_item;
					$item = items::getBy(["i_key" => $x]);
					if(count($item) > 0){
						$item = $item[0];
						$pic = item_picture::getBy(["ip_item" => $item->i_id, "ip_order" => 1]);
						?>
						<div class="entry">
							<div class="entry-thumb">
								<a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $item->i_key ?>/<?= $item->i_name ?>"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= (count($pic) > 0) ? $pic[0]->ip_file : "" ?>" alt="Product"></a>
							</div>
							<div class="entry-content">
								<h4 class="entry-title">
									<a href="<?= PORTAL_PUBLIC ?>categories/view_item/<?= $item->i_key ?>/<?= $item->i_name ?>"><?= F::Trimword($item->i_name, 24)?></a>
								</h4>
								<span class="entry-meta"><?= Currency::GetSign() ?><?= number_format($item->i_price, 2) ?></span>
							</div>
						</div>
						<?php
					}
				}
			}else{
				?>
				<h3 class="widget-title">You May Also Like</h3>
				<?php
				//$product = items::getBy(["i_status" => 1], ["order" => "i_time DESC", "limit" => 5]);
				$product = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1) LIMIT 6")->results();
				foreach($product as $p){
					$promo = item_promotion::getBy(["ip_item" => $p->i_id]);
					if(count($promo) > 0){
						
					}else{
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
								<span class="entry-meta"><?= Currency::GetSign() ?><?= number_format($p->i_price, 2) ?></span>
							</div>
						</div>
						<?php
					}
				}
			}	
		}else{
			?>
			<h3 class="widget-title">You May Also Like</h3>
			<?php
			//$product = items::getBy(["i_status" => 1], ["order" => "i_time DESC", "limit" => 5]);
			$product = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1) LIMIT 6")->results();
			foreach($product as $p){
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
						<span class="entry-meta"><?= Currency::GetSign() ?><?= number_format($p->i_price, 2) ?></span>
					</div>
				</div>
			<?php
			}
		}
	?>
	
</section>