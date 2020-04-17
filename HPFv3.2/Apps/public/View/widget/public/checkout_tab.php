<?php
	$tab = url::get(1);
	
	$active = "active";
	$complete = "completed";
	$tick = "step-indicator icon-circle-check complete";
	
?>
<div class="checkout-steps">
	<a class="<?= $tab == 3 ? $active : "" ?>" href="<?= PORTAL_CUSTOMER ?>check_out/3">3. Payment</a>
	<a class="<?= $tab == 2 ? $active : "" ?> <?= $tab > 2 ? $complete : "" ?>" href="<?= PORTAL ?>check_out/2"><span class="angle"></span><span class="<?= $tab > 2 ? $tick : "" ?>"></span> 2. Review</a>
	<a class="<?= empty($tab) ? $active : "" ?> <?= $tab > 0 ? $complete : "" ?>" href="<?= PORTAL_CUSTOMER ?>check_out/"><span class="angle"></span><span class="<?= $tab > 0 ? $tick :  ""?>"></span> 1. Shipping</a>
</div>