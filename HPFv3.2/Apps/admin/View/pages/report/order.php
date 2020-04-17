
<?php
new Controller ($_POST);
switch (url::Get(2)){
    case "":
    
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"> All Orders
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-hover table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Order Number</th>
                            <th class="text-center">Item</th>
                            <th class="text-center">Shipping Cost (<?= Currency::getSign()?>)</th>
                            <th class="text-center">Fees (%)</th>
                            <th class="text-center">Total (<?= Currency::getSign()?>)</th>
                            <th class="text-center">Company</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach(order_item::list(["order" => "oi_id DESC"]) as $m){
                        ?>
                        <tr class="">
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><?= $m->oi_key ?></td>
                            <td class="text-center">
                            	<?php
                        			$item = items::getBy(["i_id" => $m->oi_item]); 
									if(count($item) > 0){
										$item = $item[0];
										?>
											<a href="<?= PORTAL ?>items/all-item/edit/<?= $item->i_key ?>" target="_blank"><?= $item->i_name ?></a><br />
										<?php
										$od = order_detail::getBy(["od_order_item" => $m->oi_id]);
										if(count($od) > 0){
											$n = 0;
											foreach ($od as $option){
												if($n > 0){
													echo " | ";
												}
												echo $option->od_iov ;
												$n++;
											}
										}else{
											
										}
									}
                            	?>
                            </td>
                            <td class="text-center"><?= number_format(Currency::getPrice($m->oi_shipping_cost), 2) ?></td>
                            <td class="text-center"><?= $m->oi_commission ?></td>
                            <td class="text-center"><b><?= number_format(Currency::getPrice($m->oi_gtotal + $m->oi_shipping_cost + $m->oi_commission_value), 2) ?></b></td>
                            <td class="text-center">
							<?php
								$comp = company::getBy(["c_id" => $m->oi_company]);
								if(count($comp) > 0){
									$comp = $comp[0];
									echo $comp->c_name;
								}
							?>
                            </td>
                            <td class="text-center">
							<?php
								if($m->oi_cancel){
								?>
									<span class="text-danger">Cancelled & Refund</span><br />
								<?php
									$or = order_refund::getBy(["or_order_item" => $m->oi_id, "or_status" => 1]);
									
									if(count($or)){
									?>
									<span class="text-success">PAID</span>
									<?php
									}else{
									?>
									<span class="text-danger">UNPAID</span>
									<?php
									}
								}else{
									$oc = order_cancel::getBy(["oc_order_item" => $m->oi_id], ["order" => "oc_id DESC"]);
									
									if(count($oc)){
										if($oc[0]->oc_status == 0){
											$oc = $oc[0];
										}else{
											$oc = null;
										}
									}else{
										$oc = null;
									}
									
									
									if(!is_null($oc)){
										$bal = F::GetTime() - $oc->oc_time;
										$bal = ceil($bal / (24*60*60));
										
										if(($bal - 1) == 0){
											$text = "Today";
										}else{
											$text = $bal . " day(s) ago";
										}
										
										echo "Cancellation Request (". $text .")";
									}else{
										$b = $m->oi_shipping_status;
									
										foreach (Setting::$order as $key => $value) {
											if($key == $b){
												
												?>
													<b><?= $value ?></b></br>
												<?php
												if($m->oi_shipping_status == 4){
													?>
														<b>Reason:</b> <?= $m->oi_reason ?><br />
														<b>Cancel By:</b> <?= $m->oi_cancel_by ?>
													<?php
													break;
												}
											}
										}
										
										if($b == 1){ 
											$oc = order_claim::getBy(["oc_order_item" => $m->oi_id], ["order" => "oc_id DESC"]);
											
											if(count($oc)){
												$oc = $oc[0];
												
												if($oc->oc_status){
												?>
												<span class="text-success">PAID</span>
												<?php
												}else{
												?>
												<span class="text-danger">UNPAID</span>
												<?php
												}
											}else{
											?>
											<span class="text-danger">UNPAID</span>
											<?php
											}
										}
									}
								}
								
							?>
                            </td>
                            <td class="text-center"><?= $m->oi_date ?></td>
                            <td class="text-center">
                            	<a class="btn btn-primary" href="<?= PORTAL ?>reports/order-report/update/<?php echo $m->oi_key ?>" ><span class="fa fa-pencil"></span> Update</a>
                                <a class="btn btn-warning" href="<?= PORTAL ?>reports/order-report/view/<?php echo $m->oi_key ?>" ><span class="fa fa-eye"></span> View</a>
                            </td>
                        </tr>
                        <?php
                             $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<?php
    break;
	
	case "update":
		?>
		<div class="panel panel-default col-md-12">
            <div class="panel-heading">
                <span class="fa fa-edit"> Update Order
                <a class="btn btn-primary" href="<?php echo PORTAL ?>reports/order-report" >Back</a>
            </div>
            <div class="panel-body">
            	<?php 
                $id = url::get(3);
                $o = order_item::getBy(['oi_key' => $id]);
                
                if(count($o) > 0){
                    $o = $o[0];
					?>
					<div class="row">
						<div class="col-md-5">
						<?php
							if($o->oi_cancel){
								new Alert("info", "This order has been cancelled. Please update customer's refund status below.");
						?>
							<div class="panel panel-danger">
								<div class="panel-heading">
									Refund
								</div>
								
								<div class="panel-body">
									<?php
										$amount_tot = $o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value;
										$paypal_fix = 2;
										$oi_idxx = $o->oi_id;
										$ref_bal = DB::conn()->q("SELECT SUM(or_amount) as total_bal FROM order_refund WHERE or_order_item = '$oi_idxx'")->results();
										if(count($ref_bal) > 0){
											$ref_bal = $ref_bal[0];
											
											if($ref_bal->total_bal < ($amount_tot - $paypal_fix)){
												?>
												<form action="" method="POST">
													<div class="row">
														<?php
															$cust_acc = customers::getBy(["c_id" => $o->oi_customer]);
															if(count($cust_acc) > 0){
																$cust_acc = $cust_acc[0];
																
																if($cust_acc->c_acc > 0){
																	?>
																	<div class="col-md-4">
																		<u>Order Information</u><br />
																		<!-- Bank Name : <b><?= $cust_acc->c_bank ?></b><br />
																		Acc. No : <b><?= $cust_acc->c_acc ?></b><br /> -->
																		Total Amount : <b><?= Currency::getSign() ?> <?= number_format($amount_tot, 2) ?></b><br />
																		PayPal Fix Charge : <b><?= Currency::getSign() ?> <?= number_format($paypal_fix, 2) ?></b><br />
																		Refundable amount: <b><?= Currency::getSign() ?> <?= number_format($amount_tot - $paypal_fix,2 ) ?></b><br /><br />
																	</div>
																	<div class="col-md-8">
																		<?php new Alert("info", "All cancellation or refund must made using PayPal system. PayPal will automatically deduct the account ang calculate all charges"); ?>
																	</div>
																	<?php	
																}else{
																	new Alert("warning","Customer bank iformation not found. Please contact the customer regarding refund issue");
																}
															}else{
																new Alert("error", "Customer information not found.");
															}
														?>
														<div class="col-sm-12">
															Refund status:
															<select  class="form-control select2" name="status">
																<option value="1">Paid</option>
																<option value="0">Unpaid</option>
															</select>
														</div>
													</div><br />
													<div class="row">
														<div class="col-sm-12">
															Amount (<?= Currency::getSign() ?>): <input class="form-control" type="text" name="amount" value="0">
														</div><br />
													</div><br />
													<div class="row">
														<div class="col-sm-12">
															Document details:
															<textarea name="refund_data" class="form-control" placheolder="Refund information"></textarea>
														</div>
													</div><br />
													<div class="text-center">
														<?php
															Controller::Form(
																"order", 
																[
																	"action"  		=> "refund",
																	"order_item"	=> $o->oi_id
																]
															);
														?>
														<!-- <input type="hidden" name="bank" value="<?= $cust_acc->c_bank ?>"> -->
														<input type="hidden" name="paypal_fix" value="<?= $paypal_fix ?>" >
														<button class="btn btn-success btn-block">
															<span class="fa fa-save"></span> Save
														</button>
													</div>
												</form>
												<?php
												
											}else{
												new Alert("info","Refund is completly paid");
											}
										}
									?>
									
									<h4>Refund Logs</h4>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Date</th>
													<th>Details</th>
													<th>Status</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php
												foreach(order_refund::getBy(["or_order_item" => $o->oi_id]) as $orr){
												?>
												<tr>
													<td><?= $orr->or_date ?></td>
													<td><?= $orr->or_details ?></td>
													<td><?= $orr->or_status ? "<b>PAID</b>" : "UNPAID" ?></td>
													<td><?= Currency::getSign() ?> <?= number_format($orr->or_amount, 2) ?></td>
												</tr>
												<?php
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						<?php
							}else{
								$oc = order_cancel::getBy(["oc_order_item" => $o->oi_id], ["order" => "oc_id DESC"]);
								
								if(count($oc) > 0){
									$oc = $oc[0];
									
									if($oc->oc_status == 0){
										new Alert("info", "Customer has request a cancellation request. Please contact vendor if they are not response to this cancellation request within 3 days. Cancellation button will only appear after 3 days request without vendor response.");
									}else{
										$oc = null;
									}
								}else{
									$oc = null;
								}
								
								
								if(!is_null($oc)){
							?>
									<h4 class="mt-0">Cancellation Request</h4>
												
									<p>
										Your customer has issues a cancellation request to our system with below message:
									</p>
									
									<pre><?= $oc->oc_message ?></pre>
									
									<?php
									$bal = F::GetTime() - $oc->oc_time;
									$bal = ceil($bal / (24*60*60));
									?>
									<p>
									<?php
										if((($bal - 1) == 0) && $bal < 3){
											echo "You are not allowed to cancel this order before 3 days with no response from vendor.";
										}else{
										?>
										<form action="" method="POST">
											Note:
											<textarea class="form-control" name="message" placeholder="Automated cancelled by admin due to no response from vendor. Refund has been submitted for review."></textarea><br />
											
											<div class="text-center">
												<button class="btn btn-danger btn-sm">
													Yes, Cancel & Refund this order
												</button>
											</div>
											
											<input type="hidden" name="refund" value="yes" />
											<?= Controller::form("order", ["action" => "cancellation"]); ?>
										</form>
										<?php
										}
									?>
									</p>
								<?php
								}else{
									if($o->oi_shipping_status == 1){
										$amount = number_format($o->oi_gtotal + $o->oi_shipping_cost, 2);
								?>
									<div class="panel panel-info">
										<div class="panel-heading">
											Claim
										</div>
										<div class="panel-body">
											<?php
												$order_id_oc = $o->oi_id;
												$oc_check = DB::conn()->q("SELECT SUM(oc_amount) as tot FROM order_claim WHERE oc_order_item = '$order_id_oc'")->results();
												if(count($oc_check) > 0){
													$oc_check = $oc_check[0];
													$total_oc = number_format($oc_check->tot, 2);
													//echo $oc_check->tot;
													
													if(number_format($oc_check->tot, 2) < $amount){
														?>
														<form action="" method="POST">
															<div class="row">
																<div class="col-sm-12">
																	Claim status:
																	<select  class="form-control select2" name="status">
																		<option value="1">Paid</option>
																		<option value="0">Unpaid</option>
																	</select>
																</div>
															</div><br />
															<?php
																if($amount > number_format($oc_check->tot, 2)){
																	$balance = $amount - number_format($oc_check->tot, 2);
																	$text = "Balance";
																}else{
																	$balance = $amount;
																	$text = "Amount";
																}
															?>
															<div class="row">
																<div class="col-sm-12">
																	<?= $text ?> (<?= Currency::getSign() ?>): <input class="form-control" type="text" name="amount" value="<?= $balance ?>">
																</div><br />
															</div><br />
															<div class="row">
																<div class="col-sm-12">
																	Document details:
																	<textarea name="detail" class="form-control" placheolder="Transaction details"></textarea>
																</div>
															</div><br />
															<div class="text-center">
																<?php
																	Controller::Form(
																		"order", 
																		[
																			"action"  		=> "claim",
																			"order_item"	=> $o->oi_id
																		]
																	);
																?>
																<button class="btn btn-success btn-block">
																	<span class="fa fa-save"></span> Save
																</button>
															</div>
														</form>
														<?php
													}else{
														new Alert("success", "Claim Successfully Paid");
													}
													
												}else{
													echo "not found";
												}
											?>
											<h4>Claim Logs</h4>
											<div class="table-responsive">
												<table class="table table-hover table-bordered">
													<thead>
														<tr>
															<th>Date</th>
															<th>Details</th>
															<th class="text-center">Status</th>
															<th>Amount (<?= Currency::getSign() ?>)</th>
														</tr>
													</thead>
													<tbody>
													<?php
														foreach(order_claim::getBy(["oc_order_item" => $o->oi_id]) as $ord){
														?>
														<tr>
															<td><?= date("j F Y (h:i:s\) ", $ord->oc_time) ?></td>
															<td><?= $ord->oc_detail ?></td>
															<td class="text-center"><?= $ord->oc_status ? "PAID" : "UNPAID" ?></td>
															<td class="text-right"><?= number_format($ord->oc_amount,2) ?></td>
														</tr>
														<?php
														}
														
														?>
														<tr class="text-right bg-info">
															<td colspan="3"><b>Total</b></td>
															<td><b><?= $total_oc ?></b></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								<?php
									}else{
								?>
									<div class="panel panel-info">
										<form action="" method="POST">
											<div class="panel-heading">
												Order Information
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-sm-12">
														Order ID: <b><?= $o->oi_key ?></b> 
													</div><br /><br />
												</div>
												<div class="row">
													<div class="col-sm-12">
														Total: <b><?= Currency::getSign() ?><?= number_format($o->oi_gtotal, 2) ?></b> 
													</div><br /><br />
												</div>
												<div class="row">
													<div class="col-sm-12">
														Shipping type: <b><?= $o->oi_shipping_name ?></b> 
													</div><br /><br />
												</div>
												<div class="row">
													<div class="col-sm-12">
														Tracking Number: <input class="form-control" type="text" name="o_tracking" value="<?= $o->oi_tracking ?>">
													</div><br />
												</div><br />
												<div class="row">
													<div class="col-sm-12">
														Status:
														<select  class="form-control select2" name="o_status">
															<option value="0" <?= $o->oi_shipping_status == 0 ? "selected" : "" ?> >To Ship</option>
															<option value="2" <?= $o->oi_shipping_status == 2 ? "selected" : "" ?> >Product Dispatched</option>
															<option value="1" <?= $o->oi_shipping_status == 1 ? "selected" : "" ?> >Complete</option>
														</select><br />
													</div>
												</div><br />
												
												<div class="text-center">
													<?php
														Controller::Form(
															"order", 
															[
																"action"  => "update"  
															]
														);
													?>
													<button class="btn btn-success btn-block">
														<span class="fa fa-save"></span> Save
													</button>
												</div>
											</div>
										</form>
									</div>
								<?php
									}
								}
						
							}
						?>
						</div>
						
	                    <div class="col-md-7">
	                        <div class="panel panel-warning">
								<div class="panel-heading">
									<span class="fa fa-cube"></span> Information
								</div>
								
								<div class="panel-body">
									<h4 class="mt-0">Product Information</h4>
									<div class="table-responsive">
										<table class="table table-hover table-bordered">
											<tbody>
												<tr>
													<td width="30%">Name</td>
													<td>
														<b><?= $o->oi_item_name ?></b>
													</td>
												</tr>
												<tr>
													<td>Price</td>
													<td><?= Currency::getSign() ?><?= number_format($o->oi_price, 2) ?></td>
												</tr>
												<tr>
													<td>Quantity</td>
													<td><?= $o->oi_quantity ?></td>
												</tr>
												
											<?php
												foreach(order_detail::getBy(["od_order_item" => $o->oi_id]) as $rd){
											?>
												<tr>
													<td><?= $rd->od_io_name ?></td>
													<td><?= $rd->od_iov ?> (+<?= Currency::getSign() ?><?= $rd->od_price ?>)</td>
												</tr>
											<?php
												}
											?>
												<tr>
													<td>Shipping Cost</td>
													<td><?= Currency::getSign() ?><?= number_format($o->oi_shipping_cost, 2) ?></td>
												</tr>
												<tr>
													<td>Fee</td>
													<td><?= $o->oi_commission ?>%</td>
												</tr>
												<tr>
													<td><b>Total</b></td>
													<td><b><?= Currency::getSign() ?><?= number_format($o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value, 2) ?></b></td>
												</tr>
												<tr>
													<td><b>Claimable Amount</b> <i>(for vendor)</i></td>
													<td><b><?= Currency::getSign() ?><?= number_format($o->oi_gtotal + $o->oi_shipping_cost, 2) ?></b></td>
												</tr>
											</tbody>
										</table>
									</div>
									
									<h4 class="mt-0">Shipping Information</h4>
									<div class="table-responsive">
										<table class="table table-hover table-bordered">
											<tbody>
												<tr>
													<td>Service Name</td>
													<td><?= $o->oi_shipping_name ?></td>
												</tr>	
												<tr>
													<td>Estimation Cost</td>
													<td><?= Currency::getSign() ?><?= number_format($o->oi_shipping_cost) ?></td>
												</tr>
												<tr>
													<td>Estimation Delivery</td>
													<td><?= $o->oi_shipping_duration ?></td>
												</tr>
												<tr>
													<td>Address</td>
													<td>
														<?php
															$oship = order_shipping::getBy(["os_id" => $o->oi_shipping]);
															if(count($oship) > 0){
																$oship = $oship[0];
																echo $oship->os_address;
															}
														?>
														
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									
									<h4 class="mt-0">Customer Information</h4>
									<div class="table-responsive">
										<table class="table table-hover table-bordered">
											<tbody>
												<?php
													$customer = customers::getBy(["c_id" => $o->oi_customer]);
													if(count($customer) > 0){
														$customer = $customer[0];
														?>
														<tr>
															<td>Customer Name</td>
															<td><?= $customer->c_name ?></td>
														</tr>	
														<tr>
															<td>Email</td>
															<td><?= $customer->c_email ?></td>
														</tr>
														<tr>
															<td>Phone</td>
															<td><?= $customer->c_phone ?></td>
														</tr>
														<tr>
															<td>Address</td>
															<td>
																<?php
																	$c_address = customer_address::getBy(["ca_customer" => $customer->c_id, "ca_status" => 1]);
																	if(count($c_address) > 0){
																		$c_address = $c_address[0];
																		echo $c_address->ca_address;
																	}
																?>
															</td>
														</tr>
														<tr>
															<td>Bank</td>
															<td><?= $customer->c_bank ?></td>
														</tr>
														<tr>
															<td>Acc. Number</td>
															<td><?= $customer->c_acc ?></td>
														</tr>
														<?php
													}else{
														echo "Customer Informartion not found";
													}
												?>
												
											</tbody>
										</table>
									</div>
									<h4 class="mt-0">Company Information</h4>
									<div class="table-responsive">
										<table class="table table-hover table-bordered">
											<tbody>
												<?php
													$comp = company::getBy(["c_id" => $o->oi_company]);
													if(count($comp) > 0){
														$comp = $comp[0];
														?>
														<tr>
															<td>Company Name</td>
															<td><?= $comp->c_name ?></td>
														</tr>	
														<tr>
															<td>Email</td>
															<td><?= $comp->c_email ?></td>
														</tr>
														<tr>
															<td>Phone</td>
															<td><?= $comp->c_phone ?></td>
														</tr>
														<!-- <tr>
															<td>Commission Rate (%)</td>
															<td><?= $comp->c_commission ?></td>
														</tr> -->
														<tr>
															<td>Address</td>
															<td><?= $comp->c_address ?></td>
														</tr>
														<?php
													}else{
														echo "Customer Informartion not found";
													}
												?>
												
											</tbody>
									</table>
									</div>
								</div>
							</div>
	                    </div>
	                </div>
					<?php
				}else{
					new Alert("error","Data not found");
				}
            ?>
            </div>
        </div>
		<?php
	break; 
?>
        
<?php
    case "view":
?>
		<style>
			@media print{@page {size: landscape}}
		</style>
        <div class="panel panel-default col-md-12">
            <div class="panel-heading">
            	<div class="col-md-12">
            		<div class="col-md-6">
            			<span class="fa fa-edit"> Edit Item
                		<a class="btn btn-primary" href="<?php echo PORTAL ?>reports/order-report" >Back</a>
            		</div>
            		<div class="col-md-6 text-right">
            			 <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span> Print</button>
            		</div>
            	</div>
            </div>
            <div class="panel-body" id="printableArea">
            <?php 
                $id = url::get(3);
                $o = order_item::getBy(['oi_key' => $id]);
                
                if(count($o) > 0){
                    $o = $o[0];
            ?>
                
                <div class="row">
                        <?php 
                        	$info = infos::getBy(["i_status" => 1]);
							
							if(count($info) > 0){
								$info = $info[0]
								?>
								<div class="col-sm-1">
									<img src="<?= PORTAL_ADMIN ?>assets/medias/iecommerce/img/logo/<?= $info->i_invoiceLogo ?>" class="img-responsive">
								</div>
								<div class="col-sm-8">
			                    	<strong style="font-size: 20px"><?= $info->i_name ?> (<?= $info->i_regno ?>)</strong>
			                    	<p>
			                    		<?= $info->i_address ?><br />
			                    		Tel: <?= $info->i_phone ?> &nbsp Fax: <?= $info->i_fax ?><br />
			                    		Email: <?= $info->i_email ?> &nbsp Website: <?= $info->i_url ?>
			                    	</p>
			                    </div>
			                    <div class="col-sm-2">
			                    </div>
								<?php
							}
                        ?>
                </div>
                <hr  style="border: 1px solid black;"/>
                <div class="row">
                	<div class="col-md-12 text-center">
                		<strong style="font-size: 23px">Order Information</strong>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-10">
                	<?php
                		$shipping = order_shipping::getBy(["os_id" => $o->oi_shipping]);
                		if(count($shipping) > 0){
                			$shipping = $shipping[0];
                			?>
		                		<strong>Address to:</strong>
		                		<p>
		                			Name: <?= $shipping->os_name ?><br />
		                			Phone: <?= $shipping->os_phone ?><br />
		                			Address: <?= $shipping->os_address ?>, <?= $shipping->os_postal ?>, <?= $shipping->os_city ?>, <?= $shipping->os_state ?><br />
		                		</p>
                			<?php
                		}
                	?>
                	</div>
                	<div class="col-md-2">
                		Order No: <b><?= $o->oi_key?></b><br />
                		Date: <?= $o->oi_date ?><br />
                		<strong>
                			Status: <?php
	                					foreach (Setting::$order as $key => $value) {
											if($key == $o->oi_shipping_status){
												echo $value . " ";
											}
										}
										if($o->oi_shipping_status == 4){
											echo "by ". $o->oi_cancel_by;
										}else{
											
										}
                					?>
                		</strong>
                		<?php
            				if($o->oi_shipping_status == 4){
            					?>
            						Reason: <textarea class="form-control" readonly><?= $o->oi_reason ?></textarea>
            					<?php
            				}else{
            					
            				}
            			?>
            		</div>
                </div><br />
                <div class="row">
                	<div class="col-md-1"></div>
                	<div class="col-md-10">
                	<table class="table table-bordered text-center">
                		<thead style="background: silver">
                			<tr>
                				<th class="text-center">Item</th>
                				<th class="text-center">Price (<?= Currency::getSign() ?>) </th>
                				<th class="text-center">Quantity</th>
                				<th class="text-center">Shipping Cost</th>
                				<th class="text-center">Sub Total</th>
                				<th class="text-center">Service Fee (%)</th>
                				<th class="text-center">Tax (%)</th>
                				<th class="text-center">Total (<?= Currency::getSign() ?>)</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                			<tr class="active">
                				<td>
                					<?php
                						$item = items::getBy(["i_id" => $o->oi_item]); 
										if(count($item) > 0){
											$item = $item[0];
											?>
												<a href="<?= PORTAL ?>items/all-item/edit/<?= $item->i_key ?>" target="_blank"><?= $item->i_name ?></a><br />
											<?php
											$od = order_detail::getBy(["od_order_item" => $o->oi_id]);
											if(count($od) > 0){
												$n = 0;
												foreach ($od as $option){
													if($n > 0){
														echo " | ";
													}
													echo "<b>" . $option->od_iov . "</b>";
													$n++;
												}
											}else{
												
											}
										}
                					?>                				
                				</td>
                				<td>
                					<?= number_format(Currency::getPrice($o->oi_price), 2) ?>
                				</td>
                				<td>
                					<?= $o->oi_quantity ?>
                				</td>
                				<td>
                					<?php
                						if(!empty($o->oi_shipping_name)){
                							echo $o->oi_shipping_name."<br />";
											echo Currency::getSign() . number_format($o->oi_shipping_cost, 2);
                						}else{
                						}
                					?>
                				</td>
                				<td>
                					<b><?= number_format(Currency::getPrice($o->oi_gtotal), 2) ?></b>
                				</td>
                				<td>
                					<b><?= $o->oi_commission ?></b>
                				</td>
                				<td>
                					<?= $o->oi_tax ?>
                				</td>
                				<td>
                					<b><?= number_format(Currency::getPrice($o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value), 2) ?></b>
                				</td>
                			</tr>
                		</tbody>
                	</table>
                	</div>
                </div>
                <script>
                	function printDiv(divName) {
					     var printContents = document.getElementById(divName).innerHTML;
					     var originalContents = document.body.innerHTML;
					
					     document.body.innerHTML = printContents;
					
					     window.print();
					
					     document.body.innerHTML = originalContents;
					}
                </script>
            <?php
                }else{
                    new Alert("error","Data not found");
                }
            ?>
            </div>
        </div>
<?php
    break; 
}
?>