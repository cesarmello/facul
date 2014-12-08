<?php
require_once ('cabecalho.php');
require_once ('banco-medico.php');

$id_medico = $_POST["id_medico"];
$id_login  = $_POST["id_login"];
$nome      = $_POST["nome"];
$razao     = $_POST["razao"];
$crm       = $_POST["crm"];
$site      = $_POST["site"];
$email     = $_POST["email"];
$senha     = $_POST["senha"];

if(alteraMedico($conexao, $nome, $razao, $crm, $site, $email, $senha, $id_medico, $id_login)) {
	$_SESSION["success"] = "$nome alterado com sucesso.";
	header("Location: medico-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "$nome não foi alterada. $msg";
	header("Location: medico-lista.php");
} 