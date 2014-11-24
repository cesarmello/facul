<?php
require_once ('conecta.php');

function insereValorReferencias($conexao, $nome_campo, $valor_referencia, $uni_medida, $id_tipo_exame) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_valor_referencia (nome_campo, valor_referencia, uni_medida, ativo, id_tipo_exame) 
						VALUES ('$nome_campo','$valor_referencia', '$uni_medida', '1', $id_tipo_exame)";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function buscaValorReferencias($conexao, $id_tipo_exame) {
	$tipo_exames = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_valor_referencia WHERE id_tipo_exame = $id_tipo_exame AND ativo = '1' ORDER BY valor_referencia");

	while($tipo_exame = mysqli_fetch_assoc($resultado)) {
		array_push($tipo_exames, $tipo_exame);
	}
	return $tipo_exames;
}

function desativaValorReferencia($conexao, $id_valor_referencia) {
	$query = "UPDATE tb_valor_referencia SET ativo = '0' WHERE id_valor_referencia = $id_valor_referencia";
	return mysqli_query($conexao, $query);
}