<?php	
require_once ('cabecalho.php');
require_once ('banco-paciente.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h2 class="text-bold">Selecione um Paciente</h2></td>
		</tr>
		<?php
			$pac = listaPacientes($conexao);
			foreach ($pac as $paciente) :
		?>
		<tr>
			<td><a href="relatorio-paciente.php?id=<?=$paciente['id_paciente']?>&p=<?=$paciente['nome']?>"><?=$paciente['nome']?></a></td>
		</tr>
		<?php endforeach ?>

	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>