<?php
switch (input::get('action')){
    case "":
?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="fa fa-list"> All Email
            </div>
            <div class="panel-body">
                <div class="table-primary" id="data">
                    <div class="text-center">
                        <img src="<?= PORTAL ?>assets/medias/systems/loading.gif" />
                    </div>
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
                $.ajax({
                    url : "<?php echo PORTAL ?>api/webmail",
                    method : "POST",
                    data : {
                        _token : "<?php echo $_token ?>",
                        token : "<?php echo $token ?>",
                        action : "<?= F::Encrypt($_token . "listEmail") ?>",
                        limit: 50,
                        start: 0
                    },
                    dataType : "json" 
                }).done(function(res){
                    if(res.status == "success"){
                        displayData(res.data);
                        Alert ("success", res.message)
                    }else{
                        Alert ("error", res.message)
                    }
                }).fail(function(res){
                    console.log(res);
                });
                
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
                $no = 1;
                data.forEach(function(x){
                    if(!x.seen){
                        style = "danger";
                    }else{
                        style = "";
                    }
                    
                    $data += `
                            <tr class="`+ style +`">
                                <td class="text-center">`+ $no +`</td>
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
                    
                    $no += 1;
                });
                
                $data += `
                        </tbody>
                    </table>
                </div>`;
                
                $("#data").html($data);
                $("table").dataTable()
            }
        };
    </script>
<?php
    break;
    
    case "view":
?>
        <div class="panel panel default">
            <div class="panel-heading">
                <span class="fa fa-eye"> All Inbox
                <a class="btn btn-primary" href="<?php echo PORTAL ?>marketing/email/webmail/all-email" >Back</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <?php 
                                    $data = Imap::getSumary(Input::get("id"));
                                    $body = Imap::getBody(Input::get("id"));
                                ?>
                                From : <?php echo $data->from; ?>
                            </div>
                            <div class="panel-body">
                                <pre>
                                <?php
                                    var_dump(Imap::getHeader(Input::get("id")))
                                ?>
                                </pre>
                                <div class="col-md-4">
                                    Subject: 
                                    <input class="form-control" type="text" value="<?php echo $data->subject; ?>">
                                </div>
                                <div class="col-md-4">
                                    Date: 
                                    <input class="form-control" type="text" value="<?php echo $data->date; ?>">
                                </div>
                                <div class="col-md-4">
                                    To: 
                                    <input class="form-control" type="text" value="<?php echo $data->to; ?>"><br />
                                </div>
                                <div class="col-md-12">
                                    Message:
                                    <textarea class="form-control summernote1" rows="20" value="<?php echo $data->body; ?>"><?php echo $body ?></textarea>
                                    <script>
                                        window.onload = function(){
                                            $('.summernote1').summernote({
                                                height: 500,
                                               
                                            })
                                        };
                                    </script>
                                </div>
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

