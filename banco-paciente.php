<?php
require_once ('conecta.php');

function listaPacientes($conexao) {
	$areas = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_paciente WHERE ativo = '1'");

	while($area = mysqli_fetch_assoc($resultado)) {
		array_push($areas, $area);
	}
	return $areas;
}

function inserePaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_paciente (nome, cpf, rg, cep, rua, numero, complemento, bairro, cidade, uf, fixo, movel, email, senha, permissao, ativo) VALUES ('$nome', '$cpf', '$rg', $cep, '$rua', $numero, '$complemento', '$bairro', '$cidade', '$uf', $fixo, $movel, '$email', '$senha', '3', '1')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraPaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha, $id_paciente) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_paciente SET nome='$nome', cpf='$cpf', rg='$rg', cep=$cep, rua='$rua', numero=$numero, complemento='$complemento', bairro='$bairro', cidade='$cidade', uf='$uf', fixo=$fixo, movel=$movel, email='$email', senha='$senha' WHERE id_paciente=$id_paciente";
	return mysqli_query($conexao, $query);
}

function buscaPaciente($conexao, $id) {
	$query = "SELECT * FROM tb_paciente WHERE id_paciente = $id";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaPaciente($conexao, $id) {
	$query = "UPDATE tb_paciente SET ativo = '0' WHERE id_paciente = $id";
	return mysqli_query($conexao, $query);
}