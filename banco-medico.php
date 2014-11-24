<?php
require_once ('conecta.php');

function listaMedicos($conexao) {
	$medicos = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_medico WHERE ativo = '1' ORDER BY nome");

	while($medico = mysqli_fetch_assoc($resultado)) {
		array_push($medicos, $medico);
	}
	return $medicos;
}

function insereMedico($conexao, $nome, $razao, $crm, $senha, $site, $email) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_medico (nome, razao, crm, senha, site, email, data_registro, permissao) 
						VALUES ('$nome', '$razao', '$crm', '$senha', '$site', '$email', NOW(), 'm')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraMedico($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_medico) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_medico SET nome='$nome', razao='$razao', crm='$crm', senha='$senha', site='$senha', email='$email' WHERE id_medico='$id_medico'";
	return mysqli_query($conexao, $query);
}

function buscaMedico($conexao, $id_medico) {
	$query = "SELECT id_medico, nome, razao, crm, senha, site, email, DATE_FORMAT( data_registro , '%d/%c/%Y' ) AS data FROM tb_medico WHERE id_medico = {$id_medico}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaMedico($conexao, $id_medico) {
	$query = "UPDATE tb_medico SET  ativo = '0' WHERE id_medico = {$id_medico}";
	return mysqli_query($conexao, $query);
}