<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

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

    <header>
	<div id="mainmenu">
        <div class="creative">
            <h1>Creative</h1>
            <div class="plus">
                <img src="/blog/images/plus.png" alt="plus"/>
            </div>
        </div>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('//post/index')),
				array('label'=>'Contact', 'url'=>array('//site/contact')),
                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
    </header><!-- header -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?> <!-- breadcrumbs -->
	<?php endif?>
    <div id="main">
	<?php echo $content; ?>
    </div>
    <div class="sidebar">

    </div>

    <div class="clear"></div>

    <footer>
	<div id="footer_2">
		 <p>Quisque turpis lorem, vehicula eget rhoncus vel, ultricies ac mauris. Morbi lectus velit, tincidunt congue pharetra eu, varius nec libero.
            Vivamus justo risus, dignissim ac vestibulum eget, egestas rutrum magna.
            Etiam malesuada nisi et nisl volutpat tristique. </p>
         <ul class="socials">
            <li class="socials"><a href="http://facebook.com"><img src="/blog/images/fb.png" alt="fb"/></a></li>
            <li class="socials"><a href="http://twitter.com"><img src="/blog/images/twitter.png" alt="twitter"/></a></li>
            <li class="socials"><a href="http://facebook.com"><img src="/blog/images/rss.png" alt="rss"></a></li>
         </ul>
         <p id="copyright">Copyright 2012 footer here</p>
    </div>
    <div id="newsletter">
        <form method="post" action="addInformation.php">
            <input class="email" type="text" name="email" placeholder="            Join Our Newsletter Here" size="445px">
            <input class="join" type="image" src="/blog/images/join_button.png" alt="join">
        </form>
    </div>
    </footer><!-- footer -->

</div><!-- page -->

</body>
</html>
