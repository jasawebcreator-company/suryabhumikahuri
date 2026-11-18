 <?php
$title = $item->setting->title;
$subtitle = $item->setting->subtitle;
$subtitle_2 = $item->setting->subtitle2;
$grid = $item->setting->grid;
$route = ROUTE_PRODUCT_VIEW;
?>



<?php if ($grid == '1'): ?>
	<?php include "wrapper/products.php" ?>
<?php endif ?>

<?php if ($grid == '2'): ?>
	<?php include "wrapper/services.php" ?>
<?php endif ?>

<?php if ($grid == '3'): ?>
	<?php include "wrapper/projects.php" ?>
<?php endif ?>