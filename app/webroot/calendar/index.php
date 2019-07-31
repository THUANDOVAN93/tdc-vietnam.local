<?xml version="1.0" encoding="utf-8"?>
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
<link rel="alternate stylesheet" type="text/css" media="all" href="../common/css/font_small.css" title="small" />
<link rel="alternate stylesheet" type="text/css" media="all" href="../common/css/font_meduim.css" title="medium" />
<link rel="alternate stylesheet" type="text/css" media="all" href="../common/css/font_large.css" title="large" />
<script type="text/javascript" src="../common/js/jquery.js"></script>
<script type="text/javascript" src="../common/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="../common/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="../common/js/styleswitcher.js"></script>
<script type="text/javascript" src="../common/js/global.js"></script>
<script type="text/javascript" src="../common/js/tab.js"></script>
<title>東京デベロップメントコンサルタント | TOKYO DEVELOPMENT CONSULTANT</title>
</head>
<body>


<?php
	$current_server_time = date("m");
  	$data = "month".$current_server_time; // ตัวแปร PHP
  	// var_dump($data);
  	// var_dump("class");
  	
  echo '<script type="text/javascript">';
  echo "var data = '$data';"; // ส่งค่า $data จาก PHP ไปยังตัวแปร data ของ Javascript
  echo '</script>';
?>




<!-- === container/ === -->
<div id="container">
<?php include("../inc/sidebar.php"); ?>

<!-- == section_contents/ == -->
<div id="section_contents">
<?php include("../inc/section_header.php"); ?>

<!-- topicpath/ -->
<ul id="topicpath">
<li class="home"><a href="/">TOP</a></li>
<li>ASEANカレンダー</li>
</ul>
<!-- /topicpath -->

<div id="calendarCnt">
<h2><img src="images/header_ttl.png" width="730" height="40" alt="ASEANカレンダー" /></h2>
<ul id="selectNav">
<li><a href="./"><img src="images/btn_asean_on.png"  alt="ASEAN" /></a></li>
<li><a href="vnm.php"><img src="images/btn_myanmar.png"  alt="ベトナム" /></a></li>
<li><a href="thai.php"><img src="images/btn_philippines.png"  alt="タイ" /></a></li>
<li><a href="indonesia.php"><img src="images/btn_indonesia.png"  alt="インドネシア" /></a></li>
<li><a href="malaysia.php"><img src="images/btn_malaysia.png"  alt="マレーシア" /></a></li>
<li><a href="singapore.php"><img src="images/btn_singapore.png"  alt="シンガポール" /></a></li>
<li><a href="philippine.php"><img src="images/btn_thai.png"  alt="フィリピン" /></a></li>
<li><a href="cambodia.php"><img src="images/btn_cambodia.png"  alt="カンボジア" /></a></li>
<li><a href="lao.php"><img src="images/btn_lao.png"  alt="ラオス" /></a></li>
<li><a href="myanmar.php"><img src="images/btn_vnm.png"  alt="ミャンマー" /></a></li>
<li><a href="brunei.php"><img src="images/btn_brunei.png"  alt="ブルネイ" /></a></li>
</ul>

<h3><img src="images/ttl_asean.png" alt="ASEAN" /></h3>
<ul id="tab">
<li><a href="#month01"><img src="images/tab01.png"  alt="1月" /></a></li>
<li ><a  href="#month02"><img src="images/tab02.png"  alt="2月" /></a></li>
<li><a href="#month03"><img src="images/tab03.png"  alt="3月" /></a></li>
<li><a href="#month04"><img src="images/tab04.png"  alt="4月" /></a></li>
<li><a href="#month05"><img src="images/tab05.png"  alt="5月" /></a></li>
<li ><a href="#month06"><img src="images/tab06.png"  alt="6月" /></a></li>
<li><a href="#month07"><img src="images/tab07.png"  alt="7月" /></a></li>
<li><a href="#month08"><img src="images/tab08.png"  alt="8月" /></a></li>
<li><a href="#month09"><img src="images/tab09.png"  alt="9月" /></a></li>
<li><a href="#month10"><img src="images/tab10.png"  alt="10月" /></a></li>
<li><a href="#month11"><img src="images/tab11.png"  alt="11月" /></a></li>
<li><a href="#month12"><img src="images/tab12.png"  alt="12月" /></a></li>
</ul><!-- / #tab -->




<div id="wrap">
<!-- 1月 -->
<div class="area" id="month01">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr>
<th rowspan="9">1月1日（木）</th>
<td class="country">ベトナム</td>
<td>新年<br />
New Year's Day</td>
</tr>
<tr>
<td class="country">タイ</td>
<td>新年<br />
New Year's Day</td>
</tr>
<tr>
<td class="country">インドネシア</td>
<td>新年<br />
New Year</td>
</tr>
<tr>
<td class="country">マレーシア</td>
<td>新年（ジョホール、ケダ、ケランタン、ペルリス、トレンガヌ州以外）<br />
New Year（exclude Johor、Kedah、Kelantan、Perlis、Terengganu）</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>新年<br />
New Year's Day</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>新年<br />
New Year's Day</td>
</tr>
<tr>
<td class="country">カンボジア</td>
<td>新年<br />
New Year's day</td>
</tr>
<tr>
<td class="country">ラオス</td>
<td>新年<br />
New Year's Day</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>新年<br />
New Year's Day</td>
</tr>

<tr>
<th rowspan="2">1月2日（金）</th>
<td class="country">タイ</td>
<td>新年特別休暇<br />
New Year（Additional Public Holiday）</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>特別休日<br />
Additional Special Non-Working Day</td>
</tr>

<tr>
<th rowspan="3">1月3日（土）</th>
<td class="country">インドネシア</td>
<td>ムハマッド降誕祭<br />
Birthday of Prophet Mohammad</td>
</tr>
<tr>
<td class="country">マレーシア</td>
<td>ムハンマド生誕祭<br />
Maulidur Rasul</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>ムハマッド降誕祭<br />
Birthday of Prophet Mohammad</td>
</tr>



<tr class="separate">
<th>1月4日（日）</th>
<td class="country">ミャンマー</td>
<td>独立記念日<br />
Independence Day</td>
</tr>

<tr class="separate">
<th>1月7日（水）</th>
<td class="country">カンボジア</td>
<td>解放記念日<br />
Victory Day over Genocide Regime</td>
</tr>

</table>
</div><!-- / #month01 -->

<!-- 2月 -->
<div class="area" id="month02">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>2月3日（火）</th>
<td class="country">カンボジア</td>
<td>万仏祭<br />
Meak Bochea Day</td>
</tr>

<tr class="separate">
<th>2月12日（木）</th>
<td class="country">ミャンマー</td>
<td>連邦記念日<br />
Union Day</td>
</tr>

<tr class="separate">
<th>2月18日（水）</th>
<td class="country">ベトナム</td>
<td>旧暦大晦日<br />
Chinese New Year’s Eve</td>
</tr>

<tr>
<th rowspan="3">2月19日（木）</th>
<td class="country">インドネシア</td>
<td>イムレック（中国暦2566年正月）<br />
Imlek (Chinese New Year)</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>中国暦正月<br />
Chinese New Year</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>中国暦正月<br />
Chinese New Year</td>
</tr>

<tr>
<th rowspan="2">2月19日（木）<br />
	〜20日（金）</th>
<td class="country">マレーシア</td>
<td>チャイニーズニューイヤー<br />
Chinese New Year</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>中国暦正月<br />
Chinese New Year</td>
</tr>

<tr>
<th>2月19日（木）<br />
	〜24日（火）</th>
<td class="country">ベトナム</td>
<td>旧暦正月（テト）<br />
Chinese New Year (Tet)</td>
</tr>

<tr class="separate">
<th>2月23日（月）</th>
<td class="country">ブルネイ・ダルサラーム</td>
<td>建国記念日<br />
31st National Day of Brunei Darussalam</td>
</tr>

<tr class="separate">
<th>2月25日（水）</th>
<td class="country">フィリピン</td>
<td>エドゥサ革命記念日<br />
EDSA Revolution Anniversary</td>
</tr>

</table>
</div><!-- / #month02 -->

<!-- 3月 -->
<div class="area" id="month03">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>3月2日（月）</th>
<td class="country">ミャンマー</td>
<td>農民の日<br />
Peasant’s Day</td>
</tr>

<tr>
<th rowspan="2">3月4日（水）</th>
<td class="country">タイ</td>
<td>万仏祭<br />
Makha Bucha Day</td>
</tr>
<tr>
<td class="country">ミャンマー</td>
<td>タバウン満月のお祭り<br />
Full Moon of Tabung</td>
</tr>

<tr>
<th rowspan="2">3月8日（日）</th>
<td class="country">カンボジア</td>
<td>国際婦人デー<br />
International Women’s Day</td>
</tr>
<tr>
<td class="country">ラオス</td>
<td>国際婦人デー<br />
International Women Day</td>
</tr>

<tr class="separate">
<th>3月21日（土）</th>
<td class="country">インドネシア</td>
<td>ニュピ（サカ暦1937年新年）<br />
Nyepi, Balinese Saka New Year</td>
</tr>

<tr class="separate">
<th>3月27日（金）</th>
<td class="country">ミャンマー</td>
<td>国軍記念日<br />
Armed Forces Day</td>
</tr>

</table>
</div><!-- / #month03 -->

<!-- 4月 -->
<div class="area" id="month04">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>4月2日（木）</th>
<td class="country">フィリピン</td>
<td>洗足木曜日<br />
Maundy Thursday</td>
</tr>

<tr>
<th rowspan="3">4月3日（金）</th>
<td class="country">インドネシア</td>
<td>キリスト受難日（聖金曜日）<br />
Good Friday</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>グッド・フライデー<br />
Good Friday</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>聖金曜日（グッド・フライデー）<br />
Good Friday</td>
</tr>

<tr class="separate">
<th>4月4日（土）</th>
<td class="country">フィリピン</td>
<td>聖土曜日<br />
Black Saturday</td>
</tr>

<tr class="separate">
<th>4月6日（月）</th>
<td class="country">タイ</td>
<td>チャクリー記念日<br />
Chakri Memorial Day</td>
</tr>

<tr class="separate">
<th>4月9日（木）</th>
<td class="country">フィリピン</td>
<td>勇者の日<br />
Araw ng Kagitingan (Bataan Day)</td>
</tr>

<tr class="separate">
<th>4月12日（日）<br />
	～21日（火）</th>
<td class="country">ミャンマー</td>
<td>ミャンマー新年休暇（水祭り含む）<br />
Myanmar New Year and Water Festival</td>
</tr>

<tr class="separate">
<th>4月13日（月）<br />
	～4月15日（水）</th>
<td class="country">タイ</td>
<td>ソンクラーン<br />
Songkran Festival</td>
</tr>

<tr>
<th rowspan="2">4月14（火）<br />
	～16日（木）</th>
<td class="country">カンボジア</td>
<td>カンボジア正月<br />
Cambodian’s New Year</td>
</tr>
<tr>
<td class="country">ラオス</td>
<td>ラオス新年<br />
Lao New Year</td>
</tr>

<tr>
<td>4月28日（火）</td>
<td class="country">ベトナム</td>
<td>フンヴォン記念日<br />
Hung Vuong Day</td>
</tr>

<tr>
<td>4月30日（木）</td>
<td class="country">ベトナム</td>
<td>戦勝記念日<br />
Victory Day</td>
</tr>

</table>
</div><!-- / #month04 -->

<!-- 5月 -->
<div class="area" id="month05">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr>
<th rowspan="9">5月1日（金）</th>
<td class="country">ベトナム</td>
<td>レイバー・デー<br />
Labour Day</td>
</tr>
<tr>
<td class="country">タイ</td>
<td>レイバー・デイ（※一般企業のみ休み）<br />
National Labour Day</td>
</tr>
<tr>
<td class="country">インドネシア</td>
<td>レイバー・デー<br />
Labour Day</td>
</tr>
<tr>
<td class="country">マレーシア</td>
<td>レイバー・デー<br />
Labour Day</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>レイバー・デー<br />
Labour Day</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>レイバー・デー<br />
Labour Day</td>
</tr>
<tr>
<td class="country">カンボジア</td>
<td>レイバー・デー<br />
International Labor Day</td>
</tr>
<tr>
<td class="country">ラオス</td>
<td>レイバー・デー<br />
Labour Day</td>
</tr>
<tr>
<td class="country">ミャンマー</td>
<td>レイバー・デー<br />
World Worker's Day</td>
</tr>

<tr>
<th rowspan="2">5月2日（土）</th>
<td class="country">カンボジア</td>
<td>仏誕節<br />
Visaka Bochea Day</td>
</tr>
<tr>
<td class="country">ミャンマー</td>
<td>カゾンの満月のお祭り<br />
Full Moon Day of Kasone</td>
</tr>

<tr class="separate">
<th>5月3日（日）</th>
<td class="country">マレーシア</td>
<td>ウェサックデー<br />
Hari Wesak</td>
</tr>

<tr class="separate">
<th>5月5日（火）</th>
<td class="country">タイ</td>
<td>戴冠記念日<br />
Coronation Day</td>
</tr>

<tr class="separate">
<th>5月6日（水）</th>
<td class="country">カンボジア</td>
<td>農耕祭<br />
Royal Ploughing Ceremony</td>
</tr>

<tr class="separate">
<th>5月13日（水）<br/>
	※官公庁のみ休み</th>
<td class="country">タイ</td>
<td>農耕祭<br />
Royal Ploughing Ceremony</td>
</tr>

<tr class="separate">
<th>5月13（水）<br />
	～15日（金）</th>
<td class="country">カンボジア</td>
<td>シハモニ国王誕生日<br />
Royal Birthday of His Majesty PreahBat Samdech Preah BaromneathNorodom Sihamoni</td>
</tr>

<tr class="separate">
<th>5月14日（木）</th>
<td class="country">インドネシア</td>
<td>キリスト昇天祭<br />
Ascension of Christ</td>
</tr>

<tr>
<th rowspan="2">5月16日（土）</th>
<td class="country">インドネシア</td>
<td>ムハマッド昇天祭<br />
Prophet Mohammad’s Ascension</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>モハメット昇天祭<br />
Israk Miraj</td>
</tr>

</table>
</div><!-- / #month05 -->

<!-- 6月 -->
<div class="area" id="month06">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr>
<th rowspan="4">6月1日（月）</th>
<td class="country">タイ</td>
<td>仏誕節<br />
Visakha Bucha Day</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>ベサク・デー<br />
Vesak Day</td>
</tr>
<tr>
<td class="country">カンボジア</td>
<td>子供の日<br />
International and Cambodia Children’s Day</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>ブルネイ王国軍記念日（5/31の振替）<br />
Brunei Armed Force Day (Substitute of 5/31)</td>
</tr>

<tr class="separate">
<th>6月2日（火）</th>
<td class="country">インドネシア</td>
<td>ワイサック（仏教大祭）<br />
Waisak</td>
</tr>

<tr class="separate">
<th>6月6日（土）</th>
<td class="country">マレーシア</td>
<td>国王誕生日<br />
Birthday of SPB Yang Di Pertuan Agong</td>
</tr>

<tr class="separate">
<th>6月12日（金）</th>
<td class="country">フィリピン</td>
<td>独立記念日<br />
Independence Day</td>
</tr>

<tr>
<th rowspan="2">6月18日（木）</th>
<td class="country">カンボジア</td>
<td>モニク前王妃誕生日<br />
Royal Birthday of H.M. Queen Mother Norodom Monineath Sihanouk of Cambodia</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>断食月の初日<br />
First day of Ramadan</td>
</tr>

</table>
</div><!-- / #month06 -->

<!-- 7月 -->
<div class="area" id="month07">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>7月4日（土）</th>
<td class="country">ブルネイ・ダルサラーム</td>
<td>コーラン啓示の祝日<br/>
Revelation of Holy-Quran</td>
</tr>

<tr class="separate">
<th>7月15日（水）</th>
<td class="country">ブルネイ・ダルサラーム</td>
<td>サルタン誕生日<br/>
69th Birthday of His Majesty the Sultan of Brunei Darussalam</td>
</tr>

<tr class="separate">
<th>7月16日（木）</th>
<td class="country">インドネシア</td>
<td>政令指定休日<br />
Government-decreed holidays</td>
</tr>

<tr class="separate">
<th>7月17日（金）</th>
<td class="country">シンガポール</td>
<td>ハリ・ラヤ・プアサ<br />
Hari Raya Puasa</td>
</tr>

<tr>
<th rowspan="2">7月17日（金）<br />
	～18日（土）</th>
<td class="country">インドネシア</td>
<td>イドゥル・フィトリ（1436年断食明け）<br />
Idul Fitri</td>
</tr>
<td class="country">マレーシア</td>
<td>ハリ･ラヤ･プアサ（※祝日は変更の可能性があります）<br />
Hari Raya Puasa</td>
</tr>

<tr class="separate">
<th>7月18日（土）、<br/>
20日（月）、<br/>
21日（火）</th>
<td class="country">ブルネイ・ダルサラーム</td>
<td>断食明け大祭（振替日含む）<br/>
Eid El Fitri（including substitute day)</td>
</tr>

<tr class="separate">
<th>7月19日（日）</th>
<td class="country">ミャンマー</td>
<td>殉教者の日<br />
Martry’s Day</td>
</tr>

<tr class="separate">
<th>7月20日（月）<br />
	～21日（火）</th>
<td class="country">インドネシア</td>
<td>政令指定休日<br />
Government-decreed holidays</td>
</tr>

<tr class="separate">
<th>7月30日（木）</th>
<td class="country">タイ</td>
<td>三宝節<br />
Arsarnha Bucha Day</td>
</tr>

<tr>
<th rowspan="2">7月31日（金）</th>
<td class="country">タイ</td>
<td>入安居（※官公庁のみ休み）<br />
Khao Phansa Day</td>
</tr>
<tr>
<td class="country">ミャンマー</td>
<td>ワソの満月のお祭り<br />
Full Moon of Waso</td>
</tr>

</table>
</div><!-- / #month07 -->

<!-- 8月 -->
<div class="area" id="month08">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>8月9日（日）<br/>
	※翌日振替休日</th>
<td class="country">シンガポール</td>
<td>独立記念日<br />
National Day</td>
</tr>

<tr class="separate">
<th>8月12日（水）</th>
<td class="country">タイ</td>
<td>王妃誕生日<br />
H.M. The Queen’s Birthday</td>
</tr>

<tr class="separate">
<th>8月17日（月）</th>
<td class="country">インドネシア</td>
<td>インドネシア共和国独立記念日<br />
Independence Day</td>
</tr>

<tr class="separate">
<th>8月21日（金）</th>
<td class="country">フィリピン</td>
<td>ニノイ・アキノ・デー<br />
Ninoy Aquino Day</td>
</tr>

<tr>
<th rowspan="2">8月31日（月）</th>
<td class="country">マレーシア</td>
<td>国家記念日<br />
National Day</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>国民英雄の日<br />
National Heroes's Day</td>
</tr>

</table>
</div><!-- / #month08 -->

<!-- 9月 -->
<div class="area" id="month09">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr>
<th>9月2日（水）</th>
<td class="country">ベトナム</td>
<td>独立記念日<br/>
National Day</td>
</tr>

<tr class="separate">
<th>9月16日（水）</th>
<td class="country">マレーシア</td>
<td>マレーシア･デイ<br />
Malaysia Day</td>
</tr>

<tr>
<th rowspan="4">9月24日（木）</th>
<td class="country">インドネシア</td>
<td>イドゥル・アドハ1436年（メッカ巡礼最終日）<br />
Idul Adha</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>犠牲祭<br />
Hari Raya Haji</td>
</tr>
<tr>
<td class="country">カンボジア</td>
<td>憲法記念日<br />
Constitution Day</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>犠牲祭<br/>
Eid El Adha</td>
</tr>

<tr class="separate">
<th>9月24日（木）<br />
	〜25日（金）</th>
<td class="country">マレーシア</td>
<td>ハリラヤ・ハジ（※祝日は変更の可能性があります）<br />
Hari Raya Haji</td>
</tr>

</table>
</div><!-- / #month09 -->

<!-- 10月 -->
<div class="area" id="month10">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>10月11（日）<br />
	～13日（火）</th>
<td class="country">カンボジア</td>
<td>カンボジアのお盆<br/>
Pchum Ben Day</td>
</tr>

<tr>
<th rowspan="3">10月14日（水）</th>
<td class="country">インドネシア</td>
<td>イスラム暦1437年新年<br />
Moslem New Yearrsama</td>
</tr>
<tr>
<td class="country">マレーシア</td>
<td>イスラム暦新年<br />
Awal Muharram (Maal Hijrah)</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>イスラム暦1437年新年<br/>
Moslem New Yearrsama</td>
</tr>

<tr class="separate">
<th>10月15日（木）</th>
<td class="country">カンボジア</td>
<td>ノロドムシハヌーク前国王記念日<br/>
Anniversary of H.M. King Father Norodom Sihanouk of Cambodia</td>
</tr>

<tr>
<th rowspan="2">10月23日（金）</th>
<td class="country">タイ</td>
<td>チュラローンコーン大王記念日<br />
Chulalongkorn Memorial Day</td>
</tr>
<tr>
<td class="country">カンボジア</td>
<td>パリ平和条約記念日<br/>
Paris Peace Day</td>
</tr>

<tr class="separate">
<th>10月28日（水）</th>
<td class="country">ミャンマー</td>
<td>タディンギットの満月のお祭り<br />
Full Moon of Thadingyut</td>
</tr>

<tr class="separate">
<th>10月29日（木）</th>
<td class="country">カンボジア</td>
<td>シハモニ国王戴冠記念日<br/>
Royal Coronation of H.M. Preah Bat Samdech Preah</td>
</tr>

</table>
</div><!-- / #month10 -->

<!-- 11月 -->
<div class="area" id="month11">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>11月1日（日）</th>
<td class="country">フィリピン</td>
<td>諸聖人の日<br />
All Saints’ Day</td>
</tr>

<tr class="separate">
<th>11月9日（月）</th>
<td class="country">カンボジア</td>
<td>独立記念日<br/>
Independence Day</td>
</tr>

<tr class="separate">
<th>11月10日（火）</th>
<td class="country">マレーシア</td>
<td>ディーパバリ（※祝日は変更の可能性があります）<br />
Hari Deepavali</td>
</tr>

<tr class="separate">
<th>11月10日（火）<br/>
	※変更の可能性有</th>
<td class="country">シンガポール</td>
<td>ディパバリ<br />
Deepavali</td>
</tr>

<tr class="separate">
<th>11月11日（水）</th>
<td class="country">ミャンマー</td>
<td>ヒンズー教の光の祭<br />
Deepawali</td>
</tr>

<tr class="separate">
<th>11月24日（火）<br />
	～26日（木）</th>
<td class="country">カンボジア</td>
<td>水祭り<br/>
Water and Moon Festival</td>
</tr>

<tr class="separate">
<th>11月26日（木）</th>
<td class="country">ミャンマー</td>
<td>ナショナル・デー<br />
National Day</td>
</tr>

<tr class="separate">
<th>11月30日（月）</th>
<td class="country">フィリピン</td>
<td>ボニファショ誕生記念日<br />
Bonifacio Day</td>
</tr>

</table>
</div><!-- / #month11 -->

<!-- 12月 -->
<div class="area" id="month12">
<table cellspacing="0" cellpadding="0" summary="ASEANカレンダー">
<col width="17%" />
<col width="28%" />
<col width="" />
<thead>
<tr>
<th scope="col">日付</th>
<th scope="col">国名</th>
<th scope="col">祝祭日名</th>
</tr>
</thead>

<tr class="separate">
<th>12月2日（水）</th>
<td class="country">ラオス</td>
<td>ラオス新年<br />
Lao New Year</td>
</tr>

<tr class="separate">
<th>12月5日（土）</th>
<td class="country">タイ</td>
<td>国王誕生日<br />
H.M. The King’s Birthday</td>
</tr>

<tr class="separate">
<th>12月6日（日）</th>
<td class="country">ミャンマー</td>
<td>ナショナル・デー<br />
National Day</td>
</tr>

<tr class="separate">
<th>12月7日（月）</th>
<td class="country">タイ</td>
<td>国王誕生日（振替休日）<br />
H.M. The King’s Birthday（Substitute Holiday）</td>
</tr>

<tr>
<th rowspan="2">12月10日（木）</th>
<td class="country">タイ</td>
<td>憲法記念日<br />
Constitution Day</td>
</tr>
<tr>
<td class="country">カンボジア</td>
<td>国連人権デー<br/>
Independence Day</td>
</tr>

<tr>
<th rowspan="4">12月24日（木）</th>
<td class="country">インドネシア</td>
<td>政令指定休日<br />
Government-decreed holidays</td>
</tr>
<tr>
<td class="country">マレーシア</td>
<td>ムハンマド生誕祭<br />
Maulidur Rasul</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>特別休日<br />
Additional Special Non-Working Day</td>
</tr>
<tr>
<td class="country">ブルネイ・ダルサラーム</td>
<td>ムハマッド降誕祭<br/>
Birthday of Prophet Mohammad</td>
</tr>

<tr>
<th rowspan="5">12月25日（金）</th>
<td class="country">インドネシア</td>
<td>クリスマス<br />
Christmas</td>
</tr>
<tr>
<td class="country">マレーシア</td>
<td>クリスマス<br />
Christmas</td>
</tr>
<tr>
<td class="country">シンガポール</td>
<td>クリスマス<br />
Christmas</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>クリスマス<br />
Christmas</td>
</tr>
<tr>
<td class="country">ミャンマー</td>
<td>クリスマス<br />
Christmas</td>
</tr>

<tr class="separate">
<th>12月26日（土）</th>
<td class="country">ブルネイ・ダルサラーム</td>
<td>クリスマス（12/25の振替）<br/>
Christmas（substitute of 12/25）</td>
</tr>

<tr class="separate">
<th>12月30日（水）</th>
<td class="country">フィリピン</td>
<td>リサール・デー<br />
Rizal Day</td>
</tr>

<tr>
<th rowspan="2">12月31日（木）</th>
<td class="country">タイ</td>
<td>大晦日<br />
New Year’s Eve</td>
</tr>
<tr>
<td class="country">フィリピン</td>
<td>大晦日<br />
Last Day of the Year</td>
</tr>


</table>
</div><!-- / #month12 -->
</div><!-- / #wrap -->
</div><!-- / #newsCnt -->
</div><!-- / #section_contents -->
<!-- == /section_contents == -->

</div>
<!-- === /container === -->

<?php include("../inc/footer.php"); ?>

</body>
</html>