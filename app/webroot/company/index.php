<?php

	ini_set('session.save_path', dirname(dirname(dirname(__FILE__))).'/tmp/sessions');
	session_name("CAKEPHP");
	session_start();

	if ($_SESSION['Config']['language'] === NULL) {
		$_SESSION['Config']['language'] = 'jpn';
	}

	if (isset($_GET['lang'])) {
		$_SESSION['Config']['language'] = $_GET['lang'];
	}
	
	$lang = $_SESSION['Config']['language'];

	$pageContent = array();
	if ($lang == 'jpn') {
		$pageContent['metaTitle'] = '会社情報｜東京デベロップメントコンサルタント';
		$pageContent['breadcrumb-1'] = '会社情報';
		$pageContent['companyName'] = '社名';
		$pageContent['ceo'] = '代表取締役';
		$pageContent['ceoName'] = '佐藤　仁司';
		$pageContent['capitalStock'] = '資本金';
		$pageContent['dollar'] = 'ドル';
		$pageContent['establishment'] = '設立';
		$pageContent['establishmentDate'] = '2007年11月21日';
		$pageContent['streetAddress'] = '住所';
		$pageContent['phoneNumber'] = '電話番号';
		$pageContent['businessDes'] = '事業内容';
		$pageContent['businessDesCt-1'] = '不動産部事業部';
		$pageContent['businessDesCt-2'] = '貸し工場 倉庫';
		$pageContent['businessDesCt-3'] = '土地 工業団地';
		$pageContent['businessDesCt-4'] = '等の仲介業務及び管理業務';
		$pageContent['businessDesCt-5'] = '関連提携会社';
		$pageContent['businessDesCt-6'] = 'テレコムスクエアー';
		$pageContent['boxContactCt'] = 'お問い合わせフォーム';
		$pageContent['sologan'] = '物件についてのお問い合わせはTDCベトナムまで';
		$pageContent['companyProfile'] = '会社概要';
		$pageContent['mapTit'] = 'アクセス';
		$pageContent['aboutUs'] = '会社情報';
	} else {
		$pageContent['metaTitle'] = 'Company Information | Tokyo Development Consultant';
		$pageContent['breadcrumb-1'] = 'About us';
		$pageContent['companyName'] = 'Company name';
		$pageContent['ceo'] = 'CEO';
		$pageContent['ceoName'] = 'Hitoshi Sato';
		$pageContent['capitalStock'] = 'Capital stock';
		$pageContent['dollar'] = ' Dollar';
		$pageContent['establishment'] = 'Establishment';
		$pageContent['establishmentDate'] = '21 November 2007';
		$pageContent['streetAddress'] = 'Street address';
		$pageContent['phoneNumber'] = 'Phone number';
		$pageContent['businessDes'] = 'Business description';
		$pageContent['businessDesCt-1'] = 'Real Estate Department';
		$pageContent['businessDesCt-2'] = 'Rental factory Warehouse';
		$pageContent['businessDesCt-3'] = 'Land Industrial park';
		$pageContent['businessDesCt-4'] = 'Brokerage and management';
		$pageContent['businessDesCt-5'] = 'Affiliated companies';
		$pageContent['businessDesCt-6'] = 'Telecom Square';
		$pageContent['boxContactCt'] = 'Contact us';
		$pageContent['sologan'] = 'Contact us for free advice and consultation !';
		$pageContent['companyProfile'] = 'Company Profile';
		$pageContent['mapTit'] = 'Map';
		$pageContent['aboutUs'] = 'About Us';
	}
	$currentPage = "company";
?>
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
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDRe-SLe-oVJhmp1x0wDGUdtVOmFceE8eU&v=quarterly&v=3"></script>
	<title><?php echo $pageContent['metaTitle']; ?></title>
	<script type="text/javascript" src="../common/js/ga.js"></script>
	<script src="https://kit.fontawesome.com/a42b6e358f.js"></script>
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
	<li><?php echo $pageContent['breadcrumb-1']; ?></li>
</ul>
<!-- /topicpath -->

<div id="companyCnt" class="main">

<div class="detail_header clearfix">
	<h1 class="title-row"><?php echo $pageContent['aboutUs']; ?></h1>
</div>

<h2 class="detail_hgroup"><?php echo $pageContent['companyProfile']; ?></h2>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<th scope="row"><?php echo $pageContent['companyName']; ?></th>
<td>TDC INTERNATIONAL (VIET NAM) COMPANY LIMITED.</td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['ceo']; ?></th>
<td><?php echo $pageContent['ceoName']; ?></td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['capitalStock']; ?></th>
<td>30,000<?php echo $pageContent['dollar']; ?></td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['establishment']; ?></th>
<td><?php echo $pageContent['establishmentDate']; ?></td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['streetAddress']; ?></th>
<td>
602/43 Dien Bien Phu, Ward 22, Binh Thanh District,<br>
Ho Chi Minh City.
</td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['phoneNumber']; ?></th>
<td>
(＋84)-8-8876-7138
</td>
</tr>
<tr>
<th scope="row">FAX</th>
<td>(＋84)-8-3910-5208</td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['businessDes']; ?></th>
<td>

<dl>

	<dt><?php echo $pageContent['businessDesCt-1']; ?></dt>
	<dd class="mb10">
	<ul class="list clearfix">
	<li><?php echo $pageContent['businessDesCt-2']; ?></li>
	<li><?php echo $pageContent['businessDesCt-3']; ?></li>
	</ul>
	<span><?php echo $pageContent['businessDesCt-4']; ?></span>
	</dd>

</dl>
</td>
</tr>
<tr>
<th scope="row"><?php echo $pageContent['businessDesCt-5']; ?></th>
<td>
<ul class="list clearfix">
<li>TDC INTERNATIONAL CO.,LTD.</li>
<li>TDC INTERNATIONAL（VN) CO.,LTD.</li>
<li>TOKYO　DEVELOPMENT　CONSULTANTS(VN)CO.,LTD.</li>
<li><?php echo $pageContent['businessDesCt-6']; ?></li>
</ul>
</td>
</tr>
</table>
<!-- 13.723059, 100.569775 -->
<!-- <h2 id="access" class="ttl_hgroup"><img src="images/ttl02.png" alt="アクセス" width="92" height="21" /></h2> -->
<h2 id="access" class="detail_hgroup"><?php echo $pageContent['mapTit']; ?></h2>
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
	'<h1 style="font-weight:bold;">TDC INTERNATIONAL (VIET NAM) COMPANY LIMITED.</h1>' +
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