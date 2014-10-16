<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('banco-endereco.php');
require_once ('banco-especialidade.php');
require_once ('banco-parceiro.php');
require_once ('banco-tipo-parceiro.php');
require_once ('logica-usuario.php');
$areas = listaAreas($conexao);

verificaUsuario();

$id_parceiro = $_GET['id'];
$parceiro = buscaParceiro($conexao,$id_parceiro);
$tipoParceiros = listaTipoParceiros($conexao);
$ends = buscaEndParceiro($conexao, $id_parceiro);
?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#areas').change(function() {
					$('#especialidades').load('especialidades.php?area=' + $('#areas').val());
				});
			});
		</script>

<h1>Alterando Parceiro</h1>
<form action="altera-parceiro.php" method="post">
	<input type="hidden" name="id_parceiro" value="<?=$parceiro['id_parceiro']?>">
	Parceiro desde <?=$parceiro['data']?>
	<table class="table">

		<?php require_once ('parceiro-formulario-base.php');?>

		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<table class="table">
		<tr>
			<td colspan="5">
				<h1 class="text-center">Endereços Cadastrados</h1>
					<a href="endereco-formulario.php?id=<?=$id_parceiro?>" class="btn btn-primary">Adiconar novo Endereço</a>
				
			</td>
		</td>
		</tr>
		<tr >
			<td style="width:30%;" class="text-bold">Endereço</td>
			<td style="width:55%;" class="text-bold">Especialidades</td>
			<td style="width:05%;" class="text-bold text-center">+</td>
			<td style="width:05%;" class="text-bold text-center">Alterar</td>
			<td style="width:05%;" class="text-bold text-center">Excluir</td>
		</tr>
		<?php
		foreach ($ends as $end) :?>
			<tr>
				<td>
					<?=$end['rua'];?>, <?=$end['cidade'];?>
				</td>
				<td><?php	$espCadastradas = buscaEspCadastradaEnd($conexao,$end['id_endereco']);
					foreach ($espCadastradas as $espCadastrada) :
						echo " | ".$espCadastrada['especialidade'];
					endforeach;?>
				</td>
				<td>
					<a href="parceiro-adiciona-especialidade-endereco.php?id=<?=$end['id_endereco']?>&p=<?=$id_parceiro?>"><button class="btn btn-warning btn-sm" title="Adicionar Especialidade">+</button></a>
				</td>
				<td class="text-center"><a class="btn btn-primary btn-sm" href="endereco-altera-formulario.php?id=<?=$end['id_endereco']?>&p=<?=$id_parceiro?>" alt="Alterar Enderço" data-toggle="tooltip" data-placement="top" title="Alterar Endereço">Alterar</a></td>
				<td class="text-center">
					<form action="remove-endereco.php" method="post">
						<input type="hidden" name="id_endereco" value="<?=$end['id_endereco']?>">
						<input type="hidden" name="id_parceiro" value="<?=$id_parceiro?>">
						<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir Enderço">Remover</button>
					</form>
				</td>
			</tr>
		<?php endforeach;?>
</table>
<?php require_once ('rodape.php'); ?>