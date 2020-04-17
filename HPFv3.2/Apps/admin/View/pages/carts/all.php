<?php
defined("HFA") or die();

new Controller($_POST);

switch(url::get(2)){
    case "":
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"></span> All Carts
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
            <table class="table table-reponsive table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Item</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Shipping</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">:::</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    $no = 1;
                    foreach(carts::list(["order" => "c_id DESC"]) as $c){
                    	$item = items::getBy(["i_id" => $c->c_item]);
                    	if(count($item) > 0){
                    		$item = $item[0];
                    	}
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                        	<?= $item->i_name ?>
                        </td>
                        <td class="text-center">
                        	<?php
								$i_op = cart_detail::getBy(["cd_cart" => $c->c_id]);
								if(count($i_op) > 0){
									$ori_price = 0;
									foreach($i_op as $iop){
										$ioc_price = $iop->cd_price;
										
										$ori_price += $ioc_price;
									}
									?>
										<?= Currency::getSign() ?><?= number_format(Currency::getPrice($ori_price + $c->c_price), 2) ?>
									<?php
								}else{
									?>
									 	<?= Currency::getSign() ?><?= number_format(Currency::getPrice($c->c_price), 2) ?>
									<?php
								}

							?>
                        </td>
                        <td class="text-center">
                        	<?= $c->c_quantity ?>
                        </td>
                        <td class="text-center">
                        	<?= Currency::getSign() ?><?= number_format(Currency::getPrice($c->c_shipping_cost), 2) ?>
                        </td>
                        <td class="text-center">
                        	<b><?= Currency::getSign() ?><?= number_format(Currency::getPrice($c->c_gtotal + $c->c_shipping_cost), 2) ?></b>
                        </td>
                        <td class="text-center">
                        	<?php
                        		$cust = customers::getBy(["c_id"=> $c->c_customer]);
								if(count($cust) > 0){
									$cust = $cust[0];
									echo $cust->c_name;
								}
                        	?>
                        </td>
                        <td class="text-center">
                        	
                        	<?= $c->c_date ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= PORTAL ?>carts/all/delete/<?= $c->c_id ?>" class="btn btn-danger">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
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
    break;
    
    case "delete":
        $id = url::get(3);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-trash"></span>
            Delete Cart Information
            
            <a href="<?= PORTAL ?>carts" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $ca = carts::getBy(["c_id" => $id]);
            
            if(count($ca) > 0){
                $ca = $ca[0];    
				$item = items::getBy(["i_id" => $ca->c_item]);
				if(count($item) > 0 ){
					$item = $item[0];	
				}
				$cus = customers::getBy(["c_id" => $ca->c_customer]);
            	if(count($cus) > 0){
            		$cus = $cus[0];
            	}
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">
                    Are you sure?
                </h3>
                <b>Item:</b> <?= $item->i_name ?><br />
                <b>Customer:</b> <?= $cus->c_name ?><br />
                <b>Date:</b> <?= $ca->c_date ?><br /><br />
                <p>
                    By clicking below button will remove the selected cart data permanently.
                </p>
                
                <?php
                    Controller::Form(
                        "carts/carts", 
                        [
                            "type"  => "delete"  
                        ]
                    );
                ?>
                <input type="hidden" name="c_key" value="<?= $ca->c_key ?>"/>
                <input type="hidden" name="c_customer" value="<?= $ca->c_customer ?>"/>
                <button class="btn btn-danger">
                    <span class="fa fa-trash"></span>
                    Delete
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "Sorry, selected cart data not found in our database.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
    
    default:
        Page::Load(404);
    break;
}

