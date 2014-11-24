<?php
require_once ('conecta.php');

function desativaEspEnd($conexao, $id_endereco, $id_especialidade) {
	$query = "UPDATE mer_endereco_especialidade SET ativo = '0' WHERE id_endereco = $id_endereco AND id_especialidade = $id_especialidade";
	return mysqli_query($conexao, $query);
}