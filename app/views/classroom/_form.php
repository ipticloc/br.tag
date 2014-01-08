<?php 
//@todo 21 - A turma precisa de um periodo letivo senão ela fica atemporal.
//@todo 23 - Lembrar de associar o professor a turma.
//@todo s1 - Retirar aba Disciplinas. Add disciplinas em teachingData e vincular as disciplinas(checkbox) com os prof (dropdown) 


$form=$this->beginWidget('CActiveForm', array(
	'id'=>'classroom-form',
	'enableAjaxValidation'=>false,
)); 
?>
    
<div class="heading-buttons">
    <?php echo $form->errorSummary($modelClassroom); ?>
    <h3><?php echo $title; ?><span> | <?php echo Yii::t('default', 'Fields with * are required.') ?></span></h3>
    <div class="buttons pull-right">
    </div>
    <div class="clearfix"></div>
</div>
    
<div class="innerLR">
    
    <div class="widget widget-tabs border-bottom-none">
        
        <div class="widget-head">
            <ul>
                <li id="tab-classroom" class="active" ><a class="glyphicons edit" href="#classroom" data-toggle="tab"><i></i><?php echo Yii::t('default', 'Classroom') ?></a></li>
                <li id="tab-disciplines"><a class="glyphicons edit" href="#disciplines" data-toggle="tab"><i></i><?php echo Yii::t('default', 'Disciplines') ?></a></li>
                <li id="tab-instructor-teaching"><a class="glyphicons edit" href="#instructor-teaching" data-toggle="tab"><i></i><?php echo Yii::t('default', 'Instructor Teaching Data') ?></a></li> 
            
            </ul>
        </div>
            
        <div class="widget-body form-horizontal">
            
            <div class="tab-content">
                
                <!-- Tab content -->
                <div class="tab-pane active" id="classroom">
                    <div class="row-fluid">
                        <div class=" span5">
                            
                            <div class="separator"></div>
                            <div class="control-group">
                                <?php //@todo 07 - A Criação da turma é feita dentro de uma escola, não precisa ser necessário selecionar uma?>
                                <?php echo $form->labelEx($modelClassroom, 'school_inep_fk', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php
                                    echo $form->dropDownList($modelClassroom, 'school_inep_fk', CHtml::listData(SchoolIdentification::model()->findAll(), 'inep_id', 'name'), array(
                                        'prompt' => 'Selecione a escola',
                                        'ajax' => array(
                                            'type' => 'POST',
                                            'url' => CController::createUrl('classroom/getassistancetype'),
                                            'update' => '#Classroom_assistance_type',
                                            'success' => 'function(html){
                                    $("#Classroom_assistance_type").html(html); 
                                    $("#Classroom_assistance_type").trigger("change");                                                
                                }')
                                    ));
                                    ?>  
                                    <?php echo $form->error($modelClassroom, 'school_inep_fk'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <?php 
                                //@todo 09 - O Campo nome deve possuir uma mascara e seguir um padrão a ser definido.
                                echo $form->labelEx($modelClassroom, 'name', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->textField($modelClassroom, 'name', array('size' => 60, 'maxlength' => 80)); ?>
                                    <?php echo $form->error($modelClassroom, 'name'); ?>
                                </div>
                            </div>
                            <?php /*
                            <div class="control-group">

                               <?php 
                                echo $form->labelEx($modelClassroom, 'school_year', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->textField($modelClassroom, 'school_year', array('size' => 10, 'maxlength' => 10)); ?>
                                    <?php echo $form->error($modelClassroom, 'school_year'); ?>
                                </div>
                            </div>
  */  ?>                            
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'initial_hour', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->hiddenField($modelClassroom, 'initial_hour', array('size' => 2, 'maxlength' => 2)); ?>
                                    <?php echo $form->hiddenField($modelClassroom, 'initial_minute', array('size' => 2, 'maxlength' => 2)); ?>
                                    <?php echo CHtml::textField('Classroom_initial_time', $modelClassroom->initial_hour . ':' . $modelClassroom->initial_minute, array('size' => 5, 'maxlength' => 5)); ?>
                                    <?php echo $form->error($modelClassroom, 'initial_hour'); ?>
                                    <?php echo $form->error($modelClassroom, 'initial_minute'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'final_hour', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->hiddenField($modelClassroom, 'final_hour', array('size' => 2, 'maxlength' => 2)); ?>
                                    <?php echo $form->hiddenField($modelClassroom, 'final_minute', array('size' => 2, 'maxlength' => 2)); ?>
                                    <?php echo CHtml::textField('Classroom_final_time', $modelClassroom->final_hour . ':' . $modelClassroom->final_minute, array('size' => 5, 'maxlength' => 5)); ?>
                                    <?php echo $form->error($modelClassroom, 'final_hour'); ?>
                                    <?php echo $form->error($modelClassroom, 'final_minute'); ?>
                                </div>
                            </div>
                            
                            <div class="control-group">
                            <label class="control-label"><?php echo Yii::t('default', 'Week Days'); ?></label>
                            <div class="uniformjs margin-left" id="Classroom_week_days">
                                <label class="checkbox">
                                    <?php 
                                    //@todo 08 - Os Valores deste campo são definidos de forma global e pode vim preenchidos default
                                    echo Classroom::model()->attributeLabels()['week_days_sunday'];
                                    echo $form->checkBox($modelClassroom, 'week_days_sunday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['week_days_monday']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'week_days_monday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['week_days_tuesday']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'week_days_tuesday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['week_days_wednesday']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'week_days_wednesday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['week_days_thursday']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'week_days_thursday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['week_days_friday']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'week_days_friday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['week_days_saturday']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'week_days_saturday', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'assistance_type', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php
                                    echo $form->DropDownList($modelClassroom, 'assistance_type', array(null => 'Selecione o tipo de assistencia'), array('ajax' => array(
                                            'type' => 'POST',
                                            'url' => CController::createUrl('classroom/updateassistancetypedependencies'),
                                            'success' => "function(data){
                                                    data = jQuery.parseJSON(data);
                                                    $('#Classroom_mais_educacao_participator').prop('disabled', data.MaisEdu);
                                                    $('#Classroom_aee_braille_system_education').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_optical_and_non_optical_resources').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_mental_processes_development_strategies').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_mobility_and_orientation_techniques').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_libras').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_caa_use_education').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_curriculum_enrichment_strategy').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_soroban_use_education').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_usability_and_functionality_of_computer_accessible_education').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_teaching_of_Portuguese_language_written_modality').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_aee_strategy_for_school_environment_autonomy').prop('disabled', data.AeeActivity);
                                                    $('#Classroom_edcenso_stage_vs_modality_fk').html(data.Stage);
                                                    $('#Classroom_edcenso_stage_vs_modality_fk').prop('disabled', data.StageEmpty);
                                                    $('#Classroom_modality').html(data.Modality);
                                                }",
                                            )));
                                    ?> 
                                    <?php echo $form->error($modelClassroom, 'assistance_type'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'mais_educacao_participator', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->checkBox($modelClassroom, 'mais_educacao_participator'); ?>
                                    <?php echo $form->error($modelClassroom, 'mais_educacao_participator'); ?>
                                </div>
                            </div>
                                
                            <!-- dar uma olhada no http://mind2soft.com/labs/jquery/multiselect/ -->
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'complementary_activity_type_1', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->dropDownList($modelClassroom, 'complementary_activity_type_1', CHtml::listData(EdcensoComplementaryActivityType::model()->findAll(), 'id', 'name'), array('multiple' => true, 'key' => 'id')); ?>
                                    <?php echo $form->error($modelClassroom, 'complementary_activity_type_1'); ?>
                                </div>
                            </div>
                            
                            <div class="control-group">
                            <label class="control-label"><?php echo Yii::t('default', 'Aee'); ?></label>
                            <div class="uniformjs margin-left">
                                <label class="checkbox">
                                    <?php 
                                    echo Classroom::model()->attributeLabels()['aee_braille_system_education'];
                                    echo $form->checkBox($modelClassroom, 'aee_braille_system_education', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_optical_and_non_optical_resources']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_optical_and_non_optical_resources', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_mental_processes_development_strategies']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_mental_processes_development_strategies', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_mobility_and_orientation_techniques']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_mobility_and_orientation_techniques', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_libras']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_libras', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_caa_use_education']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_caa_use_education', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_curriculum_enrichment_strategy']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_curriculum_enrichment_strategy', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_soroban_use_education']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_soroban_use_education', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_usability_and_functionality_of_computer_accessible_education']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_usability_and_functionality_of_computer_accessible_education', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_teaching_of_Portuguese_language_written_modality']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_teaching_of_Portuguese_language_written_modality', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                <label class="checkbox">
                                    <?php echo Classroom::model()->attributeLabels()['aee_strategy_for_school_environment_autonomy']; ?>
                                    <?php echo $form->checkBox($modelClassroom, 'aee_strategy_for_school_environment_autonomy', array('value' => 1, 'uncheckValue' => 0)); ?>
                                </label>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'modality', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'modality', array(null => 'Selecione a modalidade',
                                        '1' => '(Ensino Regular)',
                                        '2' => '(Educação Especial - Modalidade Substitutiva)',
                                        '3' => '(Educação de Jovens e Adultos (EJA))')); ?>
                                    <?php echo $form->error($modelClassroom, 'modality'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'edcenso_stage_vs_modality_fk', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'edcenso_stage_vs_modality_fk', CHtml::listData(EdcensoStageVsModality::model()->findAll(array('order' => 'name')), 'id', 'name'), array('prompt' => '(Select Stage vs Modality)')); ?>
                                    <?php echo $form->error($modelClassroom, 'edcenso_stage_vs_modality_fk'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'edcenso_professional_education_course_fk', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'edcenso_professional_education_course_fk', CHtml::listData(EdcensoProfessionalEducationCourse::model()->findAll(array('order' => 'name')), 'id', 'name'), array('prompt' => 'Selecione o curso',)); ?>
                                    <?php echo $form->error($modelClassroom, 'edcenso_professional_education_course_fk'); ?>
                                </div>
                            </div>
                                
                            <?php $instructorSituationEnum = array(null => 'Selecione a situação', "0" => "Turma com docente", "1" => "Turma sem docente"); ?>
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'instructor_situation', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'instructor_situation', $instructorSituationEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'instructor_situation'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group buttonWizardBar nextBar">
                        <a href="#disciplines" data-toggle="tab" class='btn btn-icon btn-primary next glyphicons circle_arrow_right'><?php echo Yii::t('deafult','Next') ?><i></i></a>
                    </div>
                </div>
                <div class="tab-pane" id="disciplines">
                    <div class="row-fluid">
                        <div class=" span5">
                            <div class="separator"></div>
                            <?php 
                            //@todo 10 - Melhorar a forma com é feita esta seleção pode ser feita através de uma tabela, lembrando que eles vão precisar fazer isso para varias turmas no inicio do ano. 
                            $disciplinesEnum = array(null => 'Selecione a oferta da disciplina', "0" => "Não oferece disciplina", "1" => "Sim, oferece disciplina com docente vinculado", "2" => "Sim, oferece disciplina sem docente vinculado"); ?>
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_chemistry', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_chemistry', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_chemistry'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_physics', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_physics', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_physics'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_mathematics', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_mathematics', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_mathematics'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_biology', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_biology', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_biology'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_science', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_science', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_science'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_language_portuguese_literature', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_language_portuguese_literature', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_language_portuguese_literature'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_foreign_language_english', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_foreign_language_english', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_foreign_language_english'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_foreign_language_spanish', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_foreign_language_spanish', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_foreign_language_spanish'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_foreign_language_franch', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_foreign_language_franch', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_foreign_language_franch'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_foreign_language_other', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_foreign_language_other', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_foreign_language_other'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_arts', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_arts', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_arts'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_physical_education', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_physical_education', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_physical_education'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_history', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_history', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_history'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_geography', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_geography', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_geography'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_philosophy', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_philosophy', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_philosophy'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_social_study', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_social_study', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_social_study'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_sociology', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_sociology', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_sociology'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_informatics', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_informatics', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_informatics'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_professional_disciplines', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_professional_disciplines', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_professional_disciplines'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_special_education_and_inclusive_practices', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_special_education_and_inclusive_practices', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_special_education_and_inclusive_practices'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_sociocultural_diversity', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_sociocultural_diversity', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_sociocultural_diversity'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_libras', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_libras', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_libras'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_pedagogical', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_pedagogical', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_pedagogical'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_religious', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_religious', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_religious'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_native_language', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_native_language', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_native_language'); ?>
                                </div>
                            </div>
                                
                            <div class="control-group">
                                <?php echo $form->labelEx($modelClassroom, 'discipline_others', array('class' => 'control-label')); ?>
                                <div class="controls">
                                    <?php echo $form->DropDownList($modelClassroom, 'discipline_others', $disciplinesEnum); ?>
                                    <?php echo $form->error($modelClassroom, 'discipline_others'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group buttonWizardBar nextBar">
                        <?php echo CHtml::submitButton($modelClassroom->isNewRecord ? Yii::t('default', 'Create') : Yii::t('default', 'Save'), array('class' => 'btn btn-icon next btn-primary')); ?>
                    </div>
                </div>
                
                              <div class="tab-pane active" id="instructor-teaching">
                    <div class="row-fluid">
                        <div class=" span6">
                        <div class="separator"></div>
                        <div class="separator"></div>
                        
                        <div class="control-group">
                            <?php echo $form->labelEx($modelTeachingData, 'role', array('class' => 'control-label')); ?><div class="controls">
                            <?php
                            echo $form->DropDownlist($modelTeachingData, 'role', array(1 => 'Docente', 2 => 'Auxiliar/Assistente Educacional',
                                3 => 'Profissional/Monitor de Atividade Complementar',
                                4 => 'Tradutor Intérprete de LIBRAS'));
                            ?>                    
                            <?php echo $form->error($modelTeachingData, 'role'); ?>
                        </div></div>

                        <div class="control-group">
                            <?php echo $form->labelEx($modelTeachingData, 'contract_type', array('class' => 'control-label')); ?><div class="controls">        
                            <?php
                            echo $form->DropDownlist($modelTeachingData, 'contract_type', array(1 => 'Concursado/efetivo/estável', 2 => 'Contrato temporário',
                                3 => 'Contrato terceirizado',
                                4 => 'Contrato CLT'));
                            ?>  
                            <?php echo $form->error($modelTeachingData, 'contract_type'); ?>
                        </div></div>
                        </div>
                        <div class="span6">
                        <div class="separator"></div>
                        <div class="separator"></div>
                        <div class="control-group">
                            <?php echo $form->labelEx($modelTeachingData, 'discipline_1_fk', array('class' => 'control-label')); ?>
                            <div class="controls">
                            <?php
                            echo $form->DropDownlist($modelTeachingData, 'discipline_1_fk', CHtml::listData(
                                            EdcensoDiscipline::model()->findAll(), 'id', 'name')
                                    , array('multiple'=>true, 'key'=>'id'));
                            ?>
                            <?php echo $form->error($modelTeachingData, 'discipline_1_fk'); ?>
                        </div></div>
                       <div class="control-group">
                        <div class="controls">
                            <?php echo $form->hiddenField($modelTeachingData,'instructor_fk',array('value'=>$instructor_id)); ?>
                            <?php echo $form->error($modelTeachingData,'instructor_fk'); ?>
                        </div>
                    </div>

                    </div>
                </div>    
               

                <div class="formField buttonWizardBar">
                    <?php echo CHtml::submitButton($modelTeachingData->isNewRecord ? Yii::t('default', 'Create') : Yii::t('default', 'Save'),array('class' => 'buttonLink button')); ?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
                
            </div>
        </div>
    </div>
</div>
    
<script type="text/javascript">
    
    var form = '#Classroom_';
    jQuery(function($) {
        jQuery('body').on('change','#Classroom_school_inep_fk',
        function(){jQuery.ajax({
                'type':'POST',
                'url':'/tag/index.php?r=classroom/getassistancetype',
                'cache':false,
                'data':jQuery(this).parents("form").serialize(),
                'success':function(html){
                    jQuery("#Classroom_assistance_type").html(html); 
                    jQuery("#Classroom_assistance_type").trigger('change');
                }});
            return false;}
    );
        $(form+'school_inep_fk').trigger('change');
        
        $(form+"complementary_activity_type_1").val(jQuery.parseJSON('<?php echo json_encode($complementary_activities); ?>'));
    }); 
    
    
    $(form+"complementary_activity_type_1").change(function(){
        while($(this).val().length > 6){
            $(form+"complementary_activity_type_1").val($(form+"complementary_activity_type_1").val().slice(0,-1));
        }
    });
    
    
    //multiselect
    var compAct = [];
    $(form+"complementary_activity_type_1").mousedown(function(){
        compAct = $(this).val();
    });
    
    $(form+"complementary_activity_type_1").mouseup(function(e){
        if (!e.shiftKey){
            value = $(this).val()[0];
            
            remove = 0;
            compAct = jQuery.grep(compAct, function( a ) {
                if(a === value) remove++;
                return a !== value;
            });
            
            if(remove == 0) compAct.push(value);
            $(this).val(compAct);
        }
    });
    //multiselect
    
    
    
    
    
    $(form+'name').focusout(function() {
        var id = '#'+$(this).attr("id");
        
        $(id).val($(id).val().toUpperCase());
        
        if(!validateClassroomName($(id).val())){ 
            $(id).attr('value','');
            addError(id, "Campo Nome não está dentro das regras.");
        }else{
            removeError(id);
        }
    });
    
    
    $(form+'initial_time').mask("99:99");
    $(form+'initial_time').focusout(function() { 
        var id = '#'+$(this).attr("id");
        $(id).val($(id).val().toUpperCase());
        var hour = form+'initial_hour';
        var minute = form+'initial_minute';
        
        if(!validateTime($(id).val())) {
            $(id).attr('value','');
            $(hour).attr('value','');
            $(minute).attr('value','');
            addError(id, "Campo Hora Inicial não está dentro das regras.");
        }
        else {
            var time = $(id).val().split(":");
            time[1] = Math.floor(time[1]/5) * 5;
            $(hour).attr('value',time[0]=='0'?'00':time[0]);
            $(minute).attr('value',time[1]=='0'?'00':time[1]);
            removeError(id);
        }
    });
    
    $(form+'final_time').mask("99:99");
    $(form+'final_time').focusout(function() { 
        var id = '#'+$(this).attr("id");
        $(id).val($(id).val().toUpperCase());
        var hour = form+'final_hour';
        var minute = form+'final_minute';
        
        if(!validateTime($(id).val()) || $(form+'final_time').val() <= $(form+'initial_time').val()) {
            $(id).attr('value','');
            $(hour).attr('value','');
            $(minute).attr('value','');
            addError(id, "Campo Hora Final não está dentro das regras.");
        }
        else {
            var time = $(id).val().split(":"); 
            time[1] = Math.floor(time[1]/5) * 5;
            $(hour).attr('value',time[0]=='0'?'00':time[0]);
            $(minute).attr('value',time[1]=='0'?'00':time[1]);
            removeError(id);
        }
    });
    
    
    $(form+'week_days input[type=checkbox]').change(function(){
        var id = '#'+$(form+'week_days').attr("id");
        if($('#Classroom_week_days input[type=checkbox]:checked').length == 0){
            addError(id, "Campo não está dentro das regras.");
        }else{
            removeError(id);
        }
    });
    $(form+'week_days').focusout(function(){
        var id = '#'+$(this).attr("id");
        if($('#Classroom_week_days input[type=checkbox]:checked').length == 0){
            addError(id, "Campo não está dentro das regras.");
        }else{
            removeError(id);
        }
    });
    
    $('.next').click(function(){
        $('li[class="active"]').removeClass("active");
        var id = '#tab-'+($(this).attr("href")).substring(1);
        $(id).addClass("active");
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
</script>