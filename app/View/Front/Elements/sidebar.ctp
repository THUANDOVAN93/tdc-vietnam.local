
	<!-- == section_global/ == -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="section_global">

	<!-- header/ -->
	<div id="header">
		<div id="sitelogo"><a href="<?php echo $this->webroot; ?>" id="siteid" name="siteid">東京デベロップメントコンサルタント | TOKYO DEVELOPMENT CONSULTANT</a></div>
		<div id="header_area">ベトナムエリア THAILAND AREA</div>
		<dl>
			<dt><?php echo __('factory-registerd'); ?>:</dt>
			<dd>
				<?php
				echo (number_format($totalBuildingCount));
				echo __('factory');
				?>
			</dd>
		</dl>
	</div>
	<!-- /header -->

	<div id="left_menu">
		<ul>
		<?php
			foreach ($factoryAreas as $factoryAreaItem) {
				// hard code to show large area
				if ($factoryAreaItem['FactoryArea']['id'] ==  2) {
					echo "<p class=\"province\">SOUTH AREA</p>";
				}
				if ($factoryAreaItem['FactoryArea']['id'] ==  9) {
					echo "<p class=\"province\">CENTRAL AREA</p>";
				}
				if ($factoryAreaItem['FactoryArea']['id'] ==  11) {
					echo "<p class=\"province\">NORTH AREA</p>";
				}

				$classStatus = "";
				if (isset($factoryAreaCurrentId) && ($factoryAreaCurrentId == $factoryAreaItem['FactoryArea']['id'])) {
					$classStatus = "active";
				}
				$totalFactOfArea = sizeof($factoryAreaItem['FactoryBuildingOfArea']);

				echo "<li class=\"parent ".$classStatus."\">". $this->Html->link(
				    $factoryAreaItem['FactoryArea']['name'].'('.$totalFactOfArea.')',
				    '/factory/area/list/'. $factoryAreaItem['FactoryArea']['id'] .'/',
				    array('class' => 'd-block', 'target' => '_blank')
				);
				echo "<ul class=\"child\" style=\"height: calc(120% * ".$totalFactOfArea.")\">";
				foreach ($factoryAreaItem['FactoryBuildingOfArea'] as $factoryBuildingItem) {
					echo "<li>". $this->Html->link(
					    $factoryBuildingItem['name'],
					    '/factory/area/detail/'. $factoryBuildingItem['id'] .'/',
					    array('class' => 'd-block', 'target' => '_blank')
					)
					."</li>";
				}
				echo "</ul></li>";
			}
		?></ul>
	</div>

	<p id="nav_global_factlink">
		<a href="http://www.fact-link.com.vn/" target="_blank">Fact-Link ベトナムの日系製造業ポータルサイト</a>
	</p>
</div>
<!-- == /section_global == -->
