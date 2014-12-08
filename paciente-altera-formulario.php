<?php
require_once ('cabecalho.php');
require_once ('logica-usuario.php');
require_once ('banco-paciente.php');
verificaUsuario();
$id = $_GET["id"];
$paciente = buscaPaciente($conexao, $id);
?>

<h1>Alterar Paciente</h1>
<form action="altera-paciente.php" method="post">
	<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="id_login" value="<?=$paciente['id_login']?>">

	<table class="table">
		
		<?php require_once ('paciente-formulario-base.php'); ?>

		<td colspan="2">
			<button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Alterar Paciente">Alterar</button>
		</td>
		</tr>
	</table>
</form>

<?php require_once ('rodape.php');?>