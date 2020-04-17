<!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="column">
        <?php
            $t = url::get(0);
            $x = url::get(1);
            $y = menus::getBy(["m_url" => $t]);
            if(count($y) > 0){
                $y= $y[0];
        ?>
                <h1><?= $y->m_name?></h1>
        
        </div>
        <div class="column">
            <?php
                if(!empty($x)){
                        ?>
                        <ul class="breadcrumbs">
                            <li>
                                <a href="<?= PORTAL_PUBLIC ?>">Home</a>
                            </li>
                            <li class="separator">&nbsp;</li>
                            <li><a href="<?= PORTAL_CUSTOMER ?><?= $y->m_url?>"><?= $y->m_name?></a></li>
                            <li class="separator">&nbsp;</li>
                            <li><?= $x?></li>
                        </ul>
                        <?php
                }else{
                    ?>
                    <ul class="breadcrumbs">
                        <li>
                            <a href="<?= PORTAL_PUBLIC ?>">Home</a>
                        </li>
                        <li class="separator">&nbsp;</li>
                        <li><?= $y->m_name?></li>
                    </ul>
                    <?php
                }
            ?>
        </div>
        <?php
            }
        ?>
    </div>
</div>