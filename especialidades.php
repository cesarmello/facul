<?php
require_once ('conecta.php');

function listaEspecialidades($conexao) {
	$idarea = $_GET['area'];
	$especialidades = array();
	$query = "SELECT id_especialidade, especialidade FROM tb_especialidade  WHERE id_area = {$idarea} ORDER BY especialidade ASC";
	$resultado = mysqli_query($conexao,$query);
	while ($especialidade = mysqli_fetch_assoc($resultado)) {
		array_push($especialidades, $especialidade);
	}
	return $especialidades;
}

$especialidades = listaEspecialidades($conexao); 

echo "<option value='-1'>Selecione uma Especialidade</option>";

foreach ($especialidades as $especialidade) : 

	echo "<option value=".$especialidade['id_especialidade'].">".$especialidade['especialidade']."</option>";

endforeach;
