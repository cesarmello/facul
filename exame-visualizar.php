<?php
require_once ('cabecalho.php');
require_once ('banco-exame.php');
require_once ('banco-paciente.php');
require_once ('banco-tipo-exame.php');
require_once ('banco-exame-campo.php');
require_once ('banco-prontuario.php');
require_once ('logica-usuario.php');

verificaUsuario();
$id_exame    = $_GET["id"];
$exame       = buscaExame($conexao, $id_exame);
//$tipoExame   = buscaTipoExame($conexao, $id_tipo_exame);
//$exameCampos = listaExameCampos($conexao, $id_tipo_exame);


?>

<h1>Visualizar Exame <?=$tipoExame['nome']?></h1>
	<input type="hidden" name="id" value="<?=$exame['id_exame']?>">
	<table class="table">
		<?php require_once ('exame-formulario-base.php');?>
		</tr>
		<tr>
			<td colspan="2"><a class="btn-primary btn-sm" href="exame-lista.php">Voltar</a></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php'); ?>