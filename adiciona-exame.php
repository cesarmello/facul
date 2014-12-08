<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('banco-prontuario.php');

require_once ('logica-usuario.php');

verificaUsuario();

$valor1          = $_POST["valor1"];
$valor2          = $_POST["valor2"];
$valor3          = $_POST["valor3"];
$valor4          = $_POST["valor4"];
$valor5          = $_POST["valor5"];
$valor6          = $_POST["valor6"];
$valor7          = $_POST["valor7"];
$valor8          = $_POST["valor8"];
$valor9          = $_POST["valor9"];
$valor10         = $_POST["valor10"];
$id_exame_campo1 = $_POST["id_exame_campo1"];
$id_exame_campo2 = $_POST["id_exame_campo2"];
$id_exame_campo3 = $_POST["id_exame_campo3"];
$id_exame_campo4 = $_POST["id_exame_campo4"];
$id_exame_campo5 = $_POST["id_exame_campo5"];
$id_exame_campo6 = $_POST["id_exame_campo6"];
$id_exame_campo7 = $_POST["id_exame_campo7"];
$diagnostico     = $_POST["diagnostico"];
$id_medico       = $_POST["id_medico"];
$id_paciente     = $_POST["id_paciente"];
$id_tipo_exame   = $_POST["id_tipo_exame"];

if( insereExame($conexao, $diagnostico, $id_paciente, $id_medico, $id_tipo_exame) ) {
	for ($i=1; $i < 11; $i++) { 
		$v = array();
		$e = array();
		$v[$i] = "valor$i";
		$e[$i] = "id_exame_campo$i";
		if ( $$v[$i] != null ) {
			insereProntuario($conexao, $$v[$i], $$e[$i]);
			insereMerProntuarioExame($conexao);
		}else{
			break;
		}
	}
	$_SESSION["success"] = "Exame adicionado com sucesso.";
	header("Location: exame-lista.php");
} else {
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Exame não foi adicionada. $msg";
	header("Location: exame-lista.php");
}
require_once ('rodape.php');