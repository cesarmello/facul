<?php
require_once ('cabecalho.php');
require_once ('banco-parceiro.php');

$id_parceiro = $_POST["id_parceiro"];
$nome  = $_POST["nome"];
$razao = $_POST["razao"];
$crm   = $_POST["crm"];
$senha = $_POST["senha"];
$site  = $_POST["site"];
$email = $_POST["email"];
$id_tipo_parceiro = $_POST["id_tipo_parceiro"];

if(alteraParceiro($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_tipo_parceiro, $id_parceiro)) {
	$_SESSION["success"] = "$nome alterado com sucesso.";
	header("Location: parceiro-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "$nome não foi alterada. $msg";
	header("Location: parceiro-lista.php");
} 