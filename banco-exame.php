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
																			WHERE E.ativo ='1' AND TE.ativo = '1' ORDER BY E.id_exame DESC");
	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function insereExame($conexao, $diagnostico, $id_paciente, $id_medico, $id_tipo_exame) {
	$diagnostico = mysqli_real_escape_string($conexao,$diagnostico);
	$query = "INSERT INTO tb_exame (data_exame, diagnostico, ativo, id_paciente, id_medico, id_tipo_exame) 
													VALUES (NOW(), '$diagnostico', '1','$id_paciente', '$id_medico', '$id_tipo_exame')";
													echo $query;
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
	$query = "SELECT E.id_exame, P.nome, E.diagnostico, P.id_paciente, T.nome AS nomeExame
						FROM tb_exame E
						LEFT JOIN tb_tipo_exame T ON T.id_tipo_exame = E.id_tipo_exame
						LEFT JOIN tb_paciente P ON P.id_paciente = E.id_paciente
						WHERE E.id_exame = $id AND E.ativo = '1'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaExame($conexao, $id) {
	$query = "UPDATE tb_exame SET ativo = '0' WHERE id_exame = {$id}";
	return mysqli_query($conexao, $query);
}

function buscaMerExamesProntuario($conexao, $id) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(C.nome_campo), P.valor, R.uni_medida
																			 FROM tb_exame E
																			 LEFT JOIN mer_prontuario_exame M ON M.id_exame = E.id_exame
																			 LEFT JOIN tb_prontuario P ON P.id_prontuario = M.id_prontuario
																			 LEFT JOIN tb_exame_campos C ON C.id_exame_campos = P.id_exame_campos
																			 LEFT JOIN tb_tipo_exame T ON T.id_tipo_exame = C.id_tipo_exame
																			 LEFT JOIN tb_valor_referencia R ON R.id_tipo_exame = T.id_tipo_exame 
																			 WHERE E.id_exame = $id");
	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function buscaExamesPaciente($conexao, $id) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT distinct(T.id_tipo_exame), P.id_paciente, P.nome, T.nome AS nomeExame
																			 FROM tb_exame E
																			 LEFT JOIN tb_tipo_exame T ON T.id_tipo_exame = E.id_tipo_exame
																			 LEFT JOIN tb_paciente P ON P.id_paciente = E.id_paciente
																			 WHERE P.id_paciente = $id AND E.ativo = '1';");
	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function buscaExamesPacienteData($conexao, $data_inicial, $data_final, $id_tipo_exame, $id_paciente) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(P.id_prontuario), DATE_FORMAT(E.data_exame,'%d/%m/%Y') as data_exame, E.ativo, E.id_paciente, E.id_medico, E.id_tipo_exame, EC.nome_campo, P.valor, V.uni_medida
																			 FROM tb_exame E
																			 LEFT JOIN mer_prontuario_exame MER ON MER.id_exame = E.id_exame
																			 LEFT JOIN tb_prontuario P ON P.id_prontuario = MER.id_prontuario
																			 LEFT JOIN tb_exame_campos EC ON EC.id_exame_campos = P.id_exame_campos
																			 LEFT JOIN tb_tipo_exame TE ON TE.id_tipo_exame = E.id_tipo_exame
																			 LEFT JOIN tb_valor_referencia V ON V.id_tipo_exame = TE.id_tipo_exame
																			 WHERE E.data_exame BETWEEN '$data_inicial' AND '$data_final 23:59:59'
																			 AND E.id_tipo_exame='$id_tipo_exame' AND E.id_paciente='$id_paciente' AND E.ativo ='1';");
	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}

function buscaValorReferencia($conexao, $id_tipo_exame) {
	$exames = array();
	$resultado = mysqli_query($conexao, "SELECT DISTINCT(TE.id_tipo_exame), V.valor_referencia, V.uni_medida
																			 FROM tb_tipo_exame TE
																			 LEFT JOIN tb_exame_campos EC ON EC.id_tipo_exame = TE.id_tipo_exame
																			 LEFT JOIN tb_valor_referencia V ON V.id_tipo_exame = TE.id_tipo_exame
																			 WHERE TE.id_tipo_exame = $id_tipo_exame");
	while($exame = mysqli_fetch_assoc($resultado)) {
		array_push($exames, $exame);
	}
	return $exames;
}