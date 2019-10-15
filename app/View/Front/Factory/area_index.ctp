<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->webroot; ?>common/css/factory-map.css" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/areamap.js"></script>

<!-- topicpath/ -->
<ul id="topicpath">
	<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
	<li><?php echo __('breadcrumb-factory-search-all'); ?></li>
</ul>
<!-- /topicpath -->

<!-- search_header/ -->
<div class="search_header clearfix">
	<h1 class="title-row title-row-search-content"><?php echo __('factory-search-all-title'); ?></h1>
</div>
<!-- /search_header -->

<!-- search_area/ -->
<p class="search_area_read"><?php echo __('search-area-direction'); ?></p>
<p id="map"><img src="<?php echo $this->webroot; ?>common/images/search/factory_index_map.png" alt="" width="730" height="710" border="0" usemap="#Map" />
	<map name="Map" id="Map">
		<area shape="rect" coords="140,589,280,619" href="<?php echo $this->webroot; ?>factory/area/list/2/" />
		<area shape="rect" coords="549,578,690,609" href="<?php echo $this->webroot; ?>factory/area/list/3/" />
		<area shape="rect" coords="549,618,689,648" href="<?php echo $this->webroot; ?>factory/area/list/4/" />
		<area shape="rect" coords="140,628,280,658" href="<?php echo $this->webroot; ?>factory/area/list/5/" />
		<area shape="rect" coords="549,657,689,687" href="<?php echo $this->webroot; ?>factory/area/list/6/" />
		<area shape="rect" coords="549,539,689,569" href="<?php echo $this->webroot; ?>factory/area/list/7/" />
		<area shape="rect" coords="140,549,280,579" href="<?php echo $this->webroot; ?>factory/area/list/8/" />
		<area shape="rect" coords="246,348,385,377" href="<?php echo $this->webroot; ?>factory/area/list/9/" />
		<area shape="rect" coords="546,86,685,115" href="<?php echo $this->webroot; ?>factory/area/list/11/" />
		<area shape="rect" coords="37,175,177,205" href="<?php echo $this->webroot; ?>factory/area/list/12/" />
		<area shape="rect" coords="397,18,537,48" href="<?php echo $this->webroot; ?>factory/area/list/13/" />
		<area shape="rect" coords="545,125,685,155" href="<?php echo $this->webroot; ?>factory/area/list/14/" />
		<area shape="rect" coords="545,164,685,194" href="<?php echo $this->webroot; ?>factory/area/list/15/" />
		<area shape="rect" coords="436,204,577,234" href="<?php echo $this->webroot; ?>factory/area/list/16/" />
		<area shape="rect" coords="436,243,577,273" href="<?php echo $this->webroot; ?>factory/area/list/17/" />
		<area shape="rect" coords="37,96,177,126" href="<?php echo $this->webroot; ?>factory/area/list/18/" />
		<area shape="rect" coords="397,58,537,88" href="<?php echo $this->webroot; ?>factory/area/list/19/" />
		<area shape="rect" coords="38,136,177,165" href="<?php echo $this->webroot; ?>factory/area/list/20/" />
	</map>
</p>

<div id="balloon" class="tooltip">
	<a id="balloon-inner" href=""></a>
</div>
<!-- /search_area -->

<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
<!-- /contents_inquiry -->
