
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-xs-12 col-sm-2">
				<div class="panel box">
					<div class="box-row">
						<div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
							<i class="fa fa-calendar"></i>&nbsp;&nbsp;CUSTOMERS THIS MONTH
						</div>
					</div>
					<div class="box-row">
						<div class="box-cell p-y-2">
							<div class="easy-pie-chart" data-suffix="clients" id="easy-pie-chart-1" data-percent="100" data-max-value="1000">
								<span class="font-size-14 font-weight-light">
								<?php
									$comp = $_SESSION["cl_company"];
									$x = DB::conn()->q("SELECT DISTINCT oi_customer FROM order_item WHERE oi_company = $comp AND oi_date LIKE '%". date("M-Y") ."%'")->results();
									echo count($x);
								?>
								</span>
								<canvas height="90" width="90"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-2">
				<div class="panel box">
					<div class="box-row">
						<div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
							<i class="fa fa-ellipsis-h"></i>&nbsp;&nbsp;ORDER IN PROGRESS
						</div>
					</div>
					<div class="box-row">
						<div class="box-cell p-y-2">
						    <div class="easy-pie-chart" data-suffix="%" id="easy-pie-chart-2" data-percent="" data-max-value="100">
						    	<span class="font-size-14 font-weight-light">
									<?php	
										$cl = $_SESSION["cl_id"];
										$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_company = $comp AND oi_shipping_status = 0");
										
										if(count($x->results())){
										$y = $x->results()[0];
										
											echo Currency::getSign().number_format($y->total, 2);
										}
									?>
						    	</span>
						    	<canvas height="90" width="90"></canvas>
						    </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-2">
				<div class="panel box">
					<div class="box-row">
						<div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
							<i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;COMPLETE
						</div>
					</div>
					<div class="box-row">
						<div class="box-cell p-y-2">
						    <div class="easy-pie-chart" data-suffix="%" id="easy-pie-chart-3" data-percent="90.625" data-max-value="64">
						    	<span class="font-size-14 font-weight-light">
								<?php
									
									$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_company = '$comp' AND oi_shipping_status = 1")->results();
									
									if(count ($xx) > 0){
										$xx = $xx[0];
										echo Currency::getSign().number_format($xx->ctotal, 2);
									}
								?>
						    	</span>
						    	<canvas height="90" width="90"></canvas>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">
				<div class="panel box">
					<div class="box-row">
						<div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
							<i class="fa fa-cloud"></i>&nbsp;&nbsp;DELAYED
						</div>
					</div>
					<div class="box-row">
						<div class="box-cell p-y-2">
						    <div class="easy-pie-chart" data-suffix="%" id="easy-pie-chart-3" data-percent="90.625" data-max-value="64">
						    	<span class="font-size-14 font-weight-light">
								<?php
									
									$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_company = '$comp' AND oi_shipping_status = 2")->results();
									
									if(count ($xx) > 0){
										$xx = $xx[0];
										echo  Currency::getSign().number_format($xx->ctotal, 2);
									}
								?>
						    	</span>
						    	<canvas height="90" width="90"></canvas>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">
				<div class="panel box">
					<div class="box-row">
						<div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
							<i class="fa fa-ban"></i>&nbsp;&nbsp;CANCELED
						</div>
					</div>
					<div class="box-row">
						<div class="box-cell p-y-2">
						    <div class="easy-pie-chart" data-suffix="%" id="easy-pie-chart-3" data-percent="90.625" data-max-value="64">
						    	<span class="font-size-14 font-weight-light">
								<?php
									
									$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_company = '$comp' AND oi_shipping_status = 3")->results();
									
									if(count ($xx) > 0){
										$xx = $xx[0];
										echo  Currency::getSign().number_format($xx->ctotal, 2);
									}
								?>
						    	</span>
						    	<canvas height="90" width="90"></canvas>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">
				<a href="#" class="box bg-danger">
					<div class="box-cell p-a-3 valign-middle">
						<i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
						<span class="font-size-24"><?php echo Currency::getCode(); ?><strong>
						<?php
							$datetoday = F::GetDate();
							$xy = DB::conn()->q("SELECT SUM(oi_gtotal) as ttotal FROM order_item WHERE oi_company = $comp AND oi_shipping_status > 0 AND  oi_date = '$datetoday'");
							
							if(count($xy->results())){
							$yh = $xy->results()[0];
							
								echo  Currency::getSign().number_format($yh->ttotal, 2);
							}
							
						?>
						</strong></span><br>
						<span class="font-size-15">Sales Today</span>
					</div>
				</a>
		    </div>
		</div>
	</div>
	
	
</div>

<hr class="page-block m-t-0">
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<span class="panel-title"><i class="panel-title-icon fa fa-bullhorn"></i>Recently oders</span>
			</div>
			<div id="support-tickets" class="ps-block" style="height: 300px">
				<div class="widget-support-tickets-item">
					<div class="widget-support-tickets-title">
						<div class="table-primary">
							<table class="table table-hover" id="datatables">
								<tbody>
									<div class="widget-activity-header">
									<?php
										foreach(order_item::getBy(["oi_company" => $comp], ["order" => "oi_date DESC","limit" => 10]) as $r){
									?>
										<tr>
											<td><a href="<?= PORTAL ?>/orders/all-orders/<?= $r->oi_key ?>"><?= $r->oi_key ?></a></td>
											<td class="text-right"><small><?php echo Currency::getCode(); ?></small><?php echo number_format($r->oi_gtotal, 2) ?></td>
										</tr>
									<?php
									}
									?>
									</div>
								</tbody>
							</table>
						</div>	
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<span class="panel-title"><i class="panel-title-icon fa fa-fire text-danger"></i>Recent reviews</span>
			</div>
			<div class="tab-content p-a-0">
				<div id="support-tickets" class="ps-block" style="height: 300px">
					<div class="widget-support-tickets-item">
						<div class="widget-support-tickets-title">
							<div class="table-primary">
								<table class="table table-hover" id="datatables">
									<tbody>
										<div class="widget-activity-header">
											<?php
												$review = item_review::getBy(["ir_company" => $comp], ["order" => "ir_date DESC", "limit" => 10]);
												if(count($review) > 0){
													foreach($review as $rev){
														$customer = customers::getBy(["c_id" => $rev->ir_customer]);
														if(count($customer) > 0){
															$customer = $customer[0];
														?>
															<tr>
																<td><?= $customer->c_name ?></td>
																<td class="text-left"><?= $rev->ir_subject ?></td>
																<td class="text-right"><?= $rev->ir_date ?></td>
																<td>
																	<a type="button" 
																		class="btn btn-primary btn-lg rev-view" 
																		data-toggle="modal" 
																		data-target="#modal-default" 
																		data-subject="<?= $rev->ir_subject ?>" 
																		data-value="<?= $rev->ir_review ?>">
													            		View
													            	</a>
													           	</td>
															</tr>
														<?php
														}
													}
												}else{
													echo "No review from customer";
												}
											?>
										</div>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-default" tabindex="-1">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	       		<button type="button" class="close" data-dismiss="modal">×</button>
	        	<h4 class="modal-title" id="myModalLabel"><span class="rev_sub"></span></h4>
	      	</div>
	      	<div class="modal-body">
	      		<span class="rev_view"></span>
	        </div>
	      	<div class="modal-footer" >
	        	<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      	</div>
	    </div>
	</div>
</div>
<hr class="page-block m-t-0" />
<div class="row">
	<div class="col-md-5">
	</div>
</div>
<script>
	window.onload = function(){
		
		$(document).on("click", ".rev-view", function () {
		    	var rev_rev = $(this).attr('data-value');
		    	var rev_sub = $(this).attr('data-subject');
		    	
		     	$(".modal-body, .rev_sub").html(rev_sub);
		     	$(".modal-body, .rev_view").html(rev_rev);
		});
	};
</script>




