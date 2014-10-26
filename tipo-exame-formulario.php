<?php
require_once ('cabecalho.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-unimedida.php');
require_once ('logica-usuario.php');

verificaUsuario();

$tipo_exame = array("nome" => "", "minimo" => "", "normal" => "", "maximo" => "");
$unimedidas  = listaUniMedidas($conexao);
?>
<h1>Adicionando Tipo de Exame</h1>
<form action="adiciona-tipo-exame.php" method="post">
	<table class="table">
	
		<?php require_once ('tipo-exame-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>