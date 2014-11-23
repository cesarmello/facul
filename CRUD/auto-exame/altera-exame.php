<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');

$id     = $_POST["id"];
$nome   = $_POST["nome"];
$minino = $_POST["minino"];
$normal = $_POST["normal"];
$maximo = $_POST["maximo"];

if(alteraAutoExame($conexao, $id, $nome, $minino, $normal, $maximo)) {
	$_SESSION["success"] = "Exame $nome alretado com sucesso.";
	header("Location: exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Exame $nome não foi alterada. $msg";
	header("Location: exame-lista.php");
} 
require_once ('rodape.php');