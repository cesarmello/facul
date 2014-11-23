<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('logica-usuario.php');

$id= $_POST['id'];
desativaArea($conexao, $id);
$_SESSION["success"] = "Área Desativada com sucesso.";
header("Location: area-lista.php");
die();