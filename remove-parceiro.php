<?php
require_once ('cabecalho.php');
require_once ('banco-parceiro.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
removeParceiro($conexao, $id);
$_SESSION["success"] = "Parceiro(a) removido com sucesso.";
header("Location: parceiro-lista.php");
die();