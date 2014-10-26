<?php
require_once ('conecta.php');

function listaEnderecos($conexao) {
	$enderecos = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_endereco ORDER BY endereco");

	while($endereco = mysqli_fetch_assoc($resultado)) {
		array_push($enderecos, $endereco);
	}
	return $enderecos;
}

function insereEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $id_medico) {
	//$endereco = mysqli_real_escape_string($conexao,$endereco); // TRATA O SQL INJECTION
	$complemento = mysqli_real_escape_string($conexao,$complemento);
	$query = "INSERT INTO tb_endereco (cep, rua, numero, complemento, bairro, cidade, uf, id_medico) 
						VALUES ({$cep}, '{$rua}', {$numero}, '{$complemento}', '{$bairro}', '{$cidade}', '{$uf}', (select max(id_medico) from tb_medico))";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function insereEnd($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $id_medico) {
	//$endereco = mysqli_real_escape_string($conexao,$endereco); // TRATA O SQL INJECTION
	$complemento = mysqli_real_escape_string($conexao,$complemento);
	$query = "INSERT INTO tb_endereco (cep, rua, numero, complemento, bairro, cidade, uf, id_medico) 
						VALUES ({$cep}, '{$rua}', {$numero}, '{$complemento}', '{$bairro}', '{$cidade}', '{$uf}', {$id_medico})";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}


function alteraEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $id_endereco) {
	$complemento = mysqli_real_escape_string($conexao,$complemento);
	$query = "UPDATE tb_endereco SET cep=$cep, rua='$rua', numero=$numero, complemento='$complemento', bairro='$bairro', cidade='$cidade', uf='$uf' WHERE id_endereco = $id_endereco";
	return mysqli_query($conexao, $query);
}

function buscaEndereco($conexao, $id_endereco) {
	$query = "SELECT * FROM tb_endereco WHERE id_endereco = {$id_endereco}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEndMedico($conexao, $id_medico) {
	$enderecos = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_endereco WHERE id_medico = {$id_medico}");

	while($endereco = mysqli_fetch_assoc($resultado)) {
		array_push($enderecos, $endereco);
	}
	return $enderecos;
}

function removeEndereco($conexao, $id_endereco) {
	$query = "DELETE FROM tb_endereco WHERE id_endereco = {$id_endereco}paciente-cadastrar.php";
	return mysqli_query($conexao, $query);
}

function buscaNumEnd($conexao,$id_medico) {
	$query = "SELECT COUNT(*) as num from tb_endereco WHERE id_medico={$id_medico}";
	$result = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($result);
}