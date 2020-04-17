<?php
header("Content-Type: text/xml");
$a = "asdasd";
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
foreach(menus::{"list"}() as $m){
?>
	<url>
		<loc><?= PORTAL ?><?= $m->m_url ?></loc>
		<lastmod><?= date("Y-m-d") ?></lastmod>
		<changefreq>daily</changefreq>
		<priority>0.8</priority>
	</url>
<?php
}

foreach(items::{"list"}() as $itm){
?>
	<url>
		<loc><?= PORTAL ?>categories/view_item/<?= $itm->i_key ?>/<?= F::URLSlugEncode($itm->i_name) ?></loc>
		<lastmod><?= date("Y-m-d") ?></lastmod>
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
	</url>
<?php
}
?>
</urlset>