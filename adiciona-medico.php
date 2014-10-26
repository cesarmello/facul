<?php
require_once ('cabecalho.php');
require_once ('banco-medico.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome  = $_POST["nome"];
$razao = $_POST["razao"];
$crm   = $_POST["crm"];
$senha = $_POST["senha"];
$site  = $_POST["site"];
$email = $_POST["email"];

if(insereMedico($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_tipo_medico)) {
	$_SESSION["success"] = "$nome adicionado com sucesso.";
	header("Location: medico-formulario-endereco.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "$nome não foi adicionada. $msg";
	header("Location: medico-lista.php");
}