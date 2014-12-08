<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('banco-paciente.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-exame-campo.php');
require_once ('banco-prontuario.php');
require_once ('logica-usuario.php');

verificaUsuario();
$id_tipo_exame = $_GET["id"];
$exame         = listaExames($conexao);
$pacientes     = listaPacientes($conexao);
$tipoExame     = buscaTipoExame($conexao, $id_tipo_exame);
$exameCampos   = listaExameCampos($conexao, $id_tipo_exame);
?>

<h1>Exame <?=$tipoExame['nome']?></h1>
<form action="adiciona-exame.php" method="post">
	<input type="hidden" name="id_tipo_exame" value="<?=$id_tipo_exame?>">
	<table class="table">
		<?php require_once ('exame-formulario-base.php');?>
		<tr>
			<input type="hidden" name="id_medico" value="2">
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>
</form>
<?php require_once ('rodape.php'); ?>