<?php
	$p_no = url::get(1);
	$orders = orders::getBy(["o_no" => $p_no]);
	
	if(count($orders) > 0){
		$orders = $orders[0];
		?>
		<!-- Off-Canvas Wrapper-->
		<div class="offcanvas-wrapper">
		  <!-- Page Content-->
			<div class="container padding-top-2x mb-2">
				<div class="row align-items-center padding-bottom-2x">
			      	<div class="col-md-12 order-md-1">
						<h6 class="text-muted text-normal text-uppercase">Invoice</h6>
		            	<hr class="margin-bottom-1x">
		            	<div class="card">
		              		<div class="card-body">
		              			<div class="row">
		              				<div class="col-md-2">
									<?php
						            	$info = infos::getBy(["i_status" => 1])[0];
						            ?>
										<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= $info->i_invoiceLogo ?>" class="img-responsive" style="width: 70%">
		              				</div>
		              				<div class="col-sm-8">
					                    	<strong style="font-size: 20px"><?= $info->i_name ?> (<?= $info->i_regno ?>)</strong>
					                    	<p>
					                    		<?= $info->i_address ?><br />
					                    		Tel: <?= $info->i_phone ?> &nbsp Fax: <?= $info->i_fax ?><br />
					                    		Email: <?= $info->i_email ?> &nbsp Website: <?= $info->i_url ?>
					                    	</p>
					                    </div>
		              				<div class="col-md-2 text-right">
		              					<a class="btn btn-success btn-sm" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
		              				</div>
		              			</div><br />
		              			<div class="row" style="background-color: #f9eed1; margin-bottom: 40px; padding-bottom: 10px; padding-top: 10px; margin-top: 10px;">
		              				<div class="col-md-9">
										<b>Customer Information</b> <br />
										Name: <br />
										Email: <br />
										Phone: <br />
										Address: 
										
		              				</div>
		              				<div class="col-md-3">
		              					 <br />
		              					Order No: <b><?= $orders->o_no ?></b><br />
		              					Date Purchase: <?= $orders->o_date ?>
		              				</div>
		              			</div>
		              			<div class="row">
		              				<div class="col-md-12">
		              					Hi <?= $_SESSION['customer_login'] ?>,<br />
		              					Thank you for shopping from our store and for your order.<br /><br />
		              				</div>
		              				<div class="col-md-12">
			              				<table class="table table-bordered">
											<thead class="table-warning">
												<tr>
													<th class="text-center">#</th>
													<th class="text-center">Item(s)</th>
													<th>Price(<?= Currency::getSign() ?>)</th>
													<th class="text-center">Quantity</th>
													<th class="text-center">Shipping Cost (<?= Currency::getSign() ?>)</th>
													<th class="text-right">Total (<?= Currency::getSign() ?>)</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$order_item = order_item::getBy(["oi_order" => $orders->o_id]);
													if(count($order_item) > 0){
														foreach ($order_item as $oi){
															?>
															<tr>
																<th class="text-center"><?= $no ?></th>
																<td class="text-center"><?= $oi->oi_item ?></td>
																<td><?= $oi->oi_price ?></td>
																<td class="text-center"><?= $oi->oi_quantity ?></td>
																<td class="text-center"><?= $oi->oi_shipping_cost ?></td>
																<td class="text-right"><?= $oi->oi_gtotal ?></td>
															</tr>
															<?php
														}
													$no++;	
													}else{
														echo "No data found";
													}
												?>
												<tr class="text-right">
													<td colspan="5">Subtotal</td>
													<td><b><?= $orders->o_gtotal ?></b></td>
												</tr>
											</tbody>
										</table>	
		              				</div>
		              			</div>
		              		</div>
		              		<div class="card-footer text-center" style="">Intelligent Ecommerce</div>
		            	</div>
			      	</div>
			    </div>
			</div>
		</div>
		<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
		<!-- Backdrop-->
		<div class="site-backdrop"></div>
		<?php
	}else{
		Page::load('404');
	}
?>