<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();

$auto_exame = array("nome" => "", "minimo" => "", "normal" => "", "maximo" => "");
$auto_exame = listaTipoExames($conexao);
?>
<h1>Adicionando Tipo de Exame</h1>
<form action="adiciona-exame.php" method="post">
	<table class="table">
	
		<?php require_once ('exame-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>