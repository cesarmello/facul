<?php
require_once ('conecta.php');

function listaTipoExames($conexao) {
	$tipo_exames = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_tipo_exame WHERE ativo = '1' ORDER BY nome");

	while($tipo_exame = mysqli_fetch_assoc($resultado)) {
		array_push($tipo_exames, $tipo_exame);
	}
	return $tipo_exames;
}

function insereTipoExame($conexao, $nome, $auto_exame) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_tipo_exame (nome, auto_exame, ativo)
						VALUES ('$nome', '$auto_exame','1')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraTipoExame($conexao, $id, $nome, $auto_exame) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_tipo_exame SET nome='$nome', auto_exame='$auto_exame' WHERE id_tipo_exame=$id";
	return mysqli_query($conexao, $query);
}

function buscaTipoExame($conexao, $id_tipo_exame) {
	$query = "SELECT * FROM tb_tipo_exame WHERE id_tipo_exame = $id_tipo_exame AND ativo = '1'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaTipoExame($conexao, $id) {
	$query = "UPDATE tb_tipo_exame SET ativo = '0' WHERE id_tipo_exame = $id";
	return mysqli_query($conexao, $query);
}