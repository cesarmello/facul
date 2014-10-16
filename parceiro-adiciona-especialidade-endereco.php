<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('banco-especialidade.php');
require_once ('banco-parceiro.php');
require_once ('logica-usuario.php');
verificaUsuario();

$id_parceiro = $_GET['p'];
$id_endereco = $_GET['id'];
$areas = listaAreas($conexao);
$parceiro = buscaParceiro($conexao,$id_parceiro);
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#areas').change(function() {
			$('#especialidades').load('especialidades.php?area=' + $('#areas').val());
		});
	});
</script>

<h1>Especialidade Cadastradas</h1>
		<table class="table">
			<?php $espCads = buscaEspCadastradaEnd($conexao, $id_endereco);
			foreach ($espCads as $espCad) : ?>
			<tr>
				<td><?=$espCad['especialidade'];?></td>
				<td>
					<form action="remove-parceiro-end-esp.php" method="post">
						<input type="hidden" name="id_par" value="<?=$id_parceiro?>">
						<input type="hidden" name="id_end" value="<?=$id_endereco?>">
						<input type="hidden" name="id_esp" value="<?=$espCad['id_especialidade']?>">
						<button class="btn btn-danger btn-sm">Remover</button>
					</form>
				</td>
			</tr>
			<?php endforeach;?>
		</table>
		<table class="table">
		<form action="adiciona-especialidade-parceiro.php" method="post">
			<input type="hidden" name="id_parceiro" value="<?=$id_parceiro?>">
			<input type="hidden" name="id_endereco" value="<?=$id_endereco?>">
			<tr>
				<td colspan="2" class="text-center"><h1>Adicionar Especialidade</h1></td>
			</tr>
			<tr>
				<td>Área</td>
				<td>
					<select name="areas" id="areas" class="form-control">
						<option value='-1'>Selecione Parceria</option>
						<?php foreach ($areas as $area) : ?>
							<option value="<?=$area['id_area']?>"><?=$area['nome']?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Especialidade</td>
				<td>
					<select name="especialidades" id="especialidades" class="form-control">
						<option value="0">Selecione Especialidade</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="parceiro-altera-formulario.php?id=<?=$id_parceiro?>" class="btn btn-danger" title="Voltar a pagina anterior">Voltar</a>
					<input type="submit" value="Cadastrar" class="btn btn-primary" title="Cadastrar nova especialidade"/>
				</td>
			</tr>
		</table>
	</form>
<?php require_once ('rodape.php'); ?>