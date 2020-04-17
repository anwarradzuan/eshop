<div class="modal fade" id="modalShopFilters" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Shop Filters</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- Widget Categories-->
            <section class="widget widget-categories">
            	<h3 class="widget-title">Shop Categories</h3>
                <ul>
				<?php
					$cat = category::list();
					foreach($cat as $c){
						$tc = DB::conn()->query("SELECT COUNT(ic_category) AS ctotal FROM item_category WHERE ic_category = ?", ["ic_category" => $c->c_id])->results();
						?>
						<li class=""><a href="<?= PORTAL ?>categories/"><?= $c->c_name?></a><span>(<?= $tc[0]->ctotal ?>)</span>
						</li>
						<?php
					}
				?>
                </ul>
            </section>
            <!-- Promo Banner-->
            <?php
            	$promo = items::getBy(["i_order"=> 2, "i_status" => 1], ["order"=> "i_date DESC", "limit" => 1]);
				if(count($promo) > 0){
					$promo = $promo[0];
					$pic = item_picture::getBy(["ip_item" => $promo->i_id, "ip_order" => 1], ["limit" => 1]);
					if(count($pic) > 0){
						$pic_item = $pic[0]->ip_file;
					}else{
						$pic_item = "";
					}
					?>
					<section class="promo-box" style="background-image: url(<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $pic_item ?>);">
						<!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
						<div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
							<h4 class="text-light text-thin text-shadow"><?= $promo->i_name?></h4>
							<h3 class="text-bold text-light text-shadow"><?= $promo->i_price?></h3><a class="btn btn-sm btn-primary" href="<?= PORTAL ?>categories/view_item/<?= $promo->i_key ?>/<?= $promo->i_name ?>">Shop Now</a>
						</div>
					</section>
					<?php
				}else{
					?>
					<section class="promo-box" style="background-image: url(<?= PORTAL ?>assets/medias/iecommerce/img/banners/02.jpg);">
						<!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
						<div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
							<h4 class="text-light text-thin text-shadow">Promotion</h4>
							<h3 class="text-bold text-light text-shadow">Coming soon</h3>
						</div>
					</section>
					<?php
				}
            ?>
          </div>
        </div>
      </div>
    </div>