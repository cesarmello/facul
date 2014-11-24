<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-exame-campo.php');
require_once ('banco-valor-referencia.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_tipo_exame = $_GET['id'];
$tipo_exame = buscaTipoExame($conexao,$id); ?>

	<?php require_once ('tipo-exame-formulario-base.php');?>

<?php require_once ('rodape.php'); ?>