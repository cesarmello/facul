<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('logica-usuario.php');

$id_medico   = $_POST['id_medico'];
$id_endereco = $_POST['id_endereco'];
desativaEndereco($conexao, $id_endereco);
$_SESSION["success"] = "Endereço desativado com sucesso.";
header("Location: medico-altera-formulario.php?id=$id_medico");
die();