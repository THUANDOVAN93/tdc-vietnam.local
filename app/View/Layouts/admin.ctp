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
	<?php echo $this->fetch('script'); ?>
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="<?php echo $this->webroot; ?>admin"><img src="<?php echo $this->webroot; ?>img/logo.png" alt="TDC ADMINISTRATION CONSOLE" /></a>
				<ul class="nav pull-right">
<?php if (!empty($roleStaff)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo __('property-management'); ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/residence_buildings"><?php echo __('residential-property-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/residence_properties"><?php echo __('residential-room-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_buildings"><?php echo __('office-property-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_properties"><?php echo __('office-room-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_buildings"><?php echo __('factory-property-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_properties"><?php echo __('factory-parcel-management'); ?></a></li>
						</ul>
					</li>
<?php } ?>
<?php if (!empty($roleManager)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo __('user-management'); ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/users"><?php echo __('user-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/roles"><?php echo __('permission-management'); ?></a></li>
						</ul>
					</li>
<?php } ?>
<?php if (!empty($roleAdmin)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo __('master-admin'); ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/add_informations"><?php echo __('top-display-item-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/areas"><?php echo __('area-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_areas"><?php echo __('factory-area-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/lines"><?php echo __('route-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/stations"><?php echo __('station-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/residence_categories"><?php echo __('residential-type-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/residence_layouts"><?php echo __('residential-floor-plan-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_categories"><?php echo __('management-by-office-type'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_layouts"><?php echo __('office-floor-plan-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/office_person_nums"><?php echo __('office-number-management'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_categories"><?php echo __('factory-type-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_sub_categories"><?php echo __('partition-type-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/industrial_parks"><?php echo __('industrial-park-management'); ?></a></li>
							<li><a href="<?php echo $this->webroot; ?>admin/factory_tenants"><?php echo __('factory-tenant-management'); ?></a></li>
						</ul>
					</li>
<?php } ?>
<?php if (!empty($username)) { ?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo $username; ?>
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $this->webroot; ?>admin/logout"><?php echo __('logout'); ?></a></li>
							<li class="divider"></li>
							<li><a href="jpn" class="lang"><?php echo __('japan'); ?></a></li>
							<li><a href="eng" class="lang"><?php echo __('english'); ?></a></li>
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

</body>
</html>
