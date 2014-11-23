<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('banco-endereco.php');
require_once ('banco-especialidade.php');
require_once ('banco-medico.php');
require_once ('logica-usuario.php');
$areas = listaAreas($conexao);
verificaUsuario();
$id_medico = $_GET['id'];
$medico = buscaMedico($conexao,$id_medico);
$ends = buscaEndMedico($conexao, $id_medico);
?>

<h1>Alterando Medico</h1>
<form action="altera-medico.php" method="post">
	<input type="hidden" name="id_medico" value="<?=$medico['id_medico']?>">
	Medico desde <?=$medico['data']?>
	<table class="table">

		<?php require_once ('medico-formulario-base.php');?>

		<tr>
			<td colspan="2"><input type="submit" value="Alterar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<table class="table">
		<tr>
			<td colspan="5">
				<h1 class="text-center">Endereços Cadastrados</h1>
					<a href="endereco-formulario.php?id=<?=$id_medico?>" class="btn btn-primary">Adiconar novo Endereço</a>
				
			</td>
		</td>
		</tr>
		<tr >
			<td style="width:30%;" class="text-bold">Endereço</td>
			<td style="width:55%;" class="text-bold">Especialidades</td>
			<td style="width:05%;" class="text-bold text-center">+</td>
			<td style="width:05%;" class="text-bold text-center">Alterar</td>
			<td style="width:05%;" class="text-bold text-center">Desativar</td>
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
					<a href="medico-adiciona-especialidade-endereco.php?id=<?=$end['id_endereco']?>&p=<?=$id_medico?>"><button class="btn btn-warning btn-sm" title="Adicionar Especialidade">+</button></a>
				</td>
				<td class="text-center"><a class="btn btn-primary btn-sm" href="endereco-altera-formulario.php?id=<?=$end['id_endereco']?>&p=<?=$id_medico?>" alt="Alterar Enderço" data-toggle="tooltip" data-placement="top" title="Alterar Endereço">Alterar</a></td>
				<td class="text-center">
					<form action="desativa-endereco.php" method="post">
						<input type="hidden" name="id_endereco" value="<?=$end['id_endereco']?>">
						<input type="hidden" name="id_medico" value="<?=$id_medico?>">
						<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Desativar Enderço">Desativar</button>
					</form>
				</td>
			</tr>
		<?php endforeach;?>
</table>
<?php require_once ('rodape.php'); ?>