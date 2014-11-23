<?php
require_once ('cabecalho.php');
require_once ('banco-mer-end-esp.php');
require_once ('logica-usuario.php');

$id_medico = $_POST['id_par'];
$id_endereco = $_POST['id_end'];
$id_especialidade = $_POST['id_esp'];

desativaEspEnd($conexao, $id_endereco, $id_especialidade);
	$_SESSION["success"] = "Especialidade Desativada com sucesso.";
	header("Location: medico-adiciona-especialidade-endereco.php?id=$id_endereco&p=$id_medico");
die();