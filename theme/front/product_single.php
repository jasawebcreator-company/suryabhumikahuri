<?php
$single_cat_id = (string) ($data->cat_data->id ?? '');
$single_tags = strtolower((string) ($data->result->tags ?? ''));
$single_files = [
    '8520' => 'single/product.php',
    '8522' => 'single/service.php',
    '8523' => 'single/project.php',
];

if (isset($single_files[$single_cat_id])) {
    $single_file = $single_files[$single_cat_id];
} elseif (strpos($single_tags, 'service') !== false || strpos($single_tags, 'layanan') !== false) {
    $single_file = 'single/service.php';
} else {
    $single_file = 'single/project.php';
}

include $single_file;