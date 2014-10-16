<?php	
require_once ('cabecalho.php');
require_once ('banco-especialidade.php');
require_once ('banco-endereco.php');
require_once ('banco-parceiro.php');
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
			<td class="text-center"><a class="btn btn-primary" href="parceiro-formulario.php">Adicionar</a></td>
		</tr>

		<tr>
			<td class="text-bold">Nome</td>
			<td class="text-bold">End</td>
			<td class="text-bold">Especialidade</td>
			<td class="text-bold text-center">Alterar</td>
			<td class="text-bold text-center">Excluir</td>
		</tr>

		<?php
			$parceiros = listaParceiros($conexao);

			foreach ($parceiros as $parceiro) :
			$id_parceiro = 	$parceiro['id_parceiro'];
			
			$endereco = buscaNumEnd($conexao,$id_parceiro);
		?>
		<tr>
			<td><?=$parceiro['nome']?></td>
			<td><?php echo $endereco['num']?></td>

			<td><?php
				$id_parceiro = $parceiro['id_parceiro'];
				$espCadastradas = buscaespCadastrada($conexao,$id_parceiro);
				foreach ($espCadastradas as $espCadastrada) :
					echo " | ".$espCadastrada['especialidade'];
				endforeach;?>
			</td>
			
			<td class="text-center"><a class="btn btn-primary btn-sm" href="parceiro-altera-formulario.php?id=<?=$parceiro['id_parceiro']?>">Alterar</a></td>
			<td class="text-center">
				<form action="remove-parceiro.php" method="post">
					<input type="hidden" name="id" value="<?=$parceiro['id_parceiro']?>">
					<button class="btn btn-danger btn-sm">Remover</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
	
	<?php } ?>
<?php require_once ('rodape.php'); ?>