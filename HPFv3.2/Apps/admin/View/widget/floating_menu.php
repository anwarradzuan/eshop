<style>
.float-btn{
   width: 50px;  
   height: 50px; 
   border-radius: 50%;
   position: fixed;
   opacity: 0.3;
}

.float-btn:hover{
   opacity: 1;
}


.float-bottom-right{
    bottom: 10px; 
    right: 10px;
}

.float-btn > span, .float-btn > i {
   color: white; 
   font-size: 2.25rem; 
   position: absolute; 
   top: 50%; 
   left: 50%; 
   transform: translate(-50%, -50%);
}

.float-menu{
    position: fixed; 
    height: auto; 
    width: 50px;
    text-align: center;
    display: none;
}

.float-menu > a, .float-menu > button{
    margin-bottom: 10px;
}

.float-menu-bottom-right{
    bottom: 70px; 
    right: 10px;
}
</style>
<div class="float-menu float-menu-bottom-right" id="bottom-menu">
    <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Hooray!">
        <span class="fa fa-power-off"></span>
    </a>
    
    <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Hooray!">
        <span class="fa fa-power-off"></span>
    </a>
</div>
<button class="btn btn-primary float-btn float-bottom-right" data-menu="#bottom-menu">
    <span class="fa fa-bars"></span>
</button>
<script>
window.onload = function(){
    $(".float-btn").on("click", function(){
        $($(this).attr("data-menu")).toggle();
    });
}
</script>