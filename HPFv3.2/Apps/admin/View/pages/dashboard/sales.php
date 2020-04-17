
<div class="page-wide-block">
	<div class="box m-b-0 valign-middle bg-white">
		<div class="box-cell col-md-7 p-a-4">
			<div>
				<span class="font-size-18 font-weight-light">Total Sales</span>&nbsp;&nbsp;
				<!-- <span class="text-success">12% <i class="ion-arrow-up-c"></i></span> -->
			</div>
			<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo Currency::getSign(); ?></small><strong>
			<?php
				$x = DB::conn()->q("SELECT SUM(oi_gtotal) as gtotal FROM order_item WHERE oi_shipping_status > 0");
				
					if(count($x->results())){
					$y = $x->results()[0];
				
					echo number_format($y->gtotal, 2);
				}
			?>
			</strong></div>
		</div>
		<div class="box-cell col-sm-5 p-a-4">
			<span id="balance-chart"></span>
		</div>
	</div>
</div>

<div class="page-wide-block">
	<div class="box border-radius-0 bg-black">
		<div class="box-cell col-md-6 p-a-4 bg-black darken">
			<div>
				<span class="font-size-17 font-weight-light">Completed Order</span>&nbsp;&nbsp;
				<!-- <span class="text-success">9% <i class="ion-arrow-up-c"></i></span> -->
			</div>
			<!-- <div class="text-muted font-size-11 font-weight-light">past 30 days</div> -->
			<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo Currency::getSign(); ?></small>
			<?php
				$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_shipping_status = 1");
				
				if(count($xx->results())){
				$yy = $xx->results()[0];
				
					echo number_format($yy->ctotal, 2);
				}
			?>
			</div>
			<div class="p-t-4">
				<canvas id="revenue-chart" width="400" height="150"></canvas>
			</div>
		</div>
		<hr class="m-a-0 visible-xs visible-sm">
		<div class="box-cell col-md-6 p-a-4">
			<div>
				<span class="font-size-17 font-weight-light">Order In Progress</span>&nbsp;&nbsp;
				<!-- <span class="text-danger">5% <i class="ion-arrow-down-c"></i></span> -->
			</div>
			<!-- <div class="text-muted font-size-11 font-weight-light">past 30 days</div> -->
			<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo Currency::getSign(); ?></small><strong>
			<?php	
				$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status = 0");
				
				if(count($x->results())){
				$y = $x->results()[0];
				
					echo number_format($y->total, 2);
				}
			?>
			</strong></div>
			<div class="p-t-4">
				<canvas id="expenses-chart" width="400" height="150"></canvas>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-title">
				<i class="panel-title-icon font-size-16 text-primary"></i>Recently Item
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Porduct Name</th>
							<th>Company</th>
							<th>Date upload</th>
							<th class="text-right">Date Price</th>
						</tr>
					</thead>
					<tbody class="valign-middle">
					<?php
						$setting = ["limit" => 10, "order" => "i_time DESC"];
						foreach(items::list($setting) as $v){
					?>
						<tr>
							<td><a href="<?= PORTAL ?>items/all-item/edit/<?= $v->i_key ?>"><?= $v->i_name ?></a></td>
							<td>
								<a href="<?= PORTAL ?>clients/all-clients/edit/<?= $v->i_client ?>">
								<?php
									$comp = company::getBy(["c_id" => $v->i_company]);
									if(count($comp) > 0){
										$comp = $comp[0];
										echo $comp->c_name;
									}
								?>
								</a>
							</td>
							<td><?= $v->i_date ?></td>
							<td class="text-right"><small class="font-size-13"><?php echo Currency::getSign(); ?></small><?php echo number_format($v->i_price, 2) ?></td>
						</tr>
					<?php
					}
					?>
					<tr class="text-center">
						<td colspan="4">
							<a class="btn btn-primary" href="<?= PORTAL ?>items/all-item">View more</a>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

  



