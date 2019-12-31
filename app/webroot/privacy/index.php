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
		$pageContent['metaTitle'] = 'プライバシーポリシー ｜ 東京デベロップメントコンサルタント';
		$pageContent['privacyPolicy'] = 'プライバシーポリシー';
		$pageContent['boxContactCt'] = 'お問い合わせフォーム';
		$pageContent['sologan'] = '物件についてのお問い合わせはTDCベトナムまで';
		
	} else {
		$pageContent['metaTitle'] = 'Privacy Policy | Tokyo Development Consultant';
		$pageContent['privacyPolicy'] = 'Privacy Policy';
		$pageContent['boxContactCt'] = 'Contact us';
		$pageContent['sologan'] = 'Contact us for free advice and consultation !';
	}
	$currentPage = "privacy";
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
	<link rel="canonical" href="http://www.tdc-thai.com/privacy/" />
	<script type="text/javascript" src="../common/js/jquery.js"></script>
	<script type="text/javascript" src="../common/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="../common/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="../common/js/styleswitcher.js"></script>
	<script type="text/javascript" src="../common/js/global.js"></script>
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
	<li><?php echo $pageContent['privacyPolicy']; ?></li>
</ul>
<!-- /topicpath -->

<div id="companyCnt" class="main">
<?php if($lang == 'jpn') { ?>
	<h2 class="header_hgroup mb30"><img src="images/header_ttl.png" alt="プライバシーポリシー" width="730" height="40" /></h2>
	<p>当社は、個人情報を取得する際は、利用目的を明確にし、適法かつ公正な方法で取得するものとし、定めた利用目的の範囲を超えて利用することはありません。<br />
	また、目的外利用を行わないために必要となる措置を講じます。</p>

	<h3 class="sttl_hgroup"><span>個人情報の定義</span></h3>
	<p>個人情報とは、ユーザー個人に関する情報であって、当該情報を構成する氏名、住所、電話番号、メールアドレス、学校名その他の記述等により当該ユーザーを識別できるものをいいます。<br />
	また、その情報のみでは識別できない場合でも、他の情報と容易に照合することができ、結果的にユーザー個人を識別できるものも個人情報に含まれます。</p>

	<h3 class="sttl_hgroup"><span>個人情報の利用目的</span></h3>
	<p>個人情報の利用目的は以下の通りです。</p>
	<ul>
	<li>1. お取引等に関するご連絡のため、お取引先様の個人情報を取り扱います。</li>
	<li>2. お問合せ時のご本人確認及び対応のため、お問合せいただいたご本人の個人情報を取り扱います。</li>
	<li>3. 会員の個人認証及び会員向け各種サービスの提供のため、、個人情報を取り扱います。</li>
	<li>4. その他ご本人に事前にご同意いただいた目的のため、個人情報を取り扱います。</li>
	</ul>

	<h3 class="sttl_hgroup"><span>個人情報の第三者提供</span></h3>
	<p>当社は、法令等による場合を除き、本人の同意を得ずに個人情報を第三者に提供することはありません。<br />
	但し、公開を目的に不動産会社からお預かりした不動産物件情報はこの限りではありません。</p>

	<h3 class="sttl_hgroup"><span>個人情報取り扱いの委託</span></h3>
	<p>当社は、業務運営上、お客様により良いサービスを提供するために、業務の一部を外部に委託することがあります。その際に業務委託先に個人情報を預けることがあります。<br />
	この場合、十分な個人情報の保護の水準を満たしている委託先を選定し、個人情報の保護に関する委託契約を締結すると共に、委託先に対する管理・監督を徹底します。</p>
<?php } else { ?>
	<h2 class="header_hgroup mb30 title-row">Privacy Policy</h2>
	<p>When acquiring personal information, the Company shall clarify the purpose of use, obtain it in a fair manner, and never use it beyond the scope of the purpose of use.<br />
	In addition, we will take measures that are necessary to prevent use out of the purpose.</p>

	<h3 class="sttl_hgroup"><span>Definition of personal information</span></h3>
	<p>Personal information is information about the user personally, which means that the user can be identified by that information such as the name, address, telephone number, e-mail address, school name and other descriptions that constitute the information.<br />
	In addition, even if it can not be identified using that information alone, it can be easily compared with other information, and as a result, personal information can also be defined as personal information.</p>

	<h3 class="sttl_hgroup"><span>Purpose of use of personal information</span></h3>
	<p>The purpose of using personal information is as follows.</p>
	<ul>
	<li>1. We use the personal information of our business partners in order to contact regarding transactions.</li>
	<li>2. We use the personal information of the inquired person for identification and response at the time of inquiry.</li>
	<li>3. We use the personal information in order to provide members with personal identification and services for members.</li>
	<li>4. We use the personal information for the purpose which is confirmed by the person in advance.</li>
	</ul>

	<h3 class="sttl_hgroup"><span>Third-party provision of personal information</span></h3>
	<p>The Company will not provide personal information to third parties without obtaining the consent of the person, except in cases where it is required by law. However, real estate property information collected from a real estate company for the purpose of disclosure is not limited to this.</p>

	<h3 class="sttl_hgroup"><span>Consignment of personal information handling</span></h3>
	<p>In business operations, we may outsource some of our operations in order to provide customers with better services. At that time, we may deposit personal information with the business consignee. In this case, we will select a subcontractor that meets the sufficient level of protection of personal information, conclude a consignment contract for the protection of personal information, and thoroughly control and supervise the subcontractor.</p>
<?php } ?>
</div><!-- / #linkCnt .main -->

</div>
<!-- == /section_contents == -->

</div>
<!-- === /container === -->

<?php include("../inc/footer.php"); ?>

</body>
</html>