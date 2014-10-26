<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
removeTipoExame($conexao, $id);
$_SESSION["success"] = "Tipo de Exame removida com sucesso.";
header("Location: tipo-exame-lista.php");
die();