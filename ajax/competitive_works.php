<?php

// Загрузка конкурсной работы

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=windows-1251');

session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/coin/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/sys/db.php');

function validate_field ($field,  $method = 'POST', $reg = null) {
    global $DB;

    $value = null;

    if ( $method === 'POST' ) {
        if (isset($_POST[$field])) {
            $value = trim($_POST[$field]);
        }
        else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Field ' . $field . ' needed.'
            ]);
            die();
        }
    }

    if ( $method === 'GET' ) {
        if (isset($_GET[$field])) {
            $value = trim($_GET[$field]);
        }
        else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Field ' . $field . ' needed.'
            ]);
            die();
        }
    }

    if ( $reg ) {
        if ( $field === 'email' ) {
            if ( !filter_var( $value, FILTER_VALIDATE_EMAIL) ) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid field: ' . $field . '.'
                ]);
                die();
            }
        }
        if (!preg_match($reg, $value)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid field: ' . $field . '.'
            ]);
            die();
        }
    }
    return iconv('utf-8', 'windows-1251', mysqli_real_escape_string($DB -> mysqllink, trim($value)));
}

$fields = [
    'id_competition' => iconv('windows-1251', 'utf-8', '/^[0-9]{1,}$/') . 'u',
    'name'           => iconv('windows-1251', 'utf-8', '/^[А-Яа-яЁё\s\-]{2,50}$/') . 'u',
    'surname'        => iconv('windows-1251', 'utf-8', '/^[А-Яа-яЁё\s\-]{2,50}$/') . 'u',
    'email'          => iconv('windows-1251', 'utf-8', '/^.{3,50}$/') . 'u',
    'city'           => iconv('windows-1251', 'utf-8', '/^[А-Яа-яЁё\s\-]{2,50}$/') . 'u',
    'phone_number'   => iconv('windows-1251', 'utf-8', '/^[0-9]{11}$/') . 'u',
    'shop_address'   => iconv('windows-1251', 'utf-8', '/^[0-9А-Яа-яЁё\s\-\,\.\"\\\']{2,100}$/') . 'u'
];

foreach ($fields as $field_name => $reg) {
    $fields[$field_name] = validate_field($field_name, 'POST', $reg);
}

$upload_dir = CONF_ROOT . '/uploads/competitive_works/';


// Images validation

if ( !isset( $_POST['images'] ) ) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Field images needed.'
    ]);
    die();
}

$images = explode( ',', trim( $_POST['images'] ) );

foreach ($images as $image) {
    if ( !file_exists( $upload_dir . 'tmp/' . $image ) ) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Image doesn\'t exist.',
            'file_name' => $image
        ]);
        die();
    }
}


// Additional images validation

if ( !isset( $_POST['additional_images'] ) ) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Field additional_images needed.'
    ]);
    die();
}

$additional_images = explode( ',', trim( $_POST['additional_images'] ) );

foreach ($additional_images as $image) {
    if ( !file_exists( $upload_dir . 'tmp/' . $image ) ) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Additional image doesn\'t exist.',
            'file_name' => $image
        ]);
        die();
    }
}

$DB -> Query(
    "
        INSERT INTO ".PREFIX."_competitive_works (surname, name, email, city, phone_number, shop_address, has_accept, id_competition, date_created)
        VALUES ('" . $fields['surname'] . "', '" . $fields['name'] . "', '" . $fields['email'] . "', '" . $fields['city'] . "', '" . $fields['phone_number'] . "', '" . $fields['shop_address'] . "', NULL, " . $fields['id_competition'] . ", NOW())
    "
);

$id_competitive_work = $DB -> InsertId();
$timestamp = time();

$competition_dir = $upload_dir . $fields['id_competition'] . '_' . $id_competitive_work . '_' . $timestamp . '/';

if (!is_dir($competition_dir)) {
    mkdir($competition_dir, 0777, true);
}

foreach ($images as $i => $image) {
    rename($upload_dir . 'tmp/' . $image, $competition_dir . 'img_' . $i . '.jpg');
}
foreach ($additional_images as $i => $image) {
    rename($upload_dir . 'tmp/' . $image, $competition_dir . 'additional_img_' . $i . '.jpg');
}

echo json_encode([
    'status' => 'success'
]);

?>