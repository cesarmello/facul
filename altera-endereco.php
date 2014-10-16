<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_parceiro = $_POST["id_parceiro"];
$id_endereco = $_POST["id_endereco"];
$cep  = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$telefone = $_POST["telefone"];

if(alteraEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $id_endereco)) {
	/// Telefone/// Telefone/// Telefone/// Telefone/// Telefone/// Telefone/// Telefone/// Telefone
	$_SESSION["success"] = "Endereco $endereco alterado com sucesso.";
	header("Location: parceiro-altera-formulario.php?id=$id_parceiro");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Endereco $endereco não foi alterada. $msg";
	header("Location: parceiro-altera-formulario.php?id=$id_parceiro");
} 