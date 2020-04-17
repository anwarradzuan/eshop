

<div class="panel">
    <div class="panel-heading">
        <span class="fa fa-dashboard"></span>
        
        Manage Themes
    </div>
    
    <div class="panel-body">
        <div class="row">
        <?php
            foreach(Setting::$themes as $key => $value){
        ?>
            <div class="col-md-3 col-lg-2">
                <div class="panel">
                    <div class="panel-heading">
                        <?= $key + 1 ?>. <?= $value ?>
                        <br />
                    <?php
                        if($value == UserSetting::getTheme()){
                    ?>
                        <button class="btn btn-primary">
                            Selected
                        </button>
                    <?php
                        }else{
                    ?>
                        <button class="btn btn-danger select-theme" data-value="<?= $value ?>">
                            Select
                        </button>
                    <?php
                        }
                    ?>
                    </div>
                    <img  style="" class="panel-img" alt="<?= $value ?>" style="width: 100%; display: block;" src="<?= PORTAL ?>assets/demo/themes/<?= $value ?>.png" data-holder-rendered="true" />
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
</div>
<?php
$_token = F::Encrypt(F::UniqKey("theme"));
$token = Token::create($_token, "_theme");
?>
<script>
window.onload = function(){
    $(".select-theme").on("click", function(){
        $.ajax({
            method: "POST",
            url: "<?= PORTAL ?>api/system/theme",
            data:{
                _token: "<?= $_token ?>",
                token: "<?= $token ?>",
                action: "<?= F::Encrypt($_token . "select-theme") ?>",
                theme: $(this).attr("data-value")
            },
            dataType: "text"
        })
        .done(function(res){
            window.location = window.location;
        });
    });
}   
</script>

































