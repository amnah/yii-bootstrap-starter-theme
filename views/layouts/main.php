<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!-- NOTE: keep the order like this (bootstrap, bootstrap-responsive, {custom}) -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/ico/apple-touch-icon-57-precomposed.png">

    <!-- NOTE: Yii uses this title element for its asset manager, so keep it last -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <?php echo CHtml::link(Yii::app()->name, array("/site/index"), array("class"=>"brand")); ?>

            <div class="nav-collapse">
                <!-- main nav -->
                <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'items'=>array(
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                        array('label'=>'Contact', 'url'=>array('/site/contact')),
                    ),
                )); ?>

                <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav pull-right'),
                    'items'=>array(
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>"Logout", 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
            </div><!--/.nav-collapse -->

        </div>
    </div>
</div>

<div class="container-fluid">

    <?php // NOTE: this does not use bootstrap's breadcrumbs component because CBreadcrumbs doesn't use UL/LI ?>
    <?php // You can implement it yourself or use Chris83's - http://www.yiiframework.com/extension/bootstrap/ ?>
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?>
    <?php endif?>

    <div id="main-content">
        <?php echo $content; ?>
    </div>

    <hr>

    <footer>
        <p>
            &copy; <?php echo Yii::app()->name; ?>. All Rights Reserved.<br/>
            Profiling: <?php echo round(Yii::getLogger()->getExecutionTime(),2); ?>s / <?php echo round(Yii::getLogger()->getMemoryUsage()/1048576,2); ?>mb
        </p>
    </footer>

</div><!--/.fluid-container-->

<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>
