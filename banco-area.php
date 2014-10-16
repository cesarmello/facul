<?php
require_once ('conecta.php');

function listaAreas($conexao) {
	$areas = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_area ORDER BY nome");

	while($area = mysqli_fetch_assoc($resultado)) {
		array_push($areas, $area);
	}
	return $areas;
}

function insereArea($conexao, $nome) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_area (nome) VALUES ('{$nome}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraArea($conexao, $id, $nome) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$descricao = mysqli_real_escape_string($conexao,$descricao);
	$query = "UPDATE tb_area SET nome='{$nome}' WHERE id_area = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaArea($conexao, $id) {
	$query = "SELECT * FROM tb_area WHERE id_area = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeArea($conexao, $id) {
	$query = "DELETE FROM tb_area WHERE id_area = {$id}";
	return mysqli_query($conexao, $query);
}