<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <?php $module=mt_rand(100000,999999);?>
    <meta name="timestamp" content="<?php echo time();?>" />
    <meta name="token" content="<?php echo md5($module.'#$@%!^*'.time());?>" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?>1111</div>
	</div><!-- header -->

	<div id="mainmenu">
        <a href="<?=Yii::app()->createUrl('reception/home/index')?>">test</a>
        <a href="<?=Yii::app()->createUrl('home/index')?>">test2</a>
   		<?php
		$confun = CommFun::userIsLogin();
		if(!empty($confun)) :?>
		<a href="<?=Yii::app()->createUrl('reception/home/index')?>">hello <?=CommFun::getUserName()?></a>
		<a href="<?=Yii::app()->createUrl('reception/member/out')?>">退出</a>
		<?php else:;?>
			<a href="<?=Yii::app()->createUrl('reception/member/login')?>">登录</a>
		<?php endif;?>

	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>


	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>