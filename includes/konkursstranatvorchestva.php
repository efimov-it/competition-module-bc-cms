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
		$pagetitle='����������� � ������ ���������� ���';

		ob_start();
?>

<div class="main__conten container konkurs" style="position: relative; z-index: 3;float:none;">
  <h1 class="visually-hidden">������� ����������� �&nbsp;������ ���������� ���</h1>    
<section>
<div class="banner-block">
<!-- <div class="banner-block__text-part banner-block__text-part_type1"> -->
  <h2 class="konkurs__main-title banner-block__main-title">����������� �&nbsp;������ ���������� ���</h2>
  <p class="banner-block__text">
    ������� ���������� ����� �&nbsp;�������������� ���������� ����������� ������ "���"
  </p>
  <a href="" class="btn btn_blue-sky btn_bold btn_w287 participate-btn banner-block__participate-btn">�����������</a>
<!-- </div> -->
<div class="banner-block__img-container">
<div class="banner-block__img-wrapper">
  <img src="/templates/konkurs/images/banner1-min.jpg" width="434" height="282" alt="">
</div>
</div>
</div>
<p class="konkurs__text">
������� ������������� ����������� �&nbsp;��� �������� ������: �&nbsp;����� ������ ������ &laquo;���&raquo;&nbsp;&mdash;<br>������������ �������� �������������� �������!<br>
�&nbsp;���&nbsp;&mdash; <a href="/catalog/sku_100652626554/" class="link" target="_blank">�����</a>, �&nbsp;���&nbsp;&mdash; �������!<br>
����� ���������� �&nbsp;�������� �����&nbsp;&mdash; ������!
</p>
</section>

<?php
	/*
<section class="section section_konkurs-works">
<h2 class="section__title">������ ����������</h2>
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
<h2 class="section__title">������� ������� �&nbsp;��������</h2>
<ol class="section__conditions-numeric-list">
<li class="section__item">
<p>
  ������ ����� ����� ������ &laquo;���&raquo; ��&nbsp;����� ��&nbsp;500 ������
</p>
</li>
<li class="section__item">
<p>
�������� ������� ��� ��������� ������� ����������� &laquo;���&raquo;
</p>
</li>
<li class="section__item">
<p>
  <a href="" class="link participate-btn">��������� ��&nbsp;����</a> ���� ������ �&nbsp;���������� ��� �&nbsp;������� &laquo;���&raquo;
</p>
</li>
<li class="section__item">
<p>
  ������� ����� ��&nbsp;100 ���������� ����������� ������ ���������� ��� &laquo;����&raquo; ��&nbsp;36&nbsp;������
</p>
</li>
<li class="section__item">
<p>
  ������� ����&nbsp;&mdash; ������� ��&nbsp;������������ ��������� ��� �&nbsp;���������� �&nbsp;������������� ���������� ��&nbsp;������
</p>
</li>
</ol>

<ul class="section__conditions-info-list column column_2_768">
<li class="section__item section__item_works-count-info column__item">
<p>
  ���������� ���������� �����<br><span class="text text_green">�� ����������</span>
</p>
</li>
<li class="section__item section__item_check-info column__item">
<p>
  ������ ����������� ������ �������������<br><span class="text text_green">�&nbsp;����� �������� �����</span>.
</p>
</li>
<li class="section__item section__item_time-info column__item">
<p>
  ����� ���������� �������� �&nbsp;���� �����:<br>
  <span class="text text_green">�&nbsp;1&nbsp;���� ��&nbsp;31&nbsp;������� 2024&nbsp;����.</span>
</p>
</li>
<li class="section__item section__item_winner-info column__item">
<p>
  ����������� �����������&nbsp;&mdash; ��������� �������� �&nbsp;�������������� 
  <span class="text text_green">10&nbsp;�������� 2024&nbsp;����</span>.
</p>
</li>
</ul>
<div>
<p class="konkurs__results-info-text">
���������� ����� ������������ ��&nbsp;����� �&nbsp;�&nbsp;���������� ����� ������:
</p>
<ul class="social__list social-list list">
  <li class="social-list__item">
          <a href="https://vk.com/leo.risuet" target="_blank">
          <svg class="vk-svg">
          <use xlink:href="#vk"></use>  
          </svg>
          <span class="visually-hidden">
          ���������
          </span>
          </a>
  </li>
  <li class="social-list__item">
          <a href="https://t.me/leorisuet" target="_blank">
          <svg class="tg-svg" fill="none">
          <use xlink:href="#tg"></use>  
          </svg>
          <span class="visually-hidden">
          ��������
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
                  <label for="surname" class="placeholder">�������*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="name" name="name" class="input input_text" required>
                  <label for="name" class="placeholder">���*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="reg_phone" name="phone_number_original" class="input input_text novalidate" required>
                  <input type="hidden" name="phone_number" value="">
                  <label for="reg_phone" class="placeholder">����� ��������*</label>
          </div>
          <div class="mb-40 p-rel">
                  <label class="file-label" for="uploadImage1">
                          <span class="file-label__text">������� ��&nbsp;<span class="link">������</span>, ����� ������� <span class="text text_black2">���������� �������</span> ��� ������ ���������� ��&nbsp;����</span>
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
                  <label for="city" class="placeholder">�����*</label>
          </div>
          <div class="textfield-container">
                  <input type="text" id="shop_address" name="shop_address" class="input input_text" required>
                  <label for="shop_address" class="placeholder">����� ��������*</label>
          </div>
          <div class="mb-40 p-rel">
                  <label class="file-label" for="uploadImage2">
                  <span class="file-label__text">������� ��&nbsp;<span class="link">������</span>, ����� ������� <span class="text text_black2">���������� ����</span> ��� ������ ���������� ��&nbsp;����</span>
                  </label>
                  <input id="uploadImage2" type="file" accept="image/*" class="visually-hidden novalidate" data-name="additional_image" data-position="1" required>
                  <input type="hidden" value="[]" name="additional_images">
                  </div>
      </fieldset>
      </div>
      <input type="hidden" name="id_competition" value="0">
       <button type="submit" class="btn btn_primary btn_medium form__submit-btn">
        ��������� ������
      </button>
    </form>
</section>
<?php
		$addtxt = ob_get_clean();
	$tt=str_replace("###KONKURSSTRANATVORCHESTVA###","$addtxt","$tt");
}
?>