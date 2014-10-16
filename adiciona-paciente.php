<?php
require_once ('cabecalho.php');
require_once ('banco-paciente.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome   = $_POST["nome"];
$cpf    = $_POST["cpf"];
$rg     = $_POST["rg"];
$cep    = $_POST["cep"];
$rua    = $_POST["rua"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf     = $_POST["uf"];
$fixo   = $_POST["fixo"];
$movel  = $_POST["movel"];
$email  = $_POST["email"];
$senha  = $_POST["senha"];

if(inserePaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha)) {
	$_SESSION["success"] = "Paciente adicionado com sucesso.";
	header("Location: paciente-altera-formulario.php?id=$id_parceiro");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Paciente não foi adicionada. $msg";
	header("Location: paciente-altera-formulario.php?id=$id_parceiro");
}