<!-- Promo #1-->
<section class="container-fluid padding-top-3x">
    <div class="row justify-content-center">
    <?php
        foreach(items::getBy(["i_order" => 2, "i_status" => 1], ["limit" =>  1]) as $y){
                $ipid = $y->i_id;
                $t = item_picture::getBy(["ip_item" => $ipid]);
                if(count($t) > 0){
                    $t = $t[0];
    ?>
        <div class="col-xl-5 col-lg-6 mb-30" >
            <div class="rounded bg-faded position-relative padding-top-3x padding-bottom-3x" style="background-image: url('<?= PORTAL ?>assets/medias/iecommerce/img/promotion_back.jpg');">
            	
                <div class="text-center" style="">
                	<span class="h6 text-danger " style="top: 2px;;">Limited Offer</span>
                    <h3 class="h2 text-normal mb-1">New</h3>
                    <h2 class="display-2 text-bold mb-2" style=""><?= $y->i_name?></h2>
                    <h4 class="h3 text-normal mb-4">collection at discounted price!</h4>
                    <div class="countdown mb-3" data-date-time="06/16/2020 12:00:00">
                        <div class="item">
                            <div class="days">00</div><span class="days_ref">Days</span>
                        </div>
                        <div class="item">
                            <div class="hours">00</div><span class="hours_ref">Hours</span>
                        </div>
                        <div class="item">
                            <div class="minutes">00</div><span class="minutes_ref">Mins</span>
                        </div>
                        <div class="item">
                            <div class="seconds">00</div><span class="seconds_ref">Secs</span>
                        </div>
                    </div><br><a class="btn btn-primary margin-bottom-none" href="<?= PORTAL ?>categories/view_item/<?= $y->i_key ?>/<?= $y->i_name ?>">View Offers</a>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-6 mb-30" style="min-height: 270px;">
            <div class="img-cover rounded" style="background-image: url('<?= PORTAL_BUSINESS ?>assets/medias/iecommerce/img/shop/products/<?= $t->ip_file?>');"></div>
        </div>
    <?php
            }
        }
    ?>
    </div>
</section>