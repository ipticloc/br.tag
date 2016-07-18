<div id="mainPage" class="main">
    <?php
    $this->setPageTitle('TAG - ' . Yii::t('default', 'Instructor Identifications'));
    $contextDesc = Yii::t('default', 'Available actions that may be taken on InstructorIdentification.');
    $this->menu = array(
        array('label' => Yii::t('default', 'Create a new InstructorIdentification'), 'url' => array('create'), 'description' => Yii::t('default', 'This action create a new InstructorIdentification')),
    );
    ?>

    <div class="row-fluid">
        <div class="span12">
            <h3 class="heading-mosaic"><?php echo Yii::t('default', 'Instructor Identifications') ?></h3>

        </div>
    </div>

    <div class="innerLR">
        <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success') ?>
            </div>
            <br/>
        <?php endif ?>
        <div class="widget">
            <div class="widget-body">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider' => $filter->search(),
                    'enablePagination' => true,
                    'filter' => $filter,
                    'selectionChanged' => 'function(id){ location.href = "' . $this->createUrl('update') . '/id/"+$.fn.yiiGridView.getSelection(id);}',
                    'itemsCssClass' => 'table table-condensed table-striped table-hover table-primary table-vertical-center checkboxs',
                    'columns' => array(
                        array(
                            'name' => 'name',
                            'type' => 'raw',
                            'value' => '$data->name',
                            'htmlOptions' => array('width'=> '400px')
                        ),
                        array(
                            'name' => 'documents',
                            'header' => 'CPF',
                            'value' => '$data->documents->cpf',
                            'htmlOptions' => array('width'=> '400px')
                        ),
                        array(
                            'name' => 'birthday_date',
                            'filter' => false
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: AdrianoDias
 * Date: 15/07/2016
 * Time: 10:45
 */