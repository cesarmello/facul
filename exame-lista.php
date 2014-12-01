<?php	
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h1 class="text-bold">Exames</h1></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="text-center"><a class="btn btn-primary" href="exame-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Exame Nº</td>
			<td class="text-bold">Paciente</td>
			<td class="text-bold">Exame</td>
			<td class="text-bold">Data</td>
			<td class="text-bold text-center">Visualizar</td>
			<td class="text-bold text-center">Desativar</td>
		</tr>

		<?php
			$exames = listaExames($conexao);
			foreach ($exames as $exame) :
		?>
		<tr>
			<td><?=$exame['id_exame']?></td>
			<td><?=$exame['nome'] ?></td>
			<td><?=$exame['exame'] ?></td>
			<td><?=$exame['data_exame'] ?></td>
			<td class="text-center"><a class="btn btn-success btn-sm" href="exame-visualizar.php?id=<?=$exame['id_exame']?>">Visualizar</a></td>
			<td class="text-center">
				<form action="desativa-exame.php" method="post">
					<input type="hidden" name="id" value="<?=$exame['id_exame']?>">
					<button class="btn btn-danger btn-sm">Desativar</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>