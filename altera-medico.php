<?php
require_once ('cabecalho.php');
require_once ('banco-medico.php');

$id_medico = $_POST["id_medico"];
$nome  = $_POST["nome"];
$razao = $_POST["razao"];
$crm   = $_POST["crm"];
$senha = $_POST["senha"];
$site  = $_POST["site"];
$email = $_POST["email"];

if(alteraMedico($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_medico)) {
	$_SESSION["success"] = "$nome alterado com sucesso.";
	header("Location: medico-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "$nome não foi alterada. $msg";
	header("Location: medico-lista.php");
} 