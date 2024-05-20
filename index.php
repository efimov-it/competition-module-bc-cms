<?
//Вывод ошибок на экран
header('Content-Type: text/html; charset=windows-1251');
if (defined('CONF_ERROR'))
{
	//ini_set('display_errors','On');
	//error_reporting(E_ALL);
}
//ini_set('display_errors','On');
//	error_reporting(E_ALL);
//Подключение основного конфига
require_once $_SERVER['DOCUMENT_ROOT'].'/coin/config.php';
//Подключение скрипта базы данных
require_once CONF_ROOT.'/sys/db.php';
//Подключение общеиспользуемых функций
require_once CONF_ROOT.'/includes/functions.php';
//Memcache
require_once(CONF_ROOT.'/includes/memcache.php');

require_once CONF_ROOT.'/includes/lessc.inc.php';
//Последущий код time-дебага
//time_debug('Init');

//geolocate.php
$_city=Array(3,'moskow','Москва',52,'Москва',7700000000000);

//TODO Разобраться, нужна ли нам вобще сессия. Для тех, кто еще не положил товар в корзину
//сессию включать не надо.
//if (isset($_COOKIE['PHPSESSID']))
//{
	//session_start();
	//session_set_cookie_params(60*60*24*1);//Время сессии - 3 дня
//}
	



//Начало парсинга урл
$superpath=@$_GET['superpath'];
$z=explode("/",$superpath);
//var_dump($z);
//TODO Отсеиваем пустые элементы. Правильно сделать редирект на УРЛ без этих элементов
$elements=count($z);
$path_id=NULL;
$path_name=NULL;
$path_deep=0;
$i=0;
$stopit=0;
$parent=0;
//Поиск страницы по урлу, составление "хлебных крошек"

	if ($z[$i]=='arrive' || $z[$i]=='forum') {
		redir301('//'.MAIN_DOMEN.'/');
	}
	if ($z[$i]=='files') {
	    redir301('https://art-box.leo-kids.net'.$_SERVER ['REQUEST_URI'].'');
	}
	while(($i<$elements)&&($stopit==0))
	{
		$r=$DB->Query("select id,name,alias from ".PREFIX."_index where parent=$parent and alias=\"$z[$i]\"");
		if (($r)&&($s=$DB->GetRow($r)))
		{
			$path_deep++;
			$path_id[$path_deep]=$s[0];
			$path_name[$path_deep]=$s[1];
			$path_alias[$path_deep]=$s[2];
			$parent=$s[0];
			$i++;
		} else
		{
			$stopit=1;
			if($path_deep==0)
			{
				$r=$DB->Query("select id,name,alias from ".PREFIX."_index where parent=0 and pos=1");
				$s=$DB->GetRow($r);
				$path_deep=1;
				$path_name[$path_deep]=$s[1];
				$path_id[$path_deep]=$s[0];
				$path_alias[$path_deep]=$s[2];
				$tek_id=$s[0];
			} else
			{
				$tek_id=$path_id[$path_deep];
			}
		}
	}


if($stopit==0)
{
	if($path_deep>0)
	{
		$tek_id=$path_id[$path_deep];
	}
}

//Оставшуюся часть УРЛ оставляем скрипта
$path_vars=NULL;
if(($stopit==1)&&($path_deep<$elements))
{

	$j=0;
	while($i<$elements)
	{
		$path_vars[$j]=$z[$i];
		$i++;
		$j++;
	}
	$path_kolvars=$j;
} else $path_kolvars=0;

//time_debug('ЧПУ - search place');

//Выборка первой страницы раздела
$r=$DB->Query("select name,tmpl,content,title,id from ".PREFIX."_index where parent=$tek_id and pos=1");
//var_dump("select name,tmpl,content,title,id from ".PREFIX."_index where parent=$tek_id and pos=1");
if (($r)&&($s=$DB->GetRow($r)))
{
	//echo 'zzz';
	$path_deep++;
	$path_id[$path_deep]=$s[4];
	$path_name[$path_deep]=$s[0];
	$tek_id=$s[4];
}else//Выборка контента раздела
{
	$r=$DB->Query("select name,tmpl,content,title from ".PREFIX."_index where id=$tek_id");
	//var_dump("select name,tmpl,content,title from ".PREFIX."_index where id=$tek_id");
	$s=$DB->GetRow($r);
	//var_dump($s, $tek_id);
}
$tt=str_replace('\\\'','\'',$s[2]);
$tmpl_id=$s[1];
$head=$s[0];
$titletotal=$s[3];

//time_debug('ЧПУ - fetch place');

// загружаем шаблон
$r=$DB->Query('select html from '.PREFIX.'_tmpl where id='.$tmpl_id);
//var_dump('select html from '.PREFIX.'_tmpl where id='.$tmpl_id);
$s=$DB->GetRow($r);
$tt2=str_replace('\\\'','\'',$s[0]);
//Вставка страницы в шаблон
$tt=str_replace("###CONTENT###","$tt","$tt2",$i);
//echo 'Count content:'.$i.'<br>';


//FIXME Unknown element
/*if(($path_deep==2)&&($path_id[2]==15)&&(is_numeric($path_vars[0])))
 {
 $r=$DB->Query("select count(*) from panna_temp_nabor where id=".$path_vars[0]);
 if ($r!=NULL)
 {
 $s=$DB->GetArray($r);

 if($s[0]==1)
 {
 $tt=str_replace("style_inside","style_inside_card","$tt");
 }
 }
 }*/
/*
 if(($tek_id==20)&&($path_kolvars>0))
 {
 $tt=str_replace("style_inside","style_inside_card","$tt");
 }*/
$metadescription='';
$metakeywords='';
$metatag='';
$pagetitle='';
$_canonical_url='';

$pageh1='';
$_mainpagetitle_dis=false;
//$pagetitledop = "Mr. Painter - интернет-магазин товаров для скрапбукинга";

if ($_GET["superpath"]=="collections") {
	$pagetitledop = "";
} else {
	$pagetitledop = " - товары для детского творчества ТМ Лео";
}
$treedescription='';
$treenotice='';

//time_debug('ЧПУ - fetch temlate time');
include(CONF_ROOT.'/includes/cartadd.php');
//TODO place for including operating modules
include(CONF_ROOT.'/includes/static.php');
include(CONF_ROOT.'/includes/analitics.php');
//time_debug('Static includes');
include(CONF_ROOT.'/includes/topmenu.php');
include(CONF_ROOT.'/includes/mainmenu.php');
include(CONF_ROOT.'/includes/menucatalog.php');


include(CONF_ROOT.'/includes/goodscollection.php');
include(CONF_ROOT.'/includes/newgoods.php');
include(CONF_ROOT.'/includes/goodsmonth.php'); 
include(CONF_ROOT.'/includes/onlinecatalog.php'); 
include(CONF_ROOT.'/includes/topnews.php');
include(CONF_ROOT.'/includes/news.php');
include(CONF_ROOT.'/includes/catalog.php');
include(CONF_ROOT.'/includes/filtersparam.php');
include(CONF_ROOT.'/includes/bigbannerslider.php');
include(CONF_ROOT.'/includes/collection.php');
include(CONF_ROOT.'/includes/cart.php');
include(CONF_ROOT.'/includes/goods_month.php');
include(CONF_ROOT.'/includes/articles.php');
include(CONF_ROOT.'/includes/mclasses.php');
//include(CONF_ROOT.'/includes/order_post.php');
include(CONF_ROOT.'/includes/order.php');
include(CONF_ROOT.'/includes/topcart.php');
include(CONF_ROOT.'/includes/search.php');
include(CONF_ROOT.'/includes/banners.php');
include(CONF_ROOT.'/includes/banners_main.php');
include(CONF_ROOT.'/includes/banners_right.php');
include(CONF_ROOT.'/includes/masterclasses.php');
include(CONF_ROOT.'/includes/timestemp.php');
include(CONF_ROOT.'/includes/boxberry.php');
include(CONF_ROOT.'/includes/topdelivery.php');
include(CONF_ROOT.'/includes/gde_kupit.php');
include(CONF_ROOT.'/includes/dostavka.php');
include(CONF_ROOT.'/includes/about.php');
include(CONF_ROOT.'/includes/feedback.php');
include(CONF_ROOT.'/includes/years.php');
include(CONF_ROOT.'/includes/video.php');
include(CONF_ROOT.'/includes/mainvideo.php');
include(CONF_ROOT.'/includes/mailer.php');
include(CONF_ROOT.'/includes/mainnews.php');
include(CONF_ROOT.'/includes/videomult.php');
include(CONF_ROOT.'/includes/uznaidelis.php');
include(CONF_ROOT.'/includes/videoprofiport.php');
include(CONF_ROOT.'/includes/videoabrakadabra.php');

include(CONF_ROOT.'/includes/konkursstranatvorchestva.php');
include(CONF_ROOT.'/includes/konkurs.php');

include(CONF_ROOT.'/includes/educationalprogram.php');
include(CONF_ROOT.'/includes/educationalprogramuz.php');
include(CONF_ROOT.'/includes/videouznavaika.php');
include(CONF_ROOT.'/includes/sotrudnichestvo.php');
include(CONF_ROOT.'/includes/videochitaemvmeste.php');
include(CONF_ROOT.'/includes/videopohimichim.php');

$addtxt='<a href="/">Главная</a>';
$rr='/';
for($i=1;$i<count($path_name);$i++)
{
	$rr.=$path_alias[$i].'/';
	$addtxt.=' / <a href="'.$rr.'">'.$path_name[$i].'</a>';
}
//		$path_name[$path_deep]=$s[1];
//		$path_alias[$path_deep]=$s[2];
$tt=str_replace('###BREADCRUMPS###',$addtxt,$tt);
$tt=str_replace('###NAVIMENU###','',$tt);
//time_debug('Dinamic includes');


//Meta tags fill
$tt=str_replace('###METADESCRIPTION###',$metadescription,$tt);
$tt=str_replace('###METAKEYWORDS###',$metakeywords,$tt);
$tt=str_replace('###METATAG###',$metatag,$tt);
if ($pageh1=='') {
	$pageh1=$pagetitle;
}

if ($_mainpagetitle_dis) {
	$pagetitledop='';
	$pagetitle = str_replace('/', '', $pagetitle);
}
if ($pagetitle=='') {
	$pagetitle=$pagetitledop;
} elseif ($pagetitledop=='') {

} else {
	$pagetitle.=$pagetitledop;
}

$pagetitle = str_replace('/', '-', $pagetitle);
$tt=str_replace('###PAGETITLE###',trim($pagetitle),$tt);
$tt=str_replace('###PAGEH1###',$pageh1,$tt);

/*$tt=str_replace("###TITLE###","$titletotal","$tt");
 $uri = $_SERVER['REQUEST_URI'];
 foreach (explode('/', $uri.'/') as $val)
 {
 if ($val != '')
 { $url_mas[] = $val; }
 }
 if(isset($url_mas[0])&&$url_mas[0]=='konkurs')
 {
 $tt=str_replace("###DESCRIPT###","Конкурсы и акции от производителей наборов для вышивания «PANNA».","$tt");
 $tt=str_replace("###KEYS###","конкурс рукоделия, вышивка в подарок, вышивка бесплатно, вышивка конкурс, вышивка, вышивка крестом, рукоделие, вышивка бисером, вышивка лентами","$tt");
 }else{
 $tt=str_replace("###DESCRIPT###","Наборы для вышивания Panna. Вышивка крестом, вышивка лентами, вышивание бисером. Схемы вышивания.","$tt");
 $tt=str_replace("###KEYS###","вышивка, вышивка крестом, рукоделие, схемы вышивки, вышивание, схемы вышивка крестом, вышивка крестиком, схемы вышивки, вышивание крестиком, наборы вышивания, вышивка бисером, вышивание крестом, вышевка, схемы вышивания крестиком, схемы вышивание, наборы вышивка, вышивка рукоделие, вышивание бисером, наборы вышивка крестом, вышевание, скачать схему вышивки, схема вышивки крестиком, наборы бисер","$tt");
 }*/

//MSIE FIX
/*$verbrow=$_SERVER['HTTP_USER_AGENT'];
 if((strpos($verbrow, "MSIE 5")!=FALSE)||(strpos($verbrow, "MSIE 4")!=FALSE))
 {
 $tt=str_replace("style.css","style5.css","$tt");
 $tt=str_replace("style_inside.css","style_inside5.css","$tt");
 $tt=str_replace("style_inside_card.css","style_inside_card5.css","$tt");

 echo("<b>ВНИМАНИЕ! Для просмотра этого сайта Вам необходимо установить более новую версию браузера!</b>");
 }*/

//Inset statistic

if ($_canonical_url!='')$tt=str_replace('<head>','<head>
	<link rel="canonical" href="https://leo-kids.net'.$_canonical_url.'" />',$tt);

$tt=str_replace('</body>','<div style="width:800px;float:left;clear:both;">'.$DB->Statistic().'</div></body>',"$tt");
echo($tt);
//echo $DB->Statistic();

/*************************************
 *
 * System cache block
 *
 ************************************/
//Проверка времени обновления
//LOCK для 1 ветки, остальные просто выходят
//$updUTCTime

//FIXME Fill $updUTCTime if not filled
$updUTCTime=0;
$r=$DB->Query("SELECT pValue FROM ".PREFIX."_misc WHERE pName='CacheTime';");
$s=$DB->GetRow($r);
$CacheUTCTime=strtotime($s[0]);
if  ($updUTCTime<$CacheUTCTime)
{
	exit;// Кеш валидный.
}
$f1=fopen($_SERVER['DOCUMENT_ROOT'].'/cache/cache.lock','w+');
if (!$f1) {
	//Error in open lock file
	error_log('Cache lock error');
	exit;
}
$lockf=flock($f1,LOCK_EX);
if (!$lockf)
{
	// Файл заблокировали до нас. просто выходим.
	exit;
}
else
{
	// Вызов необходимых кеширующих функций.
	// Все скрипты из этого списка независимы, можно вызывать напрямую.
	//require_once $_SERVER['DOCUMENT_ROOT'].'/sys/search.php';
	//require_once $_SERVER['DOCUMENT_ROOT'].'/sys/mainpage.php';
	//require_once $_SERVER['DOCUMENT_ROOT'].'/sys/report_noimages.php';
	//require_once $_SERVER['DOCUMENT_ROOT'].'/sys/rating_calc.php';
	//require_once $_SERVER['DOCUMENT_ROOT'].'/sys/report_waiting_ok.php';

	//обновляем метку кеша
	$DB->Query('UPDATE '.PREFIX.'_misc SET pValue=NOW() WHERE pName=\'CacheTime\';');
}

$parser = new Less_Parser();
$parser->parseFile( '/css/input.less', '/css/output.css' );
//$css = $parser->getCss();
//$less = new lessc;
$parser->checkedCompile("/css/input.less", "/css/output.css");

/*************************************
 *
 * END System cache block
 *
 ************************************/
?>