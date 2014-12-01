<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
desativaExame($conexao, $id);
$_SESSION["success"] = "Exame desativado com sucesso.";
header("Location: exame-lista.php");
die();