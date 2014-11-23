<?php
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$unidade   = $_POST["unidade"];
$descricao = $_POST["descricao"];


if(insereUniMedida($conexao, $unidade, $descricao)) {
	$_SESSION["success"] = "Unidade de medida $unidade adicionado com sucesso.";
	header("Location: unimedida-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Unidade de medida $unidade não foi adicionada. $msg";
	header("Location: unimedida-lista.php");
}
require_once ('rodape.php');