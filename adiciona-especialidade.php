<?php
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('logica-usuario.php');

verificaUsuario();

$especialidade = $_POST["especialidade"];
$id_area = $_POST["id_area"];

if(insereEspecialidade($conexao, $especialidade, $id_area)) {
	$_SESSION["success"] = "Especialidade $especialidade adicionado com sucesso.";
	header("Location: especialidade-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Especialidade $especialidade não foi adicionada. $msg";
	header("Location: especialidade-lista.php");
}
