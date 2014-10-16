<?php
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_parceiro = $_POST["id_parceiro"];
$id_endereco = $_POST["id_endereco"];
$id_especialidade = $_POST["especialidades"];

if(insereEspEnd($conexao, $id_endereco, $id_especialidade)) {
	$_SESSION["success"] = "Especialidade $especialidade adicionado com sucesso.";
	header("Location: parceiro-adiciona-especialidade-endereco.php?id=$id_endereco&p=$id_parceiro");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Especialidade $especialidade não foi adicionada. $msg";
	header("Location: parceiro-adiciona-especialidade-endereco.php?id=$id_endereco&p=$id_parceiro");
}
