<?php

if(strpos($tt, "###KONKURS###")!=FALSE) {
	
	$addtxt='';
	if (($path_vars==NULL)||($path_vars[0]=='')) {
		// if(isset($_GET['debugleokids'])) {
		// 	$addtxt.='<video controls preload="none" poster="/css/images/abrakadabraprev.jpg" loop="" muted="" playsinline="">
		// 	<source src="/css/images/leo-slide-video_3.mp4" type="video/mp4">
		// 	</video>';
		// }
		//News page.
		$pagetitle='�������� � ������� ������� ���� / ';
		$tt=str_replace('###BREADCRUMPS###','<a href="/">�������</a> / ��������</a>', $tt);
		$addtxt.='<h1 class="main-column__title">�������� � ������� ������� ����</h1>';
		$addtxt.='<p style="margin-bottom: 30px;">
		����� &laquo;���&raquo; ������� ������������ �������� �������� ���������� �&nbsp;��������� �������� ���������� �������� �&nbsp;������������ �������� ��������� �&nbsp;��������������� ����������.
		</p>
		<div class="movies-section konkurs-section">

		<div class="konkurs-block" style="border: none;">
						<div class="k-block-info">
                            <div class="k-block-img">
                            <a class="movie-link" href="https://rybakovpreschoolaward.ru/?utm_source=universitet&utm_medium=detstva&utm_campaign=universitet_detstva_partnery" target="_blank">
                                <img src="/css/images/rybakov-prev.jpg">
                            </a></div>
                            <div class="k-block-item">
							<div class="movie-title k-block-header">
                            <a href="https://rybakovpreschoolaward.ru/?utm_source=universitet&utm_medium=detstva&utm_campaign=universitet_detstva_partnery" target="_blank">�������� ����� �� 12 � �������� ������������ �� ���������� �������</a></div>
                            <div class="k-block-text">
<p>
����� ������� ��� �������� ���������� ���� ���� ��������� VI ��������������
�������� ����� ���� ����������, ��������������� ������� ������ � ������ "����������� �������". � ������� ������������ �������� ����� �� 12 ��� � ��, ��� ������ � ������������ � ���������� �������� 30 ��������� ������!
</p></div>
<div>
<p class="spec-text offset-p-spec"><b>��������� � ��������:</b> <a class="spec-viol-text" href="https://rybakovpreschoolaward.ru/?utm_source=universitet&utm_medium=detstva&utm_campaign=universitet_detstva_partnery" style="white-space:nowrap;" target="_blank">https://rybakovpreschoolaward.ru/</a></p>
<p class="spec-text"><b>����� �����:</b> <span class="spec-viol-text">c 14.12.2021 �� 21.03.2022</span></p>
</div>
<div class="movie-tag movie-tag-2">
            ������� ��������
                </div>
						</div>
                        </div>
                        <div class="clear"></div>
                                
                    
        </div>

		<div class="konkurs-block" style="border: none;">
						<div class="k-block-info">
                            <div class="k-block-img">
                            <a class="movie-link" href="https://multiland.leo-kids.net/" target="_blank">
                                <img src="/css/images/abrakadabraprev.jpg">
                            </a></div>
                            <div class="k-block-item">
							<div class="movie-title k-block-header">
                            <a href="https://multiland.leo-kids.net/" target="_blank">������� ��� �������� ����������� ������ � �������������</a></div>
                            <div class="k-block-text">
<p>
������� ��� ����� ���� �&nbsp;���������� ����������. ������ ����� ���������� ������� &laquo;���&raquo;, ����� �������� ������� ���&nbsp;&mdash; ��� ����� �&nbsp;��� ������? ����������!
</p></div>
<div>
<p class="spec-text offset-p-spec"><b>��������� � ��������:</b> <a class="spec-viol-text" href="https://multiland.leo-kids.net/" style="white-space:nowrap;" target="_blank">https://multiland.leo-kids.net/</a></p>
<p class="spec-text"><b>����� �����:</b> <span class="spec-viol-text">� 17.12.2021 �� 01.03.2022</span></p>
</div>
<div class="movie-tag movie-tag-2">
            ������� ��������
                </div>
						</div>
                        </div>
                        <div class="clear"></div>
                                
                    
        </div>

		<div class="konkurs-block" style="border: none;">
						<div class="k-block-info">
                            <div class="k-block-img">
                            <a class="movie-link" href="https://konkurs.leonardo.ru/" target="_blank">
                                <img src="/css/images/kdrprev.jpg">
                            </a></div>
                            <div class="k-block-item">
							<div class="movie-title k-block-header">
                            <a href="https://konkurs.leonardo.ru/" target="_blank">������������� ������� �������� ������� ��������� 2021!</a></div>
                            <div class="k-block-text">
<p>
���������� ������ ��������� ����������� �����������, ������ ��&nbsp;����� �&nbsp;����� ����� �������� ���� ���������.
</p></div>
<div>
<p class="spec-text offset-p-spec"><b>��������� � ��������:</b> <a class="spec-viol-text" href="https://konkurs.leonardo.ru/" style="white-space:nowrap;" target="_blank">https://konkurs.leonardo.ru/</a></p>
<p class="spec-text"><b>����� �����:</b> <span class="spec-viol-text">c 01.08.2021 �� 08.12.2021</span></p>
</div>
<div class="movie-tag movie-tag-2">
            ������� ��������
                </div>
						</div>
                        </div>
                        <div class="clear"></div>
                                
                    
        </div>
		<div class="konkurs-block" style="border: none;">
						<div class="k-block-info">
                            <div class="k-block-img">
                            <a class="movie-link" href="https://art-box.leo-kids.net/" target="_blank">
                                <img src="/css/images/artboxprev.jpg">
                            </a></div>
                            <div class="k-block-item">
							<div class="movie-title k-block-header">
                            <a href="https://art-box.leo-kids.net/" target="_blank">������������� ������� <span style="white-space:nowrap;">���� ���-���ѻ</span></a></div>
                            <div class="k-block-text">
<p>
������������ ��&nbsp;��������� &laquo;100 ������ ����������&raquo;, �&nbsp;������� ����� ����� ���������� �&nbsp;�������� ������ ��������� ��&nbsp;����� ��������.
</p></div>
<div>
<p class="spec-text offset-p-spec"><b>��������� � ��������:</b> <a class="spec-viol-text" href="https://art-box.leo-kids.net/" style="white-space:nowrap;" target="_blank">https://art-box.leo-kids.net/</a></p>
<p class="spec-text"><b>����� �����:</b> <span class="spec-viol-text">� 15.11.2020 �� 01.03.2021</span></p>
</div>
<div class="movie-tag movie-tag-2">
            ������� ��������
                </div>
						</div>
                        </div>
                        <div class="clear"></div>
                                
                    
        </div>
		</div>
		';
		$sql='SELECT * FROM '.PREFIX.'_konkurs WHERE showit=1 ORDER BY posttime DESC LIMIT 20;';
		$s=$DB->Query($sql);
		$addtxt.='<div class="news_fulltext masterclasses video-page-wrapper">';
			while ($r=$DB->GetArray($s)) {
				$addtxt.='<div class="mk-block movies-section">
					<div class="mk-block-info"><div class="mk-block-img">
						';
							if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/leokids_konkurs/".$r[0].".jpg")) {
								$addtxt.='<img class="news-preview__img" src="/images/leokids_konkurs/'.$r[0].'.jpg" alt="" />';
							} else {
								$addtxt.='<img class="news-preview__img" src="/img/newsprewiewnoimage.jpg" alt="" />';
							}
						$addtxt.='</a></div>
					</div>
					<div class="mk-block-item">
						<div class="newscaption">
							<div class="date">'.date('d/m/Y',$r[3]).'</div>
							<div class="movie-title mk-block-header">
								
							</div>
						</div>
						<div class="mk-block-text"><p style="font-family: \'Circle Rounded Regular5\', sans-serif;">'.$r[2].'</p></div>
					</div>
				</div>';
			}
		$addtxt.='</div>';
	}
	$tt=str_replace("###KONKURS###","$addtxt","$tt");
	
    $tt=str_replace("###KONKURS###",'',"$tt");
    
}
?>