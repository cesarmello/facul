<?php
require_once ('conecta.php');

function listaPacientes($conexao) {
	$areas = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_paciente WHERE ativo = '1' ORDER BY nome");

	while($area = mysqli_fetch_assoc($resultado)) {
		array_push($areas, $area);
	}
	return $areas;
}

function inserePaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_paciente (nome, cpf, rg, cep, rua, numero, complemento, bairro, cidade, uf, fixo, movel, ativo) 
						VALUES ('$nome', '$cpf', '$rg', $cep, '$rua', $numero, '$complemento', '$bairro', '$cidade', '$uf', $fixo, $movel, '1')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	
	$query2 = "INSERT INTO tb_login (email, senha, ativo, permissao ) VALUES ('$email', senha=MD5('$senha'), '1', '1')";
	$resultadoDaInsercao2 = mysqli_query($conexao, $query2);

	$query3 = "INSERT INTO mer_login ( id_login, id_paciente ) 
						 VALUES ( (SELECT max(id_login) FROM tb_login),
											(SELECT max(id_paciente) FROM tb_paciente) )";
	$resultadoDaInsercao3 = mysqli_query($conexao, $query3);
	
	return $resultadoDaInsercao;
}

function alteraPaciente($conexao, $nome, $cpf, $rg, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $email, $senha, $id_paciente, $id_login) {
	$nome   = mysqli_real_escape_string($conexao,$nome);
	$query  = "UPDATE tb_paciente SET nome='$nome', cpf='$cpf', rg='$rg', cep=$cep, rua='$rua', numero=$numero, complemento='$complemento', bairro='$bairro', cidade='$cidade', uf='$uf', fixo=$fixo, movel=$movel WHERE id_paciente=$id_paciente";
	$query2 = "UPDATE tb_login SET email='$email', senha=MD5('$senha') WHERE id_login='$id_login'"; 
	$resut  = mysqli_query($conexao, $query2);
	return mysqli_query($conexao, $query);
}

function buscaPaciente($conexao, $id) {
	$query = "SELECT P.*, L.id_login, L.email, L.senha
						FROM tb_paciente P
						LEFT JOIN mer_login MER ON MER.id_paciente = P.id_paciente
						LEFT JOIN tb_login L ON L.id_login = MER.id_login
						WHERE P.ativo = '1' AND P.id_paciente = $id";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaPaciente($conexao, $id) {
	$query = "UPDATE tb_paciente SET ativo = '0' WHERE id_paciente = $id";
	return mysqli_query($conexao, $query);
}