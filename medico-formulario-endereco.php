<?php
require_once ('cabecalho.php');
require_once ('banco-endereco.php');
require_once ('logica-usuario.php');
verificaUsuario();
$endereco = array("cep" => "", "rua" => "", "numero" => "", "complemento" => "", "bairro" => "", "cidade" => "", "uf" => "", "fixo" => "", "movel" => "");
?>
<h1>Adicionando Endereço</h1>
<form action="adiciona-medico-endereco.php" method="post">
	<table class="table">
	
		<?php include ('medico-formulario-base-endereco.php');?>

		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
		</tr>

	</table>
</form>

<?php require_once ('rodape.php');?>