<?php
require_once ('cabecalho.php');
require_once ('banco-exame-campo.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id_tipo_exame = $_POST["id_tipo_exame"];
$nome_campo    = $_POST["nome_campo"];

if(insereExameCampos($conexao, $nome_campo, $id_tipo_exame)) {
	$_SESSION["success"] = "Exame adicionado com sucesso.";
	header("Location: tipo-exame-altera-formulario.php?id=$id_tipo_exame");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Exame não foi adicionada. $msg";
	header("Location: tipo-exame-altera-formulario.php?id=$id_tipo_exame");
}
require_once ('rodape.php');