<?php
require_once ('cabecalho.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$unimedida = array("unidade" => "", "descricao" => "");
$unimedida = listaUniMedidas($conexao);
?>
<h1>Adicionando Unidade de Medida</h1>
<form action="adiciona-unimedida.php" method="post">
	<table class="table">
	
		<?php require_once ('unimedida-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>