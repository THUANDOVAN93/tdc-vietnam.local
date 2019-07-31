<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title></title>
<?php $url = '/'; ?>
<?php if(isset($this->params['admin']) && $this->params['admin'] == '1') { ?>
<?php     $url = '/admin'; ?>
<?php } ?>
	<meta http-equiv="refresh" content="0; URL=<?php echo $url; ?>">
</head>
<body>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
