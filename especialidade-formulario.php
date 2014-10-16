<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('banco-especialidade.php');
require_once ('logica-usuario.php');

verificaUsuario();

$especialidade = array("id_area" => "-1", "especialidade" => "");
$areas = listaAreas($conexao);
?>
<h1>Adicionando Especialidade</h1>
<form action="adiciona-especialidade.php" method="post">
	<table class="table">
	
		<?php require_once ('especialidade-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>