
<!-- Main Slider-->
<?php 
	$ban = banners::getBy(["b_position" => 0, "b_status" => 1], ["limit" => 1]);
		
	if(count($ban) > 0){
		$ban = $ban[0];
		?>
		<section class="hero-slider" style="background-image: url(<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/banners/<?= $ban->b_file ?>);">
		<?php
	}else{
		?>
		<section class="hero-slider" style="background-image: url(<?= PORTAL_PUBLIC ?>assets/medias/iecommerce/img/hero-slider/main-bg.jpg);">
		<?php
	}
?>
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
            <?php
            	//$product = items::getBy(["i_order" => 1, "i_status" => 1], ["order" => "i_time DESC"]);
				$product = DB::conn()->q("SELECT * FROM items WHERE i_status = 1 AND i_order = 1 AND i_company IN (SELECT c_id FROM company WHERE c_status = 1) ORDER BY i_time DESC")->results();
                foreach($product as $y){
                        $ipid = $y->i_id;
                        $t = item_picture::getBy(["ip_item" => $ipid, "ip_order" => 1]);
                        if(count($t) > 0){
                            $t = $t[0];
							$cl = clients::getBy(["cl_id"=>$y->i_client]);
							if(count($cl) > 0){
								$cl =$cl[0];
								$comp = company::getBy(["c_id" =>$cl->cl_company]);
								if(count($comp) > 0){
									$comp = $comp[0];
									?>
						            <div class="item">
						                <div class="container padding-top-2x">
						                    <div class="row justify-content-center align-items-center">
						                        <div class="col-lg-5 col-md-6 padding-top-2x text-md-left text-center">
						                            <div class="from-bottom text-center">
						                            	<img class="d-inline-block w-150 mb-4" style="margin-bottom:0 !important;" src="<?= PORTAL_BUSINESS ?>assets/medias/company/<?= $comp->c_logo ?>">
						                                <div class="h2 text-body text-normal mb-2 pt-1" style="color: white !important"><?= F::TrimWord($y->i_name, 25)?></div>
						                                <div class="h2 text-body text-normal mb-4 pb-1" style="color: yellow !important">Price <span class="text-bold"><?= Currency::getSign()?><?= number_format(Currency::getPrice($y->i_price), 2) ?></span></div>
						                            </div>
						                            <div class="text-center">
						                            	<a class="btn btn-primary scale-up delay-1" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">View Offers</a>
					                            	</div>
						                        </div>
						                        <div class="col-md-6 padding-bottom-2x mb-3">
						                        	<img class="d-block mx-auto" src="<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $t->ip_file?>" alt="Intelligent eCommerce">
						                        </div>
						                    </div>
						                </div>
						            </div>
						            <?php
								}
							}
            
                    }
                }
            ?>
        </div>
    </section>