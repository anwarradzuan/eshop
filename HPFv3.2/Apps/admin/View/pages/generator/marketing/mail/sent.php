<?php
switch (input::get('action')){
    case "":
    
?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="fa fa-list"> All Sent Mail
            </div>
            <div class="panel-body">
                <div class="table-primary" id="data"></div>
                </div>
            </div>
        </div>
    <script>
        <?php
            //nama token
            $_token = F::Encrypt(F::UniqKey("client"));
            
            //create token
            $token = Token::create($_token, "email_client");
        ?>
        window.onload = function(){
            
            displaydata();
            
            function displaydata(){
           
                //Ajax
                $.ajax({
                    url : "<?php echo PORTAL ?>api/webmail",
                    method : "POST",
                    //timeout: 5000,
                    data : {
                        _token : "<?php echo $_token ?>",
                        token : "<?php echo $token ?>",
                        action : "<?= F::Encrypt($_token . "sentMail") ?>"
                    },
                    dataType : "json" 
                }).done(function(res){
                    console.log(res);
                    
                    if(res.status == "success"){
                        
                        displayData(res.data);
                        Alert ("success", res.message)
                    }else{
                        Alert ("error", res.message)
                    }
                })
            }
            
            function displayData(data){
                $data = `
                <div class="table-primary">
                    <table class="table table-hover table-bordered data-table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Subject</th>
                                <th>Form</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                `;
                
                data.forEach(function(x){
                    
                    $data += `
                            <tr>
                                <td class="text-center">`+ x.msgno +`</td>
                                <td class="">`+ x.subject +`</td>
                                <td class="">`+ x.from +`</td>
                                <td class="text-center">`+ x.to +`</td>
                                <td class="text-center">`+ x.date +`</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="<?php echo F::URLParams() ?>&action=view&id=`+ x.msgno +`" >
                                    <span class="fa fa-eye"></span> View</a>
                                </td>
                            </tr>
                    `;
                });
                
                $data += `
                        </tbody>
                    </table>
                </div>`;
                
                $("#data").html($data);
                $("table").dataTable();
            }
        };
    </script>
<?php
    break;
    
    case "view":
        
?>
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-eye"> Email
                <a class="btn btn-primary" href="<?php echo PORTAL ?>marketing/email/webmail/sent" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <?php 
                                    $data = Webmail::get(Input::get('id'));
                                    //var_dump($data);
                                ?>
                                From : <?php echo $data->from; ?>
                            </div>
                            <div class="panel-body">
                                Subject: 
                                <input class="form-control" type="text" value="<?php echo $data->subject; ?>">
                                Date: 
                                <input class="form-control" type="text" value="<?php echo $data->date; ?>">
                                To: 
                                <input class="form-control" type="text" value="<?php echo $data->to; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    break;     
}
imap_errors();
imap_alerts();
?>