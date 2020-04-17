<div class="offcanvas-container" id="shop-categories">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title">Shop Categories</h3>
  </div>
  <nav class="offcanvas-menu">
    <ul class="menu">
	<?php
		foreach(category::list() as $c){
			?>
			<li class=""><span><a href="<?= PORTAL ?>shop/<?= $c->c_key ?>"><?= $c->c_name?></a><span class="sub-menu-toggle"></span></span>
			</li>
			<?php
		}
	?>
    </ul>
  </nav>
</div>