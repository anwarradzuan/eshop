<?php
new Controller($_POST);
?>
<div class="panel">
    <div class="panel-heading">
        <span class="fa fa-power-off"></span> Logout
    </div>
    
    <div class="panel-body">
        <h3 class="mt-0">Logout confirmation</h3>
        
        <p>Please make sure all data has been saved before you proceed logout. Press below button to logout.</p>
        
        <form action="" method="POST">
            <?php Controller::form("logout") ?>
            <button class="btn btn-danger">
                <span class="fa fa-power-off"></span> Logout
            </button>
        </form>
    </div>
</div>