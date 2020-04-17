
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
                            <th class="text-center">Service fee (%)</th>
                            <th class="text-center">Total (<?= Currency::getSign()?>)</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Customer</th>
                            <th class="text-center">Purchase Date</th>
                            <th class="text-center">Last Update</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
						$company = $_SESSION['cl_company'];
                        foreach(order_item::getBy(["oi_company" => $company], ["order" => "oi_id DESC"]) as $m){
                        ?>
                        <tr class="text-center">
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><b><?= $m->oi_key ?></b></td>
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
								if($m->oi_cancel){
									echo "<span class='text-danger'>Cancelled & Refund</span>";
								}else{
									$b = $m->oi_shipping_status;
									foreach (Setting::$order as $key => $value) {
										if($key == $b){
											echo $value;
											break;
										}
									}
									
									$oc = order_cancel::getBy(["oc_order_item" => $m->oi_id], ["order" => "oc_id DESC"]);
									
									if(count($oc)){
										$oc = $oc[0];
										
										if($oc->oc_status == 0){
											echo "<br /><i class='text-warning'>Cancellation Request</i> ";
										}
									}
									
									if($b == 1){ 
										$oc = order_claim::getBy(["oc_order_item" => $m->oi_id], ["order" => "oc_id DESC"]);
										
										if(count($oc)){
											$oc = $oc[0];
											
											if($oc->oc_status == 1){
											?>
											<br /><span class="text-success">PAID</span>
											<?php
											}else{
											?>
											<br /><span class="text-danger">UNPAID</span>
											<?php
											}
										}else{
										?>
										<br /><span class="text-danger">UNPAID</span>
										<?php
										}
									}
								}
							?>
                            </td>
                            <td class="text-center">
                            	<?php 
                            		 
                            		$customer = customers::GetBy(["c_id" => $m->oi_customer]);
									
									if(count($customer) > 0){
										$customer = $customer[0];
										echo $customer->c_name;
									}
                            	?>
                            </td>
                            <td class="text-center"><?= date("j F Y (h:i:s\) ", $m->oi_time)  ?></td>
                            <td class="text-center">
                            	<?php
                            		if($m->oi_update_date == 0){
                            			echo "No update yet";
                            		}else{
                            			echo date("j F Y (h:i:s\) ", $m->oi_update_date);
                            		}
                            		
                            	?>
                            </td>
                            <td class="text-center">
                            	<?php
                            		if($b == 1){
										?>
										<a class="btn btn-primary" href="<?= PORTAL ?>orders/all-orders/update/<?php echo $m->oi_key ?>" ><span class="fa fa-eye"></span> Details</a>
										<?php
									}else{
										?>
											<a class="btn btn-info" href="<?= PORTAL ?>orders/all-orders/update/<?php echo $m->oi_key ?>" ><span class="fa fa-pencil"></span> Update</a>
										<?php
									}
                            	?>
                            	<br /><br />
								<a class="btn btn-warning" href="<?= PORTAL ?>orders/all-orders/view/<?php echo $m->oi_key ?>" ><span class="fa fa-files-o "></span> Invoice</a>
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
                <a class="btn btn-primary" href="<?php echo PORTAL ?>orders/all-orders" >Back</a>
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
	                        <div class="panel panel-info">
								<div class="panel-heading">
									Order Information
								</div>
								<div class="panel-body">
								<?php
									if($o->oi_cancel){
										new Alert("info", "This order has been canceled.");
									?>
										<h4>Cancellation Logs</h4>
										<div class="table-responsive">
											<table class="table table-hover table-responsive">
												<thead>
													<tr>
														<th>Date</th>
														<th>Reason</th>
														<th>Status</th>
													</tr>
												</thead>
												
												<tbody>
												<?php
													foreach(order_cancel::getBy(["oc_order_item" => $o->oi_id]) as $roc){
													?>
													<tr>
														<td><?= $roc->oc_date ?></td>
														<td>
															<?= $roc->oc_message ?>
														</td>
														<td>
															<?= $roc->oc_customer ? "Customer" : "Vendor" ?>
														</td>
													</tr>
													<?php
													}
												?>
												</tbody>
											</table>
										</div>
										
										<h4>Refund Logs</h4>
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Date</th>
														<th>Message</th>
														<th>Status</th>
													</tr>
												</thead>
												
												<tbody>
												<?php
													foreach(order_refund::getBy(["or_order_item" => $o->oi_id]) as $or){
													?>
													<tr>
														<td><?= $or->or_date ?></td>
														<td><?= $or->or_details ?></td>
														<td><?= $or->or_status == 1 ? "PAID" : "UNPAID" ?></td>
													</tr>
													<?php
													} 
												?>
												</tbody>
											</table>
										</div>
									<?php
									}else{
										
										$oc = order_cancel::getBy(["oc_order_item" => $o->oi_id], ["order" => "oc_id DESC"]);
										
										if(count($oc)){
											$oc = $oc[0];
											
											if($oc->oc_status == 2){
												$oc = null;
											}
										}else{
											$oc = null;
										}
										
										if(is_null($oc)){
											if($o->oi_shipping_status == 1){
												new Alert("info", "This order has been marked as completed. Your payment will be release soon. Progress logs are as below:");
											?>
												<h4>Transaction Logs</h4>
												<table class="table table-hover table-responsive">
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
															<td><?=  date("j F Y (h:i:s\) ", $ord->oc_time) ?></td>
															<td><?= $ord->oc_detail ?></td>
															<td><?= number_format($ord->oc_amount, 2) ?></td>
															<td>
																<?= $ord->oc_status ? "<b>PAID</b>" : "UNPAID" ?>
															</td>
														</tr>
														<?php
														}
														$order_id_oc = $o->oi_id;
														$oc_check = DB::conn()->q("SELECT SUM(oc_amount) as tot FROM order_claim WHERE oc_order_item = '$order_id_oc'")->results();
														if(count($oc_check) > 0){
															$oc_check = $oc_check[0];$total_oc = number_format($oc_check->tot, 2);
														}else{
															$total_oc = 0;
															
														}
													?>
														<tr class="text-right bg-info">
															<td colspan="3"><b>Total</b></td>
															<td><b><?= $total_oc ?></b></td>
														</tr>
													</tbody>
												</table>
											<?php
											}else{
									?>
											<form action="" method="POST">
												<div class="row">
													<div class="col-sm-12">
														Order ID: <b><?= $o->oi_key ?></b> 
													</div><br /><br />
												</div>
												<div class="row">
													<div class="col-sm-6">
														Shipping type: <b><?= $o->oi_shipping_name ?></b> 
													</div><br /><br />
												</div>
												<div class="row">
													<div class="col-sm-12">
														Tracking Number: <input class="form-control" type="text" name="o_tracking" value="<?= !empty($o->oi_tracking) ? $o->oi_tracking : "" ?>">
													</div><br /><br />
												</div>
												<div class="row">
													<div class="col-sm-12">
														Status:
														<select  class="form-control select2" name="o_status" style="z-index: 500 !important;">
															<option value="#" >Please Select</option>
															<!-- <option value="0" <?= $o->oi_shipping_status == 0 ? "selected" : "" ?> >To Ship</option> -->
															<option value="2" <?= $o->oi_shipping_status == 2 ? "selected" : "" ?> >Product Dispatched</option>
															<option value="1" <?= $o->oi_shipping_status == 1 ? "selected" : "" ?> >Complete</option>
														</select><br />
													</div>
												</div><br />
												<!-- <div class="row">
													<div class="col-sm-12">
														Reason (for Cancel Order only):
														<textarea name="reason" class="form-control"><?= !empty($o->oi_reason) ? $o->oi_reason : "" ?></textarea>
													</div>
												</div><br /><br /> -->
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
											</form><br />
											<?php
												if($o->oi_shipping_status == 2){
													
												}else{
													?>
													<hr / style="border: 1px solid black;"><br />
														<div class="col-md-12" style="border-radius: 10px; background-color: #59c4e4;"><br />
															<h4 class="mt-0">Cancellation Request</h4>
															<p>
																You can cancel this as you wish. Please write something to tell sorry to your customer.
															</p>
															<p>
																This action cannot be undone. Please make sure all information are correct.
															</p>
															<form action="" method="POST">
																Note:
																<textarea class="form-control" name="message" placeholder="Notes to customer: We are sorry, your order have been cancelled"></textarea><br />
																<div class="text-right">
																	<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-warning">
																		Cancel Order
																	</a>
																</div>
																
																<div id="modal-warning" class="modal fade modal-alert modal-warning" style="z-index: 1501">
														        	<div class="modal-dialog">
														            	<div class="modal-content">
														              		<div class="modal-header"><i class="fa fa-warning"></i></div>
														              		<div class="modal-title">Cancel Order confirmation?</div>
														              		<div class="modal-body">Are you sure to cancel this order?</div>
														              		<div class="modal-footer">
														                		<button class="btn btn-warning">  Confirm</button>
														              		</div>
														            	</div>
														          	</div>
														        </div>
																
																<input type="hidden" name="refund" value="yes" />
																<?= Controller::form("order", ["action" => "cancellation"]); ?>
																<br />
															</form>
														</div>
													<?php
												}
											?>
											
											<?php	
												$oc = order_cancel::getBy(["oc_order_item" => $o->oi_id]);
												
												if(count($oc)){
												?>
												<h4>Cancellation Logs</h4>
												<table class="table table-hover table-responsive">
												<?php
													foreach($oc as $orc){
													?>
													<tr>
														<td><?= $orc->oc_date ?></td>
														<td><?= $orc->oc_message ?></td>
														<td>
															<?= $orc->oc_customer ? "CUSTOMER" : "VENDOR" ?>
														</td>
													</tr>
													<?php
													}
												?>
												</table>
												<?php
												}
											}
										}else{
											new Alert("info", "If you are not response to this request within three days, we will automatically refund to your customer and this order will be canceled.");
										?>
										<h4 class="mt-0">Cancellation Request</h4>
										
										<p>
											Your customer has issues a cancellation request to our system with below message:
										</p>
										
										<pre><?= $oc->oc_message ?></pre>
										
										<p>
											Please click below button wether you agree to refund or not.
										</p>
										
										<form action="" method="POST">
											Note:
											<textarea class="form-control" name="message" placeholder="Notes to customer: Sorry, we cannot refund this product. You will receive your item soon."></textarea><br />
											
											<div class="text-center">
												<button class="btn btn-danger">
													No, cannot refund
												</button>
											</div>
											
											<input type="hidden" name="refund" value="no" />
											<?= Controller::form("order", ["action" => "cancellation"]); ?>
										</form>
										<hr />
										<form action="" method="POST" class="">
											Note:
											<textarea class="form-control" name="message" placeholder="Notes to customer: We accept your cancellation request. Sorry for any conveniences. You will be refund soon."></textarea><br />
											
											<div class="text-center">
												<button class="btn btn-success">
													Agreee to Refund
												</button>
											</div>
											
											<input type="hidden" name="refund" value="yes" />
											<?= Controller::form("order", ["action" => "cancellation"]); ?>
										</form>
										<?php
										}
									}
								?>
								</div>
	                        </div>
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
													<td><?= $o->oi_item_name ?></td>
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
													<td>Service Fee</td>
													<td><?= $o->oi_commission ?>%</td>
												</tr>
												<tr>
													<td><b>Total</b></td>
													<td><b><?= Currency::getSign() ?><?= number_format($o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value, 2) ?></b></td>
												</tr>
												<tr>
													<td><b>Claimable Amount</b></td>
													<td><b><?= Currency::getSign() ?><?= number_format($o->oi_gtotal + $o->oi_shipping_cost, 2) ?></b></td>
												</tr>
											</tbody>
										</table>
									</div>
									<h4 class="mt-0">Shipping Information</h4>
									<div class="table-responsive">
										<table class="table table-hover table-responsive table-bordered">
											<tbody>
												<tr>
													<td>Service Name</td>
													<td><?= $o->oi_shipping_name ?></td>
												</tr>	
												<tr>
													<td>Estimation Cost</td>
													<td><?= Currency::getSign() ?><?= number_format($o->oi_shipping_cost, 2) ?></td>
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
										<table class="table table-hover table-responsive table-bordered">
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
										<table class="table table-hover table-responsive table-bordered">
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
                	<a class="btn btn-primary" href="<?php echo PORTAL ?>orders/all-orders" >Back</a>
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
                				<th class="text-center">Sub total (<?= Currency::getSign() ?>)</th>
                				<th class="text-center">Service fee (%)</th>
                				<th class="text-center">Tax (%)</th>
                				<th class="text-center">Total (<?= Currency::getSign() ?>)</th>
                				<th class="text-center">Claimable Amount (<?= Currency::getSign() ?>)</th>
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
                							echo "Free Shipping";
                						}
                					?>
                				</td>
                				<td>
                					<b><?= number_format(Currency::getPrice($o->oi_gtotal + $o->oi_shipping_cost), 2) ?></b>
                				</td>
                				<td>
                					<?= $o->oi_commission ?>
                				</td>
                				<td>
                					<?= $o->oi_tax ?>
                				</td>
                				<td>
                					<b><?= number_format(Currency::getPrice($o->oi_gtotal + $o->oi_shipping_cost + $o->oi_commission_value), 2) ?></b>
                				</td>
                				<td>
                					<b><?= number_format(Currency::getPrice($o->oi_gtotal + $o->oi_shipping_cost), 2) ?></b>
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