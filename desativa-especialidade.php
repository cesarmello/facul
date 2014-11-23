<?php
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
desativaEspecialidade($conexao, $id);
$_SESSION["success"] = "Especialidade Desativada com sucesso.";
header("Location: especialidade-lista.php");
die();