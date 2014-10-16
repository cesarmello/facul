<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id = $_GET['id'];
$area = buscaArea($conexao,$id);
?>
<h1>Alterando Área</h1>
<form action="altera-area.php" method="post">
	<input type="hidden" name="id" value="<?=$area['id_area']?>">
	<table class="table">
		<?php require_once ('area-formulario-base.php');?>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>