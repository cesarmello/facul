<?php
require_once ('cabecalho.php');
require_once ('banco-valor-referencia.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_tipo_exame     = $_POST["id_tipo_exame"];
$nome_campo        = $_POST["nome_campo"];
$valor_referencia  = $_POST["valor_referencia"];
$uni_medida        = $_POST["uni_medida"];

if(insereValorReferencias($conexao, $nome_campo, $valor_referencia, $uni_medida, $id_tipo_exame)) {
	$_SESSION["success"] = "Valor de Referencia adicionado com sucesso.";
	header("Location: tipo-exame-altera-formulario.php?id=$id_tipo_exame");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Valor de Referencia não foi adicionada. $msg";
	header("Location: tipo-exame-altera-formulario.php?id=$id_tipo_exame");
}
require_once ('rodape.php');