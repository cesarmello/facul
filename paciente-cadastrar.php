<?php
require_once ('cabecalho.php');
require_once ('logica-usuario.php');
verificaUsuario();

?>

<h1>Cadastrar Paciente</h1>
<form action="adiciona-paciente.php" method="post">
	<table class="table">

				<?php require_once ('paciente-formulario-base.php'); ?>

		<td colspan="2">
			<button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Cadastra Paciente">Cadastrar</button>
		</td>
		</tr>
	</table>
</form>

<script src="js/masc.js"></script>
<?php require_once ('rodape.php');?>