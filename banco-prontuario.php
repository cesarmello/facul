<?php
require_once ('conecta.php');

function listaProntuarios($conexao) {
	$prontuarios = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(E.id_prontuario), DATE_FORMAT(E.data_prontuario,'%d/%m/%Y às %T') as data_prontuario, E.id_paciente, PA.nome
																			FROM tb_prontuario E
																			LEFT JOIN mer_prontuario_prontuario PE ON PE.id_prontuario = E.id_prontuario
																			LEFT JOIN tb_prontuario P ON P.id_prontuario = PE.id_prontuario
																			LEFT JOIN tb_paciente PA ON PA.id_paciente = E.id_paciente
																			WHERE E.ativo ='1'");

	while($prontuario = mysqli_fetch_assoc($resultado)) {
		array_push($prontuarios, $prontuario);
	}
	return $prontuarios;
}

function insereProntuario($conexao, $valor, $id_exame_campos) {
	$query = "INSERT INTO tb_prontuario (valor, ativo, id_exame_campos) VALUES ('$valor', '1', $id_exame_campos)";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraProntuario($conexao, $id, $valor) {
	$query = "UPDATE tb_prontuario SET valor='{$valor}' WHERE id_prontuario = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaProntuario($conexao, $id) {
	$query = "SELECT * FROM tb_prontuario WHERE id_prontuario = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaProntuario($conexao, $id) {
	$query = "UPDATE tb_prontuario SET ativo = '0' WHERE id_prontuario = {$id}";
	return mysqli_query($conexao, $query);
}