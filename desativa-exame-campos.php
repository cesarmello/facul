<?php
require_once ('cabecalho.php');
require_once ('banco-exame-campo.php');
require_once ('logica-usuario.php');

$id_tipo_exame= $_POST['id_tipo_exame'];
$id_exame_campos= $_POST['id_exame_campos'];

desativaExameCampo($conexao, $id_exame_campos);
$_SESSION["success"] = "Auto de Exame desativado com sucesso.";
header("Location: tipo-exame-altera-formulario.php?id=$id_tipo_exame");
die();