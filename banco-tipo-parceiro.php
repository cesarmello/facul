<?php
require_once ('conecta.php');

function listaTipoParceiros($conexao) {
	$tipoParceiros = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_tipo_parceiro ORDER BY nome");

	while($tipoParceiro = mysqli_fetch_assoc($resultado)) {
		array_push($tipoParceiros, $tipoParceiro);
	}
	return $tipoParceiros;
}

function insereTipoParceiro($conexao, $nome) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_tipo_parceiro (nome) VALUES ('{$nome}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraTipoParceiro($conexao, $id_tipo_parceiro, $nome) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$descricao = mysqli_real_escape_string($conexao,$descricao);
	$query = "UPDATE tb_tipo_parceiro SET nome='{$nome}' WHERE id_tipo_parceiro = '{$id_tipo_parceiro}'";
	return mysqli_query($conexao, $query);
}

function buscaTipoParceiro($conexao, $id_tipo_parceiro) {
	$query = "SELECT * FROM tb_tipo_parceiro WHERE id_tipo_parceiro = {$id_tipo_parceiro}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeTipoParceiro($conexao, $id_tipo_parceiro) {
	$query = "DELETE FROM tb_tipo_parceiro WHERE id_tipo_parceiro = {$id_tipo_parceiro}";
	return mysqli_query($conexao, $query);
}