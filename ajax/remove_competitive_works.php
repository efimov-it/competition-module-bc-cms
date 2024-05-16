<?php

// Удаление изображений конкурсной работы (до отправки самой работы)

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=windows-1251');

session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/coin/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/sys/db.php');



$upload_dir = CONF_ROOT . '/uploads/competitive_works/tmp/';

if ( !isset( $_POST['file_name'] ) ) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Field file_name needed.'
    ]);
    die();
}

$file_name = trim($_POST['file_name']);

if ( !$file_name ) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid file_name.'
    ]);
    die();
}

if ( !file_exists( $upload_dir . $file_name ) ) {
    echo json_encode([
        'status' => 'error',
        'message' => 'File ' . $file_name . ' doesn\'t exist.'
    ]);
    die();
}

if ( unlink( $upload_dir . $file_name ) ) {
    echo json_encode([
        'status' => 'success',
        'message' => 'File "' . $file_name . '" was removed.'
    ]);
}
else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Can\'t remove file "' . $file_name . '".'
    ]);
}

?>