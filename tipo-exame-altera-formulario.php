<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id = $_GET['id'];
$tipo_exame = buscaTipoExame($conexao,$id);
$unimedidas  = listaUniMedidas($conexao);
?>
<h1>Alterando Tipo Exame</h1>
<form action="altera-tipo-exame.php" method="post">
	<input type="hidden" name="id" value="<?=$tipo_exame['id_tipo_exame']?>">
	<table class="table">
		<?php require_once ('tipo-exame-formulario-base.php');?>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>