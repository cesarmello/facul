<?php
require_once ('cabecalho.php');
require_once ('banco-paciente.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
desativaPaciente($conexao, $id);
$_SESSION["success"] = "Paciente desativado com sucesso.";
header("Location: paciente-lista.php");
die();