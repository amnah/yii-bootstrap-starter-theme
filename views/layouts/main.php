<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!-- NOTE: keep the order like this (bootstrap and then main) -->
    <?php $bootstrapVersion = "2.3.1"; ?>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/<?php echo $bootstrapVersion; ?>/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le javascript -->
    <script>var baseUrl = "<?php echo Yii::app()->baseUrl; ?>";</script>
    <?php
        // load main scripts
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile("//netdna.bootstrapcdn.com/twitter-bootstrap/$bootstrapVersion/js/bootstrap.min.js", CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/assets/js/main.js", CClientScript::POS_END);

        // fix jquery.ba-bbq.js for jquery 1.9 (removed $.browser)
        Yii::app()->clientScript->scriptMap["jquery.ba-bbq.js"] = Yii::app()->theme->baseUrl . "/assets/js/jquery.ba-bbq.js";
    ?>

    <!-- NOTE: Yii uses this title element for its asset manager, so keep it last -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">

            <!-- NAV COLLAPSE -->
            <?php $collapse = false; ?>
            <!-- NAV COLLAPSE -->

            <?php if ($collapse): ?>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" href="javascript:void(0);">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            <?php endif; ?>

            <?php echo CHtml::link(Yii::app()->name, array("/site/index"), array("class"=>"brand")); ?>

            <div class="<?php echo $collapse ? "nav-collapse" : "nav"; ?>">
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
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
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

</body>
</html>