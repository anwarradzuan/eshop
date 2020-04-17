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
						<li class="has-children expanded"><a href="#"><?= $c->c_name?></a><span>(<?= $tc[0]->ctotal ?>)</span>
							<ul>
							<?php
								$ic = item_category::getBy(["ic_category" => $c->c_id]);
								foreach($ic as $item){
									foreach(items::getBy(["i_id" => $item->ic_item]) as $x){
									?>
									<li>
										<a href="#"><?= $x->i_name?></a>
									</li>
									<?php
									}
								}
							?>
							</ul>
						</li>
						<?php
					}
				?>
                </ul>
            </section>
            <!-- Widget Price Range-->
            <section class="widget">
              <h3 class="widget-title">Price Range</h3>
              <select class="form-control">
                <option>0 - $100</option>
                <option>$100 - $200</option>
                <option>$200 - $500</option>
                <option>$500 - $1000</option>
                <option>$1000 - $5000</option>
              </select>
            </section>
            <!-- Widget Brand Filter-->
            <section class="widget">
              <h3 class="widget-title">Filter by Brand</h3>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="adidas2">
                <label class="custom-control-label" for="adidas2">Adidas&nbsp;<span class="text-muted">(254)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="bilabong2">
                <label class="custom-control-label" for="bilabong2">Bilabong&nbsp;<span class="text-muted">(39)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="klein2">
                <label class="custom-control-label" for="klein2">Calvin Klein&nbsp;<span class="text-muted">(128)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="nike2">
                <label class="custom-control-label" for="nike2">Nike&nbsp;<span class="text-muted">(310)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="bahama2">
                <label class="custom-control-label" for="bahama2">Tommy Bahama&nbsp;<span class="text-muted">(42)</span></label>
              </div>
            </section>
            <!-- Widget Size Filter-->
            <section class="widget">
              <h3 class="widget-title">Filter by Size</h3>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="xl2">
                <label class="custom-control-label" for="xl2">XL&nbsp;<span class="text-muted">(208)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="l2">
                <label class="custom-control-label" for="l2">L&nbsp;<span class="text-muted">(311)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="m2">
                <label class="custom-control-label" for="m2">M&nbsp;<span class="text-muted">(485)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="s2">
                <label class="custom-control-label" for="s2">S&nbsp;<span class="text-muted">(213)</span></label>
              </div>
            </section>
            <!-- Promo Banner-->
            <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
              <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
              <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>