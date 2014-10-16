<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');

$id = $_POST["id"];
$nome = $_POST["nome"];

if(alteraArea($conexao, $id, $nome)) {
	$_SESSION["success"] = "Área $nome alretado com sucesso.";
	header("Location: area-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Área $nome não foi alterada. $msg";
	header("Location: area-lista.php");
} 
require_once ('rodape.php');