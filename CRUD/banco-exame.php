<?php
require_once ('conecta.php');

function listaTipoExames($conexao) {
	$tipo_exames = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_tipo_exame ORDER BY nome");

	while($tipo_exame = mysqli_fetch_assoc($resultado)) {
		array_push($tipo_exames, $tipo_exame);
	}
	return $tipo_exames;
}

function insereTipoExame($conexao, $nome, $minimo, $normal, $maximo) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_medico (nome, razao, crm, senha, site, email, data_registro, permissao) 
						VALUES ('$nome', '$razao', '$crm', '$senha', '$site', '$email', NOW(), 'm')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraTipoExame($conexao, $id, $nome, $minimo, $normal, $maximo) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$minimo = mysqli_real_escape_string($conexao,$minimo);
	$normal = mysqli_real_escape_string($conexao,$normal);
	$maximo = mysqli_real_escape_string($conexao,$maximo);
	$query = "UPDATE tb_tipo_exame SET nome='{$nome}', minimo='{$minimo}', normal='{$normal}', maximo='{$maximo}' WHERE id_tipo_exame = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaTipoExame($conexao, $id) {
	$query = "SELECT * FROM tb_tipo_exame WHERE id_tipo_exame = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaTipoExame($conexao, $id) {
	$query = "DELETE FROM tb_tipo_exame WHERE id_tipo_exame = {$id}";
	return mysqli_query($conexao, $query);
}