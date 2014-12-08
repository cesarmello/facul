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
	$nome  = mysqli_real_escape_string($conexao,$nome);
	$razao = mysqli_real_escape_string($conexao,$razao);
	$crm   = mysqli_real_escape_string($conexao,$crm);
	$site  = mysqli_real_escape_string($conexao,$site);
	$email = mysqli_real_escape_string($conexao,$email);
	
	$query = "INSERT INTO tb_login (email, senha, ativo, permissao) 
						VALUES ('$email', md5('$senha'), '1', '2')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);

	$query2 = "INSERT INTO tb_medico (nome, razao, crm, site, data_registro, ativo) 
						 VALUES ('$nome', '$razao', '$crm', '$site', NOW(), '1')";
	$resultadoDaInsercao2 = mysqli_query($conexao, $query2);

	$query3 = "INSERT INTO mer_login ( id_login, id_medico ) 
						 VALUES ( (SELECT max(id_login) FROM tb_login),
											(SELECT max(id_medico) FROM tb_medico) )";
	$resultadoDaInsercao3 = mysqli_query($conexao, $query3);
	
	return $resultadoDaInsercao3;
}

function alteraMedico($conexao, $nome, $razao, $crm, $site, $email, $senha, $id_medico, $id_login) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query  = "UPDATE tb_medico SET nome='$nome', razao='$razao', crm='$crm', site='$site' WHERE id_medico='$id_medico'";	
	$query2 = "UPDATE tb_login SET email='$email', senha=MD5('$senha') WHERE id_login='$id_login'"; 
	$resut = mysqli_query($conexao, $query2);
	return mysqli_query($conexao, $query);
}

function buscaMedico($conexao, $id_medico) {
	$query = "SELECT M.id_medico, M.nome, M.razao, M.crm, M.site, DATE_FORMAT( M.data_registro , '%d/%c/%Y' ) AS data, L.id_login, L.email, L.senha
						FROM tb_medico M
						LEFT JOIN mer_login MER ON MER.id_medico = M.id_medico 
						LEFT JOIN tb_login L ON L.id_login = MER.id_login
						WHERE M.id_medico = {$id_medico} AND M.ativo = '1'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaMedico($conexao, $id_medico) {
	$query = "UPDATE tb_medico SET  ativo = '0' WHERE id_medico = {$id_medico}";
	return mysqli_query($conexao, $query);
}