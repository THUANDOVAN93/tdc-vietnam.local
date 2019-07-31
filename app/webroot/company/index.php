<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-script-type" content="text/javascript" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" media="all" href="../common/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="../common/css/general.css" />
	<link rel="stylesheet" type="text/css" media="all" href="../common/css/company.css" />
	<link rel="alternate stylesheet" type="text/css" media="all" href="../common/css/font_small.css" title="small" />
	<link rel="alternate stylesheet" type="text/css" media="all" href="../common/css/font_meduim.css" title="medium" />
	<link rel="alternate stylesheet" type="text/css" media="all" href="../common/css/font_large.css" title="large" />
	<link rel="canonical" href="http://www.tdc-thai.com/company/" />
	<script type="text/javascript" src="../common/js/jquery.js"></script>
	<script type="text/javascript" src="../common/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="../common/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="../common/js/styleswitcher.js"></script>
	<script type="text/javascript" src="../common/js/global.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyDRe-SLe-oVJhmp1x0wDGUdtVOmFceE8eU&v=quarterly&v=3"></script>
	<title>会社情報｜東京デベロップメントコンサルタント</title>
	<script type="text/javascript" src="../common/js/ga.js"></script>
</head>
<body>

<!-- === container/ === -->
<div id="container">
<?php include("../inc/sidebar.php"); ?>

<!-- == section_contents/ == -->
<div id="section_contents">
<?php include("../inc/section_header.php"); ?>

<!-- topicpath/ -->
<ul id="topicpath">
	<li class="home"><a href="/">TOP</a></li>
	<li>会社情報</li>
</ul>
<!-- /topicpath -->

<div id="companyCnt" class="main">
<h1 class="header_hgroup"><img src="images/header_ttl.png" alt="会社情報" width="730" height="40" /></h1>

<h2 class="ttl_hgroup"><img src="images/ttl01.png" alt="会社概要" width="98" height="23" /></h2>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<th scope="row">社名</th>
<td>Tokyo Development Consultants（Vietnam）Co.,Ltd.</td>
</tr>
<tr>
<th scope="row">代表取締役</th>
<td>佐藤　仁司</td>
</tr>
<tr>
<th scope="row">資本金</th>
<td>30,000ドル</td>
</tr>
<tr>
<th scope="row">設立</th>
<td>2007年11月21日</td>
</tr>
<tr>
<th scope="row">住所</th>
<td>
602/43 Dien Bien Phu, Ward 22, Binh Thanh District,<br>
Ho Chi Minh City.
</td>
</tr>
<tr>
<th scope="row">電話番号</th>
<td>
(＋84)-8-8876-7138
</td>
</tr>
<tr>
<th scope="row">FAX</th>
<td>(＋84)-8-3910-5208</td>
</tr>
<tr>
<th scope="row">事業内容</th>
<td>
<dl>
<dt>不動産部事業部</dt>
<dd class="mb10">
<ul class="list clearfix">
<li>アパート マンション コンドミニアム</li>
<li>事務所 店舗 ショールーム</li>
<li>貸し工場 倉庫</li>
<li>事務所用地の賃貸仲介</li>
<li>土地 工業団地</li>
<li>等の仲介業務及び管理業務</li>
</ul>
</dd>

<dt>FACT-LINK事業部</dt>
<dd class="mb10">
<ul class="list clearfix">
<li>ベトナム製造業ポータルサイトの運営</li>
<li>ビジネスマッチング</li>
<li>新規進出企業向け総合コンサルティング</li>
</ul>
</dd>

<dt>貿易事業部</dt>
<dd>
<ul class="list clearfix">
<li>工業用洗浄システム（洗浄装置、洗浄液）の販売</li>
<li>各種工業用化学薬品の販売</li>
<li>土木建築用資材の輸出入販売</li>
<li>工業用化学薬品を中心とした輸出入業務</li>
</ul>
</dd>
</dl>
</td>
</tr>
<tr>
<th scope="row">関連提携会社</th>
<td>
<ul class="list clearfix">
<li>TDC INTERNATIONAL CO.,LTD.</li>
<li>TDC INTERNATIONAL（VN) CO.,LTD.</li>
<li>TOKYO　DEVELOPMENT　CONSULTANTS(VN)CO.,LTD.</li>
<li>テレコムスクエアー</li>
</ul>
</td>
</tr>
</table>
<!-- 13.723059, 100.569775 -->
<h2 id="access" class="ttl_hgroup"><img src="images/ttl02.png" alt="アクセス" width="92" height="21" /></h2>
<div id="access-map" style="height:410px; width:730px;"></div>

<!-- contents_inquiry/ -->
<?php //include("../inc/footer.php"); ?>
<!-- /contents_inquiry -->

</div><!-- / #linkCnt .main -->

<script type="text/javascript">
//<![CDATA[

function initializeAccessMap () {
	//var center = new google.maps.LatLng(10.782547, 106.705761);
	var center = new google.maps.LatLng(10.797333, 106.717426);
	var options = {
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: center,
		disableDefaultUI: true,
		zoomControl: true,
		zoomControlOptions:{
			style:google.maps.ZoomControlStyle.SMALL
		}
	};
	var map = new google.maps.Map(document.getElementById('access-map'), options);

	//var latlng = new google.maps.LatLng(10.782547, 106.705761);
	var latlng = new google.maps.LatLng(10.797333, 106.717426);
	var marker = new google.maps.Marker({
		position: latlng,
		map: map
	});

	var content = '<div id="infoWindow" style="width:250px;height:130px;">' +
	'<h1 style="font-weight:bold;">Tokyo Development Consultants（Vietnam）Co.,Ltd.</h1>' +
	'<p style="margin-top:10px;">602/43 Dien Bien Phu, Ward 22, Binh Thanh District, Ho Chi Minh City</p>' +
	'</div>';
	var infowindow = new google.maps.InfoWindow({
		content: content
	});

	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map, marker);
	});
	infowindow.open(map, marker);
}

// google.maps.event.addDomListener(window, 'load', initializeAccessMap());
initializeAccessMap()

//]]>
</script>

</div>
<!-- == /section_contents == -->

</div>
<!-- === /container === -->

<?php include("../inc/footer.php"); ?>

</body>
</html>