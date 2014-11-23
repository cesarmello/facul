<?php	
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
	<?php if (usuarioEstaLogado()) { ?>

		<table class="table table-striped">
			<tr>
				<td><h1 class="text-bold">Especialidedas</h1></td>
				<td></td>
				<td></td>
				<td><a class="btn btn-primary" href="especialidade-formulario.php">Adicionar</a></td>
			</tr>

		<tr>
			<td class="text-bold">Especialidade</td>
			<td class="text-bold">Área</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Desativar</td>
		</tr>

			<?php
				$especialidades = buscaEspArea($conexao);
				foreach ($especialidades as $especialidade) :
			?>
		
			<tr>
				<td><?=$especialidade['especialidade'] ?></td>
				<td><?=$especialidade['nomeesp'] ?></td>
				<td><a class="btn btn-primary btn-sm" href="especialidade-altera-formulario.php?id=<?=$especialidade['id_especialidade']?>">Alterar</a></td>
				<td class="text-center">
					<form action="desativa-especialidade.php" method="post">
						<input type="hidden" name="id" value="<?=$especialidade['id_especialidade']?>">
						<button class="btn btn-danger btn-sm">Desativar</button>
					</form>
				</td>
			</tr>
			<?php endforeach ?>
		</table>

	<?php } ?>
<?php require_once ('rodape.php'); ?>
