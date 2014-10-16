<?php
require_once ('cabecalho.php');
require_once ('banco-area.php');
require_once ('logica-usuario.php');

verificaUsuario();

$area = array("nome" => "");
$area = listaAreas($conexao);
?>
<h1>Adicionando Área</h1>
<form action="adiciona-area.php" method="post">
	<table class="table">
	
		<?php require_once ('area-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>