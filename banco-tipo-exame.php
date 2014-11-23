<?php
require_once ('conecta.php');

function listaTipoExames($conexao) {
	$tipo_exames = array();
	$resultado = mysqli_query($conexao, "SELECT * from tb_tipo_exame ORDER BY nome");

	while($tipo_exame = mysqli_fetch_assoc($resultado)) {
		array_push($tipo_exames, $tipo_exame);
	}
	return $tipo_exames;
}

function insereTipoExame($conexao, $nome, $valor1, $desc1, $valor2, $desc2, $valor3, $desc3, $valor4, $desc4, $valor5, $desc5, $auto_exame, $id_unimedida) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "INSERT INTO tb_tipo_exame (nome, valor1, desc1, valor2, desc2, valor3, desc3, valor4, desc4, valor5, desc5, auto_exame, id_unimedida)
						VALUES ('$nome', $valor1, '$desc1', $valor2, '$desc2', $valor3, '$desc3', $valor4, '$desc4', $valor5, '$desc5', '$auto_exame', $id_unimedida)";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraTipoExame($conexao, $id, $nome, $valor1, $desc1, $valor2, $desc2, $valor3, $desc3, $valor4, $desc4, $valor5, $desc5, $auto_exame, $id_unimedida) {
	$nome = mysqli_real_escape_string($conexao,$nome);
	$query = "UPDATE tb_tipo_exame SET nome='$nome', valor1='$valor1', desc1='$desc1', valor2='$valor2', desc2='$desc2', valor3='$valor3', desc3='$desc3', valor4='$valor4', desc4='$desc4', valor5='$valor5', desc5='$desc5', auto_exame='$auto_exame', id_unimedida=$id_unimedida WHERE id_tipo_exame=$id";
	return mysqli_query($conexao, $query);
}

function buscaTipoExame($conexao, $id) {
	$query = "SELECT * FROM tb_tipo_exame WHERE id_tipo_exame = $id";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function desativaTipoExame($conexao, $id) {
	$query = "DELETE FROM tb_tipo_exame WHERE id_tipo_exame = $id";
	return mysqli_query($conexao, $query);
}