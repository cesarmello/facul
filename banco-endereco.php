<?php
require_once ('conecta.php');

function listaEnderecos($conexao) {
	$enderecos = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_endereco where ativo ='1' ORDER BY endereco");

	while($endereco = mysqli_fetch_assoc($resultado)) {
		array_push($enderecos, $endereco);
	}
	return $enderecos;
}

function insereEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $id_medico) {
	$complemento = mysqli_real_escape_string($conexao,$complemento);
	$query = "INSERT INTO tb_endereco (cep, rua, numero, complemento, bairro, cidade, uf, fixo, movel, ativo, id_medico) 
						VALUES ({$cep}, '{$rua}', {$numero}, '{$complemento}', '{$bairro}', '{$cidade}', '{$uf}', '{$fixo}', '{$movel}', '1', (select max(id_medico) from tb_medico))";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function insereEnd($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $id_medico) {
	$complemento = mysqli_real_escape_string($conexao,$complemento);
	$query = "INSERT INTO tb_endereco (cep, rua, numero, complemento, bairro, cidade, uf, fixo, movel, ativo, id_medico) 
						VALUES ({$cep}, '{$rua}', {$numero}, '{$complemento}', '{$bairro}', '{$cidade}', '{$uf}', '{$fixo}', '{$movel}', '1', {$id_medico})";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}


function alteraEndereco($conexao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $fixo, $movel, $id_endereco) {
	$complemento = mysqli_real_escape_string($conexao,$complemento);
	$query = "UPDATE tb_endereco SET cep=$cep, rua='$rua', numero=$numero, complemento='$complemento', bairro='$bairro', cidade='$cidade', uf='$uf', fixo='$fixo', movel='$movel' WHERE id_endereco = $id_endereco";
	return mysqli_query($conexao, $query);
}

function buscaEndereco($conexao, $id_endereco) {
	$query = "SELECT * FROM tb_endereco WHERE id_endereco = {$id_endereco} and ativo ='1'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEndMedico($conexao, $id_medico) {
	$enderecos = array();
	$resultado = mysqli_query($conexao, "SELECT * FROM tb_endereco WHERE id_medico = {$id_medico} and ativo ='1'");

	while($endereco = mysqli_fetch_assoc($resultado)) {
		array_push($enderecos, $endereco);
	}
	return $enderecos;
}

function desativaEndereco($conexao, $id_endereco) {
	$query = "UPDATE tb_endereco SET ativo = '0' WHERE id_endereco = {$id_endereco}";
	return mysqli_query($conexao, $query);
}

function buscaNumEnd($conexao,$id_medico) {
	$query = "SELECT COUNT(*) as num from tb_endereco WHERE id_medico = {$id_medico} and ativo ='1'";
	$result = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($result);
}