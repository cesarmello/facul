<?php
require_once ('conecta.php');

function listaParceiros($conexao) {
	$parceiros = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_parceiro ORDER BY nome");

	while($parceiro = mysqli_fetch_assoc($resultado)) {
		array_push($parceiros, $parceiro);
	}
	return $parceiros;
}

function insereParceiro($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_tipo_parceiro) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_parceiro (nome, razao, crm, senha, site, email, data_registro, id_tipo_parceiro) 
						VALUES ('$nome', '$razao', '$crm', '$senha', '$site', '$email', NOW(), $id_tipo_parceiro)";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraParceiro($conexao, $nome, $razao, $crm, $senha, $site, $email, $id_tipo_parceiro, $id_parceiro) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$descricao = mysqli_real_escape_string($conexao,$descricao);
	$query = "UPDATE tb_parceiro SET nome='$nome', razao='$razao', crm='$crm', senha='$senha', site='$senha', email='$email', id_tipo_parceiro='$id_tipo_parceiro' WHERE id_parceiro='$id_parceiro'";
	return mysqli_query($conexao, $query);
}

function buscaParceiro($conexao, $id_parceiro) {
	$query = "SELECT id_parceiro, nome, razao, crm, senha, site, email, DATE_FORMAT( data_registro , '%d/%c/%Y' ) AS data, id_tipo_parceiro FROM tb_parceiro WHERE id_parceiro = {$id_parceiro}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeParceiro($conexao, $id_parceiro) {
	$query = "DELETE FROM tb_parceiro WHERE id_parceiro = {$id_parceiro}";
	return mysqli_query($conexao, $query);
}