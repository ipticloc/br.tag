<?php
/* @var $this AdminController */

$this->pageTitle = 'TAG - ' . Yii::t('default', 'Administration');
$this->breadcrumbs = array(
    Yii::t('default', 'Administration'),
);
?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading-mosaic"><?php echo Yii::t('default', 'Administration'); ?></h3>  
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
        <div class="span6">
            <div class="row-fluid">
                <div class="span3">
                    <a href="<?php echo Yii::app()->homeUrl; ?>?r=admin/ACL" class="widget-stats">
                        <span class="glyphicons flag"><i></i></span>
                        <span class="txt">Config. Permissões</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span3">
                    <a href="#" class="widget-stats" onclick='$("#import-file-dialog").dialog("open");'>
                        <span class="glyphicons database_plus"><i></i></span>
                        <span class="txt">Importar dados</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span3">
                    <a href="<?php echo Yii::app()->homeUrl; ?>?r=admin/clearDB" class="widget-stats">
                        <span class="glyphicons database_minus"><i></i></span>
                        <span class="txt">Limpar Banco</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span3">
                    <a href="<?php echo Yii::app()->homeUrl; ?>?r=admin/createUser" class="widget-stats">
                        <span class="glyphicons user"><i></i></span>
                        <span class="txt">Cadastrar usuário</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
            <!--            <div class="row-fluid">
                            <div class="span10 offset2">
                                <img class="logo-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tag_logo.png" alt="Logo TAG" />
                            </div>
                        </div> -->
        </div>
    </div>

    <!-- Modal -->
    <div id="import-file-dialog" title="<?php echo Yii::t('default', 'Import File Dialog'); ?>">
        <div class="row-fluid">
            <div class="span12">
                <form id="import-file-form" method="post" action="<?php echo CController::createUrl('admin/import'); ?>" enctype="multipart/form-data">
                    <div class="control-group">
                        <?php echo CHtml::label(Yii::t('default', 'Import File'), 'file', array('class' => 'control-label')); ?>
                        <div class="controls">
                            <input type="file" name="file" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<script>


    //Cria o Dialogo de IMPORTAÇÃO
    var myImportFileDialog = $("#import-file-dialog").dialog({
        autoOpen: false,
        height: 190,
        width: 380,
        modal: true,
        draggable: false,
        resizable: false,
        buttons: {
            "<?php echo Yii::t('default', 'Import'); ?>": function() {
                var file = $("#file").val();
                console.log(file);
                $("#import-file-form").submit();
                $(this).dialog("close");
            },
            <?php echo Yii::t('default', 'Cancel'); ?>: function() {
                $(this).dialog("close");
            }
        },
    });
</script>
