<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome       = $_POST["nome"];
$auto_exame = $_POST["auto_exame"];


if(insereTipoExame($conexao, $nome, $auto_exame)) {
	$_SESSION["success"] = "Tipo de exame $nome adicionado com sucesso.";
	header("Location: tipo-exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Tipo de exame $nome não foi adicionada. $msg";
	header("Location: tipo-exame-lista.php");
}
require_once ('rodape.php');