<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('banco-tipo-exame.php');
require_once ('logica-usuario.php');

verificaUsuario();

$exame = array("id_exame" => "", "valor_exame" => "", "diagnostico" => "", "qm_exame" => "", "auto_exame" => "");
$exame = listaExames($conexao);
$tipoExames = listaTipoExames($conexao);
?>
<h1>Adicionando resultado de exame</h1>
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