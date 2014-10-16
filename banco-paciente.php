<?php
require_once ('conecta.php');

function listaPacientes($conexao) {
	$areas = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_paciente");

	while($area = mysqli_fetch_assoc($resultado)) {
		array_push($areas, $area);
	}
	return $areas;
}

function inserePaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_paciente (nome, cpf, rg, cep, rua, numero, complemento, bairro, cidade, uf, fixo, movel, email, senha, permissao) VALUES ('$nome', $cpf, '$rg', $cep, '$rua', $numero, '$complemento', '$bairro', '$cidade', '$uf', $fixo, $movel, '$email', '$senha', '$permissao')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraPaciente($conexao, $id, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_paciente SET nome='{$nome}' WHERE id_paciente = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaPaciente($conexao, $id) {
	$query = "SELECT * FROM tb_paciente WHERE id_paciente = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removePaciente($conexao, $id) {
	$query = "DELETE FROM tb_paciente WHERE id_paciente = {$id}";
	return mysqli_query($conexao, $query);
}