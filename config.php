<?php
defined('YII_DEBUG') or define('YII_DEBUG',false);
define("TAG_VERSION",'2.10.7d');
define("BOARD_MSG",'<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>TAG VERSÃO 2.10.7d:</strong>
		<br>
		<ul>
		    <li>Inclusão dos campos de informações (RG, CPF e Profissão) do Pai e Mãe, para serem impressos na Ficha de Matrícula.</li>
        </ul>
	</div>');
if(YII_DEBUG){
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
    error_reporting(E_ALL);
}else {
    ini_set('display_errors','0');
    error_reporting(0);
    define("YII_ENBLE_ERROR_HANDLER",false);
    define("YII_ENBLE_EXCEPTION_HANDLER",false);
}
date_default_timezone_set('America/Maceio');
ini_set('always_populate_raw_post_data','-1');
setlocale(LC_ALL, 'portuguese', 'pt_BR.UTF8', 'pt_br.UTF8', 'ptb_BRA.UTF8',"ptb", 'ptb.UTF8');