<?php
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('banco-area.php');
require_once ('logica-usuario.php');

verificaUsuario();

$area = array("nome" => "", "id_especialidade" => "-1" );

$id_especialidade = $_GET['id'];
$especialidade = buscaEspecialidade($conexao,$id_especialidade);
$areas = listaAreas($conexao);
?>
<h1>Alterando Especialidade</h1>
<form action="altera-especialidade.php" method="post">
	<input type="hidden" name="id_especialidade" value="<?=$especialidade['id_especialidade']?>">
	<table class="table">

		<?php require_once ('especialidade-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>