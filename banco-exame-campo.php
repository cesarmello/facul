<?php
require_once ('conecta.php');

function listaExameCampos($conexao, $id_tipo_exame ) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_exame_campos WHERE id_tipo_exame = $id_tipo_exame AND ativo = '1'");

	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function insereExameCampos($conexao, $nome_campo, $id_tipo_exame) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_exame_campos (nome_campo, ativo, id_tipo_exame) 
						VALUES ('$nome_campo', '1', $id_tipo_exame)";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function buscaExameCampos($conexao, $id_tipo_exame) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_exame_campos WHERE id_tipo_exame = $id_tipo_exame AND ativo = '1'");

	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function desativaExameCampo($conexao, $id) {
	$query = "UPDATE tb_exame_campos SET ativo = '0' WHERE id_exame_campos = $id";
	return mysqli_query($conexao, $query);
}