<?php
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');

$id_area = $_POST["id_area"];
$especialidade = $_POST["especialidade"];
$id_especialidade = $_POST["id_especialidade"];

if(alteraEspecialidade($conexao, $id_area, $especialidade, $id_especialidade)) {
	$_SESSION["success"] = "Especialidade $especialidade alterado com sucesso.";
	header("Location: especialidade-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Especialidade $especialidade não foi alterada. $msg";
	header("Location: especialidade-lista.php");
} 