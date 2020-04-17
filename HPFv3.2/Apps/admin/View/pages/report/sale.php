<div class="panel panel-default">
    <div class="panel-heading">
        <span class="fa fa-list"> All Orders
    </div>
    
    <div class="panel-body">
		<div class="row">
			<div class="col-md-2">
				Start Date:
				<div class="input-group">
					<input type="text" class="form-control single-date from-date" placeholder="d-M-Y" value="<?= date("d-M-Y", strtotime("1-Jan-" . date("Y"))) ?>" />
				</div>
			</div>
			<div class="col-md-2">
				End Date:
				<div class="input-group">
					<input type="text" class="form-control single-date to-date" placeholder="d-M-Y" value="<?= date("d-M-Y") ?>" />
				</div>
			</div>
			<div class="col-md-2">
				Document:
				<select class="select2 document">
    			    <option value="0">Only Main Ivoice</option>
    				<option value="1">All</option>
				</select>
			</div>
		</div>
        <div class="table-primary" id="data"></div>
    </div>
</div>
<script>
<?php
    //nama token
    $_token = F::Encrypt(F::UniqKey("client"));
    
    //create token
    $token = Token::create($_token, "sale_client");
?>
window.onload = function(){
	$(document).on("change", ".from-date, .to-date, .document", function(){
        $.ajax({
            url : "<?php echo PORTAL ?>api/sale",
            method : "POST",
            data : {
                _token : "<?php echo $_token ?>",
                token : "<?php echo $token ?>",
                action : "<?= F::Encrypt($_token . "listSale") ?>",
                from_id : $(".from-date").val(),
                to_id : $(".to-date").val(),
                doc_id: $(".document").val()
            },
            dataType : "json"
        })
        .done(function(res){ 
            //console.log(res);
            if(res.status == "success"){
                //console.log(res.data);
                //$("#data").html(JSON.stringify(res.data))
                displayData(res.data);
                Alert ("success", res.message)
            }else{
                Alert ("error", res.message)
            }
        })
    });
    
    function displayData(data){
        $data = `
        <a class="btn btn-info print-button" data-div="display" type="button" style="float:right">
            <span class="fa fa-print"> Print</span>
        </a><br /><br />
        <div id="display">
            <div class="table-primary">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-left">Details</th>
                            <th class="text-left">Item</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Representative</th>
                            <th class="text-right">Total (<?php echo Currency::get(); ?>)</th>
                            <th class="text-right">Paid (<?php echo Currency::get(); ?>)</th>
                            <th class="text-right">Balance (<?php echo Currency::get(); ?>)</th>
                        </tr>
                    </thead>
                
                    <tbody>`;
        
        data.forEach(function(x){
            $order = "";
            //$total = x.i_gtotal - x.ptotal;
            if(x.orders !== undefined){
                x.orders.forEach(function(o){
                    //console.log(o.item.i_name)
                    if(o.item !== null ){
                        $order += o.item.i_name + " " + o.o_name + " <strong>" + "<?php echo Currency::get(); ?>" + " " + o.o_total + "</strong><br />" ;
                    }else{
                        $order += o.o_name + " <strong>" + "<?php echo Currency::get(); ?>" + " " + o.o_total + "</strong><br />" ;
                    }
                });
            }
            
            $data += `
                        <tr>
                            <td class="text-center">`+ x.i_id +`</td>
                            <td class="text-left">
                                Pro. no: `+ x.i_no +`<br />
                                Inv. no: `+ x.i_pno +`<br />
                                Paid. no: <strong>`+ x.pstatus +`</strong><br />
                            </td>
                            <td class="text-left">`+ $order +`</td>
                            <td class="text-center">`+ x.i_date +`</td>
                            <td class="text-center">`+ x.i_client +`</td>
                            <td class="text-center">`+ x.i_user +`</td>
                            <td class="text-right">`+ x.gtotal +`</td>
                            <td class="text-right">`+ x.ptotal +`</td>
                            <td class="text-right">`+ x.total +`</td>
                        </tr>
            `;
        });
        
        
        $data += `
                    </tbody>
                </table>
            </div>
        </div>`;
        
        $("#data").html($data)
    }
}
</script>