<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title><?php echo $title_for_layout; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<?php echo $this->Html->script('jquery-1.7.2.min'); ?>

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>

	<?php //echo $this->Html->css('bootstrap-responsive.min'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php echo $this->Html->css('admin'); ?>
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->fetch('css'); ?>

	<script type="text/javascript">
		$(function(){
			$('a.lang').on('click',function(e){
				e.preventDefault();
				$.post('/lang/'+$(this).attr('href'),function(){location.reload()});
			})
		})
	</script>
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="<?php echo $this->webroot; ?>admin"><img src="<?php echo $this->webroot; ?>img/logo.png" alt="TDC ADMINISTRATION CONSOLE" /></a>
				<ul class="nav pull-right">
<?php /* 物件管理 */ ?>
<?php if (!empty($roleStaff)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							物件管理
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/residence_buildings">住居物件管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/residence_properties">住居部屋管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_buildings">事務所物件管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_properties">事務所部屋管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_buildings">工場物件管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_properties">工場区画管理</a></li>
						</ul>
					</li>
<?php } ?>
<?php /* ユーザー管理 */ ?>
<?php if (!empty($roleManager)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							ユーザー管理
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/users">ユーザー管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/roles">権限管理</a></li>
						</ul>
					</li>
<?php } ?>
<?php /* マスタ管理 */ ?>
<?php if (!empty($roleAdmin)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							マスタ管理
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/add_informations">TOP表示項目管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/areas">エリア管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_areas">工場エリア管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/lines">路線管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/stations">駅管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/residence_categories">住居種別管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/residence_layouts">住居間取り管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_categories">事務所種別管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_layouts">事務所間取り管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_person_nums">事務所人数管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_categories">工場種別管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_sub_categories">区画種別管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/industrial_parks">工業団地内外管理</a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_tenants">工場入居企業管理</a></li>
						</ul>
					</li>
<?php } ?>
<?php /* ログイン名表示 */ ?>
<?php if (!empty($username)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo $username; ?> さん
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/logout">ログアウト</a></li>
							<li class="divider"></li>
							<li><a href="ja" class="lang">日本語</a></li>
							<li><a href="en" class="lang">English</a></li>
						</ul>
					</li>
<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
<?php echo $this->Session->flash('auth-alert'); ?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('db-alert'); ?>
<?php echo $this->Session->flash('update-alert'); ?>

		<?php echo $this->fetch('content'); ?>

	</div> <!-- /container -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
