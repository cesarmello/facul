<?php
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');

$id = $_POST["id"];
$unidade   = $_POST["unidade"];
$descricao = $_POST["descricao"];

if(alteraUniMedida($conexao, $id, $unidade, $descricao)) {
	$_SESSION["success"] = "Unidade de Medida $unidade alterado com sucesso.";
	header("Location: unimedida-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Unidade de Medida $unidade não foi alterada. $msg";
	header("Location: unimedida-lista.php");
} 
require_once ('rodape.php');