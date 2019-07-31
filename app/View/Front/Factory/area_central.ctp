<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->webroot; ?>common/css/factory-map.css" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/areamap.js"></script>

		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li><a href="<?php echo $this->webroot; ?>factory/area/">工場・工業用地を探す ベトナム全域工業団地から探す</a></li>
			<li>中部から探す</li>
		</ul>
		<!-- /topicpath -->

		<!-- search_header/ -->
		<div class="search_header clearfix">
			<h1><img src="<?php echo $this->webroot; ?>common/images/search/factory_header_ttl_central.png" width="730" height="40" alt="ベトナムの工業地帯・工業団地一覧" /></h1>
		</div>
		<!-- /search_header -->

		<!-- search_area/ -->
		<p class="search_area_read">ベトナムの工場・工業団地物件を検索したいエリアをクリックして下さい。</p>
		<div id="map-vietnam" class="central">
<p class="map"><img src="<?php echo $this->webroot; ?>common/images/search/factory_index_map02_central.png" alt="" width="700" height="552" /></p>

<!-- area-central -->
<p class="area19 area-link"><a href="<?php echo $this->webroot; ?>factory/area/list/9">Da Nang</a></p>

<!-- zone01 -->
<p class="num01 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/83/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="リエンチエウ工業団地" /></a></p>
<p class="num02 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/84/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="新ホアカイン工業団地" /></a></p>
<p class="num03 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/85/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ホアカイン工業団地" /></a></p>
<p class="num04 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/86/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ダナン水産物サービス工業団地" /></a></p>
<p class="num05 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/87/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ダナン工業団地" /></a></p>
<p class="num06 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/88/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ホアカム工業団地" /></a></p>
</div>
<div id="balloon" class="tooltip">
<a id="balloon-inner" href=""></a>
</div>
<!-- /search_area -->
		<!-- /search_area -->

		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->
