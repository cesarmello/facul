<?php
require_once ('conecta.php');

function listaExames($conexao) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(E.id_exame), DATE_FORMAT(E.data_exame,'%d/%m/%Y às %T') as data_exame, E.qm_fez, PA.nome
																			FROM tb_exame E
																			LEFT JOIN mer_prontuario_exame PE ON PE.id_exame = E.id_exame
																			LEFT JOIN tb_prontuario P ON P.id_prontuario = PE.id_prontuario
																			LEFT JOIN tb_exame_campos C ON C.id_exame = E.id_exame
																			LEFT JOIN tb_paciente PA ON PA.id_paciente = E.qm_fez
																			WHERE E.ativo ='1'");

	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function insereExame($conexao, $valor_exame, $diagnostico, $qm_exame, $id_tipo_exame) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_exame (data_exame, valor_exame, diagnostico, qm_exame, auto_exame, id_tipo_exame) 
						VALUES (NOW(), '$valor_exame', '$diagnostico', '$qm_exame', '$auto_exame', '$id_tipo_exame')";
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