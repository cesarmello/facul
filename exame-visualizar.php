<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('banco-paciente.php');
require_once ('banco-exame.php');
require_once ('logica-usuario.php');
verificaUsuario();
$id_exame =  $_GET["id"];
$exame    =  buscaExame($conexao, $id_exame);
$campos   =  buscaMerExamesProntuario($conexao, $id_exame); ?>

<h1>Visualizar Exame <?=$exame['nomeExame']?></h1>
	<table class="table">
		<?php require_once ('exame-formulario-base.php');?>
		<tr>
			<td colspan="2"><a class="btn-primary btn-sm" href="exame-lista.php">Voltar</a></td>
		</tr>
	</table>
</form>
<?php require_once ('rodape.php'); ?>