<?php
require_once ('cabecalho.php');
require_once ('banco-paciente.php');

$id_paciente = $_POST["id"];
$id_login    = $_POST["id_login"];
$nome        = $_POST["nome"];
$cpf         = $_POST["cpf"];
$rg          = $_POST["rg"];
$cep         = $_POST["cep"];
$rua         = $_POST["rua"];
$numero      = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro      = $_POST["bairro"];
$cidade      = $_POST["cidade"];
$uf          = $_POST["uf"];
$fixo        = $_POST["fixo"];
$movel       = $_POST["movel"];
$email       = $_POST["email"];
$senha       = $_POST["senha"];

if(alteraPaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha, $id_paciente, $id_login)) {
	$_SESSION["success"] = "$nome alterado com sucesso.";
	header("Location: paciente-altera-formulario.php?id=$id_paciente");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "$nome não foi alterado. $msg";
	header("Location: paciente-altera-formulario.php?id=$id_paciente");
}