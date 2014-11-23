<?php
require_once ('cabecalho.php');
require_once ('banco-medico.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
desativaMedico($conexao, $id);
$_SESSION["success"] = "Médico(a) desativado com sucesso.";
header("Location: medico-lista.php");
die();