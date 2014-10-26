<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome   = $_POST["nome"];
$minimo = $_POST["minimo"];
$normal = $_POST["normal"];
$maximo = $_POST["maximo"];
$id_unimedida = $_POST["id_unimedida"];


if(insereTipoExame($conexao, $nome, $minimo, $normal, $maximo, $id_unimedida)) {
	$_SESSION["success"] = "Tipo de exame $nome adicionado com sucesso.";
	header("Location: tipo-exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Tipo de exame $nome não foi adicionada. $msg";
	header("Location: tipo-exame-lista.php");
}
require_once ('rodape.php');