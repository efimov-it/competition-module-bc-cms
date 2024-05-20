<?php

// competitive_works
// Модуль для модерации конкурсных работ

require CONF_ROOT . '/admin/actions/competitive_works.php';

function show_block ( $module_sub )
{
	global $DB;

    global $err;
    global $mess;

    function formatPhoneNumber($number) {
        $pattern = '/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/';
        $replacement = '+7 ($2) $3-$4-$5';
        return preg_replace($pattern, $replacement, $number);
    }

    // Список конкурсов.
    // TODO: В идеале сделать конкурсы отдельным модулем, но пока так.
    $competition_list = array(
        0 => 'Путешествие в страну творчества Лео'
    );


    // Проверяем и создаём таблицу с работами, если её нет.
    $chek_table_query = $DB -> Query("SHOW TABLES LIKE '" . PREFIX . "_competitive_works'");
    if ( $DB -> NumRows ($chek_table_query) === 0 ) {
        $create_table_query = $DB -> Query (
            "CREATE TABLE " . PREFIX . "_competitive_works (
                            id_competitive_work INT(11) AUTO_INCREMENT PRIMARY KEY,
                            surname VARCHAR(50),
                            name VARCHAR(50),
                            email VARCHAR(50),
                            city VARCHAR(50),
                            phone_number VARCHAR(11),
                            shop_address VARCHAR(100),
                            has_accept BOOLEAN,
                            id_competition INT(11),
                            date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            date_accept TIMESTAMP,
                            reject_reason TEXT
                          )"
        );
        if ($create_table_query !== TRUE) {
            die("<div id=\"status1\"><b>Ошибка при создании таблицы: " . ($DB -> ErrNo()) ."</b></div>");
        }
    }
    

    // Удаляем временные файлы, загруженный больше 24 часов назад
    $temp_images = CONF_ROOT . "/uploads/competitive_works/tmp/";
    $temp_images = array_diff(scandir($temp_images), ['.', '..']);
    foreach ($temp_images as $image) {
        if ( strpos( $image, '.jpg' ) !== FALSE ) {
            $timestamp = substr($image, 0, strpos($image, '_'));

            if ($timestamp < time() - 24 * 60 * 60) {
                unlink( CONF_ROOT . "/uploads/competitive_works/tmp/" . $image );
            }
        }
    }

    // Код чисто для разработки
    if (isset($_GET['dev'])) {
        // array_map('unlink', glob(CONF_ROOT . "/uploads/competitive_works/0_24_1715957078/*.*"));
        // rmdir(CONF_ROOT . '/uploads/competitive_works/0_24_1715957078');
        // $DB -> Query("DELETE FROM ". PREFIX . "_competitive_works WHERE id_competitive_work = 13");
    }
    
	if( isset( $_GET["id"] ) ) $id = $_GET["id"];
    else $id = NULL;

	// Список конкурсных работ
    if ( $module_sub === 'list' || $module_sub == 1)
	{
        $list = $DB -> Query(
            "SELECT * FROM " . PREFIX . "_competitive_works
             WHERE has_accept = 1 OR has_accept IS NULL");

        $list_new = array();
        $list_accepted = array();

        while ( $item = $DB -> GetRow($list) ) {
            if ($item[7] == 1) {
                $list_accepted[] = $item;
            }
            else {
                $list_new[] = $item;
            }
        }
?>

<style>
div.success {
    margin-top: 12px;
    width: 712px !important;
    background: #d9f5d9 !important;
    border-color: #93e09b !important;
}
.c2.new, .c2_5.new {
    background: #d9ebf5;
    border-color: #93ade0;
}
.c2.accepted, .c2_5.accepted {
    background: #d9f5d9;
    border-color: #93e09b;
}
</style>

<div id="block">
    <h2>Конкурсные работы</h2>
    
    <div class="line"></div>

    <?php
    if ($mess) {
    ?>
    <div id="status1" class="success"><?=$mess?></div>
    <?php
    }
    ?>

    <p>
        Ниже представлен список новых конкурсных работ, а также работ, которые были приняты.<br>
        Чтобы проверить работу, нажмите на иконку карандаша в списке с новыми работами.
    </p>

    <table width="732" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="c1">ID</td>
            <td class="c1_2">Название конкурса</td>
            <td class="c1_2">Конкурсант</td>
            <td class="c1_4">Город</td>
            <td class="c1_4">Дата подачи</td>
            <td class="c1_5"></td>
        </tr>
    <?php
    if ( count( $list_new ) > 0 ) {
    ?>
        <tr>
            <td class="c2 new" colspan="5">Новые работы</td>
            <td class="c2_5 new"></td>
        </tr>
    <?php
        foreach( $list_new as $item ) {
            $competition_name = '';
            if (isset($competition_list[$item[8]])) $competition_name = $competition_list[$item[8]];
    ?>
        <tr>
            <td class="c3" valign="top"><?=$item[0]?></td>
            <td class="c3_2" valign="top"><?=$competition_name?></td>
            <td class="c3_2" valign="top">
                <b><?=$item[2] . ' ' . $item[1]?></b><br>
                <?=$item[3]?><br>
                <?=formatPhoneNumber($item[5])?>
            </td>
            <td class="c3_4" valign="top"><?=$item[4]?></td>
            <td class="c3_4" valign="top">
                <?=date('H:i:s', (strtotime($item[9])))?><br>
                <?=date('d.m.Y', (strtotime($item[9])))?>
            </td>
            <td class="c3_5" valign="top">
                <a href="admin.php?bl=competitive_works&ms=item&id=<?=$item[0]?>" class="btns" title="Открыть конкурсную работу">
                    <img src="admin/images/edit.gif" alt=""/>
                </a>
            </td>
        </tr>
    <?php
        }
    }
    
    if ( count( $list_accepted ) > 0 ) {
    ?>
        <tr>
            <td class="c2 accepted" colspan="5">Принятые работы</td>
            <td class="c2_5 accepted"></td>
        </tr>
    <?php
        foreach( $list_accepted as $item ) {
            $competition_name = '';
            if (isset($competition_list[$item[8]])) $competition_name = $competition_list[$item[8]];
    ?>
        <tr>
            <td class="c3" valign="top"><?=$item[0]?></td>
            <td class="c3_2" valign="top"><?=$competition_name?></td>
            <td class="c3_2" valign="top">
                <b><?=$item[2] . ' ' . $item[1]?></b><br>
                <?=$item[3]?><br>
                <?=formatPhoneNumber($item[5])?>
            </td>
            <td class="c3_4" valign="top"><?=$item[4]?></td>
            <td class="c3_4" valign="top">
                <?=date('H:i:s', (strtotime($item[9])))?><br>
                <?=date('d.m.Y', (strtotime($item[9])))?>
            </td>
            <td class="c3_5" valign="top">
                <a href="admin.php?bl=competitive_works&ms=item&id=<?=$item[0]?>" class="btns" title="Открыть конкурсную работу">
                    <img src="admin/images/edit.gif" alt=""/>
                </a>
            </td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</div>

<?php
    }
    // Страница конкурсной работы
    elseif ( $module_sub === 'item' || $module_sub === 2 ) {
        if ( $id === NULL ) die("<div id=\"status1\"><b>Ошибка #1</b></div>");

        $get_item_query = $DB -> Query ("
            SELECT * FROM ".PREFIX."_competitive_works
            WHERE id_competitive_work = $id
        ");

        if ( !$id ) {
            die("<div id=\"status1\"><b>Ошибка #2</b></div>");
        }

        $item = $DB -> GetRow( $get_item_query );

        //                                        id_competition  id_competitive_work   date_created (Unix)
        $images_url = '/uploads/competitive_works/' . $item[8] . '_' . $item[0] . '_' . strtotime($item[9]);
        $images_dir = CONF_ROOT . $images_url;

        $images = array();
        $additional_images = array();

        if ( is_dir($images_dir) ) {
            $i = 0;
            while (file_exists($images_dir . '/img_' . $i . '.jpg')) {
                $images[] = $images_url . '/img_'. $i . '.jpg';
                $i++;
            }
            $i = 0;
            while (file_exists($images_dir . '/additional_img_' . $i . '.jpg')) {
                $additional_images[] = $images_url . '/additional_img_'. $i . '.jpg';
                $i++;
            }
        }
        
        $competition_name = '';
        if (isset($competition_list[$item[8]])) $competition_name = $competition_list[$item[8]];

        // Примеры названия файлов
        // /uploads/competitive_works/0_12_7874947784/img_1.jpg
        // /uploads/competitive_works/0_12_7874947784/additional_img_1.jpg
?>

<style>
    a.back-link {
        color: #000;
    }
    div.error {
        margin-top: 12px;
        width: 712px !important;
    }
    h3.section-title {
        font-size: 16px;
        margin: 16px 0px 4px;
    }
    p.section-content {
        margin-bottom: 24px;
    }

    div.section {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 24px;
    }
    div.section a {
        text-decoration: none;
    }
    div.section img {
        vertical-align: bottom;
        border: 1px #cccccc solid;
        width: 120px;
        height: 120px;
        object-fit: cover;
    }
    form {
        width: max-content;
        display: flex;
        flex-direction: column;
        border: 1px #cccccc solid;
        padding: 8px;
        gap: 8px;
        margin-bottom: 24px;
    }
    form input {
        border: 1px #cccccc solid;
    }
    textarea {
        border: 1px #cccccc solid;
        min-width: 284px;
        max-width: 284px;
        min-height: 80px;
        padding: 4px 8px;
        font-family: sans-serif;
    }
    button.accept {
        width: 300px;
        height: 40px;
        background: #d9f5d9;
        border-color: #93e09b;
        border-style: solid;
        cursor: pointer;
    }
    button.reject {
        width: 300px;
        height: 40px;
        border-style: solid;
        cursor: pointer;
        background: #f5d9d9;
        border-color: #e09393;
    }
</style>

<div id="block">
    <h2>Конкурсная работа (ID:<?=$item[0]?>)<?= $item[7] == 1 ? ' [Принята]' : ''?></h2>
    <p class="">«<?=$competition_name?>»</p>
    <a class="back-link" href="/admin.php?bl=competitive_works">&#9668; Назад к списку</a>

    <div class="line"></div>

    <?php
    if ($err) {
    ?>
    <div id="status1" class="error"><b>Ошибка:</b> <?=$err?></div>
    <?php
    }
    ?>
    
    <h3 class="section-title">Конкурсант</h3>
    <p class="section-content">
        <b><?=$item[2] . ' ' . $item[1]?></b><br>
        <?=$item[3]?><br>
        <?=formatPhoneNumber($item[5])?><br>
        <br>
        <b>Отправил работу:</b><br>
        <?=date('H:i:s', (strtotime($item[9])))?><br>
        <?=date('d.m.Y', (strtotime($item[9])))?>
    </p>
    
    <h3 class="section-title">Адрес (магазина)</h3>
    <p class="section-content">
        <b><?=$item[4]?></b><br>
        <?=$item[6]?>
    </p>
    
    <h3 class="section-title">Основные фото</h3>
    <div class="section">
    <?php
        if ( count($images) > 0 ) {
            foreach ($images as $image) {
    ?>
        <a href="<?=$image?>" target="_blank">
            <img src="<?=$image?>" alt="" width="120" height="120">
        </a>
    <?php
            }
        }
        else {
    ?>
        <p>Фото отсутствуют...</p>
    <?php
        }
    ?>
    </div>
    
    <h3 class="section-title">Дополнительные фото</h3>
    <div class="section">
    <?php
        if ( count($additional_images) > 0 ) {
            foreach ($additional_images as $image) {
    ?>
        <a href="<?=$image?>" target="_blank">
            <img src="<?=$image?>" alt="" width="120" height="120">
        </a>
    <?php
            }
        }
        else {
    ?>
        <p>Фото отсутствуют...</p>
    <?php
        }
    ?>
    </div>

    <?php
        if ($item[7] == NULL) {

            $a = rand(1, 5);
            $b = rand(1, 5);
    ?>
    
    <h3 class="section-title">Решение по конкурсной работе</h3>
    
    <form action="/admin.php?bl=competitive_works&ms=1&act=accept&id=<?=$item[0]?>" method="post">
        <p>
            <?= $a . ' + ' . $b . ' = '?>
            <input type="hidden" name="check" value="<?=$a+$b?>">
            <input type="number" name="input_check" placeholder="Напишите ответ" required>
        </p>
        <button class="accept" type="submit">
            Принять работу
        </button>
    </form>
    
    <p class="section-content">
        или
    </p>

    <form action="/admin.php?bl=competitive_works&ms=1&act=reject&id=<?=$item[0]?>" method="post">
        <textarea name="reason" placeholder="Опишите причину отклонения работы" required></textarea>
        <button class="reject" type="submit">
            Отклонить работу
        </button>
    </form>

    <?php
        }
        else {
    ?>
    <p class="section-content">
        Работа принята <?=date('d.m.Y', (strtotime($item[10])))?> в <?=date('H:i:s', (strtotime($item[10])))?>
    </p>
    <?php
        }
    ?>
</div>
<?php
    }
}