<?php
require_once ('cabecalho.php');
require_once ('banco-medico.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
removeMedico($conexao, $id);
$_SESSION["success"] = "Médico(a) removido com sucesso.";
header("Location: medico-lista.php");
die();