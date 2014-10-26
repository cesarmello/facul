<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');

$id     = $_POST["id"];
$nome   = $_POST["nome"];
$minimo = $_POST["minimo"];
$normal = $_POST["normal"];
$maximo = $_POST["maximo"];
$id_unimedida = $_POST["id_unimedida"];

if(alteraTipoExame($conexao, $id, $nome, $minimo, $normal, $maximo, $id_unimedida)) {
	$_SESSION["success"] = "Tipo de Exame $nome alretado com sucesso.";
	header("Location: tipo-exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Tipo de Exame $nome não foi alterada. $msg";
	header("Location: tipo-exame-lista.php");
} 
require_once ('rodape.php');