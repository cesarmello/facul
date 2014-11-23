<?php
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
desativaUniMedida($conexao, $id);
$_SESSION["success"] = "Unidade de Medida Desativada com sucesso.";
header("Location: unimedida-lista.php");
die();