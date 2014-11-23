<?php	
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h1 class="text-bold">Áreas</h1></td>
			<td></td>
			<td class="text-center"><a class="btn btn-primary" href="area-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Desativar</td>
		</tr>

		<?php
			$areas = listaAreas($conexao);
			foreach ($areas as $area) :
		?>
		<tr>
			<td><?=$area['nome'] ?></td>
			<td class="text-center"><a class="btn btn-primary btn-sm" href="area-altera-formulario.php?id=<?=$area['id_area']?>">Alterar</a></td>
			<td class="text-center">
				<form action="desativa-area.php" method="post">
					<input type="hidden" name="id" value="<?=$area['id_area']?>">
					<button class="btn btn-danger btn-sm">Desativar</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>