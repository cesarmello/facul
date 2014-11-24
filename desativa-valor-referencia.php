<?php
require_once ('cabecalho.php');
require_once ('banco-valor-referencia.php');
require_once ('logica-usuario.php');

$id_tipo_exame= $_POST['id_tipo_exame'];
$id_valor_referencia= $_POST['id_valor_referencia'];

desativaValorReferencia($conexao, $id_valor_referencia);
$_SESSION["success"] = "Valor de Referencia desativado com sucesso.";
header("Location: tipo-exame-altera-formulario.php?id=$id_tipo_exame");
die();