<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();

$id = $_GET['id'];
$auto_exame = buscaTipoExame($conexao,$id);
?>
<h1>Alterando Tipo Exame</h1>
<form action="altera-auto_exame.php" method="post">
	<input type="hidden" name="id" value="<?=$auto_exame['id_auto_exame']?>">
	<table class="table">
		<?php require_once ('exame-formulario-base.php');?>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>