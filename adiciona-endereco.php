<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_medico   = $_POST["id_medico"];
$cep         = $_POST["cep"];
$rua         = $_POST["rua"];
$numero      = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro      = $_POST["bairro"];
$cidade      = $_POST["cidade"];
$uf          = $_POST["uf"];
$fixo        = $_POST["fixo"];
$movel       = $_POST["movel"];

if(insereEnd($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $id_medico)) {
	$_SESSION["success"] = "Endereço adicionado com sucesso.";
	header("Location: medico-altera-formulario.php?id=$id_medico");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Endereço não foi adicionada. $msg";
	header("Location: medico-altera-formulario.php?id=$id_medico");
}