<?php
require_once ('conecta.php');

function listaExames($conexao) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(E.id_exame), DATE_FORMAT(E.data_exame,'%d/%m/%Y às %T') as data_exame, E.id_paciente, PA.nome, TE.nome as exame
																			FROM tb_exame E
																			LEFT JOIN mer_prontuario_exame PE ON PE.id_prontuario = E.id_exame
																			LEFT JOIN tb_prontuario P ON P.id_prontuario = PE.id_prontuario
																			LEFT JOIN tb_paciente PA ON PA.id_paciente = E.id_paciente
																			LEFT JOIN tb_tipo_exame TE ON TE.id_tipo_exame = E.id_tipo_exame
																			WHERE E.ativo ='1' and TE.ativo = '1' ORDER BY E.id_exame DESC");
	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function insereExame($conexao, $diagnostico, $id_paciente, $id_medico, $id_tipo_exame) {
	$diagnostico = mysqli_real_escape_string($conexao,$diagnostico);
	$query = "INSERT INTO tb_exame (data_exame, diagnostico, ativo, id_paciente, id_medico, id_tipo_exame) 
						VALUES (NOW(), '$diagnostico', '1','$id_paciente', '$id_medico', '$id_tipo_exame')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function insereMerProntuarioExame($conexao) {
	$query = "INSERT INTO mer_prontuario_exame ( id_prontuario,  id_exame ) 
	VALUES ( (SELECT max(id_prontuario) FROM tb_prontuario), (SELECT max(id_exame) FROM tb_exame) )";
	echo $query;
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraExame($conexao, $id, $nome, $minimo, $normal, $maximo) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_exame SET nome='{$nome}', minimo='{$minimo}', normal='{$normal}', maximo='{$maximo}' WHERE id_exame = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaExame($conexao, $id) {
	$query = "SELECT E.*, P.nome 
						FROM tb_exame E
						LEFT JOIN tb_paciente P ON P.id_paciente = E.id_paciente
						WHERE id_exame = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaExame($conexao, $id) {
	$query = "UPDATE tb_exame SET ativo = '0' WHERE id_exame = {$id}";
	return mysqli_query($conexao, $query);
}