<?php
require_once ('cabecalho.php');
require_once ('banco-telefone.php');
require_once ('logica-usuario.php');

verificaUsuario();

$telefone  = $_POST["telefone"];
$id_endereco = $_POST["id_endereco"];

if(insereTelefone($conexao, $telefone, $id_endereco)) {
	$_SESSION["success"] = "Endereço adicionado com sucesso.";
	header("Location: medico-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Telefone não foi adicionada. $msg";
	header("Location: medico-lista.php");
}