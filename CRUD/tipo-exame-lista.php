<?php	
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h1 class="text-bold">Unidades de Medidas</h1></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="text-center"><a class="btn btn-primary" href="tipo-exame-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold">Minimo</td>
			<td class="text-bold">Normal</td>
			<td class="text-bold">Maximo</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Excluir</td>
		</tr>

		<?php
			$tipo_exames = listaTipoExames($conexao);
			foreach ($tipo_exames as $tipo_exame) :
		?>
		<tr>
			<td><?=$tipo_exame['nome'] ?></td>
			<td><?=$tipo_exame['minimo'] ?></td>
			<td><?=$tipo_exame['normal'] ?></td>
			<td><?=$tipo_exame['maximo'] ?></td>
			<td class="text-center"><a class="btn btn-primary btn-sm" href="tipo-exame-altera-formulario.php?id=<?=$tipo_exame['id_tipo_exame']?>">Alterar</a></td>
			<td class="text-center">
				<form action="remove-tipo-exame.php" method="post">
					<input type="hidden" name="id" value="<?=$tipo_exame['id_tipo_exame']?>">
					<button class="btn btn-danger btn-sm">Remover</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>