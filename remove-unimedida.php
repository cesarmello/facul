<?php
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
removeUniMedida($conexao, $id);
$_SESSION["success"] = "Unidade de Medida removida com sucesso.";
header("Location: unimedida-lista.php");
die();