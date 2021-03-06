<?php
/* @var $this ReportsController */

$baseUrl = Yii::app()->baseUrl;
//$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl . '/js/admin/index/dialogs.js', CClientScript::POS_END);

$this->pageTitle = 'TAG - ' . Yii::t('default', 'Reports');
$this->breadcrumbs = array(
    Yii::t('default', 'Reports'),
);
?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading-mosaic"><?php echo Yii::t('default', 'Reports'); ?></h3>  
    </div>
</div>

<div class="innerLR home">
    <div class="row-fluid">
        <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success') ?>
            </div>
            <br/>
        <?php endif ?>
        <div class="span12">
                <div class="span2">
                    <a href="<?php echo Yii::app()->createUrl('reports/BFReport')?>" class="widget-stats">
                        <span class="fa-percent fa fa-4x"><i></i></span>
                        <span class="txt">Frequência para o Bolsa Família</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span2">
                    <a href="<?php echo Yii::app()->createUrl('reports/NumberStudentsPerClassroomReport')?>" class="widget-stats">
                        <span class="fa fa-sort-numeric-asc fa-4x"></span>
                        <span class="txt">Número de Alunos por Turma</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span2">
                    <a href="<?php echo Yii::app()->createUrl('reports/InstructorsPerClassroomReport')?>" class="widget-stats">
                        <span class="fa fa-graduation-cap fa-4x"><i></i></span>
                        <span class="txt">Professores por Turma</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentsbetween5and14yearsoldreport',array('id'=>Yii::app()->user->school))?>" class="widget-stats" target="_blank">
                    <span class="fa fa-heartbeat fa-4x"><i></i></span>
                    <span class="txt">Alunos com Idade entre 5 e 14 Anos (SUS)</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/enrollmentcomparativeanalysisreport')?>" class="widget-stats" target="_blank">
                    <span class="fa-4x fa fa-exchange"><i></i></span>
                    <span class="txt">Análise Comparativa de Matrículas</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/schoolprofessionalnumberbyclassroomreport')?>" class="widget-stats" target="_blank">
                    <span class="glyphicons signal"><i></i></span>
                    <span class="txt">Número de Profissionais por turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
        <div class="span12" style="margin: 10px 0 0 0">

            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/educationalassistantperclassroomreport',array('id'=>Yii::app()->user->school))?>" class="widget-stats" target="_blank">
                    <span class="fa fa-4x fa-handshake-o"><i></i></span>
                    <span class="txt">Auxiliar/Assistente Educacional por Turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/disciplineandinstructorrelationreport')?>" class="widget-stats" target="_blank">
                    <span class="fa fa-podcast fa-4x"><i></i></span>
                    <span class="txt">Relação Disciplina/Docente</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/complementaractivityassistantbyclassroomreport')?>" class="widget-stats" target="_blank">
                    <span class="fa-dot-circle-o fa fa-4x"><i></i></span>
                    <span class="txt">Monitores de Atividade Complementar por Turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/classroomwithoutinstructorrelationreport')?>" class="widget-stats" target="_blank">
                    <span class="fa-ban fa fa-4x"><i></i></span>
                    <span class="txt">Relação Turmas sem Instrutor</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentinstructornumbersrelationreport')?>" class="widget-stats" target="_blank">
                    <span class="fa-users fa fa-4x"><i></i></span>
                    <span class="txt">Número de Alunos e Professores por Turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentsbyclassroomreport')?>" class="widget-stats" target="_blank">
                    <span class="fa fa-4x fa-address-book"><i></i></span>
                    <span class="txt">Relação de alunos por turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
        <div class="span12" style="margin: 10px 0 0 0">
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentsinalphabeticalorderrelationreport')?>" class="widget-stats" target="_blank">
                    <span class="fa fa-4x fa-sort-alpha-asc"><i></i></span>
                    <span class="txt">Relaçao de Alunos em ordem Alfabética</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentswithdisabilitiesrelationreport')?>" class="widget-stats" target="_blank">
                    <span class="fa fa-wheelchair fa-4x"><i></i></span>
                    <span class="txt">Relação Acessibilidade</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentsusingschooltransportationrelationreport')?>" class="widget-stats" target="_blank">
                    <span class="fa-bus fa fa-4x"><i></i></span>
                    <span class="txt">Relação Transporte Escolar</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/incompatiblestudentagebyclassroomreport')?>" class="widget-stats" target="_blank">
                    <span class="fa fa-4x fa-street-view"><i></i></span>
                    <span class="txt">Alunos com Idade Incompatível por Turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/bfrstudentReport')?>" class="widget-stats" target="_blank">
                    <span class="glyphicons justify"><i></i></span>
                    <span class="txt">Alunos participantes Bolsa Familia</span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div class="span2">
                <a href="<?php echo Yii::app()->createUrl('reports/studentpendingdocument')?>" class="widget-stats" target="_blank">
                    <span class="fa-list-ol fa fa-4x"><i></i></span>
                    <span class="txt">Alunos com Documentos Pendentes</span>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
        <div class="span12" style="margin: 10px 0 0 0">
            <div class="span2">
                <a href="#" data-toggle="modal" data-target="#report" class="widget-stats" target="_blank">
                    <span class="glyphicons signal"><i></i></span>
                    <span class="txt">Alunos por turma</span>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
        <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="New Calendar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Escolha a Turma</h4>
                    </div>
                    <form class="form-vertical" id="createCalendar" action="/br.tag/?r=calendar" method="post">            
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class=" span12" style="margin: 10px 0 10px 0;">
                                <div class="span4">
                                    <?php echo CHtml::label(yii::t('default', 'Classroom'), 'classroom', array('class' => 'control-label')); ?>
                                </div>
                                <div class="span8">
                                     <?php
                                        echo CHtml::dropDownList('classroom', '', CHtml::listData(Classroom::model()->findAll(array('condition'=>'school_inep_fk=' . Yii::app()->user->school . ' && school_year = ' . Yii::app()->user->year,'order' => 'name')), 'id', 'name'), array(
                                            'key' => 'id',
                                            'class' => 'select-search-on',
                                            'prompt' => 'Selecione a turma',
                                            'ajax' => array(
                                                'type' => 'POST',
                                                'url' => CController::createUrl('classes/getDisciplines'),
                                                'update' => '#disciplines',
                                        )));
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer" style="background-color:#FFF;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" url="<?php echo Yii::app()->createUrl('reports/studentbyclassroomreport'); ?>" type="button" value="Gerar" id="buildReport"> Gerar </a>         
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$cs = Yii::app()->getClientScript();
$cs->registerScript('buildReport',"  
    $('#buildReport').live('click', function(event) {
        var url = $(this).attr('url');
        var id = $('#classroom').val();
        $(this).attr('url', url + '&id='+ id);
    });
    registerAndOpenTab('#buildReport');", CClientScript::POS_END);

 ?>