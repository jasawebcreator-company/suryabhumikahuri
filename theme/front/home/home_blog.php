<?php 
$title = $item->setting->title;
$subtitle = $item->setting->subtitle;
$subtitle_2 = $item->setting->subtitle2;
$grid = $item->setting->grid;
$route = ROUTE_BLOG_VIEW; ?>

<?php if ($grid == '1'): ?>
	<?php include "wrapper/blogs.php" ?>
<?php endif ?>