<?php
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id = $_GET['id'];
$unimedida = buscaUniMedida($conexao,$id);
?>
<h1>Alterando Unidade de Medida</h1>
<form action="altera-unimedida.php" method="post">
	<input type="hidden" name="id" value="<?=$unimedida['id_unimedida']?>">
	<table class="table">
		<?php require_once ('unimedida-formulario-base.php');?>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>