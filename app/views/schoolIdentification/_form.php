<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-identification-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="heading-buttons">
    <?php echo $form->errorSummary($model); ?>
    <h3><?php echo $title; ?><span> | <?php echo Yii::t('default', 'Fields with * are required.')?></span></h3>
    <div class="buttons pull-right">
        <button type="button" class="btn btn-icon btn-default glyphicons unshare"><i></i>Voltar</button>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('default', 'Create') : Yii::t('default', 'Save'),array('class' => 'btn btn-icon btn-primary glyphicons circle_ok')); ?>
    </div>
    <div class="clearfix"></div>
</div>
            
<div class="innerLR">

<div class="widget widget-tabs border-bottom-none">

    <div class="widget-head">
            <ul>
                <li class="active"><a class="glyphicons edit" href="#school-indentify" data-toggle="tab"><i></i>Identificação</a></li>
                <li><a class="glyphicons settings" href="#school-structure" data-toggle="tab"><i></i>Infraestrutura</a></li>
                <li><a class="glyphicons imac" href="#school-equipament" data-toggle="tab"><i></i>Equipamentos</a></li>
                <li><a class="glyphicons parents" href="#school-humans" data-toggle="tab"><i></i>Recursos Humanos</a></li>
                <li><a class="glyphicons cutlery" href="#school-feeding" data-toggle="tab"><i></i>Alimentação</a></li>
                <li><a class="glyphicons book" href="#school-education" data-toggle="tab"><i></i>Dados Educacionais</a></li>
            </ul>
    </div>

    <div class="widget-body form-horizontal">

    <div class="tab-content">

        <!-- Tab content -->
        <div class="tab-pane active" id="school-indentify">
            <div class="row-fluid">
                <div class=" span6">

                    <div class="separator"></div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'class'=>'span10')); ?>
                            <?php echo $form->error($model,'name'); ?>
                        </div>
                    </div>

                    <div class="separator"></div>

                    <!--

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'latitude',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'latitude',array('size'=>20,'maxlength'=>20)); ?>
                            <?php echo $form->error($model,'latitude'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php //echo $form->labelEx($model,'longitude',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php //echo $form->textField($model,'longitude',array('size'=>20,'maxlength'=>20)); ?>
                            <?php //echo $form->error($model,'longitude'); ?>
                        </div>
                    </div>

                    -->

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'cep',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'cep',array('size'=>8,'maxlength'=>8,'class'=>'span5')); ?>
                            <?php echo $form->error($model,'cep'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'address',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100,'class'=>'span10')); ?>
                            <?php echo $form->error($model,'address'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'address_number',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'address_number',array('size'=>10,'maxlength'=>10,'class'=>'span2')); ?>
                            <?php echo $form->error($model,'address_number'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'address_complement',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'address_complement',array('size'=>20,'maxlength'=>20,'class'=>'span10')); ?>
                            <?php echo $form->error($model,'address_complement'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'address_neighborhood',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'address_neighborhood',array('size'=>50,'maxlength'=>50,'class'=>'span10')); ?>
                            <?php echo $form->error($model,'address_neighborhood'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'edcenso_uf_fk',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->dropDownList($model, 'edcenso_uf_fk', CHtml::listData(EdcensoUf::model()->findAll(), 'id', 'name'),array('ajax' => array('type' => 'POST', 'url' => CController::createUrl('schoolIdentification/getcities'), 'update' => '#edcenso_city_fk'))); ?>      
                            <?php echo $form->error($model,'edcenso_uf_fk'); ?>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <?php echo $form->labelEx($model,'edcenso_city_fk',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo CHtml::hiddenField('edcenso_city_fk2',$model->edcenso_city_fk); ?>
                            <?php echo CHtml::dropDownList('edcenso_city_fk',array(),array('empty' => '(Select a city)'));?>
                            <?php echo $form->error($model,'edcenso_city_fk'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'edcenso_district_fk',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'edcenso_district_fk'); ?>
                            <?php echo $form->error($model,'edcenso_district_fk'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'phone_number',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'phone_number',array('size'=>9,'maxlength'=>9)); ?>
                            <?php echo $form->error($model,'phone_number'); ?>
                        </div>
                    </div>

                    <!--

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'public_phone_number',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'public_phone_number',array('size'=>8,'maxlength'=>8)); ?>
                            <?php echo $form->error($model,'public_phone_number'); ?>
                        </div>
                    </div>

                    -->

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'other_phone_number',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'other_phone_number',array('size'=>9,'maxlength'=>9)); ?>
                            <?php echo $form->error($model,'other_phone_number'); ?>
                        </div>
                    </div>

                    <!--

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'fax_number',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'fax_number',array('size'=>8,'maxlength'=>8)); ?>
                            <?php echo $form->error($model,'fax_number'); ?>
                        </div>
                    </div>

                    -->

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
                            <?php echo $form->error($model,'email'); ?>
                        </div>
                    </div>
                </div>

                <div class="span6">

                    <div class="separator"></div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'inep_id',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'inep_id',array('size'=>8,'maxlength'=>8, 'class'=>'span10')); ?>
                            <?php echo $form->error($model,'inep_id'); ?>
                        </div>
                    </div>

                    <div class="separator"></div>
                    
                    <div class="control-group">
                        <?php echo $form->labelEx($model,'situation',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->DropDownList($model,'situation', array(1=>'Em Atividade', 2=>'paralisada', 3=>'extinta')); ?>
                            <?php echo $form->error($model,'situation'); ?>
                        </div>
                    </div>


                    <div class="control-group">
                        <?php echo $form->labelEx($model,'initial_date',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'initial_date',array('size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->error($model,'initial_date'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'final_date',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'final_date',array('size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->error($model,'final_date'); ?>
                        </div>
                    </div>

                    <div class="separator"></div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'edcenso_regional_education_organ_fk',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'edcenso_regional_education_organ_fk'); ?>
                            <?php echo $form->error($model,'edcenso_regional_education_organ_fk'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'administrative_dependence',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'administrative_dependence'); ?>
                            <?php echo $form->error($model,'administrative_dependence'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'location',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'location'); ?>
                            <?php echo $form->error($model,'location'); ?>
                        </div>
                    </div>

                    <!--

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'private_school_category',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'private_school_category'); ?>
                            <?php echo $form->error($model,'private_school_category'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'public_contract',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'public_contract'); ?>
                            <?php echo $form->error($model,'public_contract'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'private_school_maintainer_fk',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php //echo $form->textField($model,'private_school_maintainer_fk'); ?>
                            <?php //echo $form->error($model,'private_school_maintainer_fk'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'private_school_maintainer_cnpj',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'private_school_maintainer_cnpj',array('size'=>14,'maxlength'=>14)); ?>
                            <?php echo $form->error($model,'private_school_maintainer_cnpj'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'private_school_cnpj',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'private_school_cnpj',array('size'=>14,'maxlength'=>14)); ?>
                            <?php echo $form->error($model,'private_school_cnpj'); ?>
                        </div>
                    </div>

                    -->

                    <div class="control-group">
                        <?php echo $form->labelEx($model,'regulation',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model,'regulation'); ?>
                            <?php echo $form->error($model,'regulation'); ?>
                        </div>
                    </div>
                </div>
                    
                <?php $this->endWidget(); ?>

            </div>
        </div>
    </div>

        
        <script type="text/javascript">
                var form = '#SchoolIdentification_';
                var date = new Date();
                var actual_year = date.getFullYear();
                var initial_date = stringToDate($(form+'initial_date').val());    
                var final_date = stringToDate($(form+'final_date').val());
                $(form+'initial_date').mask("99/99/9999");
                $(form+'initial_date').focusout(function() {
                    if(!validateDate($(form+'initial_date').val()) 
                            || !(initial_date.year >= actual_year - 1 
                                && initial_date.year <= actual_year)) 
                        $(form+'initial_date').attr('value','');
                });
                $(form+'final_date').mask("99/99/9999");
                $(form+'final_date').focusout(function() {
                    if(!validateDate($(form+'final_date').val())
                            || !(final_date.year >= actual_year 
                                && final_date.year <= actual_year + 1)
                            || !(final_date.asianStr > initial_date.asianStr)
                        ) 
                        $(form+'final_date').attr('value','');
                });
        </script>