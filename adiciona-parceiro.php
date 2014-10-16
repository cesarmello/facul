<?php
require_once ('cabecalho.php');
require_once ('banco-parceiro.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome  = $_POST["nome"];
$razao = $_POST["razao"];
$crm   = $_POST["crm"];
$senha = $_POST["senha"];
$site  = $_POST["site"];
$email = $_POST["email"];
$id_tipo_parceiro = $_POST["id_tipo_parceiro"];

if(insereParceiro($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_tipo_parceiro)) {
	$_SESSION["success"] = "$nome adicionado com sucesso.";
	header("Location: parceiro-formulario-endereco.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "$nome não foi adicionada. $msg";
	header("Location: parceiro-lista.php");
}