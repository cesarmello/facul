<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();

$nome   = $_POST["nome"];
$valor1 = $_POST["valor1"];
$desc1  = $_POST["desc1"];
$valor2 = $_POST["valor2"];
$desc2  = $_POST["desc2"];
$valor3 = $_POST["valor3"];
$desc3  = $_POST["desc3"];
$valor4 = $_POST["valor4"];
$desc4  = $_POST["desc4"];
$valor5 = $_POST["valor5"];
$desc5  = $_POST["desc5"];
$auto_exame   = $_POST["auto_exame"];
$id_unimedida = $_POST["id_unimedida"];


if(insereTipoExame($conexao, $nome, $valor1, $desc1, $valor2, $desc2, $valor3, $desc3, $valor4, $desc4, $valor5, $desc5, $auto_exame, $id_unimedida)) {
	$_SESSION["success"] = "Tipo de exame $nome adicionado com sucesso.";
	header("Location: tipo-exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Tipo de exame $nome não foi adicionada. $msg";
	header("Location: tipo-exame-lista.php");
}
require_once ('rodape.php');