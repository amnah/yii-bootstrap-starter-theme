<?php

// setup versions
$bootstrapVersion = "3.0.0";
$fontAwesomeVersion = "3.2.1";
$jqueryVersion = "2.0.3";
$queryUiVersion = "1.10.3";

// setup scriptmap for jquery and jquery-ui cdn
$cs = Yii::app()->clientScript;
$cs->scriptMap["jquery.js"] = "//ajax.googleapis.com/ajax/libs/jquery/$jqueryVersion/jquery.min.js";
$cs->scriptMap["jquery.min.js"] = $cs->scriptMap["jquery.js"];
$cs->scriptMap["jquery-ui.min.js"] = "//ajax.googleapis.com/ajax/libs/jqueryui/$queryUiVersion/jquery-ui.min.js";

// fix jquery.ba-bbq.js for jquery 1.9+ (removed $.browser)
// https://github.com/joshlangner/jquery-bbq/blob/master/jquery.ba-bbq.min.js
$cs->scriptMap["jquery.ba-bbq.js"] = Yii::app()->theme->baseUrl . "/assets/js/jquery.ba-bbq.min.js";

// register js files
$cs->registerCoreScript('jquery');
$cs->registerScriptFile("//netdna.bootstrapcdn.com/bootstrap/$bootstrapVersion/js/bootstrap.min.js", CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . "/assets/js/main.js", CClientScript::POS_END);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/<?php echo $bootstrapVersion; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/<?php echo $fontAwesomeVersion; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl . "/assets/js/html5shiv.js"; ?>"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl . "/assets/js/respond.min.js"; ?>"></script>
    <![endif]-->

    <!-- Javascript -->
    <script>var baseUrl = "<?php echo Yii::app()->baseUrl; ?>";</script>

    <!-- NOTE: Yii uses this title element for its asset manager, so keep it last -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                <a class="navbar-brand" href="<?php echo Yii::app()->baseUrl; ?>"><?php echo Yii::app()->name; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!-- Main nav -->
                <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav navbar-nav'),
                    'items'=>array(
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                        array('label'=>'Contact', 'url'=>array('/site/contact')),
                    ),
                )); ?>

                <!-- Right nav -->
                <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav navbar-nav pull-right'),
                    'items'=>array(
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                )); ?>

                <?php /*
                    <ul class="nav navbar-nav pull-right">


                        <?php if (Yii::app()->user->isGuest): ?>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Log in <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><form class="navbar-form form-inline pull-right">
                                            <input type="text" placeholder="Email">
                                            <input type="password" placeholder="Password">
                                            <button type="submit" class="btn">Sign in</button>
                                        </form></li>
                                </ul>

                            </li>
                        <?php else: ?>
                            <?php $username = Yii::app()->user->name; ?>
                            <li><?php echo CHtml::link("Logout ($username)", array("/site/logout")); ?></li>
                        <?php endif; ?>
                    </ul>
                    */ ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <div class="container">

        <?php // NOTE: this does not use bootstrap's breadcrumbs component because CBreadcrumbs doesn't use UL/LI ?>
        <?php // You can implement it yourself or use Chris83's - http://www.yiiframework.com/extension/bootstrap/ ?>
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?>
        <?php endif?>

        <div id="main-content">

            <?php if (!$this->menu): ?>

                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $content; ?>
                    </div>
                </div>

            <?php else: ?>

                <div class="row">
                    <div class="col-lg-10">
                        <?php echo $content; ?>
                    </div>

                    <div class="col-lg-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">Operations</div>
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items'=>$this->menu,
                                    'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
                                ));
                                ?>
                        </div>
                    </div>
                </div>

            <?php endif; ?>


        </div> <!-- /#main-content -->

        <hr>

        <footer>
            <p>
                &copy; <?php echo Yii::app()->name; ?>. All Rights Reserved.<br/>
                Profiling: <?php echo round(Yii::getLogger()->getExecutionTime(),2); ?>s / <?php echo round(Yii::getLogger()->getMemoryUsage()/1048576,2); ?>mb
            </p>
        </footer>

    </div> <!-- /.container -->

</body>
</html>
