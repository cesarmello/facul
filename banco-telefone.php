<?php
require_once ('conecta.php');

function listaTelefones($conexao) {
	$telefones = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_end_fone ORDER BY telefone");

	while($telefone = mysqli_fetch_assoc($resultado)) {
		array_push($telefones, $telefone);
	}
	return $telefones;
}

function insereTelefone($conexao, $telefone) {
	//$telefone = mysqli_real_escape_string($conexao,$telefone); // TRATA O SQL INJECTION
	$query = "INSERT INTO tb_end_fone (telefone, id_endereco) VALUES ('{$telefone}', (select max(id_endereco) from tb_endereco))";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraTelefone($conexao, $telefone, $id_end_fone) {
	$query = "UPDATE tb_end_fone SET telefone='{$telefone}' WHERE id_end_fone = {$id_end_fone}";
	return mysqli_query($conexao, $query);
}

function buscaTelefone($conexao, $id_endereco) {
	$telefones = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_end_fone WHERE id_endereco = {$id_endereco}");

	while($telefone = mysqli_fetch_assoc($resultado)) {
		array_push($telefones, $telefone);
	}
	return $telefones;
}

function removeTelefone($conexao, $id_end_fone) {
	$query = "DELETE FROM tb_end_fone WHERE id_end_fone = {$id_end_fone}";
	return mysqli_query($conexao, $query);
}