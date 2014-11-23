<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');

$id     = $_POST["id"];
$nome   = $_POST["nome"];
$minino = $_POST["minino"];
$normal = $_POST["normal"];
$maximo = $_POST["maximo"];

if(alteraTipoExame($conexao, $id, $nome, $minino, $normal, $maximo)) {
	$_SESSION["success"] = "Tipo de Exame $nome alretado com sucesso.";
	header("Location: tipo-exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Tipo de Exame $nome não foi alterada. $msg";
	header("Location: tipo-exame-lista.php");
} 
require_once ('rodape.php');