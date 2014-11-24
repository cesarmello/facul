<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');

$id            = $_POST["id"];
$diagnostico   = $_POST["diagnostico"];
$qm_exame      = $_POST["qm_exame"];
$valor_exame   = $_POST["valor_exame"];
$id_tipo_exame = $_POST["id_tipo_exame"];

if(alteraExame($conexao, $id, $valor_exame, $diagnostico, $qm_exame, $id_tipo_exame)) {
	$_SESSION["success"] = "Exame $id alterado com sucesso.";
	header("Location: exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Exame $id não foi alterada. $msg";
	header("Location: exame-lista.php");
} 
require_once ('rodape.php');