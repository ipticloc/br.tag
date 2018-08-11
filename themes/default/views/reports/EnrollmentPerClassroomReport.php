<?php
/* @var $this ReportsController */
/* @var $report mixed */
/* @var $classroom Classroom*/
Yii::app()->clientScript->registerCoreScript('jquery');

$this->setPageTitle('TAG - ' . Yii::t('default', 'Reports'));
$stage = EdcensoStageVsModality::model()->findByPk($classroom->edcenso_stage_vs_modality_fk)->name;
$school = SchoolIdentification::model()->findByPk($classroom->school_inep_fk)

?>
<br>
<br>
<div class="pageA4H">
    <?php $this->renderPartial('head'); ?>
    <h3>RELATÓRIO DE MATRÍCULA / <?= $classroom->school_year?></h3>
    
<table class="table">
    <tr>
        <td colspan="3">ESCOLA: <?= $school->name?></td>
        <td>CÓDIGO: <?= $classroom->school_inep_fk?></td>
    </tr>
    <tr>
        <td colspan="1">ENDEREÇO: <?= $school->address . (strlen($school->address_number) != 0 ? ", " . $school->address_number : "")?></td>
        <td colspan="1">TURNO:
            <?php
            switch($classroom->turn){
                case "M":
                    echo "MANHÃ";
                    break;
                case "T":
                    echo "TARDE";
                    break;
                case "N":
                    echo "NOITE";
                    break;
            }
            ?>
        </td>
        <td colspan="1">ANO:
            <?php
            $stage = "";
            switch ($classroom->edcenso_stage_vs_modality_fk) {
                case '1':
                    $stage = 'CRECHE';
                    break;
                case '2':
                    $stage = 'PRÉ-ESCOLA';
                    break;
                case '3':
                    $stage = 'INFANTIL - UNIFICADA';
                    break;
                case '4':
                    $stage = '1ª SÉRIE';
                    break;
                case '5':
                    $stage = '2ª SÉRIE';
                    break;
                case '6':
                    $stage = '3ª SÉRIE';
                    break;
                case '7':
                    $stage = '4ª SÉRIE';
                    break;
                case '8':
                    $stage = '5ª SÉRIE';
                    break;
                case '9':
                    $stage = '6ª SÉRIE';
                    break;
                case '10':
                    $stage = '7ª SÉRIE';
                    break;
                case '11':
                    $stage = '8ª SÉRIE';
                    break;
                case '14':
                    $stage = '1º ANO';
                    break;
                case '15':
                    $stage = '2º ANO';
                    break;
                case '16':
                    $stage = '3º ANO';
                    break;
                case '17':
                    $stage = '4º ANO';
                    break;
                case '18':
                    $stage = '5º ANO';
                    break;
                case '19':
                    $stage = '6º ANO';
                    break;
                case '20':
                    $stage = '7º ANO';
                    break;
                case '21':
                    $stage = '8º ANO';
                    break;
                case '41':
                    $stage = '9º ANO';
                    break;
                case '25':
                case '30':
                case '35':
                    $stage = '1ª SÉRIE';
                    break;
                case '26':
                case '31':
                case '36':
                    $stage = '2ª SÉRIE';
                    break;
                case '27':
                case '32':
                case '37':
                    $stage = '3ª SÉRIE';
                    break;
                case '28':
                case '33':
                case '38':
                    $stage = '4ª SÉRIE';
                    break;
            }
            echo $stage;
            ?>
        </td>
        <td colspan="1">TURMA: <?= $classroom->name?></td>
    </tr>
    <?php
    $board = ClassBoard::model()->findByAttributes(array('classroom_fk'=>$classroom->id));
    $teacher = @$board->instructorFk->name;
    $modality = $classroom->edcenso_stage_vs_modality_fk;
    if ((strlen($teacher) > 0) && ($modality < 18)) {
        echo "<tr><td>PROFESSOR(A): " . $teacher . "</td></tr>";
    }
    ?>
</table>

<br>
    <?php
    $rows = "";
    foreach ($report as $key=>$r){
        if($key <= 20){
            $r20 .= "<tr>". "<td style='text-align: center;'>" . ($key + 1) . "</td>"
                . "<td>" . $r['name'] . "</td>"
                . "<td style='text-align: center;'>" . ($r['sex'] == 'M' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['sex'] == 'F' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . $r['birthday'] . "</td>"
                . "<td style='text-align: center;'>" . $r['city'] .'/'.@$r['uf']."</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '0' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '1' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '4' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . (($r['admission_type'] == '2' || $r['admission_type'] == '3') ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '0' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '1' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '2' ? 'X' : '') . "</td>"
                . "<td>" . $r['address'] . (strlen($r['number']) != 0 ? ", " . $r['number'] : '') . "</td>"
                . "</tr>";
        }else if($key >20 && $key <40){
            $r40 .= "<tr>". "<td style='text-align: center;'>" . ($key + 1) . "</td>"
                . "<td>" . $r['name'] . "</td>"
                . "<td style='text-align: center;'>" . ($r['sex'] == 'M' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['sex'] == 'F' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . $r['birthday'] . "</td>"
                . "<td style='text-align: center;'>" . $r['city'] .'/'.@$r['uf']."</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '0' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '1' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '4' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . (($r['admission_type'] == '2' || $r['admission_type'] == '3') ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '0' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '1' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '2' ? 'X' : '') . "</td>"
                . "<td>" . $r['address'] . (strlen($r['number']) != 0 ? ", " . $r['number'] : '') . "</td>"
                . "</tr>";
        }else{
            $r60 .= "<tr>"."<td style='text-align: center;'>" . ($key + 1) . "</td>"
                . "<td>" . $r['name'] . "</td>"
                . "<td style='text-align: center;'>" . ($r['sex'] == 'M' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['sex'] == 'F' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . $r['birthday'] . "</td>"
                . "<td style='text-align: center;'>" . $r['city'] .'/'.@$r['uf']."</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '0' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '1' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['admission_type'] == '4' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . (($r['admission_type'] == '2' || $r['admission_type'] == '3') ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '0' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '1' ? 'X' : '') . "</td>"
                . "<td style='text-align: center;'>" . ($r['situation'] == '2' ? 'X' : '') . "</td>"
                . "<td>" . $r['address'] . (strlen($r['number']) != 0 ? ", " . $r['number'] : '') . "</td>"
                . "</tr>";
        }
    }
    for ($i = 1; $i <= 5; $i++) {
        $rF .= "<tr>"."<td style='text-align: center;'>______</td>"
            . "<td></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td style='text-align: center;'></td>"
            . "<td></td>"
            . "</tr>";
    }
    ?>
    <table class="table table-bordered table-striped" style="font-size: 11px;">
        <tr>
            <th rowspan="2" style="text-align: center;">Nº</th>
            <th rowspan="2">ALUNO</th>
            <th colspan="2" style="text-align: center;">GÊNERO</th>
            <th rowspan="2" style="text-align: center;">DATA DE NASCIMENTO</th>
            <th rowspan="2" style="text-align: center;">NATURALIDADE</th>
            <th colspan="4" style="text-align: center;">TIPO DE MATRÍCULA</th>
            <th colspan="3" style="text-align: center;">SITUAÇÃO NA SÉRIE</th>
            <th rowspan="2" style="text-align: center;">ENDEREÇO</th>
        </tr>
        <tr>
            <th style="text-align: center;">M</th>
            <th style="text-align: center;">F</th>
            <th style="text-align: center;">MI</th>
            <th style="text-align: center;">MC</th>
            <th style="text-align: center;">MR</th>
            <th style="text-align: center;">MT</th>
            <th style="text-align: center;">N</th>
            <th style="text-align: center;">P</th>
            <th style="text-align: center;">R</th>
        </tr>
        <?php echo $r20;?>
    </table>
    <br>
    <br>
    <?php if(isset($r40)){ ?>
        <table class="table table-bordered table-striped" style="font-size: 11px;">
            <tr>
                <th rowspan="2" style="text-align: center;">Nº</th>
                <th rowspan="2">ALUNO</th>
                <th colspan="2" style="text-align: center;">GÊNERO</th>
                <th rowspan="2" style="text-align: center;">DATA DE NASCIMENTO</th>
                <th rowspan="2" style="text-align: center;">NATURALIDADE</th>
                <th colspan="4" style="text-align: center;">TIPO DE MATRÍCULA</th>
                <th colspan="3" style="text-align: center;">SITUAÇÃO NA SÉRIE</th>
                <th rowspan="2" style="text-align: center;">ENDEREÇO</th>
            </tr>
            <tr>
                <th style="text-align: center;">M</th>
                <th style="text-align: center;">F</th>
                <th style="text-align: center;">MI</th>
                <th style="text-align: center;">MC</th>
                <th style="text-align: center;">MR</th>
                <th style="text-align: center;">MT</th>
                <th style="text-align: center;">N</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">R</th>
            </tr>
            <?php echo $r40;?>
        </table>
    <?php } ?>

<br>

    <!--<table class="table table-bordered table-striped" style="font-size: 11px;">
        <tr>
            <th rowspan="2" style="text-align: center;">Nº</th>
            <th rowspan="2">ALUNO</th>
            <th colspan="2" style="text-align: center;">GÊNERO</th>
            <th rowspan="2" style="text-align: center;">DATA DE NASCIMENTO</th>
            <th rowspan="2" style="text-align: center;">NATURALIDADE</th>
            <th colspan="4" style="text-align: center;">TIPO DE MATRÍCULA</th>
            <th colspan="3" style="text-align: center;">SITUAÇÃO NA SÉRIE</th>
            <th rowspan="2" style="text-align: center;">ENDEREÇO</th>
        </tr>
        <tr>
            <th style="text-align: center;">M</th>
            <th style="text-align: center;">F</th>
            <th style="text-align: center;">MI</th>
            <th style="text-align: center;">MC</th>
            <th style="text-align: center;">MR</th>
            <th style="text-align: center;">MT</th>
            <th style="text-align: center;">N</th>
            <th style="text-align: center;">P</th>
            <th style="text-align: center;">R</th>
        </tr>
        <?php echo $rF;?>

    </table>-->
<br>
<br>
    <p style="margin: 0 auto; text-align: right; width:600px">
        <?php
        $time = time();
        $monthName = strftime("%B", $time);
        echo ucwords(strtolower($school->edcensoCityFk->name)) .", ". date("d")." de ".ucfirst($monthName)." de ".date("Y")
        ?>.
    </p>
<div style="margin: 20px auto 0; text-align:center; width: 1000px">
    <span style="float: left; margin: 0 100px 0 100px">
        ________________________________________________________<br>
        <b>ASSINATURA DO DIRETOR(A)</b>
    </span>
    <span>
        ________________________________________________________<br>
        <b>ASSINATURA DO SECRETÁRIO(A)</b>
    </span>
</div>
    <div id="rodape"><?php $this->renderPartial('footer'); ?></div>
</div>

<script type="text/javascript">
    $(function() {

    });
</script>
<style>
    .table-striped td, .table-striped tr, .table-striped th,.table-striped{border-color:#000 !important;font-size:9px !important; }
    table { page-break-after:auto; }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>


