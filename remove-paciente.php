<?php
require_once ('cabecalho.php');
require_once ('banco-paciente.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
removePaciente($conexao, $id);
$_SESSION["success"] = "Paciente removido com sucesso.";
header("Location: paciente-lista.php");
die();