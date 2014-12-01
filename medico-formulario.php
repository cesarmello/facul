<?php
require_once ('cabecalho.php');
require_once ('banco-medico.php');
require_once ('logica-usuario.php');

verificaUsuario();

$medicos = array("id_medico" => "", "nome" => "", "razao" => "", "crm" => "", "senha" => "", "site" => "", "email" => "");
?>
<h1>Adicionando Médico</h1>
<form action="adiciona-medico.php" method="post">
	<table class="table">
	
		<?php require_once ('medico-formulario-base.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>
<?php require_once ('rodape.php');?>