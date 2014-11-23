<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_medico = $_POST["id_medico"];
$id_endereco = $_POST["id_endereco"];
$cep  = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$fixo = $_POST["fixo"];
$movel = $_POST["movel"];

if(alteraEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $id_endereco)) {
	$_SESSION["success"] = "Endereco $endereco alterado com sucesso.";
	header("Location: medico-altera-formulario.php?id=$id_medico");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Endereco $endereco não foi alterada. $msg";
	header("Location: medico-altera-formulario.php?id=$id_medico");
} 