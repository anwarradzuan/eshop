<!-- Order Summary Widget-->
<section class="widget widget-order-summary">
	<h3 class="widget-title">Order Summary</h3>
	<table class="table">
		<tr>
			<td>Cart Subtotal:</td>
			<?php
				$customer = $_SESSION['customer_id'];
				$stotal = DB::conn()->query("SELECT SUM(c_gtotal) AS gtotal, SUM(c_shipping_cost) as shipping FROM carts WHERE c_customer = ?", ["c_customer" => $customer])->results();
				if(count($stotal) > 0){
					$stotal = $stotal[0];
					?>
						<td class="text-medium"><?= Currency::getSign() ?><?= number_format(Cart::activeSubTotal(), 2) ?></td>
					<?php
				}else{
					echo "No item in your cart";
				}
			?>
			
		</tr>
		<tr>
			<td>Shipping:</td>
			<td class="text-medium"><?= Currency::getSign() ?><?= number_format(Cart::shippingSub(), 2) ?></td>
		</tr>
		<tr>
			<td></td>
			<td class="text-lg text-medium"><?= Currency::getSign() ?><?= number_format(Cart::activeTotal(), 2) ?></td>
		</tr>
	</table>
</section>