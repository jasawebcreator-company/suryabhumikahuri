<?php 
$types = array('default','boxed','side_header');
$side = 'left';
$logo = 'true';
$selected = 'default'; ?>

<!DOCTYPE html>
<html lang="id" class="
<?php if($types[1] == $selected){
	echo 'boxed';
	}elseif($types[2] == $selected){
		if($side == 'right'){
			echo 'side-header side-header-right';

			}else{
				echo 'side-header';
			}
			}else{

			}
			?>
			">
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
			<?= $func->redirectToHTTPS() ?>  

			<?= $func->favicon() ?>

			<title><?= $func->title_bar() ?></title>

			<?php if ($data->site_position == 'home'): ?>
				<meta name="description" content="<?= $data->web->site_desc ?>">
				<meta name="keywords" content="<?= $data->web->site_keyword ?>">
				<meta name="title" content="<?= $data->web->site_name ?>">
			<?php elseif ($data->site_position == 'view_blog'): ?>
				<meta name="description" content="<?= $data->result->seo_content ?>">
				<meta name="keywords" content="<?= $data->result->seo_keyword ?>">
				<meta name="title" content="<?= $data->result->seo_title ?>">
			<?php endif ?>

			<?= $func->meta_tag() ?>

			<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


			<link href="<?= base_url('assets') ?>/front/vendor/rs-plugin/css/settings.css" type="text/css" rel="stylesheet">
			<link href="<?= base_url('assets') ?>/front/vendor/rs-plugin/css/navigation.css" type="text/css" rel="stylesheet">


			<?php include "functions.php" ?>
			<?php include "header_metadata.php" ?>
			<?php include "format_style.php" ?>
			
			<?= $func->xview_header() ?>
	</head>
<body>
	<div class="body">
		<?php include "header_component.php" ?>
		<div role="main" class="main" style="background: var(--color5);">
