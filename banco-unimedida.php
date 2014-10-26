<?php
require_once ('conecta.php');

function listaUniMedidas($conexao) {
	$unimedidas = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_unimedida ORDER BY unidade");

	while($unimedida = mysqli_fetch_assoc($resultado)) {
		array_push($unimedidas, $unimedida);
	}
	return $unimedidas;
}

function insereUniMedida($conexao, $unidade, $descricao) {
	$unidade = mysqli_real_escape_string($conexao,$unidade);
	$descricao = mysqli_real_escape_string($conexao,$descricao);
	$query = "INSERT INTO tb_unimedida (unidade, descricao) VALUES ('{$unidade}', '{$descricao}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraUniMedida($conexao, $id, $unidade, $descricao) {
	$unidade = mysqli_real_escape_string($conexao,$unidade);
	$descricao = mysqli_real_escape_string($conexao,$descricao);
	$query = "UPDATE tb_unimedida SET unidade='{$unidade}', descricao='{$descricao}' WHERE id_unimedida = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaUniMedida($conexao, $id) {
	$query = "SELECT * FROM tb_unimedida WHERE id_unimedida = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeUniMedida($conexao, $id) {
	$query = "DELETE FROM tb_unimedida WHERE id_unimedida = {$id}";
	return mysqli_query($conexao, $query);
}