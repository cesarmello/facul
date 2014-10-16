<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('logica-usuario.php');

$id_parceiro= $_POST['id_parceiro'];
$id_endereco= $_POST['id_endereco'];
removeEndereco($conexao, $id_endereco);
$_SESSION["success"] = "Endereço removido com sucesso.";
header("Location: parceiro-altera-formulario.php?id=$id_parceiro");
die();