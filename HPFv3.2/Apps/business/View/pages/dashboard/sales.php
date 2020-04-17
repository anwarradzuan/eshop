<div class="page-wide-block">
	<div class="box m-b-0 valign-middle bg-white">
		<div class="box-cell col-md-7 p-a-4">
			<div>
				<span class="font-size-18 font-weight-light">Total Sales</span>&nbsp;&nbsp;
				<span class="text-success">12% <i class="ion-arrow-up-c"></i></span>
			</div>
			<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo Currency::getCode(); ?></small><strong>
			<?php
				$comp = $_SESSION['cl_company'];
				$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status > 0 AND oi_company = '$comp'");
				
					if(count($x->results())){
					$y = $x->results()[0];
				
					echo number_format($y->total, 2);
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
				<span class="font-size-17 font-weight-light">Paid Orders</span>&nbsp;&nbsp;
			</div>
			<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo Currency::getCode(); ?></small>
			<?php
				$xx = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status = 1 AND oi_company = '$comp'");
				
				if(count($xx->results())){
				$y = $xx->results()[0];
				
					echo number_format($y->total, 2);
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
				<span class="font-size-17 font-weight-light">Canceled order</span>&nbsp;&nbsp;
				<!-- <span class="text-danger">5% <i class="ion-arrow-down-c"></i></span> -->
			</div>
			<!-- <div class="text-muted font-size-11 font-weight-light">past 30 days</div> -->
			<div class="font-size-34"><small class="font-weight-light text-muted"><?php echo Currency::getCode(); ?></small><strong>
			<?php	
				$xxx = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status = 0 AND oi_company = '$comp'");
				
				if(count($xxx->results())){
				$y = $xxx->results()[0];
				
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