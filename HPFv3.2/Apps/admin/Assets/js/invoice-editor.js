
window.onload = function(){
    $editor = $("#editor");
    $company_id = $("#company").val();
    $company = null;
    
    function getCompany(){
        $.ajax({
            method: "POST",
            url: PORTAL + "api/system/information",
            data:{
                _token: "{_token}",
                token: "{token}",
                action: "{action}",
                company: $company_id
            },
            dataType: "json"
        }).done(function(res){
            if(res.status == "success"){
                $company = res.data;
                Alert("success", res.message);
            }else{
                Alert("error", res.message);
            }
        }).fail(function(res){
            Alert("error", "Sommething goes wrong with the API engine. Please contact your IT supoort team.");
        });
    }
    
    getCompany();
    
    $("#company").on("change", function(){
        getCompany();
    });
    
    $no = 1;
    $(document).on("click", ".invoice-item", function(){
        
        if($company === null){
            Alert("error", "Please select a correct company detail");
        }else{
            $type = $(this).attr("data-type");
            
            switch($type){
                case "Logo":
                    console.log("asdasdas");
                    $("#editor").append(`
                        <img 
                            class="img img-responsive editor-item" 
                            src="`+ PORTAL +`assets/medias/systems/`+ $company.i_invoiceLogo +`" 
                            style="width: 100px;" 
                            id="item-`+ $no +`"
                        />
                    `);
                break;
                
                case "Company Information":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`" style="width: 70%;">
                            <h3 class="mt-0 m-b-0">`+ $company.i_name +` <small>(`+ $company.i_regno +`)</small></h3>
                            `+ $company.i_address +`<br />
                            <strong>Phone:</strong> `+ $company.i_phone +` <br />
                            `+ $company.i_email +` <strong>|</strong> `+ $company.i_url +`
                        </div>
                    `);
                break;
                
                case "Client Information":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`" style="width: auto;">
                            <strong>Bill To:</strong><br />
                            #Client Company or #Client Name,<br />
                            #Client Address<br />
                            #Client Email<br />
                            #Client Phone
                        </div>
                    `);
                break;
                
                case "Proforma Number":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <strong>Proforma No.: </strong> #Proforma Number
                        </div>
                    `);
                break;
                
                case "Invoice Number":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <strong>Invoice No.: </strong> #Invoice Number
                        </div>
                    `);
                break;
                
                case "Invoice Date":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <strong>Date: </strong> #Invoice Date
                        </div>
                    `);
                break;
                
                case "Invoice Reference":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <strong>Ref. No.: </strong> #Ref No
                        </div>
                    `);
                break;
                
                case "Terms and Condition":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <strong>Terms & Condition</strong><br />
                            #Terms & Condition
                        </div>
                    `);
                break;
                
                case "Note to Recepient":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <strong>Note to Recepient</strong><br />
                            #Note to Recepient
                        </div>
                    `);
                break;
                
                case "Line":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`" style="width: 90%;">
                            <hr />
                        </div>
                    `);
                break;
                
                case "Item List Table":
                    $("#editor").append(`
                        <div class="editor-item" data-table="yes" id="item-`+ $no +`" style="width: 90%;">
                            Item Listing Table
                        </div>
                    `);
                break;
                
                case "Total Table":
                    $("#editor").append(`
                        <div class="editor-item" data-table="yes" id="item-`+ $no +`" style="width: 45%;">
                            Total Table
                        </div>
                    `);
                break;
                
                case "Blank":
                    $("#editor").append(`
                        <div class="editor-item" data-blank="yes" id="item-`+ $no +`">
                            Blank Space
                        </div>
                    `);
                break;
                
                case "Document Title":
                    $("#editor").append(`
                        <div class="editor-item" id="item-`+ $no +`">
                            <h4 class="m-t-0">#Invoice</h4>
                        </div>
                    `);
                break;
            }
            Draggable.create(".editor-item", {type:"x,y", edgeResistance:0.65, bounds:"#editor", throwProps:true});
        }
        $no += 1;
    });
    
};

