<?php
require_once ('conecta.php');

function removeEspEnd($conexao, $id_endereco, $id_especialidade) {
	$query = "DELETE FROM mer_endereco_especialidade WHERE id_endereco = $id_endereco AND id_especialidade = $id_especialidade";
	return mysqli_query($conexao, $query);
}