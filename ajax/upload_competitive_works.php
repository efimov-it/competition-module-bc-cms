<?php

// «агрузка изображений конкурсной работы

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=windows-1251');

session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/coin/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/sys/db.php');



$timestamp = time();

$upload_dir = CONF_ROOT . '/uploads/competitive_works/tmp/';

if (!$_FILES['image']['tmp_name']) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Field image needed.'
    ]);
    die();
}

$image;

if ($_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpeg') {
    $image = $_FILES['image']['tmp_name'];
}
else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid image was uploaded.'
    ]);
    die();
}

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$img_index = 0;
$image_path = $upload_dir . $timestamp . "_0.jpg";
$tmp_file_name = $timestamp . "_0.jpg";

while ( file_exists ( $image_path ) ) {
    $img_index ++;
    $image_path = $upload_dir . $timestamp . "_$img_index.jpg";
    $tmp_file_name = $timestamp . "_$img_index.jpg";
}

$img = imagecreatefromstring(file_get_contents($image));

$width = imagesx($img);
$height = imagesy($img);

$max_size = 1600;

if ($width > $max_size || $height > $max_size) {
    if ($width > $height) {
        $new_width = $max_size;
        $new_height = floor($height * ($max_size / $width));
    } else {
        $new_width = floor($width * ($max_size / $height));
        $new_height = $max_size;
    }

    $new_img = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    imagedestroy($img);
    $img = $new_img;
}

imagejpeg($img, $image_path, 80);
chmod($image_path, 0777);

imagedestroy($img);

echo json_encode([
    'status' => 'success',
    'file_name' => $tmp_file_name
]);

?>