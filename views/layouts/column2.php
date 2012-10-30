<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">

    <div class="span3">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'contentCssClass'=>'well sidebar-nav',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items'=>$this->menu,
            'htmlOptions'=>array('class'=>'nav nav-list'),
        ));
        $this->endWidget();
        ?>
    </div>

    <div class="span9">
        <?php echo $content; ?>
    </div>


</div>
<?php $this->endContent(); ?>