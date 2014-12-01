<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('banco-prontuario.php');

require_once ('logica-usuario.php');

verificaUsuario();

$valor           = $_POST["valor"];
$diagnostico     = $_POST["diagnostico"];
$id_medico       = $_POST["id_medico"];
$id_paciente     = $_POST["id_paciente"];
$id_tipo_exame   = $_POST["id_tipo_exame"];
$id_exame_campos = $_POST["id_exame_campos"];

for ($i=1; $i < 10; $i++) { 
	if ($valor.$i) {
		insereProntuario($conexao, $valor.$i, $id_exame_campos);
	}
	break;
}


if( insereExame($conexao, $diagnostico, $id_paciente, $id_medico, $id_tipo_exame) &&
		insereMerProntuarioExame($conexao) ) {
	$_SESSION["success"] = "Exame adicionado com sucesso.";
	//header("Location: exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Exame não foi adicionada. $msg";
	//header("Location: exame-lista.php");
}
require_once ('rodape.php');