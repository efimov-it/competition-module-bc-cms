<?php 

if(strpos($tt, "###KONKURSSTRANATVORCHESTVA###")!=FALSE) {
  $paths = explode('/', $_SERVER['REQUEST_URI']);
  
  $tmp_path = [];
  foreach ($paths as $path) {
    if ($path) $tmp_path[] = $path;
  }

  $paths = $tmp_path;

  if (!isset($paths[1])) {
    $tt = str_replace("###KONKURSSTRANATVORCHESTVA###", "###KONKURS###", "$tt");
  }
  elseif (!$paths[1]) {
    $tt = str_replace("###KONKURSSTRANATVORCHESTVA###", "###KONKURS###", "$tt");
  }
  elseif (substr($paths[1],0,1) === '?') {
    $tt = str_replace("###KONKURSSTRANATVORCHESTVA###", "###KONKURS###", "$tt");
  }
}

if(strpos($tt, "###KONKURSSTRANATVORCHESTVA###")!=FALSE) {
	
	$addtxt='';
		$pagetitle='Путешествие в страну творчества Лео';

		ob_start();
?>

<div class="main__conten container konkurs" style="position: relative; z-index: 3;float:none;">
  <h1 class="visually-hidden">Конкурс Путешествие в&nbsp;страну творчества Лео</h1>    
<section>
<div class="banner-block">
<!-- <div class="banner-block__text-part banner-block__text-part_type1"> -->
  <h2 class="konkurs__main-title banner-block__main-title">Путешествие в&nbsp;страну творчества Лео</h2>
  <p class="banner-block__text">
    Конкурс творческих работ с&nbsp;использованием материалов российского бренда "Лео"
  </p>
  <a href="" class="btn btn_blue-sky btn_bold btn_w287 participate-btn banner-block__participate-btn">Участвовать</a>
<!-- </div> -->
<div class="banner-block__img-container">
<div class="banner-block__img-wrapper">
  <img src="/templates/konkurs/images/banner1-min.jpg" width="434" height="282" alt="">
</div>
</div>
</div>
<p class="konkurs__text">
Выиграй увлекательное путешествие в&nbsp;мир создания красок: в&nbsp;самое сердце бренда &laquo;Лео&raquo;&nbsp;&mdash;<br>Переславский комбинат художественных товаров!<br>
С&nbsp;нас&nbsp;&mdash; <a href="/catalog/sku_100652626554/" class="link" target="_blank">призы</a>, с&nbsp;вас&nbsp;&mdash; участие!<br>
Стать участником и&nbsp;получить призы&nbsp;&mdash; просто!
</p>
</section>

<?php
	/*
<section class="section section_konkurs-works">
<h2 class="section__title">Работы участников</h2>
<div class="swiper-container">
  <div class="swiper works-swiper swiper_type1">
          <ul class="section__list swiper-wrapper">
                  <li class="section__item swiper-slide">
                  <img src="images/work-min.jpg" width="362" height="310" alt="">
                  </li>
                  <li class="section__item swiper-slide">
                  <img src="images/work-min.jpg" width="362" height="310" alt="">
                  </li>
                  <li class="section__item swiper-slide">
                  <img src="images/work-min.jpg" width="362" height="310" alt="">
                  </li>
                  <li class="section__item swiper-slide">
                  <img src="images/work-min.jpg" width="362" height="310" alt="">
                  </li>
                  <li class="section__item swiper-slide">
                  <img src="images/work-min.jpg" width="362" height="310" alt="">
                  </li>
          </ul>
          <div class="swiper-pagination works-swiper__pagination">
          </div>
          
  </div>
  <div class="swiper-button-prev works-swiper__prev-btn">
          <svg>
              <use xlink:href="#arrow"></use>
          </svg>
  </div>
  <div class="swiper-button-next works-swiper__next-btn">
          <svg>
                  <use xlink:href="#arrow"></use>
          </svg>
  </div>
</div>
</section>

	*/
?>

<section class="section section_konkurs-conditions">
<h2 class="section__title">Условия участия в&nbsp;конкурсе</h2>
<ol class="section__conditions-numeric-list">
<li class="section__item">
<p>
  Купите любой товар бренда &laquo;Лео&raquo; на&nbsp;сумму от&nbsp;500 рублей
</p>
</li>
<li class="section__item">
<p>
Сделайте поделку или нарисуйте картину материалами &laquo;Лео&raquo;
</p>
</li>
<li class="section__item">
<p>
  <a href="" class="link participate-btn">Загрузите на&nbsp;сайт</a> фото работы и&nbsp;прикрепите чек о&nbsp;покупке &laquo;Лео&raquo;
</p>
</li>
<li class="section__item">
<p>
  Станьте одним из&nbsp;100 счастливых обладателей набора пластилина Лео &laquo;Ярко&raquo; из&nbsp;36&nbsp;цветов
</p>
</li>
<li class="section__item">
<p>
  Главный приз&nbsp;&mdash; поездка на&nbsp;производство продукции Лео в&nbsp;Переславле с&nbsp;экскурсионной программой по&nbsp;городу
</p>
</li>
</ol>

<ul class="section__conditions-info-list column column_2_768">
<li class="section__item section__item_works-count-info column__item">
<p>
  Количество конкурсных работ<br><span class="text text_green">не ограничено</span>
</p>
</li>
<li class="section__item section__item_check-info column__item">
<p>
  Каждая последующая работа выкладывается<br><span class="text text_green">с&nbsp;новым кассовым чеком</span>.
</p>
</li>
<li class="section__item section__item_time-info column__item">
<p>
  Сроки проведения конкурса и&nbsp;приём работ:<br>
  <span class="text text_green">с&nbsp;1&nbsp;июля по&nbsp;31&nbsp;августа 2024&nbsp;года.</span>
</p>
</li>
<li class="section__item section__item_winner-info column__item">
<p>
  Определение победителей&nbsp;&mdash; случайным способом с&nbsp;видеофиксацией 
  <span class="text text_green">10&nbsp;сентября 2024&nbsp;года</span>.
</p>
</li>
</ul>
<div>
<p class="konkurs__results-info-text">
Результаты будут опубликованы на&nbsp;сайте и&nbsp;в&nbsp;социальных сетях бренда:
</p>
<ul class="social__list social-list list">
  <li class="social-list__item">
          <a href="https://vk.com/leo.risuet" target="_blank">
          <svg class="vk-svg">
          <use xlink:href="#vk"></use>  
          </svg>
          <span class="visually-hidden">
          Вконтакте
          </span>
          </a>
  </li>
  <li class="social-list__item">
          <a href="https://t.me/leorisuet" target="_blank">
          <svg class="tg-svg" fill="none">
          <use xlink:href="#tg"></use>  
          </svg>
          <span class="visually-hidden">
          Телеграм
          </span>
          </a>
  </li>
</ul>
</div>
</section>
<section class="section section_letsparticipate">
  <form class="form form_letsparticipate" action="" method="POST">
          <div class="form__wrapper">
      <fieldset>
          <div class="textfield-container">
                  <input type="text" id="surname" name="surname" class="input input_text" required>
                  <label for="surname" class="placeholder">Фамилия*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="name" name="name" class="input input_text" required>
                  <label for="name" class="placeholder">Имя*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="reg_phone" name="phone_number_original" class="input input_text novalidate" required>
                  <input type="hidden" name="phone_number" value="">
                  <label for="reg_phone" class="placeholder">Номер телефона*</label>
          </div>
          <div class="mb-40 p-rel">
                  <label class="file-label" for="uploadImage1">
                          <span class="file-label__text">Нажмите на&nbsp;<span class="link">ссылку</span>, чтобы выбрать <span class="text text_black2">фотографии поделки</span> или просто перетащите их&nbsp;сюда</span>
                  </label>
                  <input id="uploadImage1" type="file" accept="image/*" class="visually-hidden novalidate" data-name="image" data-position="0" required>
                  <input type="hidden" value="[]" name="images">
                  
                  </div>
      </fieldset>
      <fieldset>
          <div class="textfield-container">
                  <input type="email" id="email" name="email" class="input input_text" required>
                  <label for="email" class="placeholder">E-mail*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="city" name="city" class="input input_text" required>
                  <label for="city" class="placeholder">Город*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="shop_address" name="shop_address" class="input input_text" required>
                  <label for="shop_address" class="placeholder">Адрес магазина*</label>
          </div>
          <div class="mb-40 p-rel">
                  <label class="file-label" for="uploadImage2">
                  <span class="file-label__text">Нажмите на&nbsp;<span class="link">ссылку</span>, чтобы выбрать <span class="text text_black2">фотографию чека</span> или просто перетащите их&nbsp;сюда</span>
                  </label>
                  <input id="uploadImage2" type="file" accept="image/*" class="visually-hidden novalidate" data-name="additional_image" data-position="1" required>
                  <input type="hidden" value="[]" name="additional_images">
                  </div>
      </fieldset>
      </div>
      <input type="hidden" name="id_competition" value="0">
       <button type="submit" class="btn btn_primary btn_medium form__submit-btn">
        Отправить заявку
      </button>
    </form>
</section>
<?php
		$addtxt = ob_get_clean();
	$tt=str_replace("###KONKURSSTRANATVORCHESTVA###","$addtxt","$tt");
}
?>