<?php
require_once ('cabecalho.php');
require_once ('banco-telefone.php');
require_once ('logica-usuario.php');

verificaUsuario();

$telefone = array("telefone" => "");
?>
<h1>Adicionando Telefone</h1>
<form action="adiciona-parceiro-telefone.php" method="post">
	<table class="table">
	
		<?php require_once ('parceiro-formulario-base-telefone.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>

<?php require_once ('rodape.php');?>