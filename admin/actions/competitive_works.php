<?php

// competitive_works

$mail_template = "";

ob_start();

?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>###TITLE###</title>
</head>

<body style="padding:0; margin:0;">
    <p style="display:none;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
        ###SHORT_TEXT###
    </p>
    <table style="width: 100%;padding-top: 32px;" bgcolor="#ececec">
        <tr>
            <td align="center">
                <table width="560" callpadding="0" cellspacing="0" bprder="0" bgcolor="#ffffff"
                    style="border-radius: 8px;">
                    <tr>
                        <td style="padding: 0px;">
                            <table width="560" height="111" callpadding="0" cellspacing="0" bprder="0"
                                style="padding-top: 40px;padding-right: 30px;padding-bottom: 40px;padding-left: 30px;">
                                <tr>
                                    <td style="padding: 0px;">
                                        <a href="https://leo-shkolasad.ru/" target="_blank">
                                            <img src="data:image/jpeg;base64,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"
                                                width="100" height="92" alt="Лео. Товары для детского творчества."
                                                style="outline:none; border:none;">
                                        </a>
                                    </td>
                                    <td style="padding: 0px;" valign="center" align="right">
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left"
                            style="padding-top: 46px;padding-bottom: 24px;padding-right:30px;padding-left:30px;">
                            <span style="font-family: sans-serif;font-size: 24px; color: #424242;line-height: 22px;">
                                ###TITLE###
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-left: 30px;padding-right: 30px; padding-bottom: 24px;">
                            <p
                                style="font-family: sans-serif;color: #424242;font-size: 14px; text-align:left;line-height: 19px; margin-top: 0; margin-bottom: 0;padding-bottom: 10px;">
                                ###TEXT###
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <!-- соцсети -->
                        <td style="padding-bottom: 32px;padding-left: 30px;padding-top: 24px;padding-right: 30px;"
                            align="center">
                            <a href="https://vk.com/leo.risuet" target="_blank" style="text-decoration: none;">
                                <img src="https://leonardo.ru/subscribe/images/social/new/vk.png"
                                    style="padding-right: 16px;" width="24px" height="24px" alt="">
                            </a>
                            <a href="https://www.youtube.com/channel/UCYzWw6Rxs6elauiagBLgvug" target="_blank"
                                style="text-decoration: none;">
                                <img src="https://leonardo.ru/subscribe/images/social/new/youtube_new.png"
                                    style="padding-right: 16px;" width="24px" height="24px" alt="">
                            </a>
                            <a href="https://www.tiktok.com/@leo.risuet" target="_blank"
                                style="text-decoration: none;">
                                <img src="https://leonardo.ru/subscribe/images/social/new/tiktok_new.png"
                                    style="padding-right: 16px;" width="24px" height="24px" alt="">
                            </a>
                            <a href="https://t.me/leorisuet" target="_blank"
                                style="text-decoration: none;">
                                <img src="https://leonardo.ru/subscribe/images/social/new/tg.png" width="24px"
                                    height="24px" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right: 30px; padding-left: 30px;">
                            <p style="padding: 0px;border-bottom: 1px solid #e8e8e8;"></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; padding-right: 30px;padding-top: 24px;padding-bottom: 32px;">
                            <table width="500" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding-right: 24px;">
                                        <a href="https://leo-shkolasad.ru/catalog/" target="_blank"
                                            style="font-size: 12px;line-height: 12px;color: #8b8b8b;text-decoration: none;font-family: sans-serif;">Каталог</a>
                                    </td>
                                    <td style="padding-right: 24px;">
                                        <a href="https://leo-shkolasad.ru/about/" target="_blank"
                                            style="font-size: 12px;line-height: 12px;color: #8b8b8b;text-decoration: none;font-family: sans-serif;">О&nbsp;бренде</a>
                                    </td>
                                    <td>
                                        <a href="https://leo-shkolasad.ru/contacts/" target="_blank"
                                            style="font-size: 12px;line-height: 12px;color: #8b8b8b;text-decoration: none;font-family: sans-serif;">Контакты</a>
                                    </td>
                                    <td style="width: 100%;" align="right">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</html>

<?php
$mail_template = ob_get_clean();


if ( $act === 'accept' ) {
    if (!isset($_POST['check']) || !isset($_POST['input_check'])) {
		$err = 'Не указано решение примера.';
		$module_sub = 2;
    }
    else {
        if ($_POST['check'] != $_POST['input_check']) {
            $err = 'Пример решён неверно.';
            $module_sub = 2;
        }
        else {
            $get_item_query = $DB -> Query("
                SELECT * FROM ".PREFIX."_competitive_works
                WHERE id_competitive_work = $id AND has_accept IS NULL
            ");

            if ( !$get_item_query ) {
                $err = 'Такой работы нет или по ней уже было выбрано решение.';
                $module_sub = 1;
            }
            else {

                $item = $DB -> GetRow($get_item_query);

                $query = $DB -> Query ("
                    UPDATE ".PREFIX."_competitive_works
                    SET has_accept = 1, date_accept = '".(date('Y-m-d H:i:s', time()))."'
                    WHERE id_competitive_work = $id
                ");

                if ($query) {
                    $subject = "$item[2], ваша заявка на конкурс от ТМ Лео прошла модерацию!";
                    $message = str_replace("###SHORT_TEXT###", "$item[2], ваша заявка на конкурс от ТМ Лео принята!", $mail_template);
                    $message = str_replace("###TITLE###", "Ваша заявка на конкурс от ТМ Лео принята!", $message);
                    $message = str_replace("###TEXT###", "
                        Здравствуйте, $item[2],<br>
                        <br>
                        Благодарим вас за участие в <a href='https://leo-shkolasad.ru/konkurs/strana-tvorchestva-leo/' target='_blank'>нашем конкурсе</a>!<br>
                        <br>
                        Мы ценим ваше участие и ждем с нетерпением объявления результатов.<br>
                        <br>
                        С наилучшими пожеланиями,<br>
                        ТМ Лео
                    ", $message);
                    
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=windows-1251" . "\r\n";
                    $headers .= 'From: no-reply@leo-shkolasad.ru' . "\r\n";
                    
                    if(mail($item[3], $subject, $message, $headers)){
                        $mess = 'Работа принята!';
                    } else{
                        $err = "Работа принята, но не удалось отправить письмо конкурсанту.";
                    }
                    
                }
                else {
                    $err = 'Не удалось принять работу. Повторите попытку позже.';
                    $module_sub = 2;
                }
            }
        }
    }
}
elseif ( $act === 'reject') {
    if (!isset($_POST['reason'])) {
		$err = 'Не указана причина отказа.1';
		$module_sub = 2;
    }
    else {
        if (mb_strlen(trim($_POST['reason'])) === 0) {
            $err = 'Не указана причина отказа.2';
            $module_sub = 2;
        }
        else {
            $get_item_query = $DB -> Query("
                SELECT * FROM ".PREFIX."_competitive_works
                WHERE id_competitive_work = $id AND has_accept IS NULL
            ");

            if ( !$get_item_query ) {
                $err = 'Такой работы нет или по ней уже было выбрано решение.';
                $module_sub = 1;
            }
            else {

                $item = $DB -> GetRow($get_item_query);

                $text = mysqli_real_escape_string($DB -> mysqllink, trim($_POST['reason']));

                $query = $DB -> Query ("
                    UPDATE ".PREFIX."_competitive_works
                    SET has_accept = 0, date_accept = '".(date('Y-m-d H:i:s', time()))."', reject_reason = '".$text."'
                    WHERE id_competitive_work = $id
                ");

                if ($query) {
                    $subject = "$item[2], ваша заявка на конкурс от ТМ Лео прошла модерацию!";
                    $message = str_replace("###SHORT_TEXT###", "$item[2], ваша заявка на конкурс от ТМ Лео прошла модерацию!", $mail_template);
                    $message = str_replace("###TITLE###", "Участие в конкурсе от ТМ Лео", $message);
                    $message = str_replace("###TEXT###", "
                        Здравствуйте, $item[2],<br>
                        <br>
                        Спасибо вам за участие в <a href='https://leo-shkolasad.ru/konkurs/strana-tvorchestva-leo/' target='_blank'>нашем конкурсе</a> и за предоставленную работу.<br>
                        <br>
                        К сожалению, мы вынуждены сообщить вам, что ваша работа не может быть принята.<br>
                        <br>
                        Причина отклонения вашей работы:<br>
                        $text<br>
                        <br>
                        Благодарим вас за участие и надеемся на ваше понимание.<br>
                        <br>
                        С наилучшими пожеланиями,<br>
                        <br>
                        ТМ Лео
                    ", $message);
                    
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=windows-1251" . "\r\n";
                    $headers .= 'From: no-reply@leo-shkolasad.ru' . "\r\n";
                    
                    if(mail($item[3], $subject, $message, $headers)){
                        $mess = 'Работа отклонена!';
                    } else{
                        $err = "Работа отклонена, но не удалось отправить письмо конкурсанту.";
                    }
                    
                }
                else {
                    $err = 'Не удалось отклонить работу. Повторите попытку позже.';
                    $module_sub = 2;
                }
            }
        }
    }
}