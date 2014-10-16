<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome = $_POST["nome"];

if(insereArea($conexao, $nome)) {
	$_SESSION["success"] = "Área $nome adicionado com sucesso.";
	header("Location: area-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Área $nome não foi adicionada. $msg";
	header("Location: area-lista.php");
}
require_once ('rodape.php');