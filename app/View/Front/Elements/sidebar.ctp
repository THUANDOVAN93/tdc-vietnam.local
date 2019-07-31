
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
				<dt>現在登録物件数：</dt>
				<dd><?php echo (number_format($totalBuildingCount)); ?>件</dd>
			</dl>
		</div>
		<!-- /header -->


		<!-- nav_global/ -->
		<div id="nav_global">
			<!-- <div id="nav_global_search" class="area_title">キーワードで探す</div>
			<div id="nav_global_search_box">
				<form action="http://tdc-vietnam.com/search/" id="searchbox-tdc" class="search-box">
					<input type="hidden" name="cx" value="008962594298774268058:gk11wb2hn-i" />
					<input type="hidden" name="ie" value="utf-8" />
					<input type="hidden" name="hl" value="ja" />
					<input name="q" type="text" class="search-box-input" />
					<input type="image" name="sa" src="/common/images/nav_global_search_btn.png" class="btn-image">
				</form>
<script type="text/javascript" src="http://www.google.com/cse/tools/onthefly?form=searchbox-tdc&amp;lang=ja"></script> -->

<!--script>
  (function() {
    var cx = '008962594298774268058:gk11wb2hn-i';
    //var cx = '008962594298774268058:5tmly2vr3og';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchbox-only></gcse:searchbox-only-->

			<!-- </div> -->
			<div id="nav_global_factory" class="area_title">工場・工業用地を探す</div>
			<ul>
				<li class="nav_global_factory01"><a href="<?php echo $this->webroot; ?>factory/area/">ベトナム全域の工業団地から探す</a></li>
				<!-- <li class="nav_global_factory04"><a href="<?php echo $this->webroot; ?>factory/area/south/">ベトナム南部で探す</a></li>
				<li class="nav_global_factory02"><a href="<?php echo $this->webroot; ?>factory/area/north/">ベトナム北部で探す</a></li>
				<li class="nav_global_factory03"><a href="<?php echo $this->webroot; ?>factory/area/central/">ベトナム中部で探す</a></li> -->
			</ul>
			<!-- <div id="nav_global_office" class="area_title">事務所を探す</div> -->
			<!-- <ul> -->
				<!-- <li class="nav_global_office01"><a href="<?php echo $this->webroot; ?>office/area/">ホーチミンで探す</a></li> -->
				<!-- <li class="nav_global_office04"><a href="<?php echo $this->webroot; ?>office/area/hanoi/">ハノイで探す</a></li> -->
				<!--li class="nav_global_office03"><a href="<?php echo $this->webroot; ?>office/area/list/23">ホーチミン</a></li>
				<li class="nav_global_office04"><a href="<?php echo $this->webroot; ?>office/area/list/1">ハノイ</a></li>
				<li class="nav_global_office05"><a href="#">ダナン</a></li-->
				<!--li class="nav_global_office02"><a href="<?php echo $this->webroot; ?>office/station/">駅から探す</a></li>
				<li class="nav_global_office03"><a href="<?php echo $this->webroot; ?>office/station/list/2">">ホーチミン</a></li>
				<li class="nav_global_office04"><a href="<?php echo $this->webroot; ?>office/station/list/1">ハノイ</a></li>
				<li class="nav_global_office06"><a href="#">ダナン</a></li-->
			<!-- </ul> -->
			<!-- <div id="nav_global_residence" class="area_title">住まいを探す</div> -->
			<!-- <ul> -->
				<!-- <li class="nav_global_residence01"><a href="<?php echo $this->webroot; ?>residence/area/">ホーチミンで探す</a></li> -->
				<!-- <li class="nav_global_residence04"><a href="<?php echo $this->webroot; ?>residence/area/hanoi/">ハノイで探す</a></li> -->
				<!--class="nav_global_residence03"><a href="<?php echo $this->webroot; ?>residence/area/list/23">ホーチミン</a></li>
				<li class="nav_global_residence04"><a href="<?php echo $this->webroot; ?>residence/area/list/1">ハノイ</a></li>
				<li class="nav_global_residence05"><a href="#">ダナン</a></li-->
				<!--li class="nav_global_residence02"><a href="<?php echo $this->webroot; ?>residence/station/">駅から探す</a></li>
				<li class="nav_global_residence03"><a href="<?php echo $this->webroot; ?>residence/station/list/2">ホーチミン</a></li>
				<li class="nav_global_residence04"><a href="<?php echo $this->webroot; ?>residence/station/list/1">ハノイ</a></li>
				<li class="nav_global_residence06"><a href="#">ダナン</a></li-->
			<!-- </ul> -->
			<div id="nav_global_about" class="area_title">東京デベロップメントコンサルタントとは</div>
			<ul>
				<li class="nav_global_about01"><a href="/business/">不動産部門</a></li>
				<!--li class="nav_global_about02"><a href="/business/interior-results01.php">内装建築工事部門</a></li-->
				<li class="nav_global_about06"><a href="/business/fact-link.php">Fact-Link部門</a></li>
				<li class="nav_global_about04 last"><a href="/business/trade.php">貿易部門</a></li>
				<!-- <li class="nav_global_about05"><a href="link">その他の事業</a></li> -->
			</ul>
		</div>
		<!-- /nav_global -->

		<!-- nav_global_sub/ -->
		<ul id="nav_global_sub" class="clearfix">
			<!-- <li class="nav_global_sub01"><a href="link">Q&amp;A</a></li> -->
			<li class="nav_global_sub02"><a href="/company/">会社情報</a></li>
			<li class="nav_global_sub03"><a href="/recruit/">採用情報</a></li>
		</ul>
		<!-- /nav_global_sub -->

		<!-- <p id="nav_global_guide"><a href="/handbook/" target="_blank">Thai Business Handbook</a></p> -->

		<!-- <p id="nav_global_calendar"><a href="/calendar/">ASEANカレンダー</a></p> -->

		<!-- aside_column/ -->
		<!-- <div class="aside_column_news">ニュース</div>
		<div class="aside_column scrollbar"></div>
		<p class="aside_column_backnumber"><a href="/news/?cat=2">BACKNUMBER</a></p> -->
		<!-- /aside_column -->

		<!-- aside_column/ -->
		<!-- <div class="aside_column_info">物件更新情報</div>
		<div class="aside_column scrollbar"></div>
		<p class="aside_column_backnumber"><a href="/news/?cat=3">BACKNUMBER</a></p> -->
		<!-- /aside_column -->

		<!-- <p id="nav_global_support"><a href="/business/interior-results01.html">内装建築工事もTDCがサポートします！</a></p> -->

		<p id="nav_global_factlink"><a href="http://www.fact-link.com.vn/" target="_blank">Fact-Link ベトナムの日系製造業ポータルサイト</a></p>

		<!-- <p id="nav_global_thai100"><a href="http://www.k-tsushin.jp/thai100/" target="_blank">THAI GOOD COMPANY 100</a></p> -->

		<!-- aside_column/ -->
		<!-- <div class="aside_column_facebook_ttl">FACEBOOK PAGE</div>
		<div class="aside_column_facebook">
			<div class="fb-page" data-href="https://www.facebook.com/pages/Tokyo-Development-Consultants-Thailand-Co-Ltd/231547283664355" data-width="200" data-height="390" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Tokyo-Development-Consultants-Thailand-Co-Ltd/231547283664355"><a href="https://www.facebook.com/pages/Tokyo-Development-Consultants-Thailand-Co-Ltd/231547283664355">Tokyo Development Consultants - Thailand Co., Ltd</a></blockquote></div></div>
		</div> -->
		<!-- /aside_column -->

	</div>
	<!-- == /section_global == -->
