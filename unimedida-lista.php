<?php	
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');
verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h1 class="text-bold">Unidades de Medidas</h1></td>
			<td></td>
			<td></td>
			<td class="text-center"><a class="btn btn-primary" href="unimedida-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold">Descrição</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Desativar</td>
		</tr>

		<?php
			$unimedidas = listaUniMedidas($conexao);
			foreach ($unimedidas as $unimedida) :
		?>
		<tr>
			<td><?=$unimedida['unidade'] ?></td>
			<td><?=$unimedida['descricao'] ?></td>
			<td class="text-center"><a class="btn btn-primary btn-sm" href="unimedida-altera-formulario.php?id=<?=$unimedida['id_unimedida']?>">Alterar</a></td>
			<td class="text-center">
				<form action="desativa-unimedida.php" method="post">
					<input type="hidden" name="id" value="<?=$unimedida['id_unimedida']?>">
					<button class="btn btn-danger btn-sm">Desativar</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>