<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');

$id         = $_POST["id"];
$nome       = $_POST["nome"];
$auto_exame = $_POST["auto_exame"];

if(alteraTipoExame($conexao, $id, $nome, $auto_exame)) {
	$_SESSION["success"] = "Tipo de Exame $nome alterado com sucesso.";
	header("Location: tipo-exame-altera-formulario.php?id=$id");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Tipo de Exame $nome não foi alterada. $msg";
	header("Location: tipo-exame-lista.php");
} 
require_once ('rodape.php');