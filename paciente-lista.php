<?php	
require_once ('cabecalho.php');
require_once ('banco-paciente.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h1 class="text-bold">Pacientes</h1></td>
			<td></td>
			<td class="text-center"><a class="btn btn-primary" href="paciente-cadastrar.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Excluir</td>
		</tr>
		<?php
			$pac = listaPacientes($conexao);
			foreach ($pac as $paciente) :
		?>
		<tr>
			<td><?=$paciente['nome'] ?></td>
			<td class="text-center"><a class="btn btn-primary btn-sm" href="paciente-altera-formulario.php?id=<?=$paciente['id_paciente']?>">Alterar</a></td>
			<td class="text-center">
				<form action="remove-paciente.php" method="post">
					<input type="hidden" name="id" value="<?=$paciente['id_paciente']?>">
					<button class="btn btn-danger btn-sm">Remover</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>

	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>