<?php	
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('logica-usuario.php');
verificaUsuario();
$id     = $_GET['id'];
$p      = $_GET['p'];
$exames = buscaExamesPaciente($conexao, $id);
?>
<?php if (usuarioEstaLogado()) { ?>
	<table class="table table-striped">
		<tr>
			<td colspan="4"><h2 class="text-bold">Exames realizados pelo paciente <?=$p?></h2></td>
		</tr>

		<tr>
			<td><strong>Exame</strong></td>
			<td class="center text-bold">Data Inicial</td>
			<td class="center text-bold">Data Final</td>
			<td class="center text-bold">Regrar Relatório</td>
		</tr>

		<?php
			$exames = buscaExamesPaciente($conexao, $id);
			foreach ($exames as $exame) :
		?>
		<form action="relatorio-paciente-data.php" method="post">
			<input type="hidden" name="id_tipo_exame" value="<?=$exame['id_tipo_exame']?>">
			<input type="hidden" name="id_paciente" value="<?=$exame['id_paciente']?>">
			<input type="hidden" name="nomeExame" value="<?=$exame['nomeExame']?>">
			<tr>
				<td><?=$exame['nomeExame']?></td>
				<td><input type="date" name="data_inicial" class="form-control"/></td>
				<td><input type="date" name="data_final" class="form-control"/></td>
				<td class="center"><input type="submit" value="Gerar" class="btn btn-primary" /></td>
			</tr>
		</form>
		<?php endforeach ?>
	</table>
<?php } ?>
<?php require_once ('rodape.php'); ?>