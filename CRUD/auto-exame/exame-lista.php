<?php	
require_once ('cabecalho.php');
require_once ('banco-exame.php');
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
			<td class="text-center"><a class="btn btn-primary" href="exame-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold">Minimo</td>
			<td class="text-bold">Normal</td>
			<td class="text-bold">Maximo</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Desativar</td>
		</tr>

		<?php
			$auto_exames = listaTipoExames($conexao);
			foreach ($auto_exames as $auto_exame) :
		?>
		<tr>
			<td><?=$auto_exame['nome'] ?></td>
			<td><?=$auto_exame['minimo'] ?></td>
			<td><?=$auto_exame['normal'] ?></td>
			<td><?=$auto_exame['maximo'] ?></td>
			<td class="text-center"><a class="btn btn-primary btn-sm" href="exame-altera-formulario.php?id=<?=$auto_exame['id_auto_exame']?>">Alterar</a></td>
			<td class="text-center">
				<form action="desativa-exame.php" method="post">
					<input type="hidden" name="id" value="<?=$auto_exame['id_auto_exame']?>">
					<button class="btn btn-danger btn-sm">Desativar</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>