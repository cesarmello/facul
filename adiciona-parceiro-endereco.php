<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('banco-telefone.php');
require_once ('logica-usuario.php');

verificaUsuario();

$cep  = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$id_parceiro = $_POST["id_parceiro"];
$telefone = $_POST["telefone"];

if(insereEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $id_parceiro)) {
	insereTelefone($conexao, $telefone);
	$_SESSION["success"] = "Endereço adicionado com sucesso.";
	header("Location: parceiro-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Endereço não foi adicionada. $msg";
	header("Location: parceiro-lista.php");
}