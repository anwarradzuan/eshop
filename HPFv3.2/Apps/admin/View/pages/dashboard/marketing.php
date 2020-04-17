
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
									$x = DB::conn()->q("SELECT DISTINCT oi_customer FROM order_item WHERE oi_date LIKE '%". date("M-Y") ."%'")->results();
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
										$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status = '0'");
										
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
									
									$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_shipping_status = '1'")->results();
									
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
									
									$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_shipping_status = 3")->results();
									
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
									
									$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_shipping_status = 4")->results();
									
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
							<i class="fa fa-calculator"></i>&nbsp;&nbsp;TOTAL ORDERS
						</div>
					</div>
					<div class="box-row">
						<div class="box-cell p-y-2">
						    <div class="easy-pie-chart" data-suffix="%" id="easy-pie-chart-3" data-percent="90.625" data-max-value="64">
						    	<span class="font-size-14 font-weight-light">
								<?php
									
									$xx = order_item::list();
									echo count($xx);
								?>
						    	</span>
						    	<canvas height="90" width="90"></canvas>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6">
		<a href="#" class="box bg-danger">
			<div class="box-cell p-a-3 valign-middle">
				<i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
				<span class="font-size-24"><?php echo Currency::getCode(); ?><strong>
				<?php
					$datetoday = F::GetDate();
					
					$xy = DB::conn()->q("SELECT SUM(oi_gtotal) as ttotal FROM order_item WHERE oi_shipping_status >= 0 AND  oi_date = '$datetoday'");
					
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
	<div class="col-md-6">
		<div class="panel box">
			<div class="box-row">
				<div class="box-container">
					<div class="box-cell p-a-1 bg-info">
						<div class="m-b-1 font-size-11">HITS PATTERN</div>
						<div id="sparkline-1"></div>
					</div>
				</div> 
			</div>
			<div class="box-row">
				<div class="box-container valign-middle text-xs-center">
					<div class="box-cell p-y-1 b-r-1">
						<div class="font-size-17"><strong>
							<?= count(hits::list()) ?>
						</strong></div>
						<div class="font-size-11">TOTAL HITS</div>
					</div>
					<div class="box-cell p-y-1 b-r-1">
						<div class="font-size-17"><strong>
						<?php
							$tdate = F::GetDate();
							$x = DB::conn()->q("SELECT * FROM hits WHERE h_date = '$tdate'");
								echo count($x->results());
						?>
						</strong></div>
						<div class="font-size-11">HITS TODAY</div>
					</div>
					<div class="box-cell p-y-1">
						<div class="font-size-17"><strong>
						<?php
							$x = DB::conn()->q("SELECT * FROM hits WHERE h_date LIKE '%". date("M-Y") ."%'");
								echo count($x->results());
						?>
						</strong></div>
						<div class="font-size-11">HITS THIS MONTH</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

<hr class="page-block m-t-0">
<div class="row">
	<div class="col-md-4">
        <div class="panel panel-success">
			<div class="panel-heading">
				<span class="panel-title"><i class="panel-title-icon fa fa-archive"></i>10 Recently Orders</span>
				<div class="panel-heading-controls">
				</div>
			</div>
			<div class="table-responsive">
                <table class="table">
    				<thead>
    					<tr>
    						<th>Order Id</th>
    						<th>Company</th>
    						<!-- <th>Customer</th> -->
    						<th class="text-right">Total (<?= Currency::GetSign() ?>)</th>
    					</tr>
    				</thead>
    				<tbody class="valign-middle">
						<tr>
							<?php	
								$setting = ["limit" => 10, "order" => "oi_gtotal DESC"];
								
								foreach(order_item::list($setting) as $r){
							?>
								<tr>
									<td><a href="<?= PORTAL ?>billing/orders&action=edit&id=<?= $r->oi_id ?>"><?= $r->oi_key ?></a></td>
									<td>
										<?php
											$comp = company::getBy(['c_id' => $r->oi_company]);
											if(count($comp) > 0){
												$comp = $comp[0];
												?>
												<a href="<?= PORTAL ?>clients/all-company/edit/<?= $comp->c_key ?>"><?= $comp->c_name ?></a>
												<?php
											}
										?>
									</td>
									<td class="text-right"><small><?php echo Currency::getSign(); ?></small><?php echo number_format($r->oi_gtotal, 2) ?></td>
								</tr>
							<?php
							}
							?>
						</tr>
    				</tbody>
    			</table>
			</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-warning">
			<div class="panel-heading">
				<span class="panel-title"><i class="panel-title-icon fa fa-users"></i>10 New Customers</span>
				<div class="panel-heading-controls">
				</div>
			</div>
			<div class="table-responsive">
                <table class="table">
    				<thead>
    					<tr>
    						<th>#</th>
    						<th>Username</th>
    						<th>Full Name</th>
    						<th>E-mail</th>
    						<th></th>
    					</tr>
    				</thead>
    				<tbody class="valign-middle">
					<?php
						$no = 1;
						$setting = ["limit" => 10, "order" => "c_time DESC"];
						foreach(customers::list($setting) as $v){
					?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $v->c_login ?></a></td>
							<td><a href="<?= PORTAL ?>customer/edit/<?= $v->c_id ?>"><?= $v->c_name ?></a></td>
							<td><?= $v->c_email ?></a></td>
						</tr>
					<?php
					}
					?>
    				</tbody>
    			</table>
			</div>
        </div>
    </div>
	<div class="col-md-4">
        <div class="panel panel-danger">
			<div class="panel-heading">
				<span class="panel-title"><i class="panel-title-icon fa fa-briefcase"></i>10 New clients</span>
				<div class="panel-heading-controls">
				</div>
			</div>
			<div class="table-responsive">
                <table class="table">
    				<thead>
    					<tr>
    						<th>#</th>
    						<th>Username</th>
    						<th>Full Name</th>
    						<th>E-mail</th>
    						<th></th>
    					</tr>
    				</thead>
    				<tbody class="valign-middle">
					<?php
						$no = 1;
						$setting = ["limit" => 10, "order" => "cl_time DESC"];
						foreach(clients::list($setting) as $v){
					?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $v->cl_login ?></a></td>
							<td><a href="<?= PORTAL ?>clients/all-clients/edit/<?= $v->cl_id ?>"><?= $v->cl_name ?></a></td>
							<td><?= $v->cl_email ?></a></td>
						</tr>
					<?php
					}
					?>
    				</tbody>
    			</table>
			</div>
        </div>
    </div>
</div>





