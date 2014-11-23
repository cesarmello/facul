<?php
require_once ('conecta.php');

function listaExames($conexao) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_exame ORDER BY nome");

	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function insereExame($conexao, $nome, $minimo, $normal, $maximo) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_exame (nome, razao, crm, senha, site, email, data_registro, permissao) 
						VALUES ('$nome', '$razao', '$crm', '$senha', '$site', '$email', NOW(), 'm')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraExame($conexao, $id, $nome, $minimo, $normal, $maximo) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_exame SET nome='{$nome}', minimo='{$minimo}', normal='{$normal}', maximo='{$maximo}' WHERE id_exame = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaExame($conexao, $id) {
	$query = "SELECT * FROM tb_exame WHERE id_exame = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaExame($conexao, $id) {
	$query = "DELETE FROM tb_exame WHERE id_exame = {$id}";
	return mysqli_query($conexao, $query);
}