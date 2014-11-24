<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$tipo_exame = array("nome" => "", "minimo" => "", "normal" => "", "maximo" => "");
$unimedidas  = listaUniMedidas($conexao); ?>

	<?php require_once ('tipo-exame-formulario-base.php');?>

<?php require_once ('rodape.php'); ?>