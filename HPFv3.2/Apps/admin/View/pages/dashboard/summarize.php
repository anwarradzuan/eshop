<div class="row">
    <div class="col-md-3">
        <div class="box bg-info darken">
            <div class="box-cell p-x-3 p-y-1">
                <div class="font-weight-semibold font-size-12">CLIENTS</div>
                <div class="font-weight-bold font-size-20">
                    <?= number_format(count(clients::list())) ?>
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
						<?= number_format(count(order_item::list())) ?>
					</div>
				<i class="box-bg-icon middle right font-size-52 ion-ios-box"></i>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="box bg-warning darken">
			<div class="box-cell p-x-3 p-y-1">
				<div class="font-weight-semibold font-size-12">PAID ORDER</div>
					<div class="font-weight-bold font-size-20"><small class="font-weight-light"><?php echo Currency::getSign(); ?></small>
					<?php	
						$x = DB::conn()->q("SELECT SUM(oi_gtotal) as ctotal FROM order_item WHERE oi_shipping_status = 1");
						
						if(count($x->results())){
						$y = $x->results()[0];
						
							echo number_format($y->ctotal, 2);
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
					<div class="font-weight-bold font-size-20"><small class="font-weight-light"><?php echo Currency::getSign(); ?></small>
					<?php	
						$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_shipping_status > 0");
						
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
						
						<a href="<?= PORTAL?>clients" class="box-cell p-y-1 bg-white">
							<i class="ion-ios-people-outline font-size-52 line-height-1"></i>
							<div class="font-size-12">Clients</div>
						</a>
					</div>
				
					<div class="box-row valign-middle">
						<a href="<?= PORTAL ?>marketing/announcement/" class="box-cell p-y-1 b-r-1 b-t-1 bg-white">
							<i class="fa fa-bullhorn font-size-52 line-height-1"></i>
							<div class="font-size-12">Marketing</div>
						</a>
					
						<a href="<?= PORTAL ?>system/setting/information" class="box-cell p-y-1 b-t-1 bg-white">
							<i class="ion-ios-gear-outline font-size-52 line-height-1"></i>
							<div class="font-size-12">Settings</div>
						</a>
					</div>
				</div>
			</div>
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
				<div class="font-size-20">
				<?php
					$x = DB::conn()->q("SELECT * FROM visitors WHERE v_date LIKE '%". date("M-Y") ."%'");
					echo number_format(count($x->results()));
				?>
				</div>
				<div class="text-muted font-weight-semibold font-size-11">VISITS THIS MONTH</div>
				<div id="monthly-visits-graph" class="m-t-4"></div>
					<canvas style = "display: inline-block; width: 201px; height: 70px; vertical-align: top;" width:"201" height:"70"></canvas>
			</div>
			
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
					<div class="font-size-20">
					<?php
						$x = DB::conn()->q("SELECT * FROM visitors");
						echo number_format(count($x->results()));
					?>
					</strong></div>
				<div class="text-muted font-weight-semibold font-size-11">TOTAL VISITORS</div>
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
					$x = DB::conn()->q("SELECT * FROM clients WHERE cl_date LIKE '%". date("M-Y") ."%'");
					echo count($x->results());
				?>
				</div>
				<div class="text-muted font-weight-semibold font-size-11">CLIENTS THIS MONTH</div>
				<div id="monthly-signups-graph" class="m-t-4"></div>
					<canvas style = "display: inline-block; width: 202px; height: 70px; vertical-align: top;" width:"202" height:"70"></canvas>
			</div>
		
			<div class="box-cell col-md-4 p-x-4 p-t-3 p-b-4">
				<div class="font-size-20">
				<?php
					$x = DB::conn()->q("SELECT * FROM order_item WHERE oi_date LIKE '%". date("M-Y") ."%'");
					echo count($x->results());
				?>
				</div>
				<div class="m-b-1 text-muted font-weight-semibold font-size-11">ORDER THIS MONTH</div>
				<div id="devices-chart" style="height: 120px"></div>
			</div>
		</div>
	</div>
</div>


   
<hr class="page-wide-block m-t-0">
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="panel-title">Top 10 Product</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped valign-middle">
					<thead>
						<th>Product Name</th>
						<th>Company</th>
						<th class="text-xs-right">Total Order</th>
					</thead>
					<?php
						$topitem = DB::conn()->q("SELECT COUNT(oi_id), oi_item, SUM(oi_gtotal) as total FROM `order_item` GROUP BY oi_item ORDER BY total DESC LIMIT 10")->results();
						foreach ($topitem as $kkk) {
							$item = items::getBy(["i_id" => $kkk->oi_item]);
							if(count($item) > 0){
								$item = $item[0];
								?>
									<tr>
										<td>
											<?= $item->i_name ?>
										</td>
										<td>
											<?php
												$comp = company::getBy(["c_id" => $item->i_company]);
												if(count($comp) > 0){
													$comp = $comp[0];
													echo $comp->c_name;
												}
											?>
										</td>
										<td class="text-right"><?= Currency::GetSign() ?><?= number_format($kkk->total, 2) ?></td>
									</tr>
								<?php
							}
						}
					?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="panel-title">Visitor on Page</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped valign-middle">
					<thead>
						<th>Category</th>
						<th class="text-xs-right">Views</th>
						<th></th>
					</thead>
					<tr>
						<td>Vendor Page</td>
						<td class="text-xs-right">
							<?php
								$vhit = DB::conn()->q("SELECT SUM(h_hit) as vtotal FROM hits WHERE h_portal = 'vendor'")->results();
								if(count($vhit) > 0){
									$vhit = $vhit[0];
									echo number_format($vhit->vtotal);
								} 
							?>
						</td>
						<td class="text-xs-right"><div class="trending-graph"></div></td>
					</tr>
					<tr>
						<td>Public Page</td>
						<td class="text-xs-right">
							<?php
								$phit = DB::conn()->q("SELECT SUM(h_hit) as ptotal FROM hits WHERE h_portal = 'public'")->results();
								if(count($phit) > 0){
									$phit = $phit[0];
									echo number_format($phit->ptotal);
								}
							?>
						</td>
						<td class="text-xs-right"><div class="trending-graph"></div></td>
					</tr>
					<tr>
						<td>Customer Page</td>
						<td class="text-xs-right">
							<?php
								$phit = DB::conn()->q("SELECT SUM(h_hit) as ptotal FROM hits WHERE h_portal = 'customer'")->results();
								if(count($phit) > 0){
									$phit = $phit[0];
									echo number_format($phit->ptotal);
								}
							?>
						</td>
						<td class="text-xs-right"><div class="trending-graph"></div></td>
					</tr>
				</table>
			</div>
    	</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="panel-title">
				Top company
				</div>
			</div>
			<div class="panel-body">
				<div class="table-primary">
					<table class="table table-hover" id="datatables">
						<tbody>
							<div class="widget-activity-header">
								<?php	
									$setting = ["limit" => 10];
									foreach(company::list($setting) as $p){
								?>
								<tr>
									<td><a href="<?= PORTAL ?>clients/all-clients/edit/<?= $p->c_id ?>"><?= $p->c_name ?></a></td>
									<td class="text-right"><small><?php echo Currency::getSign(); ?></small>	
										<?php
											$c = $p->c_id;
											$x = DB::conn()->q("SELECT SUM(oi_gtotal) as total FROM order_item WHERE oi_company = '$c' ORDER BY total DESC");
											
											if(count($x->results())){
											$y = $x->results()[0];
											
												echo number_format($y->total, 2);
											}
										
										?>
									</td>
								</tr>
								<?php
								}
								?>	
							</div>
						</tbody>
					</table>
					<a href="<?= PORTAL ?>all-clients/" class="widget-more-link">MORE CLIENTS</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
window.onload = function(){
	$(function() {
	var chartColor = pxDemo.getRandomColors(1)[0];

	$('.trending-graph')
		.each(function() {
			var data = [
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
				pxDemo.getRandomData(300, 100),
			];
			
			$(this).pxSparkline(data, {
				type:       'bar',
				barWidth:   2,
				height:     20,
				barColor:   chartColor,
				barSpacing: 2,
			});
		});
	});
	
	$(function() {
      var chartColors   = pxDemo.getRandomColors(12);
      var curColorIndex = 0;

      $('#monthly-visits-graph')
        .each(function() {
          var data = [
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
            pxDemo.getRandomData(300, 100),
          ];

          var options = this.id === 'monthly-income-graph' || this.id === 'monthly-signups-graph' ? {
            type:       'bar',
            barColor:   chartColors[curColorIndex],
            barSpacing: 2,
          } : {
            type:               'line',
            fillColor:          null,
            lineColor:          chartColors[curColorIndex],
            lineWidth:          1,
            spotColor:          null,
            minSpotColor:       null,
            maxSpotColor:       null,
            highlightSpotColor: chartColors[curColorIndex + 1],
            highlightLineColor: chartColors[curColorIndex + 1],
            spotRadius:         3,
          };

          $(this).pxSparkline(data, $.extend({
            width:              '100%',
            height:             '70px',
          }, options));

          curColorIndex += 2;
        });

      (function() {
        var data = {
          columns: [
            [ 'Mobile', pxDemo.getRandomData(300, 50) ],
            [ 'Tablets', pxDemo.getRandomData(300, 50) ],
            [ 'Desktops', pxDemo.getRandomData(300, 50) ],
          ],
          type : 'pie',
        };

        c3.generate({
          bindto: '#devices-chart',
          color:  { pattern: [ chartColors[8], chartColors[9], chartColors[10] ] },
          data:   data,
          legend: { position: 'right' }
        });
      })();
    });
};
</script>




 

 