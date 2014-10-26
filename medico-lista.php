<?php	
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('banco-endereco.php');
require_once ('banco-medico.php');
require_once ('logica-usuario.php');

verificaUsuario();
?>
	
<?php if (usuarioEstaLogado()) { ?>

	<table class="table table-striped">

		<tr>
			<td><h1 class="text-bold">Médicos</h1></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="text-center"><a class="btn btn-primary" href="medico-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold">End</td>
			<td class="text-bold">Especialidade</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Excluir</td>
		</tr>

		<?php
			$medicos = listaMedicos($conexao);

			foreach ($medicos as $medico) :
			$id_medico = 	$medico['id_medico'];
			
			$endereco = buscaNumEnd($conexao,$id_medico);
		?>
		<tr>
			<td><?=$medico['nome']?></td>
			<td><?php echo $endereco['num']?></td>

			<td><?php
				$id_medico = $medico['id_medico'];
				$espCadastradas = buscaespCadastrada($conexao,$id_medico);
				foreach ($espCadastradas as $espCadastrada) :
					echo " | ".$espCadastrada['especialidade'];
				endforeach;?>
			</td>
			
			<td class="text-center"><a class="btn btn-primary btn-sm" href="medico-altera-formulario.php?id=<?=$medico['id_medico']?>">Alterar</a></td>
			<td class="text-center">
				<form action="remove-medico.php" method="post">
					<input type="hidden" name="id" value="<?=$medico['id_medico']?>">
					<button class="btn btn-danger btn-sm">Remover</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>