<?php
require_once ('cabecalho.php');
require_once ('banco-mer-end-esp.php');
require_once ('logica-usuario.php');

$id_parceiro = $_POST['id_par'];
$id_endereco = $_POST['id_end'];
$id_especialidade = $_POST['id_esp'];

removeEspEnd($conexao, $id_endereco, $id_especialidade);
	$_SESSION["success"] = "Especialidade removida com sucesso.";
	header("Location: parceiro-adiciona-especialidade-endereco.php?id=$id_endereco&p=$id_parceiro");
die();