
<div class="row">
    <div class="col-md-3">
        <div class="box bg-info darken">
            <div class="box-cell p-x-3 p-y-1">
                <div class="font-weight-semibold font-size-12">ITEMS</div>
                <div class="font-weight-bold font-size-20">
                    <?= count(items::getBy(["i_company" => $_SESSION['cl_company']])) ?>
                </div>
                <i class="box-bg-icon middle right font-size-52 ion-ios-people"></i>
            </div>
        </div>
    </div>

	<div class="col-md-3">
		<div class="box bg-danger darken">
			<div class="box-cell p-x-3 p-y-1">
				<div class="font-weight-semibold font-size-12">ORDERS</div>
					<div class="font-weight-bold font-size-20">
						<?= count(order_item::getBy(["oi_company" => $_SESSION['cl_company']])) ?>
					</div>
				<i class="box-bg-icon middle right font-size-52 ion-ios-box"></i>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="box bg-warning darken">
			<div class="box-cell p-x-3 p-y-1">
				<div class="font-weight-semibold font-size-12">COMPLETE ORDER</div>
					<div class="font-weight-bold font-size-20"><small class="font-weight-light"><?php echo Currency::getCode(); ?></small>
					<?php	
						$comp = $_SESSION['cl_company'];
						$x = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_shipping_status = '1' AND oi_company = '$comp'")->results();
						
						if(count($x) > 0){
							$x = $x[0];
							echo number_format($x->ctotal, 2);
						}
					?>
					</div>
				<i class="box-bg-icon middle right font-size-52 ion-ios-cart"></i>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="box bg-success darken">
			<div class="box-cell p-x-3 p-y-1">
				<div class="font-weight-semibold font-size-12">TOTAL SALES</div>
					<div class="font-weight-bold font-size-20"><small class="font-weight-light"><?php echo Currency::getCode(); ?></small>
					<?php
						$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status >= '0' AND oi_company = '$comp'");
						
						if(count($x->results())){
						$y = $x->results()[0];
						
							echo number_format($y->total, 2);
						}
					?>
					</div>
				<i class="box-bg-icon middle right font-size-52 ion-arrow-graph-up-right"></i>
			</div>
		</div>
	</div>
</div>

<hr class="page-wide-block m-y-0">
<div class="page-wide-block">
	<div class="box m-a-0 border-radius-0" id="metrics">
		<div class="box-row valign-top">
			<div class="box-cell col-md-4">
				<div class="box-container text-xs-center text-primary">
				
					<div class="box-row valign-middle">
						<a href="<?= PORTAL ?>items/all-item/" class="box-cell p-y-1 b-r-1 bg-white">
							<i class="ion-ios-box-outline font-size-52 line-height-1"></i>
							<div class="font-size-12">All Items</div>
						</a>
						
						<a href="<?= PORTAL?>orders/all-orders" class="box-cell p-y-1 bg-white">
							<i class="ion-ios-box font-size-52 line-height-1"></i>
							<div class="font-size-12">Orders</div>
						</a>
					</div>
				
					<div class="box-row valign-middle">
						<a href="<?= PORTAL ?>marketing/announcement/" class="box-cell p-y-1 b-r-1 b-t-1 bg-white">
							<i class="fa fa-bullhorn font-size-52 line-height-1"></i>
							<div class="font-size-12">Marketing</div>
						</a>
					
						<a href="<?= PORTAL ?>users/my-account" class="box-cell p-y-1 b-t-1 bg-white">
							<i class="ion-ios-gear-outline font-size-52 line-height-1"></i>
							<div class="font-size-12">Settings</div>
						</a>
					</div>
				</div>
			</div>
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
				<div class="pull-xs-right label label-success"></div>
				<div class="font-size-20"><strong>
				<?php
					$x = DB::conn()->q("SELECT * FROM order_item WHERE oi_company = '$comp' AND oi_date LIKE '%". date("M-Y") ."%'");
					echo count($x->results());
				?>
				</strong></div>
				<div class="text-muted font-weight-semibold font-size-11">ORDERS THIS MONTH</div>
				<div id="monthly-sales-graph" class="m-t-4"></div>
				<script>
                window.onload = function(){
                    /*$('#monthly-sales-graph')
                    .each(function() {
                        var optionstemp = 
                        {
                            type:       'bar',
                            barColor:   "#565656",
                            barSpacing: 2,
                        };
                        curColorIndex += 2;
                    });*/
                    
                    var data = [
                    <?php
                    	$cl = $_SESSION["cl_id"];
						//echo $comp;
                        $x = DB::conn()->q("SELECT * FROM order_item WHERE oi_company = '$comp' AND oi_shipping_status > 0 AND oi_date LIKE '%". date("M-Y") ."%'")->results();
                        foreach($x as $inv){
                            echo $inv->o_gtotal . ",";
                        }
                    ?>
                    ];
                    
                    var options = 
                    {
                        type:               'line',
                        fillColor:          "#c9ecff",
                        lineColor:          "#0288D1",
                        lineWidth:          1,
                        spotColor:          null,
                        minSpotColor:       null,
                        maxSpotColor:       null,
                        spotRadius:         3,
                    };
                    
                    $('#monthly-sales-graph').pxSparkline(data, $.extend({
                        width:              '100%',
                        height:             '70px',
                    }, options));
                };
                </script>
			</div>
			
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
				<div class="pull-xs-right label label-danger"></div>
					<div class="font-size-20"><small><?php echo Currency::getCode(); ?></small><strong>
					<?php
						$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status > 0 AND oi_company = '$comp'");
						
						if(count($x->results())){
						$y = $x->results()[0];
						
						echo number_format($y->total, 2);
						}
					?>
					</strong></div>
				<div class="text-muted font-weight-semibold font-size-11">SALES</div>
				<div id="monthly-income-graph" class="m-t-4"></div>
					<canvas style = "display: inline-block; width: 202px; height: 70px; vertical-align: top;" width:"202" height:"70"></canvas>
			</div>
		</div>
    
		<div class="box-row valign-top">
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
			</div>
		
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
				<div class="font-size-20">
				<?php
					$x = DB::conn()->q("SELECT DISTINCT oi_customer FROM order_item WHERE oi_company = '$comp' AND oi_date LIKE '%". date("M-Y") ."%'")->results();
					echo count($x);
				?>
				</div>
				<div class="text-muted font-weight-semibold font-size-11">CUSTOMERS THIS MONTH</div>
				<div id="monthly-signups-graph" class="m-t-4"></div>
					<canvas style = "display: inline-block; width: 202px; height: 70px; vertical-align: top;" width:"202" height:"70"></canvas>
			</div>
		
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
				<div class="font-size-20">
				<?php
					$cl = $_SESSION["cl_id"];
					$x = DB::conn()->q("SELECT * FROM order_item WHERE oi_company = '$comp'");
					echo count($x->results());
				?>
				</div>
				<div class="m-b-1 text-muted font-weight-semibold font-size-11">OVERALL ORDERS</div>
				<div id="devices-chart" style="height: 120px"></div>
			</div>
		</div>
	</div>
</div>


   
<hr class="page-wide-block m-t-0">
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
				Latest Orders
				</div>
			</div>
			<div class="panel-body">
				<div class="table-primary">
					<table class="table table-hover" id="datatables">
						<tbody>
							<div class="widget-activity-header">
								<?php
									$date = date("M-Y");
									// /$order = orders::getBy(["o_company" => $comp, "o_date " => "LIKE %".$date."%"], ["limit" => 10]);
									$order = DB::conn()->q("SELECT * FROM order_item WHERE oi_company = '$comp' AND oi_date LIKE '%". date("M-Y") ."%'")->results();
									if(count($order) > 0){
											
										foreach($order as $r){
											?>
											<tr>
												<td><a href="<?= PORTAL ?>billing/invoices/all-invoices/view/<?= $r->oi_id ?>"><?= $r->oi_key ?></a></td>
												<td>
													<?php 
														foreach (Setting::$order as $key => $value) {
															if($key == $r->oi_shipping_status){
																echo $value;
															}
														}
													?>
												</td>
												<td>
													<?= date("j F Y h:i:s", $r->oi_time) ?>
												</td>
												<td class="text-right"><small><?php echo Currency::getSign(); ?></small><?php echo number_format($r->oi_gtotal, 2) ?></td>
											</tr>
											<?php
										}
									}else{
										?>
										<tr>
											<td class="text-center">No order have been made</td>
										</tr>
										<?php	
									}
									
								?>
							</div>
						</tbody>
					</table>
				</div>
				<a href="<?= PORTAL?>orders/all-orders" class="widget-more-link">MORE ORDERS</a>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
				Top customer
				</div>
			</div>
			<div class="panel-body">
				<div class="table-primary">
					<table class="table table-hover" id="datatables">
						<tbody>
							
							<div class="widget-activity-header">
								<?php
									$top_cust = DB::conn()->q("SELECT SUM(oi_gtotal) as total, oi_customer FROM order_item WHERE oi_company = '$comp' GROUP BY oi_customer ORDER BY total DESC")->results();
									if(count($top_cust) > 0){
										//$top_cust = $top_cust[0];
										foreach ($top_cust as $t_c) {
											?>
												<tr>
													<td>
														<?php
															$cust_name = customers::getBy(["c_id"=> $t_c->oi_customer]);
															if(count($cust_name) > 0){
																$cust_name = $cust_name[0];
																echo $cust_name->c_name;
															}else{
																echo "No name";
															}
														?>
													</td>
													<td><small><?php echo Currency::getSign(); ?></small> <?= number_format($t_c->total, 2) ?></td>
												</tr>
											<?php
										}
									}else{
										
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




 

 