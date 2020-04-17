function Alert(type = "success", message = ""){
    toastr[type](message, "");
}
    
$(function() {
    $('.select2').select2({
        placeholder: 'Please select',
    });
    
    $('.data-table').dataTable();
    
    $(".submit-form").on("click", function(){
        $.post(
            PORTAL + $($(this).attr("data-form")).attr("action"),
            $($(this).attr("data-form")).serialize()
        ).done(function(res){
            if(res.status == "success"){
                toastr["success"](res.message, "Success!");
            }else{
                toastr["error"](res.message, "error!");
            }
        }).fail(function(res){
            Alert("success", "Something goes wrong with system API engine. Please try again or contact IT support team.");
        });
    });
    
    $('.single-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
          format: 'DD-MMM-YYYY'
        }
    });
    
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['parastyle', ['style']],
            ['fontstyle', ['fontname', 'fontsize']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video', 'table', 'hr']],
            ['history', ['undo', 'redo']],
            ['misc', ['codeview', 'fullscreen']],
            ['help', ['help']]
        ],
    });
    
    $(document).on("click", '.print-button', function(){
        var printContents = document.getElementById($(this).attr('data-div')).innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        
        window.print();
        
        document.body.innerHTML = originalContents;
    })
    
    
    
});
