<!-- Top Categories-->
<section class="container padding-top-3x">
    <h3 class="text-center mb-30">Top Categories</h3>
    <div class="row">
		<?php
			foreach(category::getBy(["c_main"=> 1], ["limit" => 3]) as $y){
				$cid = $y->c_id;
				
				$ic = item_category::getBy(["ic_category" => $cid], ["limit" => 1]);
				if(count($ic) > 0){
					$ic =$ic[0];
					$item = $ic->ic_item;
					$x = item_picture::getBy(["ip_item" => $item]);
					if(count ($x) > 0){
						$x = $x[0];
					?>
						<div class="col-md-4 col-sm-6">
							<div class="card mb-30"><a class="card-img-tiles" href="<?= PORTAL ?>categories">
								<div class="inner">
									<div class="main-img"><img src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $x->ip_file?>" alt="Category"></div>
								</div></a>
								<div class="card-body text-center">
									<h4 class="card-title"><?= $y->c_name ?></h4>
									<p class="text-muted"></p><a class="btn btn-outline-primary btn-sm" href="<?= PORTAL ?>categories/<?= $y->c_name ?>">View Products</a>
								</div>
							</div>
						</div>
					<?php	
					}
				}
			}
		?>
    </div>
    <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="<?= PORTAL ?>categories">All Categories</a></div>
</section>