<?php
require_once ('conecta.php');

function listaEspecialidades($conexao) {
	$especialidades = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_especialidade ORDER BY especialidade");

	while($especialidade = mysqli_fetch_assoc($resultado)) {
		array_push($especialidades, $especialidade);
	}
	return $especialidades;
}

function insereEspecialidade($conexao, $especialidade, $id_area) {
	$especialidade = mysqli_real_escape_string($conexao,$especialidade);
	$query = "INSERT INTO tb_especialidade (especialidade, id_area) VALUES ('{$especialidade}','{$id_area}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraEspecialidade($conexao, $id_area, $especialidade, $id_especialidade) {
	$especialidade = mysqli_real_escape_string($conexao,$especialidade);
	$query = "UPDATE tb_especialidade SET especialidade='{$especialidade}', id_area={$id_area} WHERE id_especialidade = {$id_especialidade}";
	return mysqli_query($conexao, $query);
}

function buscaEspecialidade($conexao, $id_especialidade) {
	$query = "SELECT * FROM tb_especialidade WHERE id_especialidade = {$id_especialidade}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeEspecialidade($conexao, $id_especialidade) {
	$query = "DELETE FROM tb_especialidade WHERE id_especialidade = {$id_especialidade}";
	return mysqli_query($conexao, $query);
}

function buscaEspArea($conexao) {
	$especialidades = array();
	$resultado = mysqli_query($conexao,  "SELECT e.*, a.nome as nomeesp
																				FROM tb_especialidade e
																				LEFT JOIN tb_area a ON e.id_area = a.id_area
																				ORDER BY e.especialidade");

	while($especialidade = mysqli_fetch_assoc($resultado)) {
		array_push($especialidades, $especialidade);
	}
	return $especialidades;
}

function buscaEspCadastrada($conexao, $id_parceiro) {
	$especialidades = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(ESP.especialidade)
																		   FROM tb_endereco E
																			 LEFT JOIN mer_endereco_especialidade MESP ON E.id_endereco = MESP.id_endereco
																			 LEFT JOIN tb_especialidade ESP ON MESP.id_especialidade = ESP.id_especialidade
																			 WHERE E.id_parceiro=$id_parceiro ORDER BY ESP.especialidade");

	while($especialidade = mysqli_fetch_assoc($resultado)) {
		array_push($especialidades, $especialidade);
	}
	return $especialidades;
}

function buscaEspCadastradaEnd($conexao, $id_endereco) {
	$especialidades = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(ESP.especialidade), ESP.id_especialidade
																		   FROM tb_endereco E
																			 LEFT JOIN mer_endereco_especialidade MESP ON E.id_endereco = MESP.id_endereco
																			 LEFT JOIN tb_especialidade ESP ON MESP.id_especialidade = ESP.id_especialidade
																			 WHERE E.id_endereco = $id_endereco ORDER BY ESP.especialidade");

	while($especialidade = mysqli_fetch_assoc($resultado)) {
		array_push($especialidades, $especialidade);
	}
	return $especialidades;
}

function insereEspEnd($conexao, $id_endereco, $id_especialidade) {
	$query = "INSERT INTO mer_endereco_especialidade (id_endereco, id_especialidade) VALUES ( $id_endereco, $id_especialidade)";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}